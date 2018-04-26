<? /* Template Name: О нас */
get_header();
global $lang;
?>
<div class="container">
    <div class="title-icon">
        <img src="<?= path() ?>img/icon/abouticon.png" alt="">
        <div class="title-general large-size"><? the_title() ?></div>
        <div class="subtitle under-line medium-size"><? the_field( 'заголовок-маленький' ) ?></div>
    </div>
    <div class="page-static mt-4"><?= apply_filters( 'the_content', get_post_field( 'post_content', $id ) ); ?></div>
</div>
<!--list info-->
<div class="bg-blue-light pt-5 mt-5">
    <div class="container">
        <div class="row">
			<?
			while ( have_rows( 'преимущества' ) ) {
				the_row();
				get_template_part( 'template-parts/advantage-card' );
			} ?>
        </div>
    </div>
</div>
<!--doctor pages-->
<div class="container">
    <div class="row mt-5">
		<?
		$doctors = get_posts( [
			'post_type' => 'doctor'
		] );
		foreach ( $doctors as $post ):?>
            <div class="col-lg-6 col-md-6">
                <div class="doctor">
                    <div class="doctor-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="doctor-name">
                                <div class="title-general regular-weight large-size"><? the_title() ?></div>
                                <div class="subtitle large-size"><? the_field( 'описание' ) ?></div>
                            </div>
                            <div class="doctor-avatar">
                                <img <? the_image( 'иконка' ) ?>>
                            </div>
                        </div>
                    </div>
                    <div class="doctor-body">
                        <div class="doctor-section">
                            <div class="section-title"><? pll_e( 'Образование' ) ?></div>
							<?
							while ( have_rows( 'образование' ) ) :
								the_row(); ?>
                                <div class="section-item d-flex">
                                    <div class="subtitle large-size"><? the_sub_field( 'время' ) ?></div>
                                    <p><? the_sub_field( 'текст' ) ?></p>
                                </div>
							<? endwhile; ?>
                        </div>
                        <div class="doctor-section">
                            <div class="section-title"><? pll_e( 'Опыт работы' ) ?></div>
							<?
							while ( have_rows( 'работа' ) ) :
								the_row(); ?>
                                <div class="section-item">
                                    <div class="subtitle large-size"><? the_sub_field( 'время' ) ?></div>
                                    <p><? the_sub_field( 'текст' ) ?></p>
                                </div>
							<? endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
		<? endforeach; ?>
    </div>
</div>
<? get_footer() ?>
