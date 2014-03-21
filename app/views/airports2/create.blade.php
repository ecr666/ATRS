<!-- app/views/aurports2/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
	<title>Add an Airport</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
		<!--<link rel="stylesheet" href="css/bootstrap.css">-->
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL :: route('home')}}" }}"> Home</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('airports') }}">Airports Home</a></li>
		<!--<li><a href="{{ URL::to('airports/create') }}">Create a Nerd</a>-->
	</ul>
</nav>

<h1>Add an Airport</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'airports')) }}

	<div class="form-group">
		{{ Form::label('AirportName', 'Airport Name :') }}
		{{ Form::text('AirportName', Input::old('AirportName'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('City', 'City :') }}
		{{ Form::text('City', Input::old('City'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('Country', 'Country :') }}
		{{ Form::text('Country', Input::old('Country'), array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Add the Airport!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>