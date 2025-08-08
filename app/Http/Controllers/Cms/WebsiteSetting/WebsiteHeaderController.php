<?php

namespace App\Http\Controllers\Cms\WebsiteSetting;

use App\Helpers\NotifyHelper;
use App\Http\Controllers\Controller;
use App\Models\WebsiteHeader;
use Illuminate\Http\Request;

class WebsiteHeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        return view('cms.page.website-header.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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

        if($request->is_active === true){
            $currentActive = WebsiteHeader::where('is_active', true)->first();
            if($currentActive){
                $currentActive->is_active = false;
                $currentActive->save();
            }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WebsiteHeader $websiteHeader)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WebsiteHeader $websiteHeader)
    {
        //
    }
}
