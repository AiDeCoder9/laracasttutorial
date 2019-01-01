<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use App\Mail\ProjectCreated;
class ProjectsController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth'); //authentication in all functions
        //$this->middleware('auth')->only(['store','update','delete']); to specify to specific methods
        //$this->middleware('auth')->except(['store']);
    }

    public function index(){

        $projects = auth()->user()->projects;
        //$projects = Project::where('owner_id',auth()->id())->get(); to get detail of specific user

        //return view('projects')->with(['projects'=>$projects]);  OR
        return view('projects',compact('projects'));

    }
    public function create(){
        return view('projects-create');
    }

    public function store()
    {

//        $attributes = request()->validate([
//            'title'=>'required|min:5',
//            'description'=>'required|min:10'
//        ]);

        //or

        $attributes = $this->validateProject();

        $attributes['owner_id']=auth()->id();
        $project= Project::create($attributes);

//        \Mail::to('sajanproject@gmail.com')->send(
//            new ProjectCreated($project)
//        );

        \Mail::to($project->owner->email)->send(
            new ProjectCreated($project)
        );


        //ProjectCreated is a mail templated created by cmd :php artisan make:mail

        return redirect('/projects');
    }

    public function edit(Project $project){
        $this->authorize('update',$project);
        return view('projects-edit',compact('project'));
    }


    public function destroy( $id){
        //$this->authorize('update',$project);
        Project::findOrFail($id)->delete();
        return redirect('/projects');
    }

    public function update(Project $project){



        $this->authorize('update',$project);
        //$project->update(request(['title','description']));
        $project->update($this->validateProject());
          return redirect('/projects');
    }

    public function  validateProject(){
        return request()->validate([
            'title'=>'required|min:5',
            'description'=>'required|min:10'
        ]);
    }


    public function show(Project $project){
        //abort_unless(auth()->user()->owns($project),403);
        //abort_if($project->owner_id !== auth()->id(),403);//if project doesnt belong to user show 403 page
        //or you can create policy to define who has authorization or not it will give access to authorize method
        //which should be included in authserviceprovider.php

        //$this->authorize('update',$project);
//
//        if(\Gate::denies('update',$project)){
//            abort(403);
//        }

//        if(!\Gate::allows('update',$project)){
//            abort(403);
//        }

        //abort_unless(\Gate::allows('update',$project),403);
        abort_if(\Gate::denies('update',$project),403);

        return view('projects-show',compact('project'));


    }




}
