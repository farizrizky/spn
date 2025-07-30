<?php
namespace App\Helpers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
Class DateHelper{

    public static function fullDateFormat($date, $locale = 'id'){
        App::setLocale($locale);
        $carbon = Carbon::createFromFormat('Y-m-d H:i:s', $date);
        return $carbon->translatedFormat('l, d F Y') . ', ' . $carbon->format('H:i');
    }

    public static function fullDateFormatWithoutTime($date, $locale = 'id'){
        App::setLocale($locale);
        $carbon = Carbon::createFromFormat('Y-m-d', $date);
        return $carbon->translatedFormat('l, d F Y');
    }

}