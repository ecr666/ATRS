@extends ('layout.main')

@section('content')
	Please enter details of your journey to reserve flights.
	<form action="{{URL ::route('details-personal')}}" method='post'>
		<div class="field">
			Lastname:<input type="text" name="lastname" {{(Input::old('lastname'))?'value="' . e(Input::old('lastname')) . '"':''}}>
			@if($errors->has("lastname"))
				{{$errors->first("lastname")}}
			@endif
		</div>

		<div class="field">
			Firstname:<input type="text" name="firstname" {{(Input::old('firstname'))?'value="' . e(Input::old('firstname')) . '"':''}}>
			@if($errors->has("firstname"))
				{{$errors->first("firstname")}}
			@endif
		</div>
		<div class="field">
			Initials:<input type="text" name="initials" {{(Input::old('initials'))?'value="' . e(Input::old('initials')) . '"':''}}>
			@if($errors->has("initials"))
				{{$errors->first("initials")}}
			@endif
		</div>
		<div class="field">
			Email:<input type="text" name="email" {{(Input::old('email'))?'value="' . e(Input::old('email')) . '"':''}}>
			@if($errors->has("email"))
				{{$errors->first("email")}}
			@endif
		</div>
		<div class="field">
			Telephone:<input type="text" name="telephonenum" {{(Input::old('telephonenum'))?'value="' . e(Input::old('telephonenum')) . '"':''}}>
			@if($errors->has("telephonenum"))
				{{$errors->first("telephonenum")}}
			@endif
		</div>
		<div class="field">
			Passport No:<input type="text" name="passportnum" {{(Input::old('passportnum'))?'value="' . e(Input::old('passportnum')) . '"':''}}>
			@if($errors->has("passportnum"))
				{{$errors->first("passportnum")}}
			@endif
		</div>
		
	<input type="submit" value="Save">
	{{Form::token()}}
	</form>
@stop