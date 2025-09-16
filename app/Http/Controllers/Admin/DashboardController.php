<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Project;
use App\Models\Service;
use App\Models\ContactMessage;

class DashboardController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $services = Service::all();
        return view('admin.dashboard', compact('projects','services'));
    }

    // TEAM
    public function storeTeam(Request $request)
    {
        $data = $request->validate([
            'name'=>'required',
            'role'=>'required',
            'photo'=>'nullable|image|max:2048'
        ]);

        if($request->hasFile('photo')){
            $data['photo'] = $request->file('photo')->store('team', 'public');
        }

        Team::create($data);
        return back()->with('success','عضو الفريق تم إضافته');
    }

    public function deleteTeam($id)
    {
        $member = Team::findOrFail($id);
        $member->delete();
        return back()->with('success','تم حذف العضو');
    }

    // PROJECTS
    public function storeProject(Request $request)
    {
        $data = $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'nullable|image|max:4096',
            'link'=>'nullable|url'
        ]);

        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('projects','public');
        }

        Project::create($data);
        return back()->with('success','المشروع تم إضافته');
    }

    public function deleteProject($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return back()->with('success','تم حذف المشروع');
    }

    // SERVICES
    public function storeService(Request $request)
    {
        $data = $request->validate([
            'title'=>'required',
            'description'=>'required',
            'icon'=>'nullable|string'
        ]);

        Service::create($data);
        return back()->with('success','الخدمة تم إضافتها');
    }

    public function deleteService($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return back()->with('success','تم حذف الخدمة');
    }

    // CONTACT
    public function deleteContact($id)
    {
        $msg = ContactMessage::findOrFail($id);
        $msg->delete();
        return back()->with('success','تم حذف الرسالة');
    }
}
