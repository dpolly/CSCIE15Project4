@extends('plant_index')

@section('title')
	Dpolly.me Adding A Plant
@stop

@section('content')

	<p>Plant Listing-Add a plant!</p>

	{{ Form::open(array('url' => '/plant/create')) }}

    {{ Form::label('common_name','Plants common name') }}
    {{ Form::text('common name'); }}

    {{ Form::label('botanical_name','Plants botanical name') }}
    {{ Form::text('botanical_name'); }}

    {{ Form::label('family_id', 'Select plants family') }}
    {{ Form::select('family_id', $families); }}

    {{ Form::label('category', 'Select categories for plant') }}
        @foreach($categories as $id => $category)
            {{ Form::checkbox('categories[]', $id); }} {{ $category }}
            <br>
        @endforeach

    {{ Form::submit('Add Plant to Database'); }}

	{{ Form::close() }}

@stop