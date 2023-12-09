<?php

namespace Modules\User\Controllers;

use App\Models\AddToFavourite;
use App\Notifications\AdminChannelServices;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Matrix\Exception;
use Modules\Booking\Models\Payment;
use Modules\Core\Models\Attributes;
use Modules\FrontendController;
use Modules\Location\Models\Location;
use Modules\Space\Models\Space;
use Modules\User\Events\NewVendorRegistered;
use Modules\User\Events\SendMailUserRegistered;
use Modules\User\Events\UserSubscriberSubmit;
use Modules\User\Models\Subscriber;
use Modules\User\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
use Modules\Vendor\Models\VendorRequest;
use Validator;
use Modules\Booking\Models\Booking;
use App\Helpers\ReCaptchaEngine;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Modules\Booking\Models\Enquiry;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Input;

class UserController extends FrontendController
{
    use AuthenticatesUsers;

    protected $enquiryClass;

    public function __construct()
    {
        $this->enquiryClass = Enquiry::class;
        parent::__construct();
    }

    public function dashboard(Request $request)
    {
        $this->checkPermission('dashboard_vendor_access');
        $user_id = Auth::id();
        $data = [
            'cards_report' => Booking::getTopCardsReportForVendor($user_id),
            'earning_chart_data' => Booking::getEarningChartDataForVendor(strtotime('monday this week'), time(), $user_id),
            'page_title' => __("Vendor Dashboard"),
            'breadcrumbs' => [
                [
                    'name' => __('Dashboard'),
                    'class' => 'active'
                ]
            ]
        ];
        return view('User::frontend.dashboard', $data);
    }

    public function reloadChart(Request $request)
    {
        $chart = $request->input('chart');
        $user_id = Auth::id();
        switch ($chart) {
            case "earning":
                $from = $request->input('from');
                $to = $request->input('to');
                return $this->sendSuccess([
                    'data' => Booking::getEarningChartDataForVendor(strtotime($from), strtotime($to), $user_id)
                ]);
                break;
        }
    }

    public function profile(Request $request)
    {
        $user = Auth::user();
        $data = [
            'dataUser' => $user,
            'page_title' => __("Profile"),
            'breadcrumbs' => [
                [
                    'name' => __('Setting'),
                    'class' => 'active'
                ]
            ],
            'is_vendor_access' => $this->hasPermission('dashboard_vendor_access')
        ];
        return view('User::frontend.profile', $data);
    }

