<!-- app/views/nerds/show.blade.php -->

<!DOCTYPE html>
<html>
<head>
<title>Show Airport</title>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	<!--<link rel="stylesheet" href="css/bootstrap.css">-->

</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
<div class="navbar-header">
<a class="navbar-brand" href="{{ URL::to('') }}">Home</a>
</div>
<ul class="nav navbar-nav">
<li><a href="{{ URL::to('airports') }}">Airports Home</a></li>
<li><a href="{{ URL::to('airports/create') }}">Create an Airport</a>
</ul>
</nav>

<h1>Showing {{ $airport->AirportName }}</h1>

<div class="jumbotron text-center">
<h2>{{ $airport->AirportName }}</h2>
<p>
<strong>City:</strong> {{ $airport->City }}<br>
<strong>State:</strong> {{ $airport->State }}
</p>
</div>

</div>
</body>
</html>