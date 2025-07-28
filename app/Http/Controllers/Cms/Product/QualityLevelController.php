<?php

namespace App\Http\Controllers\Cms\Product;

use App\Http\Controllers\Controller;
use App\Models\QualityLevel;
use Illuminate\Http\Request;
use App\Helpers\NotifyHelper;

class QualityLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'quality_levels' => QualityLevel::with('productQualityLevel')->get(),
        ];
        return view('cms.page.quality-level.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cms.page.quality-level.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'description' => 'nullable|string',
        ]);

        $data = $request->only(['name', 'description']);
        QualityLevel::create($data);

        $notify = NotifyHelper::successfullyCreated();
        return redirect()->route('cms.quality-level.index')->with('notify', $notify);
    }

    /**
     * Display the specified resource.
     */
    public function show(QualityLevel $qualityLevel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QualityLevel $qualityLevel)
    {
        if (!$qualityLevel) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.quality-level.index')->with('notify', $notify);
        }

        $data = [
            'quality_level' => $qualityLevel,
        ];
        return view('cms.page.quality-level.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, QualityLevel $qualityLevel)
    {
        if (!$qualityLevel) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.quality-level.index')->with('notify', $notify);
        }

        $request->validate([
            'name' => 'required|string|max:150',
            'description' => 'nullable|string',
        ]);

        $data = $request->only(['name', 'description']);
        $qualityLevel->update($data);

        $notify = NotifyHelper::successfullyUpdated();
        return redirect()->route('cms.quality-level.index')->with('notify', $notify);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QualityLevel $qualityLevel)
    {
        if (!$qualityLevel) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.quality-level.index')->with('notify', $notify);
        }

        $qualityLevel->delete();

        $notify = NotifyHelper::successfullyDeleted();
        return redirect()->route('cms.quality-level.index')->with('notify', $notify);
    }
}
