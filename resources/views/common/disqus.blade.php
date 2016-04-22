<div class="row">
	<div class="col s10 offset-s1">
		  <hr style="margin: 40px 0px;">
		<div id="disqus_thread"></div>
	</div>
</div>
<script>
/**
* RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
* LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
*/

var disqus_config = function () {
this.page.url = "{{ $disqus->permalink }}";
this.page.identifier = "{{ $disqus->identifier }}{{ env('DISQUS_POSTFIX', '') }}";
this.page.title = "{{ $disqus->title }}";
};

(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');

s.src = '//{{ env('DISQUS_SHORTNAME', 'oops-no-name') }}.disqus.com/embed.js';

s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
