@extends('layouts.template')
@section('title')
    Create Project
@endsection


@section('content')

    <h1>Create an Project</h1>

    <div class="container">
        <form action="/projects" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" placeholder="title" class="form-control {{$errors->has('title')?'bg-dangerr':'bg-successs'}}" name="title" value="{{old('title')}}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description"  cols="30" rows="10" class="form-control {{$errors->has('description')?'bg-dangerr':'bg-successs'}}">{{old('description')}}
                </textarea>
            </div>

            <button type="submit" class="btn btn-primary">Create Project</button>
        </form>
    </div>


@include('partials.error');



@endsection