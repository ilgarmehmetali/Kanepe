

@extends('layouts.admin')

@section('content')
<div class="row" style="margin-top:10%">

	<div class="col s12"> 
		<a href="/kanepe/posts/create" class="btn input-field">New Post</a>
		<a href="/kanepe/pages/create" class="btn input-field">New Page</a>
	</div>
</div>

<div class="row" style="margin-top:10%">
	<div class="col s12">
		<label> Lates disqus comments</label>
		<script type="text/javascript" src="http://{{ env('DISQUS_SHORTNAME', 'oops-no-name') }}.disqus.com/recent_comments_widget.js?num_items=25&hide_avatars=0&avatar_size=40"></script>
	</div>

</div>
@endsection
