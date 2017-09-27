<!DOCTYPE html>
@extends ('layouts.master')
<html>
<head>
<title>Lakeland Computers</title>
</head>
<body>
{{--<div class="navbar navbar-inverse nav">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
        </div>
      </div>
</div>--}}
@section('content')

{{--@yield('content')--}}

{{--<script src="http://code.jquery.com/jquery.js"></script>--}}
{{--<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>--}}
{{--<script type="text/javascript">--}}
    {{--$(function() {--}}
        {{--$('.dropdown-toggle').dropdown();--}}

        {{--$('.dropdown input, .dropdown label').click(function(e) {--}}
            {{--e.stopPropagation();--}}
        {{--});--}}
    {{--});--}}

    {{--@if(isset($error))--}}
      {{--alert("{{$error}}");--}}
    {{--@endif--}}

    {{--@if(Session::has('error'))--}}
      {{--alert("{{Session::get('error')}}");--}}
    {{--@endif--}}

    {{--@if(Session::has('message'))--}}
      {{--alert("{{Session::get('message')}}");--}}
    {{--@endif--}}

{{--</script>--}}
    @stop

@includes('includes.footer')
</body>
</html>