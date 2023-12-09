<?php

namespace Modules\User\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
use Modules\Booking\Models\Booking;
use Modules\Booking\Models\Payment;
use Modules\Core\Models\Terms;
use Modules\Space\Models\Space;
use Yajra\DataTables\Facades\DataTables;
use Modules\Space\Models\SpaceTerm;

class BookingsTableController extends Controller
{
    public function dateConvertion($date)
    {
        $d = explode('/', $date);
        $date = $d[2] . '-' . $d[0] . '-' . $d[1];
        return $date;
    }

    //booking history datatable
    public function __invoke(Request $request)
    {
        $user_id = Auth::id();
        $bookings = Booking::orderBy('id', 'DESC')->where('customer_id', $user_id)->where('is_archive', '!=', 1);
        switch (request()->date_option) {
            case 'yesterday':
                $bookings = $bookings->whereDate('start_date', '=', Carbon::now()->subDay());
                break;
            case 'today':
                $bookings = $bookings->whereDate('start_date', '=', Carbon::now());
                break;
            case 'this_weekdays':
                $start = Carbon::now()->startOfWeek();
                $end = Carbon::now()->endOfWeek()->subDays(2);
                $bookings = $bookings->whereBetween('start_date', [$start, $end]);
                break;
            case 'this_whole_week':
                $start = Carbon::now()->startOfWeek();
                $end = Carbon::now()->endOfWeek();
                $bookings = $bookings->whereBetween('start_date', [$start, $end]);
                break;
            case 'this_month':
                $start = Carbon::now()->startOfMonth();
                $end = Carbon::now()->endOfMonth();
                $bookings = $bookings->whereBetween('start_date', [$start, $end]);
                break;
            case 'this_year':
                $start = Carbon::now()->startOfYear();
                $end = Carbon::now()->endOfYear();
                $bookings = $bookings->whereBetween('start_date', [$start, $end]);
                break;
            default:
                break;
        }

        switch (request()->status) {
            case 'scheduled':
                $bookings = $bookings->whereDate('end_date', '>=', Carbon::now());
                break;
            case 'history':
                $bookings = $bookings->whereDate('end_date', '<', Carbon::now());
                break;
            case 'all':
                $bookings = $bookings;
                break;
            default:
                break;
        }

        if (request()->from) {
            $from = $this->dateConvertion(request()->from);
            if (!isset($from)) {
                $from = Carbon::now()->startOfYear();
            }
            $bookings = $bookings->where('start_date', '>=', $from);
        }

        if (request()->to) {
            $to = $this->dateConvertion(request()->to);
            if (!isset($to)) {
                $to = Carbon::now()->startOfYear();
            }
            $bookings = $bookings->where('end_date', '<=', $to);
        }

        if (request()->city != '') {
            $city_id = request()->city;
            $ids = Space::where('location_id', $city_id)->pluck('id')->toArray();
            $bookings = $bookings->whereIn('object_id', $ids);
        }
        if (request()->booking_status != '') {
            $booking_status = request()->booking_status;
            $bookings = $bookings->where('status', $booking_status);
        }

        if (request()->transaction_status != '') {
            $transaction_status = request()->transaction_status;
            $booking_ids = Payment::where('status', $transaction_status)->pluck('booking_id')->toArray();
            $bookings = $bookings->whereIn('id', $booking_ids);
        }

        if (request()->category != '') {
            $category_id = request()->category;
            $space_ids = SpaceTerm::where('term_id', $category_id)->pluck('target_id')->toArray();
            $bookings = $bookings->whereIn('object_id', $space_ids);
        }


        if (request()->id != '') {
            $id = request()->id;
            $bookings = $bookings->where('id', $id);
        }

        $bookings = $bookings->get();
        return DataTables::of($bookings)
            ->addColumn('checkboxes', function ($booking) {
                $select = '<input type="checkbox" name="checkbox[]" value="' . $booking->id . '">';
                return $select;
            })
            ->addColumn('title', function ($booking) {
                $space = Space::where('id', $booking->object_id)->first();
                $title = $space->translateOrOrigin(app()->getLocale());
                return '<a target="_blank" href="' . $space->getDetailUrl($include_param ?? true) . '">' .
                    clean($title->title) . '
                                </a>';
            })
            ->addColumn('city', function ($booking) {
                $space = Space::where('id', $booking->object_id)->first();
                return   ($space->location_id!='' AND $space->location->translateOrOrigin(app()->getLocale())->name !='') ? $space->location->translateOrOrigin(app()->getLocale())->name : 'Not Available';
            })
            ->addColumn('categories', function ($booking) {
                $categories = SpaceTerm::where('target_id', $booking->object_id)->pluck('term_id')->toArray();
                if (!empty(Terms::whereIn('id', $categories)->where('attr_id', 3)->pluck('name')->toArray())) {
                    return Terms::whereIn('id', $categories)->where('attr_id', 3)->pluck('name')->toArray();
                } else {
                    return 'Not Available';
                }
            })
            ->addColumn('start_date', function ($booking) {
                $start_date = date('m-d-Y', strtotime($booking->start_date));
                return $start_date;
            })
            ->addColumn('end_date', function ($booking) {
                $end_date = date('m-d-Y', strtotime($booking->end_date));
                return $end_date;
            })
            ->addColumn('total', function ($booking) {
                $total = '$' . $booking->total;
                return $total;
            })
            ->addColumn('booking_status', function ($booking) {
                $book_status = $booking->status;
                switch ($book_status) {
                    case 'draft':
                        $book_status = "PENDING";
                        break;
                    case 'complete':
                        $book_status = "COMPLETE";
                        break;
                    case 'processing':
                        $book_status = "PROCESSING";
                        break;
                    case 'confirmed':
                        $book_status = "CONFIRMED";
                        break;
                    default:
                        break;
                }
                return strtoupper($book_status);
            })
            ->addColumn('transaction_status', function ($booking) {
                $payment = Payment::where('booking_id', $booking->id)->first();
                if($payment){
                     $payment_status=$payment->status;
                  switch ($payment_status) { 
                    case 'paid':
                        $payment_status = "PAID";
                        break;
                    case 'draft':
                        $payment_status = "UNPAID";
                        break;
                    case 'fail':
                        $payment_status = "FAIL";
                        break;
                    default:
                        $payment_status = "UNPAID";
                        break;
                 }
                } else {
                   $payment_status = "UNPAID";
                }
               
               return strtoupper($payment_status);
            })
            ->addColumn('actions', function ($booking) {
                $actions = '<div class="text-right data-tb-icon">
                                <div class="btn-group">
                                    <a type="button" href="' . route('user.single.booking.detail', $booking->id) . '" class="btn btn-view btn-icon btn-lg">
                                            <span class="material-icons new-align" data-toggle="tooltip" data-placement="top" title="View">
                                                visibility
                                            </span>
                                    </a>
                                    <a type="button" target="_blank" href="' . route('user.booking.invoice', $booking->code) . '" class="btn btn-des btn-icon btn-lg">
                                            <span class="material-icons new-align" data-toggle="tooltip" data-placement="top" title="Invoice">
                                                article
                                            </span>
                                    </a>
                                    <button type="button" class="btn btn-share btn-icon btn-lg">
                                            <span class="material-icons new-align" data-toggle="tooltip" data-placement="top" title="Share">
                                                share
                                            </span>
                                    </button>
                                    <a href="' . route('user.booking.archive', $booking->id) . '" type="button" class="btn btn-archive btn-icon btn-lg">
                                            <span class="material-icons new-align" data-toggle="tooltip" data-placement="top" title="Archive">
                                                archive
                                            </span>
                                    </a>
                                </div>
                            </div>';
                return $actions;
            })
            ->rawColumns(['title', 'city', 'booking_status', 'transaction_status', 'checkboxes', 'actions'])
            ->make(true);
    }
}
