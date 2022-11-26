@extends('layouts.main')
@section('title', $title)

@section('sidenav')
@include('partials.sidenav')
@endsection

@section('container')
<h1 class="text-3xl font-bold underline text-sky-700">
    Hello world!
</h1>
@endsection