<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
   public function index()
   {
      $projects = Project::latest()->get(); // Fetch latest projects first
      return view('projects.index', compact('projects'));
   }

   public function create()
   {
      return view('projects.create');
   }
   public function show(Project $project)
   {
      return view('projects.show', compact('project'));
   }


   public function store(Request $request)
   {
      $request->validate([
         'project_title' => 'required|string|max:255',
         'project_details' => 'required|string',
         'project_image' => 'nullable|image',
         'progress' => 'required|integer|min:0|max:100',
     ]);

      $imagePath = null;
      if ($request->hasFile('project_image')) {
         $imagePath = $request->file('project_image')->store('projects', 'public');
      }

      Project::create([
         'project_title' => $request->project_title,
         'project_details' => $request->project_details,
         'project_image' => $imagePath,
         'progress' => $request->progress
      ]);

      return redirect()->route('projects.index')->with('success', 'Project created successfully.');
   }

   public function addComment(Request $request, $id)
   {
      $request->validate([
         'comment' => 'required|string|max:1000',
      ]);

      $project = Project::findOrFail($id);

      $comments = $project->comments ?? [];

      // Append the new comment
      $comments[] = [
         'text' => $request->input('comment'),
         'created_at' => now()->toDateTimeString(),
      ];

      // Update and save
      $project->comments = $comments;
      $project->save();

      return redirect()->back()->with('success', 'Comment added successfully!');
   }

   public function edit(Project $project)
   {
      return view('projects.edit', compact('project'));
   }

   public function update(Request $request, Project $project)
   {
      $request->validate([
         'project_title' => 'required|string|max:255',
         'project_details' => 'required',
         'project_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
         'progress' => 'required|integer|min:0|max:100',
      ]);

      if ($request->hasFile('project_image')) {
         $imagePath = $request->file('project_image')->store('projects', 'public');
         $project->update(['project_image' => $imagePath]);
      }

      $project->update([
         'project_title' => $request->project_title,
         'project_details' => $request->project_details,
         'progress' => $request->progress
      ]);

      return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
   }

   public function destroy(Project $project)
   {
      $project->delete();
      return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
   }
}
