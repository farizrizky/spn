<?php

namespace App\Http\Controllers\Cms\Product;

use App\Helpers\NotifyHelper;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'type' => Type::all(),
        ];

        return view('cms.page.type.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cms.page.type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'slug' => 'required|string|unique:type,slug|max:150',
            'description' => 'nullable|string',
            'image_path' => 'nullable|string',
        ]);

        $data = $request->only(['name', 'slug', 'description', 'image_path']);

        Type::create($data);

        $notify = NotifyHelper::successfullyCreated();
        return redirect()->route('cms.type.index')->with('notify', $notify);
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        if(!$type) {
             $notify = NotifyHelper::notFound();
            return back()->with('notify', $notify);
        }
        
        $data = [
            'type' => $type,
        ];

        return view('cms.page.type.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        if(!$type) {
            $notify = NotifyHelper::notFound();
            return back()->with('notify', $notify);
        }

        $request->validate([
            'name' => 'required|string|max:150',
            'slug' => 'required|string|unique:type,slug,' . $type->id . '|max:150',
            'description' => 'nullable|string',
            'image_path' => 'nullable|string',
        ]);

        $data = $request->only(['name', 'slug', 'description', 'image_path']);
        $type->update($data);

        $notify = NotifyHelper::successfullyUpdated();
        return redirect()->route('cms.type.index')->with('notify', $notify);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        if(!$type) {
            $notify = NotifyHelper::notFound();
            return back()->with('notify', $notify)->withInput();
        }

        $type->delete();
        
        $notify = NotifyHelper::successfullyDeleted();
        return redirect()->route('cms.type.index')->with('notify', $notify);
    }
}
