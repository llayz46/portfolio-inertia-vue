<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return inertia('Contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => ['required', 'string', 'min:15', 'max:500'],
        ], [
            'name.required' => 'Le nom est requis.',
            'email.required' => 'L\'email est requis.',
            'email.email' => 'L\'email doit être une adresse email valide.',
            'message.required' => 'Le message est requis.',
            'message.min' => 'Le message doit contenir au moins :min caractères.',
            'message.max' => 'Le message doit contenir au plus :max caractères.',
        ]);

        $toAddress = config('mail.to.address');

        Mail::to($toAddress)->send(new ContactMail($validated));
    }
}
