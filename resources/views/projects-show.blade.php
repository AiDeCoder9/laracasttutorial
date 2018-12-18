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
                    <div class="card-title h5 text-capitalize text-primary">
                        {{$project->title}}
                    </div>
                    <p>{{$project->description}}</p>
                    <a href="/projects/{{$project->id}}/edit">Edit</a>
                </div>
            </div>
        </div>
    </div>
    @endsection