<?php

namespace App\Http\Controllers\Cms\WebsiteSetting;

use App\Helpers\NotifyHelper;
use App\Http\Controllers\Controller;
use App\Models\WebsiteCover;
use Illuminate\Http\Request;

class WebsiteCoverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'website_cover' => WebsiteCover::orderBy('order', 'asc')->get(),
        ];
        return view('cms.page.website-cover.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cms.page.website-cover.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'title_color' => 'nullable|string|max:7',
            'title_position' => 'required|in:left,right',
            'subtitle' => 'nullable|string|max:255',
            'subtitle_color' => 'nullable|string|max:7',
            'button_type' => 'nullable|in:border,filled,none',
            'button_text' => 'nullable|string|max:255',
            'button_url' => 'nullable|url|max:255',
            'image' => 'nullable|image|max:2048',
            'background_path' => 'nullable|string|max:255',
            'overlay_color' => 'nullable|string|max:7',
            'overlay_opacity' => 'nullable|numeric|min:0|max:1',
            'order' => 'nullable|integer|min:0',
        ]);

        $data = $request->only([
            'title',
            'title_color',
            'title_position',
            'subtitle',
            'subtitle_color',
            'button_type',
            'button_text',
            'button_url',
            'image',
            'background_path',
            'overlay_color',
            'overlay_opacity',
            'is_active'
        ]);
        $websiteCoverCount = WebsiteCover::count();
        $data['order'] = $websiteCoverCount + 1; // Set order to the next available number

        WebsiteCover::create($data);

        $notify = NotifyHelper::successfullyCreated();
        return redirect()->route('cms.website-cover.index')->with('notify', $notify);
    }

    /**
     * Display the specified resource.
     */
    public function show(WebsiteCover $websiteCover)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WebsiteCover $websiteCover)
    {
        if (!$websiteCover) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.website-cover.index')->with('notify', $notify);
        }

        $data = [
            'website_cover' => $websiteCover,
        ];
        return view('cms.page.website-cover.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WebsiteCover $websiteCover)
    {
        if (!$websiteCover) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.website-cover.index')->with('notify', $notify);
        }
        
        $request->validate([
            'title' => 'nullable|string|max:255',
            'title_color' => 'nullable|string|max:7',
            'title_position' => 'required|in:left,right',
            'subtitle' => 'nullable|string|max:255',
            'subtitle_color' => 'nullable|string|max:7',
            'button_type' => 'nullable|in:border,filled,none',
            'button_text' => 'nullable|string|max:255',
            'button_url' => 'nullable|url|max:255',
            'image_path' => 'nullable|string|max:255',
            'background_path' => 'nullable|string|max:255',
            'overlay_color' => 'nullable|string|max:7',
            'overlay_opacity' => 'nullable|numeric|min:0|max:1',
            'is_active' => 'boolean',
        ]);

        $data = $request->only([
            'title',
            'title_color',
            'title_position',
            'subtitle',
            'subtitle_color',
            'button_type',
            'button_text',
            'button_url',
            'image_path',
            'background_path',
            'overlay_color',
            'overlay_opacity',
            'is_active'
        ]);

        // Update the website cover
        $websiteCover->update($data);

        $notify = NotifyHelper::successfullyUpdated();
        return redirect()->route('cms.website-cover.index')->with('notify', $notify);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WebsiteCover $websiteCover)
    {
        if (!$websiteCover) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.website-cover.index')->with('notify', $notify);
        }

        $websiteCover->delete();

        $notify = NotifyHelper::successfullyDeleted();
        return redirect()->route('cms.website-cover.index')->with('notify', $notify);
    }
}
