<?php

namespace App\Http\Controllers\Cms\Client;

use App\Helpers\NotifyHelper;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'client' => Client::all()
        ];

        return view('cms.page.client.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cms.page.client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:client',
            'image_path' => 'nullable|string|max:255',
            'is_active' => 'required|boolean'
        ]);

        $data = $request->only(['name', 'image_path', 'is_active']);
        Client::create($data);

        return redirect()->route('cms.client.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        if (!$client) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.client.index')->with('notify', $notify);
        }

        $data = [
            'client' => $client
        ];

        return view('cms.page.client.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        if (!$client) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.client.index')->with('notify', $notify);
        }

        $request->validate([
            'name' => 'required|string|max:255|unique:client,name,' . $client->id,
            'image_path' => 'nullable|string|max:255',
            'is_active' => 'required|boolean'
        ]);

        $data = $request->only(['name', 'image_path', 'is_active']);
        $client->update($data);

        return redirect()->route('cms.client.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        if (!$client) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.client.index')->with('notify', $notify);
        }

        $client->delete();
        return redirect()->route('cms.client.index');
    }
}
