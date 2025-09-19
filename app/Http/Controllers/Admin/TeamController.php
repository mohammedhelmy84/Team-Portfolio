<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * عرض جميع أعضاء الفريق
     */
    public function index()
    {
        $team = Team::latest()->get();
        return view('admin.team.index', compact('team'));
    }

    /**
     * حفظ عضو جديد
     */
    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // رفع الصورة
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('team', 'public');
        }

        Team::create($data);

        return redirect()->route('admin.team.index')->with('success', '✅ تم إضافة العضو بنجاح');

    }

    /**
     * تعديل بيانات عضو
     */

    public function edit($id)
    {
        $member = Team::findOrFail($id);
        return view('admin.team.edit', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $member = Team::findOrFail($id);

        $member->name = $request->name;
        $member->role = $request->role;

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('team', 'public');
            $member->photo = $path;
        }

        $member->save();

        return redirect()->route('admin.team.index')->with('success', 'تم تحديث بيانات العضو بنجاح');
    }

    /**
     * حذف عضو
     */
    public function destroy($id)
    {
        $member = Team::findOrFail($id);

        // امسح الصورة من التخزين
        if ($member->photo && Storage::disk('public')->exists($member->photo)) {
            Storage::disk('public')->delete($member->photo);
        }

        $member->delete();

        return back()->with('success', '🗑️ تم حذف العضو بنجاح');
    }
}
