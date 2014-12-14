@extends('master')

@section('title')
	Dpolly.me Plants
@stop

@section('content menu')
    <a href="/plant">SEARCH</a><br>
    <a href="/plant/create">ADD</a><br>
    <a href="/plant/edit">EDIT</a><br>
    <a href="/plant/delete">DELETE</a>
@stop

@section('content')

    <p>Plant Listing</p>
    {{ Form::open(array('url' => '/plant')) }}

    {{ Form::label('Search','Search Criteria') }}
    {{ Form::text('query'); }}
    {{ Form::submit('Search Database'); }}

   {{ Form::close() }}

@stop