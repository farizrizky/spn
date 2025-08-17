<?php

namespace App\Http\Controllers\Cms\Contact;

use App\Helpers\NotifyHelper;
use App\Http\Controllers\Controller;
use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ContactFormController extends Controller
{
    public function index()
    {
        Gate::authorize('viewAny', ContactForm::class);
        $data = [
            'contact_form' => ContactForm::orderBy('created_at', 'desc')->get(),
        ];

        return view('cms.page.contact-form.index', $data);
    }

    public function show(ContactForm $contactForm)
    {
        Gate::authorize('view', $contactForm);
        if(!$contactForm) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.contact-form.index')->with('notify', $notify);
        }

        $data = [
            'contact_form' => $contactForm,
        ];
        return view('cms.page.contact-form.detail', $data);
    }

    public function destroy(ContactForm $contactForm)
    {
        Gate::authorize('delete', $contactForm);
        if(!$contactForm) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.contact-form.index')->with('notify', $notify);
        }

        $contactForm->delete();
        $notify = NotifyHelper::successfullyDeleted();
        return redirect()->route('cms.contact-form.index')->with('notify', $notify);
    }

    public function changeStatus(ContactForm $contactForm)
    {
        Gate::authorize('update', $contactForm);
        if(!$contactForm) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.contact-form.index')->with('notify', $notify);
        }

        if($contactForm->is_read) {
            $contactForm->is_read = false;
        } else {
            $contactForm->is_read = true;
        }
        $contactForm->save();

        $notify = NotifyHelper::successfullyUpdated();
        return redirect()->back()->with('notify', $notify);
    }
}
