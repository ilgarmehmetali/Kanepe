

@extends('layouts.admin')

@section('content')
<div class="row">

	<div class="col s12">
		<table>
			<thead>
				<tr>
					<th data-field="category">
						<h4>
							Posts
						</h4>
					</th>
					<th data-field="delete"></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($posts as $post)
				<tr>
					<td><a href="/kanepe/posts/post/{{ $post->id }}">{{ $post->title }}</a></td>
					<td><a class="btn" href="/blog/{{ $post->permalink }}">View</a></td>
					<td><a class="btn" href="/kanepe/posts/delete/{{ $post->id }}">Delete</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
				 {!! $paginator->render() !!}
	</div>
</div>
<div class="fixed-action-btn" style="top: 50px; right: 24px;">
	<a class="btn-floating btn-large red" href="/kanepe/posts/create">
		<i class="large material-icons">add</i>
	</a>
</div>
@endsection
