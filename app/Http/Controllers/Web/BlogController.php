<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function list(Request $request)
    {
        if($request->has('category')) {
            
            $blog = Blog::with('user', 'blogCategory', 'blogTag')
                ->where('status', 'published')
                ->whereHas('blogCategory', function($query) use ($request) {
                    $query->where('slug', $request->get('category'));
                })
                ->orderBy('date', 'desc')
                ->paginate(9);

            if($blog->isEmpty()) {
                return redirect()->route('web.not-found');
            }
            $partial_title = PartialController::title($blog->first()->blogCategory->name);

        }else if($request->has('tag')) {
            $blog = Blog::with('user', 'blogCategory', 'blogTag')
                ->where('status', 'published')
                ->whereHas('blogTag', function($query) use ($request) {
                    $query->where('slug', $request->get('tag'));
                })
                ->orderBy('date', 'desc')
                ->paginate(9);

            if($blog->isEmpty()) {
                return redirect()->route('web.not-found');
            }
            $partial_title = PartialController::title('#' . $blog->first()->blogTag->first()->name);

        }else if($request->has('search')) {
            $search = $request->get('search');
            $blog = Blog::with('user', 'blogCategory', 'blogTag')
                ->where('status', 'published')
                ->where(function($query) use ($search) {
                    $query->where('title', 'like', "%{$search}%")
                          ->orWhere('content', 'like', "%{$search}%");
                })
                ->orderBy('date', 'desc')
                ->paginate(9);
            $blog->appends(['search' => $search]);

            if($blog->isEmpty()) {
                return redirect()->route('web.not-found');
            }
            $partial_title = PartialController::title('Hasil Pencarian: ' . $search);

        }else {
            $blog = Blog::with('user', 'blogCategory', 'blogTag')
                ->where('status', 'published')
                ->orderBy('date', 'desc')
                ->paginate(9);
        }

        $data = [
            'title' => 'Blog List',
            'partial_title' => $partial_title ?? PartialController::title('Informasi'),
            'blog' => $blog
        ];
        
        return view('web.page.blog.list', $data);
    }

    public function detail($slug)
    {
        $blog = Blog::with('user', 'blogCategory', 'blogTag')->where(['slug' => $slug, 'status' => 'published']);
        if (!$blog->exists()) {
            return redirect()->route('web.not-found');
        }
        $data = [
            'title' => 'Blog Detail',
            'partial_title' => PartialController::title('Blog Detail'),
            'blog_category' => BlogCategory::select('id', 'name', 'slug')->get(),
            'recent_blog' => Blog::with('user', 'blogCategory', 'blogTag')
                ->where('status', 'published')
                ->orderBy('date', 'desc')
                ->take(4)
                ->get(),
            'blog' => $blog->first()
        ];
        
        return view('web.page.blog.detail', $data);
    }
}
