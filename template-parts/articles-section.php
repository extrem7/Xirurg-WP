<!--last news-->
<section class="last-news pb-4 pt-5">
    <div class="container">
        <div class="title-icon">
            <img src="<?= path() ?>img/icon/iconnews.png" alt="icon">
            <div class="title-general large-size"><? pll_e( 'Интересно знать' ) ?></div>
            <div class="subtitle under-line medium-size"><? pll_e( 'узнайте последнюю информацию' ) ?></div>
        </div>
        <!--news-->
        <div class="row mt-5">
			<?
			$articles = get_posts( [
				'posts_per_page' => 3,
				'exclude'        => get_the_ID()
			] );
			foreach ( $articles as $post ) {
				setup_postdata( $post );
				get_template_part( 'template-parts/blog-card' );
			};
			wp_reset_query() ?>
        </div>
        <div class="text-center">
			<?
			$term_id = pll_get_term( 1, $lang );
			$blog    = get_term( $term_id );
			?>
            <a href="<?= get_term_link( $blog ) ?>" class="button btn-pink"><? pll_e( 'Еще больше статтей' ) ?></a>
        </div>
        <!--/news-->
    </div>
</section>