@extends('layouts.template')

@section('title')
    Home
@endsection


@section('content')
    <h1>it is the list of  {{ $title }}</h1>

    <ul>
        @foreach($data as $task)
            <li>{{$task}}</li>
            @endforeach
    </ul>
@endsection

