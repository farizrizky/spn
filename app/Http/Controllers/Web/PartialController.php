<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\WebsiteCover;
use App\Models\WebsiteHeader;

class PartialController extends Controller
{
    public static function hero()
    {
        $data = [
            'website_cover' => WebsiteCover::where('is_active', true)
                ->orderBy('order', 'asc')
                ->get()
        ];
       return view('web.partial.hero-slider', $data);
    }

    public static function title($title = 'PT. Sindo Prima Niaga')
    {
        $data = [
            'website_header' => WebsiteHeader::where('is_active', true)->first(),
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
