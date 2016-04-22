

@extends('layouts.admin')

@section('content')
<div class="row">

	<div class="col s12">
		<table>
			<thead>
				<tr>
					<th data-field="category">
						<h4>
							Pages
						</h4>
					</th>
					<th data-field="delete"></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($pages as $page)
				<tr>
					<td><a href="/kanepe/pages/page/{{ $page->id }}">{{ $page->title }}</a></td>
					<td><a class="btn" href="/{{ $page->permalink }}">View</a></td>
					<td><a class="btn" href="/kanepe/pages/delete/{{ $page->id }}">Delete</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
				 {!! $paginator->render() !!}
	</div>
</div>
<div class="fixed-action-btn" style="top: 50px; right: 24px;">
	<a class="btn-floating btn-large red" href="/kanepe/pages/create">
		<i class="large material-icons">add</i>
	</a>
</div>
@endsection
