<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hekmatinasser\Verta\Verta;

use Illuminate\Http\Request;

class VertaController extends Controller
{
    //
    public function index(){
        $today = new Verta('now','Asia/Tehran');
        echo  'تاریخ امروز : ' . '&nbsp;&nbsp;&nbsp;&nbsp;' .  $today->format('Y-m-d') .'<br><br>';
        $user = User::query()->findOrFail(1);

         echo  'تاریخ ایجاد کاربر : ' . '&nbsp;&nbsp;&nbsp;&nbsp;' . Verta::instance($user['created_at'])->format('Y-m-d') .'<br><br>';
//        Verta::instance('2023-8-14');
        $create_user = new Verta($user['created_at'],'Asia/Tehran');
        echo 'زمان ایجاد کاربر' . '&nbsp;&nbsp;&nbsp;&nbsp;' .$create_user->format('H:i:s') .'<br><br>';



        $seprated_time = new Verta('now','Asia/Tehran');
        echo 'ساعت : ' . $seprated_time->format('H:i:s') . '&nbsp;&nbsp;&nbsp;&nbsp;' . ' تاریخ حال : ' . '&nbsp;&nbsp;&nbsp;&nbsp;' . $seprated_time->format('Y-m-d')  .'<br><br>';

                                 //        tomorrow date

        $tomorrow = new Verta('tomorrow','Asia/Tehran');
        echo 'تاریح فردا : ' . '&nbsp;&nbsp;&nbsp;&nbsp;' . $tomorrow->tomorrow()->format('Y-m-d') .'<br><br>' ;

        $currentTime = new Verta('now','Asia/Tehran');
                                //        current time and date
        echo 'ساعت به زمان تهران : ' . '&nbsp;&nbsp;&nbsp;&nbsp;' . $currentTime->format('Y-m-d H:i:s')  .'<br><br>';

        //        date instance

        $character_month = new verta($user['created_at'] , 'Asia/Tehran');
         echo 'ماه ایجاد کاربر : ' . '&nbsp;&nbsp;&nbsp;&nbsp;' . $character_month->format('F') .'<br><br>';


        $character_day = new verta($user['created_at'] , 'Asia/Tehran');
        echo 'روز ایجاد کاربر : ' . '&nbsp;&nbsp;&nbsp;&nbsp;' . $character_day->format('l') .'<br><br>';

        $character_hour = new verta($user['created_at'] , 'Asia/Tehran');
        echo 'ساعت ایجاد کاربر : ' . '&nbsp;&nbsp;&nbsp;&nbsp;' . $character_hour->format('H:i',true) .'<br><br>';

        //        date persian number

        $jalaliDate = new Verta($user['created_at'], 'Asia/Tehran');
        $yearInPersian = str_replace(range(0, 9), ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'], $jalaliDate->year);
        $monthInPersian = str_replace(range(0, 9), ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'], $jalaliDate->month);
        $dayInPersian = str_replace(range(0, 9), ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'], $jalaliDate->day);
        $dateInPersian = "{$yearInPersian}/{$monthInPersian}/{$dayInPersian}";
        echo 'تاریخ ایجاد کاربر : ' . '&nbsp;&nbsp;&nbsp;&nbsp;' . $dateInPersian  .'<br><br>';


        $one_year = new verta($user['created_at'],'Asia/Tehran');
        $result =$one_year->addYears(4);
        $year = str_replace(range(0, 9), ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'], $result->year);
        $month = str_replace(range(0, 9), ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'], $result->month);
        $day = str_replace(range(0, 9), ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'], $result->day);
        $date = "{$year}/{$month}/{$day}";
        echo 'چهار سال بعد از ایجاد کاربر : ' . '&nbsp;&nbsp;&nbsp;&nbsp;' . $date  .'<br><br>';



        $add_year = new verta($user['created_at'],'Asia/Tehran');
        $natije =$add_year->addYear();
        $year = str_replace(range(0, 9), ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'], $natije->year);
        $month = str_replace(range(0, 9), ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'], $natije->month);
        $day = str_replace(range(0, 9), ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'], $natije->day);
        $tarikh = "{$year}/{$month}/{$day}";
        echo 'یکسال سال بعد از ایجاد کاربر : ' . '&nbsp;&nbsp;&nbsp;&nbsp;' . $tarikh  .'<br><br>';


        $week = new verta($user['created_at'],'Asia/Tehran');
        $weeks =$week->addWeeks(4);
        $year_week = str_replace(range(0, 9), ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'], $weeks->year);
        $month_week = str_replace(range(0, 9), ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'], $weeks->month);
        $day_week = str_replace(range(0, 9), ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'], $weeks->day);
        $zaman = "{$year_week}/{$month_week}/{$day_week}";
        echo 'چهار هفته بعد از ایجاد کاربر : ' . '&nbsp;&nbsp;&nbsp;&nbsp;' . $zaman  .'<br><br>';


        $user_created = new Verta($user['created_at'], 'Asia/Tehran');

// Create a Verta instance for the desired date with the same timezone
        $user_expire = new Verta('2026-08-14 12:12:12', 'Asia/Tehran');

// Calculate the difference manually
        $jj = $user_expire->timestamp - $user_created->timestamp;

// Convert the difference to years, months, days, hours, minutes, and seconds
        $years = floor($jj / (365 * 24 * 60 * 60));
        $jj -= $years * 365 * 24 * 60 * 60;
        $months = floor($jj / (30 * 24 * 60 * 60));
        $jj -= $months * 30 * 24 * 60 * 60;
        $days = floor($jj / (24 * 60 * 60));
        $jj -= $days * 24 * 60 * 60;
        $hours = floor($jj / (60 * 60));
        $jj -= $hours * 60 * 60;
        $minutes = floor($jj / 60);
        $seconds = $jj % 60;

// Output the difference
        echo 'مهلت مانده اتمام تمدید از ایجاد کاربر : ' . '<br><br>' .
            ($years > 0 ? $years . ' years, ' : '') .
            ($months > 0 ? $months . ' months, ' : '') .
            ($days > 0 ? $days . ' days, ' : '') .
            ($hours > 0 ? $hours . ' hours, ' : '') .
            ($minutes > 0 ? $minutes . ' minutes, ' : '') .
            ($seconds > 0 ? $seconds . ' seconds' : '');
    }
}

//       $v = Verta::parse('1395-10-07 14:12:32');
//       return $v->addYear(); // 1396-10-07 14:12:32
//       return $v->addYears(4); // 1399-10-07 14:12:32
//       return $v->subYear(); // 1394-10-07 14:12:32
//       return $v->subYears(2); // 1393-10-07 14:12:32
//
//       return $v->addMonth(); // 1395-11-07 14:12:32
//       return $v->addMonths(5); // 1396-03-07 14:12:32
//       return $v->subMonth(); // 1395-09-07 14:12:32
//       return $v->subMonths(2); // 1395-08-07 14:12:32
//
//       return $v->addWeek(); // 1395-10-12 14:12:32
//       return $v->addWeeks(3); // 1395-10-26 14:12:32
//       return $v->subWeek(); // 1395-09-30 14:12:32
//       return $v->subWeeks(2); // 1395-09-27 14:12:32
//
//       return $v->addDay(); // 1395-10-08 14:12:32
//       return $v->addDays(3); // 1395-10-11 14:12:32
//       return $v->subDay(); // 1395-10-06 14:12:32
//       return $v->subDays(2); // 1395-09-05 14:12:32
//
//       return $v->addHour(); // 1395-10-07 15:12:32
//       return $v->addHours(5); // 1395-10-07 19:12:32
//       return $v->subHour(); // 1395-10-07 13:12:32
//       return $v->subHours(2); // 1395-10-07 12:12:32
//
//       return $v->addMinute(); // 1395-10-07 14:13:32
//       return $v->addMinutes(3); // 1395-10-07 14:15:32
//       return $v->subMinute(); // 1395-10-07 14:11:32
//       return $v->subMinutes(2); // 1395-10-07 14:10:32
//
//       return $v->addSecond(); // 1395-10-07 14:12:33
//       return $v->addSeconds(3); // 1395-10-07 14:12:35
//       return $v->subSecond(); // 1395-10-07 14:12:31
//       return $v->subSeconds(2); // 1395-10-07 14:12:30
//$v = Verta::parse('1395-10-07 14:12:32');
//return $v->diffNow(); // 2 ماه پیش
//
//$v = Verta::parse('1395/12/12 14:13:50');
//return $v->diffNow(); // 5
