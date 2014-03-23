@extends ('layout.main')

@section('content')
	<div class="container">
	<h3>{{ $fData }}</h3>
	Please enter details of your journey to reserve flights.
	<form action="{{URL ::route('details-personal-post')}}" method='post'>
		<br>
		<div class="field">
			Lastname:<input type="text" name="lastname" {{(Input::old('lastname'))?'value="' . e(Input::old('lastname')) . '"':''}}>
			@if($errors->has("lastname"))
				{{$errors->first("lastname")}}
			@endif
		</div>
		<br>
		<div class="field">
			Firstname:<input type="text" name="firstname" {{(Input::old('firstname'))?'value="' . e(Input::old('firstname')) . '"':''}}>
			@if($errors->has("firstname"))
				{{$errors->first("firstname")}}
			@endif
		</div>
		<br>
		<div class="field">
			Initials:<input type="text" name="initials" {{(Input::old('initials'))?'value="' . e(Input::old('initials')) . '"':''}}>
			@if($errors->has("initials"))
				{{$errors->first("initials")}}
			@endif
		</div>
		<br>
		<div class="field">
			Email:<input type="text" name="email" {{(Input::old('email'))?'value="' . e(Input::old('email')) . '"':''}}>
			@if($errors->has("email"))
				{{$errors->first("email")}}
			@endif
		</div>
		<br>
		<div class="field">
			Telephone:<input type="text" name="telephonenum" {{(Input::old('telephonenum'))?'value="' . e(Input::old('telephonenum')) . '"':''}}>
			@if($errors->has("telephonenum"))
				{{$errors->first("telephonenum")}}
			@endif
		</div>
		<br>
		
	<input type="submit" value="Save">
	{{Form::token()}}
	</form>
</div>




<div class="container">
	<h3>Please enter details of your journey to reserve flights.</h3>

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