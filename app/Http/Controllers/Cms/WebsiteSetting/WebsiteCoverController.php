<?php

namespace App\Http\Controllers\Cms\WebsiteSetting;

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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WebsiteCover $websiteCover)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WebsiteCover $websiteCover)
    {
        //
    }
}
