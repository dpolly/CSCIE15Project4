@extends('plant_index')

@section('title')
	Dpolly.me Adding A Plant
@stop

@section('content')

	<p>Add Plant in Database</p>

	{{ Form::open(array('url' => '/plant/create')) }}

    {{ Form::label('common_name','Common Name') }}
    {{ Form::text('common name'); }}

    {{ Form::label('botanical_name','Botanical Name') }}
    {{ Form::text('botanical_name'); }}

    {{ Form::label('family_id', 'What family is the plant in?') }}
    {{ Form::select('family_id', $families); }}

    {{ Form::label('category', 'Select all categories that apply to this plant') }}
        @foreach($categories as $id => $category)
            {{ Form::checkbox('categories[]', $id); }} {{ $category }}
            <br>
        @endforeach

    {{ Form::submit('Add to Database'); }}

	{{ Form::close() }}

@stop