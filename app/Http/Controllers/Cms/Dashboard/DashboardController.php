<?php

namespace App\Http\Controllers\Cms\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Product;
use App\Models\Visitor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $visitorLast30DaysDate = [];
        $visitorLast30DaysCount = [];

        for ($i = 0; $i < 30; $i++) {
            $date = now()->subDays($i)->format('Y-m-d');
            $visitorLast30DaysDate[] = $date;
            $visitorLast30DaysCount[] = Visitor::whereDate('created_at', $date)->distinct('ip_address')->count();
        }

        //top 3 product
        $topProduct = Product::with('productType', 'productImage')->orderBy('view_count', 'desc')->take(3)->get();
        $topBlog = Blog::with('blogCategory')->orderBy('view_count', 'desc')->take(3)->get();

        $data = [
            'product_total' => Product::count(),
            'blog_total' => Blog::count(),
            'visitor_today' => Visitor::whereDate('created_at', today())->distinct('ip_address')->count(),
            'visitor_last_30_days_date' => array_reverse($visitorLast30DaysDate),
            'visitor_last_30_days_count' => array_reverse($visitorLast30DaysCount),
            'top_product' => $topProduct,
            'top_blog' => $topBlog,
        ];
        return view('cms.page.dashboard.dashboard', $data);
    }
}
