<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // تخزين الرسائل من الموقع
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        Contact::create($request->all());

        return redirect('/')->with('success', 'تم إرسال رسالتك بنجاح، شكراً لتواصلك معنا!');
    }

    // عرض الرسائل في الداشبورد
    public function index()
    {
        $contacts = Contact::latest()->paginate(10);

        $unreadCount = Contact::where('is_read', false)->count();
        $unreadContacts = Contact::where('is_read', false)->latest()->take(5)->get();

        return view('admin.contacts.index', compact('contacts', 'unreadCount', 'unreadContacts'));
    }

    // تحديد رسالة كمقروءة
    public function show(Contact $contact)
    {
        if (!$contact->is_read) {
            $contact->update(['is_read' => true]);
        }
        

        return view('admin.contacts.show', compact('contact'));
    }



    // الاشعارات
    public function notifications()
    {
        $unreadCount = Contact::where('is_read', false)->count();
        $unreadContacts = Contact::where('is_read', false)->latest()->take(5)->get();

        return response()->json([
            'count' => $unreadCount,
            'messages' => $unreadContacts
        ]);
    }

    // حذف رسالة
    public function destroy(Contact $Contact)
    {
        $Contact->delete();
        return back()->with('success', 'تم حذف الرسالة بنجاح');
    }
}
