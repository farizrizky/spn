<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ContactForm;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Js;

class ContactFormController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|email|max:100',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $data = $request->only(['name', 'email', 'phone', 'subject', 'message']);
        
        ContactForm::create($data);

       return response()->json([
            'status' => 'success',
            'message' => 'Pesan Anda telah terkirim. Terima kasih!'
        ]);
    }
}