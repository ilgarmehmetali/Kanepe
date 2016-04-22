
	@if ($paginationStart != -1)
		<a class="btn left light-blue" href="{{ $baseLink.$paginationStart }}"><i class="material-icons">chevron_left</i></a>
	@endif

	@if ($paginationEnd != -1)
		<a class="btn right light-blue" href="{{ $baseLink.$paginationEnd }}"><i class="material-icons">chevron_right</i></a>
	@endif
