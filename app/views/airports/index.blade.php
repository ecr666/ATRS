@extends('layouts.default')

@section('content')
	
	<h1>Airports Home Page</h1>
	
	
	<ul>
	@foreach($airports as $airport)
		<li>{{ $airport->name }}</li>
	@endforeach
	</ul>

{{--
	{{ $name }}<br />
		
		@if(isset($name))
		{{ $name }}<br />
	@else
		No name given
		--}}

@stop

