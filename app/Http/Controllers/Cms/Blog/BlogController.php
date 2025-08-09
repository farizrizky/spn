<?php

namespace App\Http\Controllers\Cms\Blog;

use App\Helpers\NotifyHelper;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'blog' => Blog::with(['blogCategory', 'blogTag'])->get(),
        ];
        return view('cms.page.blog.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'blog_category' => BlogCategory::select('id', 'name')->get(),
            'tag' => Tag::select('id', 'name')->get(),
        ];
        return view('cms.page.blog.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:150',
            'slug' => 'required|string|max:150|unique:blog,slug',
            'blog_category' => 'required|exists:blog_category,id',
            'content' => 'required|string',
            'image_path' => 'nullable|string',
            'date' => 'required|date',
            'meta_description' => 'nullable|string|max:160',
        ]);

        $data = $request->only(['title', 'slug', 'blog_category', 'image_path', 'content', 'status', 'date', 'meta_description']);
        $data['created_by'] = Auth::id();
        $data['updated_by'] = Auth::id();
        $createBlog = Blog::create($data);

        if ($request->tag) {
            foreach ($request->tag as $t) {
                if(!Tag::find($t)) {
                    $tag = Tag::create(['name' => $t, 'slug' => Str::slug($t)]);
                    $t = $tag->id;
                }
                $dataTag = [
                    'blog' => $createBlog->id,
                    'tag' => $t,
                ];
                BlogTag::create($dataTag);
            }
        }
    
        $notify = NotifyHelper::successfullyCreated();
        return redirect()->route('cms.blog.index')->with('notify', $notify);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        if (!$blog) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.blog.index')->with('notify', $notify);
        }

        $data = [
            'blog' => $blog->load(['blogCategory', 'blogTag']),
            'blog_category' => BlogCategory::select('id', 'name')->get(),
            'tag' => Tag::select('id', 'name')->get(),
        ];
        return view('cms.page.blog.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        if (!$blog) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.blog.index')->with('notify', $notify);
        }

        $request->validate([
            'title' => 'required|string|max:150',
            'slug' => 'required|string|max:150|unique:blog,slug,' . $blog->id,
            'blog_category' => 'required|exists:blog_category,id',
            'content' => 'required|string',
            'image_path' => 'nullable|string',
            'date' => 'required|date',
            'meta_description' => 'nullable|string|max:160',
        ]);

        $data = $request->only(['title', 'slug', 'blog_category', 'image_path', 'content', 'status', 'date', 'meta_description']);
        $data['updated_by'] = Auth::id();
        $blog->update($data);

        // Update tags
        BlogTag::where('blog', $blog->id)->delete();
        if ($request->tag) {
            foreach ($request->tag as $t) {
                if(!Tag::find($t)) {
                    $tag = Tag::create(['name' => $t, 'slug' => Str::slug($t)]);
                    $t = $tag->id;
                }
                $dataTag = [
                    'blog' => $blog->id,
                    'tag' => $t,
                ];
                BlogTag::create($dataTag);
            }
        }

        $notify = NotifyHelper::successfullyUpdated();
        return redirect()->route('cms.blog.index')->with('notify', $notify);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if (!$blog) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.blog.index')->with('notify', $notify);
        }

        $blog->delete();

        $notify = NotifyHelper::successfullyDeleted();
        return redirect()->route('cms.blog.index')->with('notify', $notify);
    }
}
