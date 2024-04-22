<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;


class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:32',
            'email' => 'required|email|max:32',
            'message' => 'required|string',
        ]);

        // Create a new Contact model instance and save the form data
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();

        // Redirect the user back to the contact form with a success message
        return redirect()->route('contact.create')->with('success', 'Your message has been sent successfully!');
    }
}
