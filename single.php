<? get_header();
global $lang;
?>
<div class="container">
    <div class="title-icon">
        <div class="title-general large-size"><? the_title() ?></div>
		<?
		$smallTitle = get_field( 'краткий-заголовок' );
		if ( ! $smallTitle ) {
			$smallTitle = get_the_category()[0]->description;
		}
		?>
        <div class="subtitle under-line medium-size"><?= $smallTitle ?></div>
    </div>
    <article
            class="article mt-5 mb-5"><?= apply_filters( 'the_content', get_post_field( 'post_content', $id ) ); ?></article>
</div>
<? get_template_part( 'template-parts/articles-section' ) ?>
<? get_footer() ?>
