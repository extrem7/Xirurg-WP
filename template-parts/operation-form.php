<?
global $lang;
$doctor = null;
if ( is_single() ) {
	$doctor = get_field( 'врач' );
	if ( ! $doctor ) {
		$cat    = get_the_terms( $id, 'type' )[0];
		$doctor = get_field( 'врач', $cat );
	}
} elseif ( is_tax() ) {
	$doctor = get_field( 'врач', get_queried_object() );
}
if ( ! $doctor ) {
	$doctor = get_posts( [ 'post_type' => 'doctor', 'posts_per_page' => 1 ] )[0]->ID;
} else {
	$doctor = pll_get_post( $doctor, $lang );
}
$img_id    = get_post_thumbnail_id( $doctor );
$image_alt = get_post_meta( $img_id, '_wp_attachment_image_alt', true );
$isSimple  = get_post_type() == 'gallery' || get_post_type() == 'video' || get_page_template_slug() == 'pages/contacts.php';
?>
<? if ( $isSimple ): ?>
    <!--feedback-->
    <div class="bg-blue-light pt-5 pb-5 mt-5">
        <div class="container">
            <div class="personal-form mx-auto">
                <div class="personal-form">
					<? if ( $isSimple ): ?>
                        <div class="title-general large-size text-center"><? the_field( 'форма-заголовок', pll_get_post( 8, $lang ) ) ?></div>
                        <p class="mt-1 text-center"><? the_field( 'форма-текст', pll_get_post( 8, $lang ) ) ?></p>
					<? else: ?>
                        <div class="title-general large-size"><?= pll__( 'Ваш врач:' ) . ' ' . get_the_title( $doctor ) ?></div>
                        <p class="mt-1"><? pll_e( 'Специалист в области данных операций' ) ?></p>
					<? endif; ?>
					<? if ( get_page_template_slug() == 'pages/contacts.php' ) {
						echo do_shortcode( "[cf7-form cf7key='contacts_$lang' html_class='mt-4']" ); } else {
						echo do_shortcode( "[cf7-form cf7key='operation_$lang' html_class='mt-4']" );} ?>
                </div>
            </div>
        </div>
    </div>
<?
else:
	?>
    <!--personal doctor-->
    <section class="bg-blue-light2 personal-feedback">
        <div class="container">
            <div class="d-flex justify-content-center align-items-center pt-3 flex-md-row flex-column">
                <img src="<?= get_the_post_thumbnail_url( $doctor ) ?>" class="img-fluid" alt="<?= $image_alt ?>">
                <div class="personal-form">
                    <div class="title-general large-size"><?= pll__( 'Ваш врач:' ) . ' ' . get_the_title( $doctor ) ?></div>
                    <p class="mt-1"><? pll_e( 'Специалист в области данных операций' ) ?></p>

					<?= do_shortcode( "[cf7-form cf7key='operation_$lang' html_class='mt-4']" ) ?>
                </div>
            </div>
        </div>
    </section>
<? endif; ?>