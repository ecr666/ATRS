<!DOCTYPE html>
<html>
	<head>
		<title> Air Ticket Reservation System</title>
	
	</head>
	<body>
		@if(Session::has('global'))
		<p>{{Session::get('global')}}</p>
		@endif
		@include('layout.navigation')
		@yield('content')
	</body>
</html>

