
@if ($paginationStart != -1)
<ul class="pagination" style="margin: 0 auto;">
	@if ($paginationStart == $paginationCurrent)
		<li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
	@else
		<li class="waves-effect"><a href="{{ $baseLink.($paginationCurrent-1) }}"><i class="material-icons">chevron_left</i></a></li>
	@endif
	@for ($i = $paginationStart; $i <= $paginationEnd; $i++)
		@if ($i == $paginationCurrent)
			<li class="active"><a href="{{ $baseLink.$i }}">{{ $i }}</a></li>
		@else
			<li class="waves-effect"><a href="{{ $baseLink.$i }}">{{ $i }}</a></li>
		@endif
	@endfor
	@if ($paginationEnd == $paginationCurrent)
		<li class="disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
	@else
		<li class="waves-effect"><a href="{{ $baseLink.($paginationCurrent+1) }}"><i class="material-icons">chevron_right</i></a></li>
	@endif
</ul>
@endif
