

<blockquote class="title blue-grey-text text-lighten-5">
	<b>{{ $header->title }}</b>
</blockquote>
@if ( isset($header->author) )
<h6 style="padding-left: 40px; margin-bottom:0;" class="silver">
	<a class="blue-text text-lighten-3" href="{{ $header->author->link }}">
		{{ $header->author->name }}
	</a>
	<strong class="blue-grey-text text-lighten-3">
		{{ date_format($header->created_at, 'Y-m-d') }}
	</strong>
</h6>
@endif
