<?php

namespace App\Http\Controllers\Cms\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'product_total' => Product::count(),
            'blog_total' => Blog::count(),
        ];
        return view('cms.page.dashboard.dashboard');
    }
}
