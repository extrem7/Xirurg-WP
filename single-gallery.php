<? get_header();
global $lang;
?>
<div class="container">
    <!--gallery-page-->
    <div class="row gallery">
        <div class="col-lg-7 gallery-preview">
            <div class="d-flex flex-column justify-content-center h-100">
                <div class="gallery-photo" style="background-image: url('<? the_post_thumbnail_url() ?>')"></div>
            </div>
        </div>
        <div class="col-lg-5 gallery-description">
            <div class="d-flex flex-column justify-content-center h-100">
                <div class="title-general medium-size"><? the_title() ?></div>
                <div class="subtitle large-size mt-3"><?= apply_filters( 'the_content', get_post_field( 'post_content', $id ) ); ?></div>
            </div>
        </div>
    </div>
    <!--preview-->
    <div class="row gallery-list">
		<? $gallery = get_field( 'галерея' );
		foreach ( $gallery as $photo ): ?>
            <div class="col-lg-3 col-md-3 col-sm-6 col-6 gallery-item">
                <a data-fancybox="gallery" class="fancybox" href="<?= $photo['url'] ?>">
                    <div class="gallery-img" style="background-image: url('<?= $photo['url'] ?>')"></div>
                    <div class="overlay">
                        <div class="text"><i class="pe-7s-expand1"></i></div>
                    </div>
                </a>
            </div>
		<? endforeach; ?>
    </div>

</div>
<?
get_template_part( 'template-parts/operation-form' );
get_footer() ?>
