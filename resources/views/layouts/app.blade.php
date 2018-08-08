<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="{{asset('css/app.css')}}">
		<script src="{{asset('js/popper.min.js')}}"> </script>
		<script src="{{asset('js/jquery-3.3.1.min.js')}}"> </script>
		<script src="{{asset('js/bootstrap.min.js')}}"> </script>
        <title>{{config('app.name', 'Classroom Management System')}}</title>

    </head>
    <body>
	    @include('include/navbar')
	    <div class="container">
		    @include('include/messages')
            @yield('content')
		</div>
		<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'article-ckeditor' );
        </script>
    </body>
</html>

