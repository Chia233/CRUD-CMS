@extends('layouts/app')
				
@section('content')
    
	<p> Welcome to the classroom management system</p>
	<ul class="list-group">
	    @if(count($services) > 0 )
		    @foreach ($services as $service)
	        <li class="list-group-item">{{$service}}</li>
		    @endforeach
	    @endif
	</ul>
@endsection
  