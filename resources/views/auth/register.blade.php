@extends('layouts.auth')

@section('content')
<div class="row" style="margin-top:10%">
	<div class="col s12 m8 offset-m2 l6 offset-l3">
		<form class="card-panel" role="form" method="POST" action="{{ url('/kanepe/register') }}">
			{!! csrf_field() !!}


			<h4>Register</h4>
			<span> Or <a href="/kanepe/login">Login</a></span>
			<div class="input-field">
				<input id="name" type="text" class="validate" name="name" value="{{ old('name') }}">
				<label class="active" for="name">Name</label>
			</div>

			<div class="input-field">
				<input id="email" type="email" class="validate" name="email" value="{{ old('email') }}">
				<label class="active" for="email">Email</label>
			</div>

			<div class="input-field">
				<input id="password" type="password" class="validate" name="password" >
				<label class="active" for="password">Password</label>
			</div>

			<div class="input-field">
				<input id="password_confirmation" type="password" class="validate" name="password_confirmation" >
				<label class="active" for="password_confirmation">Confirm Password</label>
			</div>

			<div class="row">
				<div class="col s12 m6 input-field">
					<button class="btn waves-effect waves-light" style="width:100%" type="submit" name="action">
						Register
					</button>
				</div>
				<div class="col s12 m6 input-field">
					<a class="btn waves-effect waves-light" style="width:100%" href="{{ url('/') }}">
						Home
					</a>
				</div>
			</div>

		</form>
	</div>
</div>
@endsection