    public function profileUpdate(Request $request)
    {
        $user = Auth::user();
        $messages = [
            'user_name.required' => __('The User name field is required.'),
        ];
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id)
            ],
            'user_name' => [
                'required',
                'max:255',
                'min:4',
                'string',
                'alpha_dash',
                Rule::unique('users')->ignore($user->id)
            ],
            'phone' => [
                'required',
                Rule::unique('users')->ignore($user->id)
            ],
        ], $messages);
        $input = $request->except('bio');
        $user->fill($input);
        $user->bio = clean($request->input('bio'));
        $user->birthday = date("Y-m-d", strtotime($user->birthday));
        $user->user_name = Str::slug($request->input('user_name'), "_");
        $user->save();
        return redirect()->back()->with('success', __('Update successfully'));
    }

    public function changePassword(Request $request)
    {
        $data = [
            'breadcrumbs' => [
                [
                    'name' => __('Setting'),
                    'url' => route("user.profile.index")
                ],
                [
                    'name' => __('Change Password'),
                    'class' => 'active'
                ]
            ],
            'page_title' => __("Change Password"),
        ];
        return view('User::frontend.changePassword', $data);
    }

    public function changePasswordUpdate(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error", __("Your current password does not matches with the password you provided. Please try again."));
        }
        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            //Current password and new password are same
            return redirect()->back()->with("error", __("New Password cannot be same as your current password. Please choose a different password."));
        }
        $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with('success', __('Password changed successfully !'));
    }

    public function bookingsDetails(Request $request)
    {
        if(isset($_GET['type'])){
          $type=$_GET['type'];
          switch ($type) {
            case 'scheduled':
                $content_title = 'Booking Scheduled';
                $page_title = 'Booking Scheduled';
                break;
            case 'history':
                $content_title = 'Booking History';
                $page_title = 'Booking History';
                break;
            case 'all':
                $content_title = 'All Bookings';
                $page_title = 'All Bookings';
                break;
            default:
                break;
        }
        } else {
             $type='all';
             $content_title = 'All Bookings';
             $page_title = 'All Bookings';
        }


        $space_categories = Attributes::where('service', 'space')->get();
        $cities = Location::select('id', 'name')->get();
        $ids = Booking::select('id')->where('customer_id', Auth::id())->where('is_archive', '!=', 1)->get();

        return view('User::frontend.bookingHistory', compact('page_title', 'content_title', 'space_categories', 'cities', 'ids','type'));
    }

    public function mainSearch(Request $request)
    {
        $title = request()->title;
        $ids = Space::where('title', 'like', "%{$title}%")->pluck('id')->toArray();
        $bookings = Booking::whereIn('object_id', $ids)->get();

        $html = '';
        if ($bookings != '') {
            foreach ($bookings as $booking) {
                $html .= '  <p class="bold">Pages Search Results: <span class="overlay-suggestions"></span></p>
                            <div class="row">
                                <div class="col-md-6">
                                <div class="d-flex m-t-15">';
                $html .= '<div class="thumbnail-wrapper d48 circular bg-success text-white ">
                                <img width="36" height="36" src="' . $booking->service->image_url . '"
                                     data-src="' . $booking->service->image_url . '"
                                     data-src-retina="' . $booking->service->image_url . '" alt="">
                            </div>
                         ';
                $html .= ' <div class="p-l-10">
                                <h5 class="no-margin ">
                                <span class="semi-bold result-name">' . $booking->service->title . '</span>
                                </h5>
                               <p class="small-text hint-text">via john smith</p>
                            </div>
                            </div>
                        </div>';
            }
        }
        return response()->json($html);
    }

    public function favourites()
    {
        $page_title = 'User Favourites';
        return view('User::frontend.favourites', compact('page_title'));
    }

    public function favourites_datatable(Request $request)
    {
        $user_id = Auth::id();
        $favourites = AddToFavourite::where('user_id', $user_id);

        if ($request->title != '') {
            $title = $request->title;
            $ids = Space::where('title', 'like', "%{$title}%")->pluck('id')->toArray();
            $favourites = $favourites->whereIn('object_id', $ids);
        }

        $favourites = $favourites->get();

        return DataTables::of($favourites)
            ->addIndexColumn()
            ->addColumn('title', function ($favourite) {
                return $favourite->space->title;
            })
            ->addColumn('price', function ($favourite) {
                return $favourite->space->price;
            })
            ->addColumn('sale_price', function ($favourite) {
                return $favourite->space->sale_price;
            })
            ->addColumn('actions', function ($favourite) {
                $actions = '<div class="btn-group">
                                <a data-toggle="tooltip" title="View" style="display: flex" type="button" href="' . route('space.detail', $favourite->space->slug) . '" class="btn btn-view btn-icon btn-lg">
                                             <span class="material-icons">visibility</span>
                                </a>
                            </div>';
                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function removeFavourite(Request $request)
    {
        $user_id = Auth::id();
        $favourite = AddToFavourite::where('user_id', $user_id)->findOrFail($request->id);
        $favourite->delete();

        return back();
    }

    public function userLogin(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];
        $messages = [
            'email.required' => __('Email is required field'),
            'email.email' => __('Email invalidate'),
            'password.required' => __('Password is required field'),
        ];
        if (ReCaptchaEngine::isEnable() and setting_item("user_enable_login_recaptcha")) {
            $codeCapcha = $request->input('g-recaptcha-response');
            if (!$codeCapcha or !ReCaptchaEngine::verify($codeCapcha)) {
                $errors = new MessageBag(['message_error' => __('Please verify the captcha')]);
                return response()->json([
                    'error' => true,
                    'messages' => $errors
                ], 200);
            }
        }
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'messages' => $validator->errors()
            ], 200);
        } else {
            $email = $request->input('email');
            $password = $request->input('password');
            if (Auth::attempt([
                'email' => $email,
                'password' => $password
            ], $request->has('remember'))) {
                if (in_array(Auth::user()->status, ['blocked'])) {
                    Auth::logout();
                    $errors = new MessageBag(['message_error' => __('Your account has been blocked')]);
                    return response()->json([
                        'error' => true,
                        'messages' => $errors,
                        'redirect' => false
                    ], 200);
                }
                return response()->json([
                    'error' => false,
                    'messages' => false,
                    'redirect' => $request->input('redirect') ?? $request->headers->get('referer') ?? url(app_get_locale(false, '/'))
                ], 200);
            } else {
                $errors = new MessageBag(['message_error' => __('Username or password incorrect')]);
                return response()->json([
                    'error' => true,
                    'messages' => $errors,
                    'redirect' => false
                ], 200);
            }
        }
    }

    public function userRegister(Request $request)
    {
        $rules = [
            'first_name' => [
                'required',
                'string',
                'max:255'
            ],
            'last_name' => [
                'required',
                'string',
                'max:255'
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users'
            ],
            'password' => [
                'required',
                'string'
            ],


        ];
        $messages = [
            'email.required' => __('Email is required field'),
            'email.email' => __('Email invalidate'),
            'password.required' => __('Password is required field'),
            'first_name.required' => __('The first name is required field'),
            'last_name.required' => __('The last name is required field'),

        ];
        if (ReCaptchaEngine::isEnable() and setting_item("user_enable_register_recaptcha")) {
            $codeCapcha = $request->input('g-recaptcha-response');
            if (!$codeCapcha or !ReCaptchaEngine::verify($codeCapcha)) {
                $errors = new MessageBag(['message_error' => __('Please verify the captcha')]);
                return response()->json([
                    'error' => true,
                    'messages' => $errors
                ], 200);
            }
        }
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'messages' => $validator->errors()
            ], 200);
        } else {

            $user = \App\User::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'status' => $request->input('publish', 'publish'),
                'phone' => $request->input('phone'),
            ]);
            event(new Registered($user));
            Auth::loginUsingId($user->id);
            try {
                event(new SendMailUserRegistered($user));
            } catch (Exception $exception) {

                Log::warning("SendMailUserRegistered: " . $exception->getMessage());
            }
            $register_as=$_GET('register_as');

            if($register_as=='host'){
                $user->assignRole('vendor');
            } else {
                $user->assignRole('customer');
            }
            return response()->json([
                'error' => false,
                'messages' => false,
                'redirect' => $request->input('redirect') ?? $request->headers->get('referer') ?? url(app_get_locale(false, '/'))
            ], 200);
        }
    }



    public function subscribe(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255'
        ]);
        $check = Subscriber::withTrashed()->where('email', $request->input('email'))->first();
        if ($check) {
            if ($check->trashed()) {
                $check->restore();
                return $this->sendSuccess([], __('Thank you for subscribing'));
            }
            return $this->sendError(__('You are already subscribed'));
        } else {
            $a = new Subscriber();
            $a->email = $request->input('email');
            $a->first_name = $request->input('first_name');
            $a->last_name = $request->input('last_name');
            $a->save();

            event(new UserSubscriberSubmit($a));

            return $this->sendSuccess([], __('Thank you for subscribing'));
        }
    }

    public function upgradeVendor(Request $request)
    {
        $user = Auth::user();
        $vendorRequest = VendorRequest::query()->where("user_id", $user->id)->where("status", "pending")->first();
        if (!empty($vendorRequest)) {
            return redirect()->back()->with('warning', __('You have just done the become vendor request, please wait for the Admin\'s approved'));
        }
        // check vendor auto approved
        $vendorAutoApproved = setting_item('vendor_auto_approved');
        $dataVendor['role_request'] = setting_item('vendor_role');
        if ($vendorAutoApproved) {
            if ($dataVendor['role_request']) {
                $user->assignRole($dataVendor['role_request']);
            }
            $dataVendor['status'] = 'approved';
            $dataVendor['approved_time'] = now();
        } else {
            $dataVendor['status'] = 'pending';
        }
        $vendorRequestData = $user->vendorRequest()->save(new VendorRequest($dataVendor));
        try {
            event(new NewVendorRegistered($user, $vendorRequestData));
        } catch (Exception $exception) {
            Log::warning("NewVendorRegistered: " . $exception->getMessage());
        }
        return redirect()->back()->with('success', __('Request vendor success!'));
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        return redirect(app_get_locale(false, '/'));
    }

    public function enquiryReport(Request $request)
    {
        $this->checkPermission('enquiry_view');
        $user_id = Auth::id();
        $rows = $this->enquiryClass::where("vendor_id", $user_id)
            ->whereIn('object_model', array_keys(get_bookable_services()))
            ->orderBy('id', 'desc');
        $data = [
            'rows' => $rows->paginate(5),
            'statues' => $this->enquiryClass::$enquiryStatus,
            'has_permission_enquiry_update' => $this->hasPermission('enquiry_update'),
            'breadcrumbs' => [
                [
                    'name' => __('Enquiry Report'),
                    'class' => 'active'
                ],
            ],
            'page_title' => __("Enquiry Report"),
        ];
        return view('User::frontend.enquiryReport', $data);
    }

    public function enquiryReportBulkEdit($enquiry_id, Request $request)
    {
        $status = $request->input('status');
        if (!empty($this->hasPermission('enquiry_update')) and !empty($status) and !empty($enquiry_id)) {
            $query = $this->enquiryClass::where("id", $enquiry_id);
            $query->where("vendor_id", Auth::id());
            $item = $query->first();
            if (!empty($item)) {
                $item->status = $status;
                $item->save();
                return redirect()->back()->with('success', __('Update success'));
            }
            return redirect()->back()->with('error', __('Enquiry not found!'));
        }
        return redirect()->back()->with('error', __('Update fail!'));
    }

    //getting booking details
    public function singleBookingDetails($id)
    {
        $page_title = "Booking Detail";
        $booking = Booking::where('id', $id)->first();
        return view('User::frontend.bookingDetail', compact('booking', 'page_title'));
    }

    //user dashboard for customer
    public function userDashboard()
    {
        $page_title = "User Dashboard";
        $bookings = Booking::where('customer_id', Auth::id())->orderBy('id', 'DESC')->whereDate('start_date', '>', Carbon::now())->take(3)->get();
        $planBookings = Booking::where('customer_id', Auth::id())->orderBy('id', 'DESC')->whereDate('start_date', '>', Carbon::now())->get();
        return view('User::frontend.user_dashboard', compact('bookings', 'page_title', 'planBookings'));
    }

    public function getBooking(Request $request)
    {
        $booking = Booking::where('id', $request->id)->first();
        $html = '   <div class="view-port clearfix" id="eventFormController">
                                    <div class="view bg-white">
                                        <div class="scrollable">
                                            <div class="p-l-15 p-r-20 p-t-20">
                                                <a class="pg-icon text-color link pull-right" data-toggle="quickview"
                                                   data-toggle-element="#calendar-event" href="#">close</a>
                                                <h4 class="m-b-5 m-t-0" id="event-date">' . date('M, d l', strtotime($booking->start_date)) . '</h4>
                                                <div class="m-b-20 fs-14 text-center">
                                                    <div class="status-btn pending">' . $booking->status . '</div>
                                                </div>
                                            </div>
                                            <div class="p-t-15">
                                                <div class="book-details pl-3">
                                                    <table class="table">
                                                        <tbody>
                                                        <tr>
                                                            <td colspan="4" class="td-id text-uppercase" id="b_id">
                                                                Booking
                                                                #' . $booking->id . '
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-20">
                                                                <span class="thumbnail-wrapper circular inline">
                                                                  <img
                                                                      src="' . asset('user_assets/img/profiles/' . $booking->vendor->avatar) . '"
                                                                      alt="host"
                                                                      data-src="' . asset('user_assets/img/profiles/' . $booking->vendor->avatar) . '"
                                                                      data-src-retina="' . asset('user_assets/img/profiles/' . $booking->vendor->avatar) . '"
                                                                      width="45" height="45">
                                                                </span>
                                                            </td>
                                                            <td colspan="3">' . $booking->vendor->name . '</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-20">
                                                                <span class="material-icons" data-toggle="tooltip"
                                                                      data-placement="top" title=""
                                                                      data-original-title="Arrival Date">
                                                                  flight_land
                                                                  </span>
                                                            </td>
                                                            <td class="w-40">' . date('F d,Y', strtotime($booking->start_date)) . '</td>
                                                            <td class="w-20">
                                                                <span class="material-icons" data-toggle="tooltip"
                                                                      data-placement="top" title=""
                                                                      data-original-title="Arrival Time">
                                                                  access_time
                                                                  </span>
                                                            </td>
                                                            <td class="w-40">' . date('g:i A', strtotime($booking->start_date)) . '</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-20">
                                                                <span class="material-icons" data-toggle="tooltip"
                                                                      data-placement="top" title=""
                                                                      data-original-title="Departure Date">
                                                                  flight_takeoff
                                                                  </span>
                                                            </td>
                                                            <td class="w-40">' . date('F d,Y', strtotime($booking->end_date)) . '</td>
                                                            <td class="w-20">
                                                                <span class="material-icons" data-toggle="tooltip"
                                                                      data-placement="top" title=""
                                                                      data-original-title="Departure Time">
                                                                  access_time
                                                                  </span>
                                                            </td>
                                                            <td class="w-40">' . date('g:i A', strtotime($booking->end_date)) . '</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-20">
                                                                <span class="material-icons" data-toggle="tooltip"
                                                                      data-placement="top" title=""
                                                                      data-original-title="No of Guests">
                                                                  person
                                                                  </span>
                                                            </td>
                                                            <td colspan="3" class="w-40">' . $booking->total_guests . ' Guests</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-20 fs-16 font-weight-bold text-uppercase bg-complete-lighter text-right">
                                                                Total
                                                            </td>
                                                            <td colspan="3"
                                                                class="w-40 fs-18 bg-complete-lighter text-right"
                                                                style="font-weight: 900;">$' . number_format((float)$booking->total, 2, '.', '') . '
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                            <div class="p-l-15 p-r-15 p-t-20 text-center">
                                                <a href="' . route('user.single.booking.detail', $booking->id) . '"
                                                   class="text-black">
                                                    <button aria-label="" id="eventSave"
                                                            class="btn btn-complete btn-block">View Full Booking Details
                                                    </button>
                                                </a>
                                                <!--button aria-label="" id="eventDelete" class="btn btn-default m-l-10"><i class="pg-icon">trash</i></button-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="view bg-white">
                                        <div class="navbar navbar-default navbar-sm">
                                            <div class="navbar-inner">
                                                <a href="javascript:;" class="action p-l-10 link text-color"
                                                   data-navigate="view" data-view-port="#eventFormController"
                                                   data-view-animation="push-parrallax">
                                                    <i class="pg-icon">chevron_left</i>
                                                </a>
                                                <div class="view-heading">
                                                    <span class="font-montserrat text-uppercase fs-13">Alerts</span>
                                                </div>
                                                <a href="#" class="action p-r-10 pull-right link text-color">
                                                    <i class="pg-icon">search</i>
                                                </a>
                                            </div>
                                        </div>
                                        <p class="p-l-30 p-r-30 p-t-30"> This is a Demo</p>
                                    </div>
                                </div>';

        return response()->json(['html' => $html]);
    }

    public function bookingsSearch(Request $request)
    {
        $user_id = Auth::id();
        $space_ids = Booking::orderBy('id', 'DESC')->where('customer_id', $user_id)->where('is_archive', '!=', 1)->pluck('object_id')->toArray();
        $bookings = Space::whereIn('id', $space_ids)->where('title', 'like', "%{$request->title}%")->get();

        return response()->json(['bookings' => $bookings]);
    }
}
