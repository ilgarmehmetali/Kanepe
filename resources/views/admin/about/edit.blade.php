

@extends('layouts.admin')

@section('content')
<div class="row">

	<div class="col s12">
		@include('common.errors')
		<form action="/kanepe/about" method="POST" class="card-panel">
			{!! csrf_field() !!}

			<div class="input-field col s12">
				<h4>About Me</h4>
				<textarea id="content" name="content" class="materialize-textarea">{{ $page->content }}</textarea>
				<script>var simplemde = new SimpleMDE({ element: document.getElementById("content") });</script>
			</div>

			<button class="btn waves-effect waves-light input-field" type="submit" name="action">Update
				<i class="material-icons right">send</i>
			</button>
		</form>

		<form action="/kanepe/profile" method="POST" class="card-panel">
			{!! csrf_field() !!}

			<div class="input-field">
				<input id="name" type="text" name="name" value="{{ $user->name }}">
				<label for="name">Name</label>
			</div>

			<div class="input-field">
				<input id="email" type="email" name="email" value="{{ $user->email }}">
				<label for="email">Email</label>
			</div>

			<div class="input-field">
				<input id="current_password" type="password" class="validate" name="current_password" >
				<label class="active" for="current_password">Current Password</label>
			</div>

			<div class="input-field">
				<input id="password" type="password" class="validate" name="password" >
				<label class="active" for="password">New Password</label>
			</div>

			<div class="input-field">
				<input id="password_confirmation" type="password" class="validate" name="password_confirmation" >
				<label class="active" for="password_confirmation">New Confirm Password</label>
			</div>

			<button class="btn waves-effect waves-light" type="submit" name="action">Update
				<i class="material-icons right">send</i>
			</button>
		</form>
	</div>
</div>
@endsection
