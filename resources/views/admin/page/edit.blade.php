

@extends('layouts.admin')

@section('content')
<div class="row">

	<div class="col s12">
		<div class="input-field col s12">
			@include('common.errors')
		</div>
		<form action="/kanepe/pages/save" method="POST">
			{!! csrf_field() !!}
			<input type="text" name="id" hidden value="{{ $id }}" />

			<div class="input-field col s12">
				<input id="title" name="title" type="text" class="validate" value="{{ $title }}">
				<label for="title">Title</label>
			</div>
			<div class="input-field col s12">
				<input id="permalink" name="permalink" type="text" class="validate" value="{{ $permalink }}">
				<label for="permalink">Slug</label>
			</div>

			<div class="input-field col s12">
				<span>Content</span>
				<textarea id="content" name="content" class="materialize-textarea">{{ $content }}</textarea>
				<script>var simplemde = new SimpleMDE({ element: document.getElementById("content") });</script>
			</div>

			<button class="btn waves-effect waves-light input-field" type="submit" name="action">Save
				<i class="material-icons right">send</i>
			</button>
		</form>
	</div>
</div>
@endsection
