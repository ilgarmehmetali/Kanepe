@extends('layouts.app')

@section('content')

<style>
h1,h2,h3,h4,h5,h6 { font-weight:normal !importent;}
</style>

<div class="row">
  <div style="width:100%"></div>
	<div class="col m10 offset-m1">
		<span class="flow-text">
			{!! $about->content !!}
		</span>

		@if(count($posts) > 0)
		<h4>Recent Articles</h4>
		<ul class="collection">
			@foreach ($posts as $post)
			<li><a href="/blog/{{ $post->permalink }}" class="collection-item"> {{ $post->title }}</a></li>
			@endforeach
		</ul>

		<a href="/blog" class="collection-item"> You can read the rest of my articles on my blog.</a>
		@endif
	</div>
</div>
@endsection
