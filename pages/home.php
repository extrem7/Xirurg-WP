<? /* Template Name: Главная */
get_header();
global $lang;
?>
<!--best choice-->
<section class="best-choice bg-blue-light pb-3 pt-5">
    <!--list info-->
    <div class="container">
        <div class="title-icon">
            <img src="<?= path() ?>img/icon/icon-start.png" alt="icon">
            <div class="title-general large-size"><? the_field( 'преимущества-заголовок' ) ?></div>
            <div class="subtitle under-line medium-size"><? the_field( 'преимущества-текст' ) ?></div>
        </div>
        <div class="row mt-5">
	        <?
	        while ( have_rows( 'преимущества' ) ) {
		        the_row();
		        get_template_part( 'template-parts/advantage-card' );
	        } ?>
        </div>
    </div>
</section>
<!--feedback-->
<section class="home-feedback bg-blue pb-5 pt-5">
    <div class="container">
        <div class="text-center">
            <div class="title-general white large-size"><? the_field('форма-заголовок') ?></div>
            <div class="subtitle"><? the_field('форма-текст') ?></div>
        </div>
	    <?= do_shortcode( "[cf7-form cf7key='operation_$lang' html_class='mt-4']" ) ?>
    </div>
</section>
<!--last work-->
<section class="last-works pb-5 pt-5">
    <div class="container">
        <div class="title-icon">
            <img src="<?= path() ?>img/icon/iconall.png" alt="icon">
            <div class="title-general large-size"><? the_field( 'работы-заголовок' ) ?></div>
            <div class="subtitle under-line medium-size"><? the_field( 'работы-текст' ) ?></div>
        </div>
        <!--gallery-->
        <div class="row mt-5">
			<?
			$works = array_merge( get_posts( [
				'posts_per_page' => 4,
				'post_type'      => 'gallery'
			] ), get_posts( [
				'posts_per_page' => 4,
				'post_type'      => 'video'
			] ) );

			foreach ( $works as $post ) {
				get_template_part( 'template-parts/gallery-card' );
			}
			wp_reset_postdata();
			?>
        </div>
    </div>
</section>
<!--last news-->
<section class="last-news bg-blue-light pb-4 pt-5">
    <div class="container">
        <div class="title-icon">
            <img src="<?= path() ?>img/icon/iconnews.png" alt="icon">
            <div class="title-general large-size"><? the_field( 'блог-заголовок' ) ?></div>
            <div class="subtitle under-line medium-size"><? the_field( 'блог-текст' ) ?></div>
        </div>
        <!--news-->
        <div class="row mt-5">
			<?
			$articles = get_posts( [
				'posts_per_page' => 3
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
<!--map-->
<div class="map-frame">
    <script>
        var map = '<? the_field( 'карта' ) ?>';
    </script>
</div>
<!--seo text-->
<div class="container seo-text pt-5 pb-5">
	<?= apply_filters( 'the_content', get_post_field( 'post_content', $id ) ); ?>
</div>
<? get_footer() ?>
