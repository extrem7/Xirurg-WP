<? get_header();
global $lang;
?>
<div class="container">
    <!--gallery-page-->
    <div class="row gallery">
        <div class="col-lg-7 gallery-preview">
            <div class="d-flex flex-column justify-content-center h-100">
                <div class="gallery-frame">
					<? the_field( 'видео' ) ?>
                </div>
            </div>
        </div>
        <div class="col-lg-5 gallery-description">
            <div class="d-flex flex-column justify-content-center h-100">
                <div class="title-general medium-size"><? the_title() ?></div>
                <div class="subtitle large-size mt-3"><?= apply_filters( 'the_content', get_post_field( 'post_content', $id ) ); ?></div>
            </div>
        </div>
    </div>
    <!--link gallery-->
    <div class="d-flex justify-content-between mt-3 flex-column flex-sm-row">
		<?
		$prev = get_permalink( get_previous_post()->ID );
		$next = get_permalink( get_next_post()->ID );
		if ( $prev && $prev != get_permalink() ):
			?>
            <a href="<?= $prev ?>" class="link-post"><? pll_e('Предыдущие видео') ?></a>
		<?endif;
		if ( $next && $next != get_permalink() ):?>
            <a href="<?= $next ?>" class="link-post right"><? pll_e('Следующие видео') ?></a>
		<? endif; ?>
    </div>
</div>
<?
get_template_part( 'template-parts/operation-form' );
get_footer() ?>
