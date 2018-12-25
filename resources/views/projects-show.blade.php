@extends('layouts.template')
@section('title')
    Infomation Page
    @endsection


@section('content')
    <div class="container">

        <h1>Detail Page</h1>
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card p-2">
                    <div class="card-title">
                        <h5 class="text-capitalize text-primary">
                            {{$project->title}}

                            @can('update',$project)
                                <a href="" class="btn btn-primary d-block">You can update the page</a>
                                @endcan
                        </h5>
                        <p>{{$project->description}}</p>
                        <a href="/projects/{{$project->id}}/edit">Edit</a>
                    </div>


                        @if($project->tasks->count())

                        <h6>Tasks</h6>
                        @foreach($project->tasks as $task)
                            <div>
                                <form action="/tasks/{{$task->id}}" method="post">
                                    @method('patch')
                                    @csrf
                                    <div class="">

                                        <input type="checkbox" name="completed" onChange="this.form.submit()" {{$task->completed==1 ? 'checked' :'' }}>
                                        <label for="">{{$task->description}}</label>
                                    </div>
                                </form>
                            </div>

                            @endforeach

                            @endif





                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <form action="/projects/{{$project->id}}/task" method="post">
            @csrf
            <div class="form-group">
                <label for="" >New Task</label>
                <input type="text" class="form-control" name="description">
            </div>

            <button type="submit" class="btn btn-success">Add Task</button>
        </form>
    </div>
    @endsection