
@extends('layouts.app')

@section('content')

@foreach ($posts as $post)

<div class="row">
	<div class="col s10 offset-s1">
		<br>

		<h6 class="grey-text lighten-2">
			{{ date_format($post->created_at, 'Y-m-d') }}
		</h6>
		<h4>
			<a href="/blog/{{ $post->permalink }}">{{ $post->title }}</a>
		</h4>
		<span class="flow-text">
			{!! substr($post->content,0,200) !!}
		</span>

	</div>
</div>
<br />

@endforeach

<div class="row">
	<div class="col s12">
		{!! $paginator->render() !!}
	</div>
</div>



@endsection
