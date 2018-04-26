<? get_header();
global $lang;
?>
<div class="container">
    <div class="title-icon">
        <img src="<?= path() ?>img/icon/iconnews.png" alt="">
		<?
		$term_id = pll_get_term( 1, $lang );
		$blog    = get_term( $term_id );
		?>
        <div class="title-general large-size"><?= $blog->name ?></div>
        <div class="subtitle under-line medium-size"><?= $blog->description ?></div>
    </div>
</div>
<!--filter-->
<div class="filter bg-blue-light mt-5 pt-4 pb-4">
    <div class="container d-flex justify-content-center">
		<?
		$categories   = get_term_children( $term_id, 'category' );
		$current_term = get_queried_object()->term_id;
		?>
        <form action="/" class="d-flex flex-sm-row flex-column align-items-center">
            <select name="category" id="category" class="control-form dark xs-margin-no">
				<? foreach ( $categories as $category ):
					$category = get_term( $category );
					?>
                    <option data-href="<?= get_term_link( $category ) ?>"
                            value="<?= $category->term_id ?>" <?= $current_term == $category->term_id ? 'selected disabled' : '' ?>><?= $category->name ?></option>
				<? endforeach; ?>
            </select>
            <button class="button btn-pink xs-margin-top"><? pll_e( 'Отфильтровать' ) ?></button>
        </form>
    </div>
</div>
<div class="container">
    <!--blog-->
    <div class="mt-4">
		<?
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post(); ?>
                <!--item-->
                <article class="blog-item">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="blog-image"
                                 style="background-image: url('<? the_post_thumbnail_url() ?>')"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="blog-title title-general"><? the_title() ?></div>
                            <div class="blog-description"><? the_excerpt() ?></div>
                            <a href="<? the_permalink() ?>" class="button btn-ciant"><? pll_e( 'Подробно' ) ?></a>
                        </div>
                    </div>
                </article>
                <!--item-->
			<?
			endwhile;
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
    </div>
</div>
<? get_footer() ?>
