<?php

namespace App\Http\Controllers\Cms\Client;

use App\Helpers\NotifyHelper;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'testimonial' => Testimonial::all()
        ];
        return view('cms.page.testimonial.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cms.page.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'job' => 'required|string|max:255',
            'testimonial' => 'required|string',
            'image_path' => 'nullable|string',
            'logo_path' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $data = $request->only('name', 'job', 'testimonial', 'image_path', 'logo_path', 'is_active');

        Testimonial::create($data);

        $notify = NotifyHelper::successfullyCreated();
        return redirect()->route('cms.testimonial.index')->with('notify', $notify);
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        if(!$testimonial) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.testimonial.index')->with('notify', $notify);
        }

        $data = [
            'testimonial' => $testimonial
        ];

        return view('cms.page.testimonial.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        if(!$testimonial) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.testimonial.index')->with('notify', $notify);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'job' => 'required|string|max:255',
            'testimonial' => 'required|string',
            'image_path' => 'nullable|string',
            'logo_path' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $data = $request->only('name', 'job', 'testimonial', 'image_path', 'logo_path', 'is_active');

        $testimonial->update($data);

        $notify = NotifyHelper::successfullyUpdated();
        return redirect()->route('cms.testimonial.index')->with('notify', $notify);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        if(!$testimonial) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.testimonial.index')->with('notify', $notify);
        }

        $testimonial->delete();

        $notify = NotifyHelper::successfullyDeleted();
        return redirect()->route('cms.testimonial.index')->with('notify', $notify);
    }
}
