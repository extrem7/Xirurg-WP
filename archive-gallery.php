<? get_header();
$isVideo = get_post_type() == 'video';
?>
<div class="container">
    <div class="title-icon">
        <img src="<?= path() ?>img/icon/iconall.png" alt="icon">
        <div class="title-general large-size"><? ! $isVideo ? pll_e( 'Фотогалерея наших работ' ) : pll_e( 'Видеогалерея наших работ' ) ?></div>
        <div class="subtitle under-line medium-size"><? pll_e( 'ознакомтесь с результами операций' ) ?></div>
    </div>
    <!--gallery-->
    <div class="row mt-5">
		<?
		if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/gallery-card' );
		}
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
		?>
    </div>
	<?
	the_posts_pagination( $args );
	}
	?>
</div>
<? get_footer() ?>
