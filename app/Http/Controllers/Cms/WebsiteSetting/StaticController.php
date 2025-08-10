<?php

namespace App\Http\Controllers\Cms\WebsiteSetting;

use App\Helpers\NotifyHelper;
use App\Http\Controllers\Controller;
use App\Models\StaticPage;
use Illuminate\Http\Request;

class StaticController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'static' => StaticPage::all()
        ];
        return view('cms.page.static.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(StaticPage $staticPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StaticPage $staticPage)
    {
        if(!$staticPage) {
           $notify = NotifyHelper::notFound();
           return back()->with('notify', $notify);
        }

        $data = [
            'static'=> $staticPage
        ];

        return view('cms.page.static.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StaticPage $staticPage)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'meta_description' => 'nullable|string|max:255'
        ]);

        $data = $request->only(['title', 'meta_description']);

        $staticPage->update($data);

        $notify = NotifyHelper::successfullyUpdated();
        return redirect()->route('cms.static.index')->with('notify', $notify);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StaticPage $staticPage)
    {
        //
    }
}
