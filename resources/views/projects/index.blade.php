@extends('layouts.app')

@section('content')
    <div class="container">
        <ul class="list-group">
            @foreach($projects as $project)
                <li class="list-group-item">
                    <a href="/projects/{{$project->id}}">{{$project->name}}</a>
                </li>
            @endforeach
        </ul>
    </div>

@endsection