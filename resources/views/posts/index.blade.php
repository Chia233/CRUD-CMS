@extends('layouts/app')

@section('content')
    <h1>Posts</h1>
	@if(count($posts) > 0 )
		<table>
		@foreach($posts as $post)
		<tr>
	        <div class="well">
				<br>
				<h3>This is the list of {{$post->role}}s</h3>
				<br>
			    <td><h3><a href="/posts/{{$post->id}}">{{$post->userName}}</a></h3></td> 
			</div>
		</tr>
	    @endforeach
		</table>
		{{$posts->links()}}
	@else
		<p>There are no posts in the database</p>
	@endif
@endsection