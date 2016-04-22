
@extends('layouts.auth')

@section('content')
<div class="row" style="margin-top:10%">
	<div class="col s12 m8 offset-m2 l6 offset-l3">
		
		<form class="card-panel" role="form" method="POST" action="{{ url('/kanepe/login') }}">
			{!! csrf_field() !!}
		
			<h4 style="padding-bottom:20px">Login</h4>
			<div class="input-field">
				<input placeholder="john@example.com" id="username" name="email" type="text" class="validate">
				<label class="active" for="username">Email</label>
			</div>
			<div class="input-field">
				<input placeholder"111111" id="password" name="password" type="password" class="validate">
				<label class="active" for="password">Password</label>
			</div>
			<p>
				<input type="checkbox" id="test5" name="remember"/>
				<label for="test5">Remember Me</label>
			</p>
			<div class="row">
				<div class="col s12 m4 input-field">
					<button class="btn waves-effect waves-light" style="width:100%" type="submit" name="action">
						Login
					</button>
				</div>
				<div class="col s12 m8 input-field">
					<a class="btn waves-effect waves-light" style="width:100%" href="{{ url('/kanepe/password/reset') }}">
						Forgot Your Password
					</a>
				</div>
			</div>
		</form>
	</div>
</div>

@endsection
