<?php

namespace App\Http\Controllers\Cms\Contact;

use App\Helpers\NotifyHelper;
use App\Http\Controllers\Controller;
use App\Models\ContactData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ContactDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', ContactData::class);
        $data = [
            'contactData' => ContactData::all(),
        ];
        return view('cms.page.contact-data.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', ContactData::class);
        return view('cms.page.contact-data.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', ContactData::class);
        $request->validate([
            'name' => 'required|string|unique:contact_data,name|max:255',
            'value' => 'nullable|string',
            'url' => 'nullable|url|max:255',
            'icon' => 'nullable|string|max:50',
        ]);

        $data = $request->only(['name', 'slug', 'value', 'url', 'icon']);
        ContactData::create($data);

        $notify = NotifyHelper::successfullyCreated();
        return redirect()->route('cms.contact-data.index')->with('notify', $notify);
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactData $contactData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactData $contactData)
    {
        Gate::authorize('update', $contactData);
        if (!$contactData) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.contact-data.index')->with('notify', $notify);
        }

        $data = [
            'contactData' => $contactData,
        ];
        return view('cms.page.contact-data.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactData $contactData)
    {
        Gate::authorize('update', $contactData);
        if (!$contactData) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.contact-data.index')->with('notify', $notify);
        }

        $request->validate([
            'name' => 'required|string|max:255|unique:contact_data,name,' . $contactData->id,
            'value' => 'nullable|string',
            'url' => 'nullable|url|max:255',
            'icon' => 'nullable|string|max:50',
        ]);

        $data = $request->only(['name', 'slug', 'value', 'url', 'icon']);
        $contactData->update($data);

        $notify = NotifyHelper::successfullyUpdated();
        return redirect()->route('cms.contact-data.index')->with('notify', $notify);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactData $contactData)
    {
        Gate::authorize('delete', $contactData);
        if (!$contactData) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.contact-data.index')->with('notify', $notify);
        }

        $contactData->delete();
        $notify = NotifyHelper::successfullyDeleted();
        return redirect()->route('cms.contact-data.index')->with('notify', $notify);
    }
}
