@extends('layouts.app')

@section('content')
    <h1>Create Classes</h1>
	{!! Form::model($tests, ['action' => 'PostController@store', 'method' => 'POST']) !!}
        <div class="form-group">
		    {{Form::label('title', 'Class Title')}}
			{{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Enter the title of your class'])}}
		</div>
		<div class="form-group">
		{{Form::label('type', 'Type of class')}}
		<br>
		{{Form::select('type', ['E' => 'English', 'M' => 'Maths', 'S' => 'Science'], 'E')}}
		</div>
		<div class="form-group">
		{{Form::label('assignStudent', 'Assign Student')}}
		<br>
		<!--Not using model forms as it does not seem to work(could not get any value to show) -->
		@if(count($student) > 0 )
		    @foreach ($student as $value)
                {{$value->userName}}
                <input type="checkbox" value="{{$value->userName}}" name="student">
		    @endforeach
	    @endif
		</div>
		<div class="form-group">
		{{Form::label('assignTeacher', 'Assign Teacher')}}
		<br>
		<!--Same reason as above -->
		@if(count($tests) > 0 )
		<select name="teacher">
		    @foreach ($tests as $test)
				<option value ="{{$test->userName}}">{{$test->userName}}</option>
		    @endforeach
	    @endif
		</select>
		</div>
		{{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection