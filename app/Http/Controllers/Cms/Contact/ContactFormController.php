<?php

namespace App\Http\Controllers\Cms\Contact;

use App\Helpers\NotifyHelper;
use App\Http\Controllers\Controller;
use App\Models\ContactForm;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    public function index()
    {
        $data = [
            'contact_form' => ContactForm::orderBy('created_at', 'desc')->get(),
        ];

        return view('cms.page.contact-form.index', $data);
    }

    public function show(ContactForm $contactForm)
    {
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
