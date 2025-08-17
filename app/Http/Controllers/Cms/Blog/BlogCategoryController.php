<?php

namespace App\Http\Controllers\Cms\Blog;

use App\Helpers\NotifyHelper;
use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', BlogCategory::class);
        $data = [
            'blog_category' => BlogCategory::all(),
        ];
        return view('cms.page.blog-category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', BlogCategory::class);
        return view('cms.page.blog-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', BlogCategory::class);
        $request->validate([
            'name' => 'required|string|max:150',
            'slug' => 'required|string|unique:blog_category,slug|max:150',
        ]);

        $data = $request->only(['name', 'slug']);
        BlogCategory::create($data);

        $notify = NotifyHelper::successfullyCreated('Kategori blog berhasil dibuat.');
        return redirect()->route('cms.blog-category.index')->with('notify', $notify);
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogCategory $blogCategory)
    {
        Gate::authorize('update', $blogCategory);
        if(!$blogCategory) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.blog-category.index')->with('notify', $notify);
        }

        $data = [
            'blog_category' => $blogCategory,
        ];

        return view('cms.page.blog-category.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogCategory $blogCategory)
    {
        Gate::authorize('update', $blogCategory);
        if (!$blogCategory) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.blog-category.index')->with('notify', $notify);
        }

        $request->validate([
            'name' => 'required|string|max:150',
            'slug' => 'required|string|max:150|unique:blog_category,slug,' . $blogCategory->id,
        ]);

        $data = $request->only(['name', 'slug']);
        $blogCategory->update($data);

        $notify = NotifyHelper::successfullyUpdated();
        return redirect()->route('cms.blog-category.index')->with('notify', $notify);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogCategory $blogCategory)
    {
        Gate::authorize('delete', $blogCategory);
        if (!$blogCategory) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.blog-category.index')->with('notify', $notify);
        }

        $blogCategory->delete();

        $notify = NotifyHelper::successfullyDeleted();
        return redirect()->route('cms.blog-category.index')->with('notify', $notify);
    }
}
