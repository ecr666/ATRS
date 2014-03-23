
@extends ('layout.main')

@section('content')
<h1>Add an Airport</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'flight_delay')) }}

	<div class="form-group">
		{{ Form::label('ID', 'Flight Number :') }}
		{{ Form::text('ID', Input::old('ID'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('scheduled_time', 'Scheduled Time :') }}
		{{ Form::text('scheduled_time', Input::old('scheduled_time'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('new_time', 'New Time :') }}
		{{ Form::text('new_time', Input::old('new_time'), array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Add Detials!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop
