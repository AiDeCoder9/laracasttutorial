<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectsController extends Controller
{
    //

    public function index(){
        $projects = Project::all();
        //return view('projects')->with(['projects'=>$projects]);  OR
        return view('projects',compact('projects'));

    }
    public function create(){
        return view('projects-create');
    }

    public function store()
    {
        request()->validate([
            'title'=>'required|min:5',
            'description'=>'required|min:10'
        ]);
        Project::create([
           'title'=>request('title'),//first one is the database field second one is name of form field
            'description'=>request('description')
        ]);

        return redirect('/projects');
    }

    public function edit(Project $project){

        return view('projects-edit',compact('project'));
    }


    public function destroy($id){
        Project::findOrFail($id)->delete();
        return redirect('/projects');
    }

    public function update(Project $project){
        $project->update(request(['title','description']));
          return redirect('/projects');
    }

    public function show(Project $project){

        return view('projects-show',compact('project'));
    }




}
