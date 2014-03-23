@extends ('layout.main')

@section('content')
<h2>Delayed Flights</h2>

<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

  <a class="btn btn-info" style="margin: 10px; float: right;" href="{{ URL::to('add/delayedFlight') }}">Update table</a>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>Flight Number</td>
			<td>Flight Date</td>
			<td>Scheduled Time</td>
			<td>New Time</td>
			<td>Notified Users</td>
			
		</tr>
	</thead>
	<tbody>
	@foreach($flight_delay as $key => $value)
		<tr>
			<td>{{ $value->Flight Number }}</td>
			<td>{{ $value->Flight Date }}</td>
			<td>{{ $value->Scheduled Time}}</td>
			<td>{{ $value->New Time }}</td>
			<td>{{ $value->Notified Users }}</td>

			<!-- we will also add show, edit, and delete buttons -->
			<td>

				<!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
				<!-- we will add this later since its a little more complicated than the other two buttons -->

				<!-- show the nerd (uses the show method found at GET /nerds/{id} -->
				{{ Form::open(array('url' => 'delayedFlights/' . $value->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete this flight details', array('class' => 'btn btn-warning')) }}
				{{ Form::close() }}
				<!-- show the nerd (uses the show method found at GET /airports2/{id} -->
				<a class="btn btn-small btn-success" href="{{ URL::to('delayedFlights/' . $value->id) }}">Show this flight</a>

				<!-- edit this nerd (uses the edit method found at GET /airports2/{id}/edit -->
				<a class="btn btn-small btn-info" href="{{ URL::to('delayedFlights/' . $value->id . '/edit') }}">Edit this Flight</a>

			</td>
		</tr>
	@endforeach
	</tbody>
</table>


@stop