<!--item-->
<div class="col-lg-4 col-sm-4">
	<a class="news d-flex flex-column align-items-center align-items-sm-start"
	   href="<? the_permalink() ?>">
		<div class="news-image" style="background-image: url('<? the_post_thumbnail_url() ?>')"></div>
		<div class="news-body">
			<div class="news-date"><? the_date( 'j F Y' ) ?></div>
			<div class="news-title"><? the_title() ?></div>
		</div>
	</a>
</div>
<!--item-->