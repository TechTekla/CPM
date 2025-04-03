<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
   public function store(Request $request){
   $validated = $request->validate(
      [
         'project_title' =>['required', 'string', 'max:255'],
         'project_image' =>['required', "file", 'mimetypes:image/jpeg,image/png,image/jpg'],//public/storage/road.jpg
         'project_details'=>['required', 'string']
         
      ]
      );



      Project::create($validated);

    return redirect()->back();
   }
}
