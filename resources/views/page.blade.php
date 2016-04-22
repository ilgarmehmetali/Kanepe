@extends('layouts.app')

@section('content')


<div class="row">
	<div class="col s12 m10 offset-m1">
		<br>

		<span class="flow-text">
			{!! $page->content !!}
		</span>

	</div>
</div>
@include('common.disqus')

@endsection
