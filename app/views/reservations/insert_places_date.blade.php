@extends ('layout.main')

@section('content')
<div class="well" style="background-color: rgb(170, 212, 255);">
	<h3 style="color: rgb(51, 51, 51);">Enter Journy Details</h3>
</div>
<div class="container">

	{{ Form::open(array('url' => 'flight/reserve')) }}
	<div class="form-group">
		{{ Form::label('from', 'From :') }}
		{{ Form::text('from', Input::old('from'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('to', 'To :') }}
		{{ Form::text('to', Input::old('to'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('departing', 'Departing Date:') }}
		{{ Form::text('departing', Input::old('departing'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('class', 'Class :') }}
		{{ Form::select('class', array(
        'business'       => 'Business',
        'economy'     => 'Economy'
    ), 'economy') }}
		<!--{{ Form::text('class', Input::old('class'), array('class' => 'form-control')) }}-->
	</div>

	<div class="form-group">
		{{ Form::label('seats', 'Number of Seats :') }}
		{{ Form::text('seats', Input::old('seats'), array('class' => 'form-control')) }}
	</div>
    {{ Form::submit('Find Flights') }}
	{{ Form::close() }}
</div>


@stop