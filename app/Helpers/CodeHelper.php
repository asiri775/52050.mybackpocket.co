<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CodeHelper
{
    public static function pageResponse($url)
    {
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_TIMEOUT => 7,
            CURLOPT_POST => false
        ]);
        $response = curl_exec($ch);
        if ($response) {
            return json_decode($response, true);
        }
        return false;
    }

    public static function getAMPMFromHourTime($hour)
    {
        $fullTime = "1970-01-01 " . $hour . ":00";
        return date('A', strtotime($fullTime));
    }

    public static function getSmallMinTimeFromHourTime($hour)
    {
        $fullTime = "1970-01-01 " . $hour . ":00";
        return date('H:i', strtotime($fullTime));
        //return date('h:i', strtotime($fullTime));
    }

    public static function getAfterLoginRedirectUrl(\Illuminate\Http\Request $request)
    {
        $redirectTo = "/user/user-dashboard";

        if (Auth::user()->hasPermissionTo('dashboard_vendor_access')) {
            $redirectTo = '/user/profile';
        } elseif (Auth::user()->hasPermissionTo('dashboard_access')) {
            $redirectTo = '/admin';
        }

        //$redirectUrl = $request->input('redirect') ?? $request->headers->get('referer') ?? url(app_get_locale(false, $redirectTo));
        $redirectUrl = $request->input('redirect');

        if ($redirectUrl == null) {
            $redirectUrl = url($redirectTo);
        }

        if (Session::has('afterLoginRedirect')) {
            $redirectUrl = Session::pull('afterLoginRedirect');
        }
        return $redirectUrl;
    }

    public static function withAppUrl($path)
    {
        $path = ltrim($path, '/');
        return url('') . '/' . $path;
    }

    public static function getDiscountedPrice($rate, $discount)
    {
        return number_format((float) $rate * (1 - $discount / 100), 2, '.', '');
    }

    public static function getValueOrDefault($value, $default = null)
    {
        if ($value != null) {
            return $value;
        }
        return $default;
    }

    public static function checkIfNumValNotNull($value)
    {
        if ($value != null && $value > 0) {
            return true;
        }
        return false;
    }

    public static function getNumValueOrDefault($value, $default = null)
    {
        if (self::checkIfNumValNotNull($value)) {
            return $value;
        }
        return $default;
    }

    public static function getSpacePrice($space, $from, $to)
    {
        $price = 0;
        if ($space != null) {
            $start = new \DateTime($from);
            $start->modify('-1 seconds');

            $end = new \DateTime($to);
            $end->modify('+1 seconds');

            $difference = $start->diff($end, true);

            $months = $difference->m;
            $days = $difference->d;
            $hours = $difference->h;
            $minutes = $difference->i;
            $weeks = floor($difference->d / 7);

            if ($minutes > 0) {
                $hours++;
            }

            $maxHoursPerDay = trim($space->hours_after_full_day);
            if ($maxHoursPerDay == null) {
                $maxHoursPerDay = 24;
            }

            if ($hours > $maxHoursPerDay) {
                $hours = 0;
                $days++;
            }

            $diff = strtotime($to) - strtotime($from);
            $totalDaysDifference = abs(ceil(($diff / 86400)));

            $listingPrice = self::getNumValueOrDefault($space->sale_price, $space->price);

            $monthlyPrice = self::getNumValueOrDefault($space->discounted_monthly, $space->monthly);
            $dayPrice = self::getNumValueOrDefault($space->discounted_daily, $space->daily);
            $hourPrice = self::getNumValueOrDefault($space->discounted_hourly, $space->hourly);
            $weekPrice = self::getNumValueOrDefault($space->discounted_weekly, $space->weekly);

            $totalMonthPrice = $totalDayPrice = $totalHourPrice = $totalWeekPrice = $otherPrice = 0;

            if (
                self::checkIfNumValNotNull($monthlyPrice) && self::checkIfNumValNotNull($dayPrice) &&
                self::checkIfNumValNotNull($hourPrice) && self::checkIfNumValNotNull($weekPrice)
            ) {

                if ($months > 0) {
                    $totalMonthPrice = ($monthlyPrice * $months);
                }

                if ($days > 0) {
                    $totalDayPrice = ($dayPrice * $days);
                }

                if ($hours > 0) {
                    $totalHourPrice = ($hourPrice * $hours);
                }

                if ($weeks > 0) {
                    $totalWeekPrice = ($weekPrice * $weeks);
                }
            } else {
                if ($totalDaysDifference > 0) {
                    $otherPrice = ($totalDaysDifference * $listingPrice);
                }
            }

            $price = ($totalMonthPrice + $totalDayPrice + $totalHourPrice + $totalWeekPrice + $otherPrice);

            // print_r([
            //     'monthly' => [
            //         'count' => $months,
            //         'price' => $monthlyPrice,
            //         'total' => $totalMonthPrice,
            //     ],
            //     'days' => [
            //         'count' => $days,
            //         'price' => $dayPrice,
            //         'total' => $totalDayPrice,
            //     ],
            //     'hours' => [
            //         'count' => $hours,
            //         'price' => $hourPrice,
            //         'total' => $totalHourPrice,
            //     ],
            //     'weeks' => [
            //         'count' => $weeks,
            //         'price' => $weekPrice,
            //         'total' => $totalWeekPrice,
            //     ],
            //     'other' => $otherPrice,
            //     'minutes' => $minutes,
            //     'totalDaysDifference' => $totalDaysDifference,
            //     'price' => $price,
            //     'start' => $start->format('Y-m-d H:i:s'),
            //     'end' => $end->format('Y-m-d H:i:s'),
            //     'difference' => $difference
            // ]);
            // die;
        }
        //dd($price);
        return $price;
    }

    public static function formatPrice($value)
    {
        if (self::checkIfNumValNotNull($value)) {
            return '$' . number_format($value, 2);
        }
        return '-';
    }

    public static function haveValidPrice($moneyVal)
    {
        if ($moneyVal != null) {
            $moneyVal = trim($moneyVal);
            if ($moneyVal != "") {
                if ($moneyVal > 0) {
                    return true;
                }
            }
        }
        return false;
    }

    public static function totalUnreadNotifications($notifications)
    {
        $totalUnRead = 0;
        if ($notifications != null) {
            foreach ($notifications as $notification) {
                if (empty($notification->read_at)) {
                    $totalUnRead++;
                }
            }
        }
        return $totalUnRead;
    }

    public static function totalUnreadEmails($emails)
    {
        $totalUnRead = 0;
        if ($emails != null) {
            foreach ($emails as $email) {
                if (empty($email->read_at)) {
                    $totalUnRead++;
                }
            }
        }
        return $totalUnRead;
    }
    public static function numWeeks($dateOne, $dateTwo)
    {
        //Create a DateTime object for the first date.
        $firstDate = new \DateTime($dateOne);
        //Create a DateTime object for the second date.
        $secondDate = new \DateTime($dateTwo);
        //Get the difference between the two dates in days.
        $differenceInDays = $firstDate->diff($secondDate)->days;
        //Divide the days by 7
        $differenceInWeeks = $differenceInDays / 7;
        //Round down with floor and return the difference in weeks.
        return floor($differenceInWeeks);
    }
	
}
