@extends('layouts.template')

@section('content')

        @foreach($projects as $project)
                <li><a href="/projects/{{$project->id}}">{{$project->title}}</a>:{{$project->description}}</li>
    @endforeach



    @endsection