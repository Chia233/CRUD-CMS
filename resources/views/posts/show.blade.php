@extends('layouts/app')

@section('content')
    <h1>List of classes for {{$post->userName}}</h1>
	
    <h2>{{$post->userName}} currently has not been attached to any class </h2>
	<a href="/posts" class="btn btn-default">Back </a>
	<a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit </a>
@endsection