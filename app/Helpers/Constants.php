<?php

namespace App\Helpers;

use DateInterval;
use DatePeriod;
use DateTime;

class Constants
{
    const DAYS = [
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
        'Sunday',
    ];

    public static function getAllDayTimeSlot($intervalMinutes = 30)
    {
        $slots = ['00:00'];
        $start = date('Y-m-d') . " 00:00:00";
        $end = date('Y-m-d') . " 23:59:59";
        while ($end > $start) {
            $start = strtotime("+" . $intervalMinutes . " minutes", strtotime($start));
            $start = date('Y-m-d H:i:s', $start);
            if ($end > $start) {
                $slots[] = date('H:i', strtotime($start));
            }
        }
        $slots[] = "23:59";
        return $slots;
    }

    public static function getDatesFromRange($start, $end, $format = 'Y-m-d')
    {
        // Declare an empty array
        $array = [];
        // Variable that store the date interval
        // of period 1 day
        $interval = new DateInterval('P1D');
        $realEnd = new \DateTime($end);
        $realEnd->add($interval);
        $period = new DatePeriod(new \DateTime($start), $interval, $realEnd);
        // Use loop to store date into array
        foreach ($period as $date) {
            $array[] = $date->format($format);
        }
        // Return the array elements
        return $array;
    }

    public static function getTimeSlots()
    {
        return [
            '00:00',
            '00:30',
            '01:00',
            '01:30',
            '02:00',
            '02:30',
            '03:00',
            '03:30',
            '04:00',
            '04:30',
            '05:00',
            '05:30',
            '06:00',
            '06:30',
            '07:00',
            '07:30',
            '08:00',
            '08:30',
            '09:00',
            '09:30',
            '10:00',
            '10:30',
            '11:00',
            '11:30',
            '12:00',
            '12:30',
            '13:00',
            '13:30',
            '14:00',
            '14:30',
            '15:00',
            '15:30',
            '16:00',
            '16:30',
            '17:00',
            '17:30',
            '18:00',
            '18:30',
            '19:00',
            '19:30',
            '20:00',
            '20:30',
            '21:00',
            '21:30',
            '22:00',
            '22:30',
            '23:00',
            '23:30',
            '23:59',
        ];
    }

    public static function getTwelveHourTimeSlots()
    {
        return [
            '12:00',
            '12:30',
            '01:00',
            '01:30',
            '02:00',
            '02:30',
            '03:00',
            '03:30',
            '04:00',
            '04:30',
            '05:00',
            '05:30',
            '06:00',
            '06:30',
            '07:00',
            '07:30',
            '08:00',
            '08:30',
            '09:00',
            '09:30',
            '10:00',
            '10:30',
            '11:00',
            '11:30',
            '11:59',
        ];
    }

    public static function getTimeOptions($selectedSlot = null)
    {
        $html = '';
        $timeSlots = self::getTimeSlots();
        foreach ($timeSlots as $timeSlot) {
            $selectAttr = '';
            if ($timeSlot == $selectedSlot) {
                $selectAttr = 'selected="selected"';
            }
            $html .= '<option value="' . $timeSlot . '" ' . $selectAttr . '>' . $timeSlot . '</option>';
        }
        return $html;
    }

}
