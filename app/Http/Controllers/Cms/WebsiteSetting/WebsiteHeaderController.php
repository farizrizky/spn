<?php

namespace App\Http\Controllers\Cms\WebsiteSetting;

use App\Helpers\NotifyHelper;
use App\Http\Controllers\Controller;
use App\Models\WebsiteHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class WebsiteHeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', WebsiteHeader::class);
        $data = [
            'website_header' => WebsiteHeader::get(),
        ];
        return view('cms.page.website-header.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', WebsiteHeader::class);
        return view('cms.page.website-header.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', WebsiteHeader::class);
        $request->validate([
            'name' => 'required|string|max:255',
            'text_color' => 'nullable|string|max:7',
            'background_path' => 'nullable|url',
            'overlay_color' => 'nullable|string|max:7',
            'overlay_opacity' => 'nullable|numeric|min:0|max:1',
            'is_active' => 'boolean',
        ]);
        $data = $request->only([
            'name',
            'text_color',
            'background_path',
            'overlay_color',
            'overlay_opacity',
            'is_active',
        ]);

        if($request->is_active == 1){
            WebsiteHeader::where('is_active', true)->update(['is_active' => false]);
        }

        WebsiteHeader::create($data);

        $notify = NotifyHelper::successfullyCreated();
        return redirect()->route('cms.website-header.index')->with('notify', $notify);
    }

    /**
     * Display the specified resource.
     */
    public function show(WebsiteHeader $websiteHeader)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WebsiteHeader $websiteHeader)
    {
        Gate::authorize('update', $websiteHeader);
        if (!$websiteHeader) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.website-header.index')->with('notify', $notify);
        }

        $data = [
            'website_header' => $websiteHeader
        ];
        return view('cms.page.website-header.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WebsiteHeader $websiteHeader)
    {
        Gate::authorize('update', $websiteHeader);
        if (!$websiteHeader) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.website-header.index')->with('notify', $notify);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'text_color' => 'nullable|string|max:7',
            'background_path' => 'nullable|url',
            'overlay_color' => 'nullable|string|max:7',
            'overlay_opacity' => 'nullable|numeric|min:0|max:1',
            'is_active' => 'boolean',
        ]);

        if($request->is_active == 1){
            WebsiteHeader::where('is_active', true)
                ->whereNotIn('id', [$websiteHeader->id])
                ->update(['is_active' => false]);
        }

        $websiteHeader->update($request->only([
            'name',
            'text_color',
            'background_path',
            'overlay_color',
            'overlay_opacity',
            'is_active',
        ]));

        $notify = NotifyHelper::successfullyUpdated();
        return redirect()->route('cms.website-header.index')->with('notify', $notify);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WebsiteHeader $websiteHeader)
    {
        Gate::authorize('delete', $websiteHeader);
        if (!$websiteHeader) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.website-header.index')->with('notify', $notify);
        }

        $websiteHeader->delete();

        $notify = NotifyHelper::successfullyDeleted();
        return redirect()->route('cms.website-header.index')->with('notify', $notify);
    }
}
