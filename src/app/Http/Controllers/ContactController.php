<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\SendMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {

        return view('contact-us');
    }

    public function store(ContactRequest $request)
    {
        Mail::to('screamapk@gmail.com')->send(new SendMail($request));
        return back()->with('success', 'Thank you for contact us!');

    }
}
