@extends('master')

@section('title')
	Dpolly.me Search Plants
@stop

@section('content')

    <p>Database Search</p>
    {{ Form::open(array('url' => '/plant')) }}
    {{ Form::text('query'); }}
    {{ Form::submit('Go!'); }}

   {{ Form::close() }}

@stop