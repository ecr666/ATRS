<!DOCTYPE html>
<html>
<head>
	<title>Airports Info</title>
	<!--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.css">-->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse" role="navigation">
	<div class="navbar-header">
		<a class="navbar-brand" href="">Home</a>
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



</body>
</html>