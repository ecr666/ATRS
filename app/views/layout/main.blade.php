<!DOCTYPE html>
<html>
	<head>
		<title> Air Ticket Reservation System</title>
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





</div>
		@if(Session::has('global'))
		<p>{{Session::get('global')}}</p>
		@endif
		@yield('content')
	</body>
</html>

