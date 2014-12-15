@extends('master')

@section('content')

	{{ Form::open(array('url' => '/plant/edit')) }}

		{{ Form::hidden('id',$plant['id']); }}

			{{ Form::label('common_name','Common Name') }}
			{{ Form::text('common_name',$plant['common_name']); }}

            {{ Form::label('botanical_name','Botanical Name') }}
            {{ Form::text('botanical_name',$plant['botanical_name']); }}

            {{ Form::label('family_id', 'family') }}
            {{ Form::select('family_id', $family, $plant->family_id); }}

		{{ Form::submit('Update Record'); }}

	{{ Form::close() }}

    {{ Form::open(array('url' => '/plant/delete')) }}
        {{ Form::hidden('id',$plant['id']); }}
        <button onClick='parentNode.submit();return false;'>Delete Record</button>
    {{ Form::close() }}


@stop