<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'link' => 'nullable|url|max:255',
        ]);

        $path = $request->file('photo')->store('projects', 'public');

        Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'photo' => $path,
            'link' => $request->link,
        ]);

        return redirect()->route('admin.projects.index')->with('success', 'تمت إضافة المشروع بنجاح');
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'link' => 'nullable|url|max:255',
        ]);
   
        $project = Project::findOrFail($id);

        $project->title = $request->title;
        $project->description = $request->description;
        $project->link = $request->link;

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('projects', 'public');
            $project->photo = $path;
        }

        $project->save();

        return redirect()->route('admin.projects.index')->with('success', 'تم تحديث المشروع بنجاح');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'تم حذف المشروع بنجاح');
    }
}
