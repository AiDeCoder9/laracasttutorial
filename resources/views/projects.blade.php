@extends('layouts.template')

@section('content')
        <h1>Projects</h1>
        @foreach($projects as $project)
                <li><a href="/projects/{{$project->id}}">{{$project->title}}</a>:{{$project->description}}</li>
    @endforeach



    @endsection