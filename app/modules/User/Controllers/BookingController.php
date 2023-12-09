<?php

namespace Modules\User\Controllers;

use App\Exports\BookingExport;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Excel;
use Matrix\Exception;
use Modules\FrontendController;
use Modules\User\Events\NewVendorRegistered;
use Modules\User\Events\SendMailUserRegistered;
use Modules\User\Models\Newsletter;
use Modules\User\Models\Subscriber;
use Modules\User\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
use Modules\Vendor\Models\VendorRequest;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Validator;
use PDF;
use Modules\Booking\Models\Booking;
use App\Helpers\ReCaptchaEngine;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Modules\Booking\Models\Enquiry;

class BookingController extends FrontendController
{

    public function __construct()
    {
        parent::__construct();
    }


    public function bookingInvoice($code)
    {
        $booking = Booking::where('code', $code)->first();
        $user_id = Auth::id();
        if (empty($booking)) {
            return redirect('user/booking-history');
        }
        if ($booking->customer_id != $user_id and $booking->vendor_id != $user_id) {
            return redirect('user/booking-history');
        }
        $data = [
            'booking' => $booking,
            'service' => $booking->service,
            'page_title' => __("Invoice")
        ];
        return view('User::frontend.bookingInvoice', $data);
    }

    public function bulkBookingInvoice(Request $request)
    {
        $ids = explode(',', $request->pdf_ids);
        $bookings = Booking::whereIn('id', $ids)->get();
        $pdf = PDF::loadView('User::frontend.booking_bulkInvoice', compact('bookings'));

        return $pdf->download('bookings.pdf');

    }

    public function exportBookings(Request $request)
    {
        $ids = explode(',', $request->xls_ids);
        return (new BookingExport($ids))->download('bookings.xls');
    }

    public function archive(Request $request)
    {
        $id = $request->id;
        $booking = Booking::find($id);
        $booking->is_archive = 1;
        $booking->save();

        return back();
    }

    public function ticket($code = '')
    {
        $booking = Booking::where('code', $code)->first();
        $user_id = Auth::id();
        if (empty($booking)) {
            return redirect('user/booking-history');
        }
        if ($booking->customer_id != $user_id and $booking->vendor_id != $user_id) {
            return redirect('user/booking-history');
        }
        $data = [
            'booking' => $booking,
            'service' => $booking->service,
            'page_title' => __("Ticket")
        ];
        return view('User::frontend.booking.ticket', $data);
    }
}
