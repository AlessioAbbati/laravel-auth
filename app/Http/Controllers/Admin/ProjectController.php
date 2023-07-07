<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // private $validations = [
        
    // ];

    public function index()
    {
        $projects = Project::paginate(3);

        return view('admin.projects.index', compact('projects'));
    }

    
    public function create()
    {
        return view('admin.projects.create');
    }

    
    public function store(Request $request)
    {
        // $request->validate($this->validations);

        $data = $request->all();

        $newProject = new Project();

        $newProject->title              = $data['title'];
        $newProject->author          = $data['author'];
        $newProject->creation_date             = $data['creation_date'];
        $newProject->last_update          = $data['last_update'];
        $newProject->collaborators             = $data['collaborators'];
        $newProject->description      = $data['description'];
        $newProject->languages      = $data['languages'];
        $newProject->link_github      = $data['link_github'];

        $newProject->save(); // per salvare una nuova riga

        // return redirect()->route('project.show', ['project' => $newProject]);
        return to_route('admin.project.show', ['project' => $newProject]);
    }

   
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    
    public function update(Request $request, Project $project)
    {
        // $request->validate($this->validations);

        $data = $request->all();

        $project->title              = $data['title'];
        $project->author             = $data['author'];
        $project->creation_date      = $data['creation_date'];
        $project->last_update        = $data['last_update'];
        $project->collaborators      = $data['collaborators'];
        $project->description        = $data['description'];
        $project->languages          = $data['languages'];
        $project->link_github        = $data['link_github'];

        $project->update(); // per salvare una nuova riga

        // return redirect()->route('project.show', ['project' => $newProject]);
        return to_route('admin.project.show', ['project' => $project]);


    }

    
    public function destroy(Project $project)
    {
        //
    }
}
