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

<div class="well" style="background-color: rgb(170, 212, 255);">
        <h3 style="color: rgb(51, 51, 51);">Available Flights</h3>
 </div>

<div class="container">


<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th scope="Row">Select</th>
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
            <th scope="col">                          
                <input name="UserSelected" id="userSelected_2" type="radio" value="3">        
            </th>
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
<script>
    $('#tableSelect tr').click(function() {
    $(this).find('th input:radio').prop('checked', true);
})
</script>

<!--all in one-->
<div class ="well">
    <h3>Please Fill This Form</h3>
</div>
<div class="container">
    {{ Form::open(array('url' => 'flight/reserve/completed')) }}
    <h4>Flight Details</h4>
        <div class="form-group">
            {{ Form::label('fNum', 'Select your flight Number :') }}
            {{ Form::text('fNum', Input::old('fNum'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('fDate', 'Select the prefered date (dd-mm-yy):') }}
            {{ Form::text('fDate', Input::old('fDate'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
        {{ Form::label('fClass', 'Class :') }}
        {{ Form::select('fClass', array(
        'business'       => 'Business',
        'economy'     => 'Economy'
    ), 'economy') }}
        <!--{{ Form::text('class', Input::old('class'), array('class' => 'form-control')) }}-->
    </div>
        <br><h4>Personal Details</h4>
        <div class="form-group">
            {{ Form::label('lName', 'Last Name :') }}
            {{ Form::text('lName', Input::old('lName'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('fName', 'First Name:') }}
            {{ Form::text('fName', Input::old('fName'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('inis', 'Initials :') }}
            {{ Form::text('inis', Input::old('inis'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('email', 'Email :') }}
            {{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('tel', 'Telephone Number :') }}
            {{ Form::text('tel', Input::old('tel'), array('class' => 'form-control')) }}
        </div>
        <br><h4>Payment Details</h4>
        <div class="form-group">
        {{ Form::label('pMethod', 'Payment Method :') }}
        {{ Form::select('pMethod', array(
        'cCard'       => 'Credit Card'
        ), 'cCard') }}

        <!--{{ Form::text('class', Input::old('class'), array('class' => 'form-control')) }}-->
        </div>
        <div class="form-group">
        {{ Form::label('cType', 'Credit Card Type :') }}
        {{ Form::select('cCard', array(
        'visa'       => 'VISA',
        'master'       => 'MASTER',
        ), 'visa') }}

        <!--{{ Form::text('class', Input::old('class'), array('class' => 'form-control')) }}-->
        </div>
        <div class="form-group">
            {{ Form::label('cNum', 'Credit Card Number :') }}
            {{ Form::text('cNum', Input::old('cNum'), array('class' => 'form-control')) }}
        </div>
    {{ Form::submit('Submit') }}
    {{ Form::close() }}
    <br><br>
</div>

</body>
</html>