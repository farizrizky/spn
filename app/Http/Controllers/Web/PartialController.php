<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use function Termwind\render;

class PartialController extends Controller
{
    public static function hero($type = 'default')
    {
        $data = [
            'type' => $type,
        ];
       return view('web.partial.hero', $data);
    }

    public static function title($title = 'PT. Sindo Prima Niaga')
    {
        $data = [
            'title' => $title,
        ];

        return view('web.partial.title', $data);
    }

    public static function cta()
    {
        $data = [
            'title' => 'Hubungi Kami',
            'description' => 'Untuk informasi lebih lanjut, silakan hubungi kami melalui form di bawah ini.',
        ];
        return view('web.partial.cta', $data);
    }
}
