
@extends('layout.main')

@section('content')
<div class="jumbotron text-center">
<h2>{{ $flight_delay->flight_delay }}</h2>
<p>
<strong>Flight Number:</strong> {{ $flight_delay->ID }}<br>
<strong>New Time:</strong> {{ $flight_delay->new_time }}
</p>
</div>
@stop