<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;

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

    public static function recentBlog()
    {
        $data = [
            'blog' => Blog::with('blogCategory')->where('status', 'published')->latest()->take(3)->get(),
        ];

        return view('web.partial.recent-blog', $data);
    }


    
}
