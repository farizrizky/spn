<?php

namespace App\Http\Controllers\Cms\Blog;

use App\Helpers\NotifyHelper;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Tag::class);
        $data = [
            'tag' => Tag::all(),
        ];
        return view('cms.page.tag.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Tag::class);
        return view('cms.page.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Tag::class);
        $request->validate([
            'name' => 'required|string|max:150',
            'slug' => 'required|string|unique:tag,slug|max:150',
        ]);

        $data = $request->only(['name', 'slug']);
        Tag::create($data);

        $notify = NotifyHelper::successfullyCreated('Tag berhasil dibuat.');
        return redirect()->route('cms.tag.index')->with('notify', $notify);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        Gate::authorize('update', $tag);
        if (!$tag) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.tag.index')->with('notify', $notify);
        }

        $data = [
            'tag' => $tag,
        ];

        return view('cms.page.tag.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        Gate::authorize('update', $tag);
        if (!$tag) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.tag.index')->with('notify', $notify);
        }

        $request->validate([
            'name' => 'required|string|max:150',
            'slug' => 'required|string|max:150|unique:tag,slug,' . $tag->id,
        ]);

        $data = $request->only(['name', 'slug']);
        $tag->update($data);

        $notify = NotifyHelper::successfullyUpdated();
        return redirect()->route('cms.tag.index')->with('notify', $notify);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        Gate::authorize('delete', $tag);
        if (!$tag) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.tag.index')->with('notify', $notify);
        }

        $tag->delete();

        $notify = NotifyHelper::successfullyDeleted();
        return redirect()->route('cms.tag.index')->with('notify', $notify);
    }
}
