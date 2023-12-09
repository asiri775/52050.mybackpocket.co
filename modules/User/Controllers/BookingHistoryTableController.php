<?php

namespace Modules\User\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
use Modules\Booking\Models\Booking;
use Yajra\DataTables\Facades\DataTables;

class BookingHistoryTableController extends Controller
{
    public function dateConvertion($date)
    {
        $d=explode('/',$date);
        $date=$d[2].'-'.$d[0].'-'.$d[1];
        return $date;
    }

    //booking history datatable
    public function __invoke(Request $request)
    {
        $user_id = Auth::id();
        $bookings = Booking::where('customer_id', $user_id);

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

        if (request()->from) {
            $from = $this->dateConvertion(request()->from);
            if(!isset($from))
            {
                $from = Carbon::now()->startOfYear();
            }
            $bookings = $bookings->where('start_date', '>=',  $from);
        }
        if (request()->to) {
            $to = $this->dateConvertion(request()->to);
            if(!isset($to))
            {
                $to = Carbon::now()->startOfYear();
            }
            $bookings = $bookings->where('end_date', '<=', $to);
        }

        if (request()->city != '') {
            $city = request()->city;
            $bookings = $bookings->where('city', 'like', "%{$city}%");
        }

        // have complete

//        if (request()->title != '') {
//            $name = request()->title;
//            $bookings = $bookings->whereHas('service', function ($query) use ($name) {
//                $query->where('title', 'like', "%{$name}%");
//            });
//        }


        if (request()->id != '') {
            $id = request()->id;
            $bookings = $bookings->where('id', 'like', "%{$id}%");
        }

        $bookings = $bookings->get();

        return DataTables::of($bookings)
            ->addColumn('checkboxes', function ($booking) {
                $select = '<input type="checkbox" name="checkbox[]" value="'.$booking->id.'">';
                return $select;

            })

            ->addColumn('title', function ($booking) {
                if ($service = $booking->service) {
                    $translation = $service->translateOrOrigin(app()->getLocale());
                    $title = '<a target="_blank" href="' . $service->getDetailUrl() . '">' .
                        clean($translation->title) . '
                                </a>';
                } else {
                    $title = "Deleted";
                }
                return $title;
            })
            ->addColumn('start_date', function ($booking) {
                $start_date = display_date($booking->start_date);
                return $start_date;
            })
            ->addColumn('end_date', function ($booking) {
                $end_date = display_date($booking->end_date);
                return $end_date;
            })
            ->addColumn('total', function ($booking) {
                $total = '$' . $booking->total;
                return $total;
            })
            ->addColumn('book_status', function ($booking) {
                $book_status = 'Status';
                return $book_status;
            })
            ->addColumn('transaction_status', function ($booking) {
                $transaction_status = 'Status';
                return $transaction_status;
            })
            ->addColumn('actions', function ($booking) {
                $actions = '<div class="text-right data-tb-icon">
                                <div class="btn-group">

                                    <a type="button" href="' . route('user.booking_details', $booking->id) . '" class="btn btn-view btn-icon btn-lg">
                                                                    <span class="material-icons" data-toggle="tooltip" data-placement="top"
                                                                          title="View">visibility</span>
                                    </a>

                                     <a type="button" target="_blank" href="' . route('user.booking.invoice', $booking->code) . '" class="btn btn-des btn-icon btn-lg">
                                                                    <span class="material-icons" data-toggle="tooltip" data-placement="top"
                                                                          title="Invoice">article</span>
                                    </a>

                                    <button type="button" class="btn btn-share btn-icon btn-lg">
                                                                    <span class="material-icons" data-toggle="tooltip" data-placement="top"
                                                                          title="Share">share</span>
                                    </button>
                                    <button type="button" class="btn btn-archive btn-icon btn-lg">
                                                                    <span class="material-icons" data-toggle="tooltip" data-placement="top"
                                                                          title="Archive">archive</span>
                                    </button>
                                </div>
                            </div>';
                return $actions;
            })
            ->rawColumns(['title', 'book_status', 'transaction_status', 'checkboxes', 'actions'])
            ->make(true);
    }
}
