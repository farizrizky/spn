<?php

namespace App\Http\Controllers\Web;

use App\Helpers\DataHelper;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function all(){
        $blog = Blog::with('user', 'blogCategory', 'blogTag')
            ->where('status', 'published')
            ->orderBy('date', 'desc')
            ->paginate(9);

        $data = [
            'title' => 'Informasi',
            'partial_title' => $partial_title ?? PartialController::title('Informasi'),
            'blog' => $blog
        ];
        
        return view('web.page.blog.list', $data);
    }

    public function category($slug){
        $blogCategory = BlogCategory::where('slug', $slug);
        if (!$blogCategory->exists()) {
            return redirect()->route('web.not-found');
        }
        $blog = Blog::with('user', 'blogCategory', 'blogTag')
            ->where('status', 'published')
            ->where('blog_category', $blogCategory->first()->id)
            ->orderBy('date', 'desc')
            ->paginate(9);

        $data = [
            'title' => $blogCategory->first()->name,
            'partial_title' => PartialController::title($blogCategory->first()->name),
            'blog' => $blog
        ];
        
        return view('web.page.blog.list', $data);
    }

    public function tag($slug){
        $blogTag = Blog::with('blogTag')->whereHas('blogTag', function($query) use ($slug) {
            $query->where('slug', $slug);
        });

        if (!$blogTag->exists()) {
            return redirect()->route('web.not-found');
        }
        
        $blog = $blogTag->with('user', 'blogCategory')
            ->where('status', 'published')
            ->orderBy('date', 'desc')
            ->paginate(9);

        $data = [
            'title' => '#' . $blogTag->first()->blogTag->first()->name,
            'partial_title' => PartialController::title('#' . $blogTag->first()->blogTag->first()->name),
            'blog' => $blog
        ];
        
        return view('web.page.blog.list', $data);
    }

    public function search(Request $request)
    {
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

        $data = [
            'title' => 'Hasil Pencarian: ' . $search,
            'partial_title' => PartialController::title('Hasil Pencarian: ' . $search),
            'blog' => $blog
        ];
        
        return view('web.page.blog.list', $data);
    }

    public function detail(Request $request,$slug)
    {
        $blog = Blog::with('user', 'blogCategory', 'blogTag')->where(['slug' => $slug, 'status' => 'published']);
        if (!$blog->exists()) {
            return redirect()->route('web.not-found');
        }
        $data = [
            'title' => $blog->first()->title,
            'meta_description' => $blog->first()->meta_description,
            'partial_title' => PartialController::title($blog->first()->title),
            'blog_category' => BlogCategory::select('id', 'name', 'slug')->get(),
            'recent_blog' => Blog::with('user', 'blogCategory', 'blogTag')
                ->where('status', 'published')
                ->orderBy('date', 'desc')
                ->take(4)
                ->get(),
            'blog' => $blog->first()
        ];

        // Update view count
     
        $url = route('web.blog-detail', ['slug' => $slug]);
        if (!DataHelper::urlVisited($request->ip(), $url)) {
            $blog->first()->increment('view_count');
        }

        return view('web.page.blog.detail', $data);
    }
}
