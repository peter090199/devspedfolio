<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // ✅ Validate request (UPDATED with phone + facebook)
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => ['required', 'regex:/^(\+63|0)9\d{9}$/'],
            'facebook' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // ✅ Send email
        Mail::raw(
            "DevSped Folio Message\n\n" .
                "Name: {$validated['name']}\n" .
                "Email: {$validated['email']}\n" .
                "Phone (PH): {$validated['phone']}\n" .
                "Facebook: {$validated['facebook']}\n\n" .
                "Message:\n{$validated['message']}",
            function ($mail) use ($validated) {
                $mail->to('pedroyorpo17@gmail.com')
                    ->subject("New Message from {$validated['name']}")
                    ->replyTo($validated['email'], $validated['name']);
            }
        );

        return back()->with('success', 'Message sent successfully!');
    }
}
