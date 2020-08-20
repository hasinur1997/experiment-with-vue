@extends('layouts.app')
@include('layouts.navbar')

<div class="container" style="margin-top:20px">
    <div class="columns">
        <div class="column is-10 is-offset-1">
            @yield('books')
        </div>
    </div>
</div>
