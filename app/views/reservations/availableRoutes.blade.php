<!DOCTYPE html>
<html>
<head>
	<title>Available Flights</title>
	<!--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.css">-->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

</head>
<body>


<nav class="navbar navbar-inverse" role="navigation">
	<div class="navbar-header">
		<a class="navbar-brand" href="">Home</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="airports">Airports</a></li>
		<li><a href="/ATRS/public/reserve">Reservations</a>
	</ul>
</nav>

<div class="container">
<h1>Available Flights</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Filght ID</td>
            <td>Date</td>
            <td>Price (B.Class)</td>
            <td>Price (E.Class)</td>
            <td>Seats (B.Class)</td>
            <td>Seats (E.Class)</td>
        </tr>
    </thead>
    <tbody>
    @foreach($flights as $key => $value)
        <tr>
            <td>{{ $value->ID }}</td>
            <td>{{ $value->flight_date }}</td>
            <td>{{ $value->businessClassPrice }}</td>
            <td>{{ $value->economyClassPrice }}</td>
            <td>{{ $value->businessClassCapacity }}</td>
            <td>{{ $value->economyClassCapacity }}</td>          
        </tr>
    @endforeach
    </tbody>
</table>

</div>

<div class="container">
    {{ Form::open(array('url' => 'details/personal')) }}
        <div class="form-group">
            {{ Form::label('fNum', 'Select your flight Number :') }}
            {{ Form::text('fNum', Input::old('fNum'), array('class' => 'form-control')) }}
        </div>
        {{ Form::submit('Select') }}
    {{ Form::close() }}
</div>

</body>
</html>