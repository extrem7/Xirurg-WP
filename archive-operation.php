<? get_header();
global $lang;
?>
<div class="container">
    <div class="title-icon">
        <img src="<?= path() ?>img/icon/operation.png" alt="icon">
        <div class="title-general large-size"><? pll_e( 'Операции' ) ?></div>
        <div class="subtitle under-line medium-size"><? pll_e( 'ознакомтесь с результами операций' ) ?></div>
    </div>
    <!--operations-->
    <div class="row mt-5">
		<?
		$types = get_terms( 'type', [ 'hide_empty' => false] );
		foreach ( $types as $type ):
			$link = get_field( 'ссылка', $type );
			?>
            <!--item-->
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <a class="card-item d-flex flex-column"
                   href="<?= $link ? get_permalink( $link ) : get_term_link( $type ) ?>">
                    <div class="card-item-image d-flex flex-column justify-content-end">
                        <div class="card-item-img"
                             style="background-image: url('<? the_field( 'картинка', $type ) ?>')"></div>
                        <div class="card-item-title d-flex flex-column justify-content-center"><?= $type->name ?></div>
                    </div>
                </a>
            </div>
		<? endforeach; ?>
    </div>
</div>
<? get_footer() ?>
