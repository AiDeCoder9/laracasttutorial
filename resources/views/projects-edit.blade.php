@extends('layouts.template')


@section('title')
    Edit Page
    @endsection

@section('content')

    <h1>Edit Page</h1>

    <div class="container">
        <form action="/projects/{{$project->id}}" method="post" >
            {{method_field('patch')}}

            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" value="{{$project->title}}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="" cols="30" rows="10"  placeholder="{{$project->description}}" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Update</button>

        </form>

        @include('partials.error')

             <form action="/projects/{{$project->id}}" method="post">
                 {{method_field('delete')}}
                 @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
             </form>

    </div>

@endsection