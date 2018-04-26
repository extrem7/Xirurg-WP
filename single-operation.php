<? get_header();
global $lang;
?>
<div class="container">
    <div class="title-icon">
        <img src="<?= path() ?>img/icon/operation.png" alt="">
        <div class="title-general large-size"><? the_title() ?></div>
        <div class="subtitle under-line medium-size"><? pll_e( 'ознакомтесь с результами операций' ) ?></div>
    </div>
    <div class="row mt-5 flex-wrap-reverse flex-lg-wrap">
		<? get_sidebar() ?>
        <div class="col-lg-9">
            <article
                    class="article"><?= apply_filters( 'the_content', get_post_field( 'post_content', $id ) ); ?></article>
        </div>
    </div>
</div>
<?
get_template_part( 'template-parts/operation-form' );
get_template_part( 'template-parts/articles-section' );
get_footer() ?>
