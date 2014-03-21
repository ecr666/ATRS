@extends ('layout.main')

@section('content')
	Please enter details of your journey to reserve flights.
	<form action="{{URL ::route('flight-reserve')}}" method='post'>
		<div class="field">
			From:<input type="text" name="from">
		</div>

		<div class="field">
			To:<input type="text" name="to">
		</div>
		<div class="field">
			Departing:<input type="date" name="departing">
		</div>
		<div class="field">
			Returning:<input type="date" name="returning">
		</div>
			 <a class="btn btn-info" style="margin: 10px; float: left;" href="{{ URL::to('reserve/routes') }}">Find Flights</a>

		
	<input type="submit" value="Find flights">
	{{Form::token()}}
	</form>
@stop