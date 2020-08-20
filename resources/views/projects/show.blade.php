@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{$project->name}}</h2>
        <task :projectid="{{ $project->id }}"></task>
    </div>
@endsection
