<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // ممكن تستخدم Mail أو تخزنه في DB
        // Mail::to('admin@site.com')->send(new ContactMail($request->all()));

        return back()->with('success', 'تم ارسال رسالتك بنجاح 👌');
    }

}
