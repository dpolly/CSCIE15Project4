@extends('plant_index')

@section('title')
	Dpolly.me Plant Search Results
@stop

@section('content')

	<p>Plant Listing</p>

	@if($query)
		<h5>You searched for {{{ $query }}} and your results where........</h5>
		@if(sizeof($plants) == 0)
        		<p>Sorry! there were no results for your search</p>
       	@else
       		@foreach($plants as $plant)
       			<a href=/plant/{{$plant['id']}}>{{ $plant['common_name'] }}: {{ $plant['botanical_name']}}</a><br>
        	@endforeach
        @endif

	@else
	    <p>Error! You did not enter any valid search criteria please try again</p>
	@endif
@stop