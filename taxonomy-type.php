<? get_header();
global $lang;
?>
<div class="container">
    <div class="title-icon">
        <div class="title-general large-size"><?= single_cat_title() ?></div>
        <div class="subtitle under-line medium-size"><? pll_e( 'ознакомтесь с результами операций' ) ?></div>
    </div>
    <div class="row mt-5 flex-wrap-reverse flex-lg-wrap">
		<? get_sidebar() ?>
        <div class="col-lg-9">
            <!--operations-->
            <div class="row">
				<?
				if ( have_posts() ) :
				while ( have_posts() ) :
					the_post(); ?>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                        <a class="card-item d-flex flex-column" href="<? the_permalink() ?>">
                            <div class="card-item-image d-flex flex-column justify-content-end">
                                <div class="card-item-img"
                                     style="background-image: url('<? the_post_thumbnail_url() ?>')"></div>
                                <div class="card-item-title d-flex flex-column justify-content-center"><? the_title() ?></div>
                            </div>
                        </a>
                    </div>
				<?
				endwhile; ?>
            </div>
			<?
			$args = [
				'show_all'  => false,
				// показаны все страницы участвующие в пагинации
				'end_size'  => 2,
				// количество страниц на концах
				'mid_size'  => 2,
				// количество страниц вокруг текущей
				'prev_next' => true,
				// выводить ли боковые ссылки "предыдущая/следующая страница".
				'prev_text' => pll__( 'Предыдущая' ),
				'next_text' => pll__( 'Следующая' ),
			];
			the_posts_pagination( $args );
			endif;
			?>
            <!--item-->
        </div>
    </div>
</div>
<?
get_template_part( 'template-parts/operation-form' );
get_template_part( 'template-parts/articles-section' );
get_footer() ?>
