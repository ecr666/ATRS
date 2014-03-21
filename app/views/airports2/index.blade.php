<!-- app/views/nerds/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
	<title>Airports Info</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL :: route('home')}}">Home</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="airports">Airports</a></li>
		<li><a href="reserve">Reservations</a>
	</ul>
</nav>

<h1>Airports</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

  <a class="btn btn-info" style="margin: 10px; float: right;" href="{{ URL::to('airports/create') }}">Add a new Airport</a>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>AirportCode</td>
			<td>AirportName</td>
			<td>City</td>
			<td>State</td>
		</tr>
	</thead>
	<tbody>
	@foreach($airports as $key => $value)
		<tr>
			<td>{{ $value->AirportCode }}</td>
			<td>{{ $value->AirportName }}</td>
			<td>{{ $value->City }}</td>
			<td>{{ $value->State }}</td>

			<!-- we will also add show, edit, and delete buttons -->
			<td>

				<!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
				<!-- we will add this later since its a little more complicated than the other two buttons -->

				<!-- show the nerd (uses the show method found at GET /nerds/{id} -->
				{{ Form::open(array('url' => 'airports/' . $value->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete this airport', array('class' => 'btn btn-warning')) }}
				{{ Form::close() }}
				<!-- show the nerd (uses the show method found at GET /airports2/{id} -->
				<a class="btn btn-small btn-success" href="{{ URL::to('airports/' . $value->id) }}">Show this Airport</a>

				<!-- edit this nerd (uses the edit method found at GET /airports2/{id}/edit -->
				<a class="btn btn-small btn-info" href="{{ URL::to('airports/' . $value->id . '/edit') }}">Edit this Airport</a>

			</td>
		</tr>
	@endforeach
	</tbody>
</table>

</div>
</body>
</html>