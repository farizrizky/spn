<?php

namespace App\Http\Controllers\Cms\Product;

use App\Helpers\NotifyHelper;
use App\Http\Controllers\Controller;
use App\Models\SpecificationVariable;
use Illuminate\Http\Request;

class SpecificationVariableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'specification_variables' => SpecificationVariable::all(),
        ];
        return view('cms.page.specification-variable.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cms.page.specification-variable.create');
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
        SpecificationVariable::create($data);
        
        $notify = NotifyHelper::successfullyCreated();
        return redirect()->route('cms.specification-variable.index')->with('notify', $notify);
    }

    /**
     * Display the specified resource.
     */
    public function show(SpecificationVariable $specificationVariable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SpecificationVariable $specificationVariable)
    {
        if(!$specificationVariable) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.specification-variable.index')->with('notify', $notify);
        }

        $data = [
            'specification_variable' => $specificationVariable,
        ];
        return view('cms.page.specification-variable.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SpecificationVariable $specificationVariable)
    {
        if (!$specificationVariable) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.specification-variable.index')->with('notify', $notify);
        }

        $request->validate([
            'name' => 'required|string|max:150',
            'description' => 'nullable|string',
        ]);

        $data = $request->only(['name', 'description']);
        $specificationVariable->update($data);

        $notify = NotifyHelper::successfullyUpdated();
        return redirect()->route('cms.specification-variable.index')->with('notify', $notify);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SpecificationVariable $specificationVariable)
    {
        if (!$specificationVariable) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.specification-variable.index')->with('notify', $notify);
        }

        $specificationVariable->delete();

        $notify = NotifyHelper::successfullyDeleted();
        return redirect()->route('cms.specification-variable.index')->with('notify', $notify);
    }
}
