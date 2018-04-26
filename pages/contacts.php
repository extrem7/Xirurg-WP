<? /* Template Name: Контакты */
get_header();
global $lang;
?>
<div class="container">
    <div class="title-icon">
        <img src="<?= path() ?>img/icon/icon-start.png" alt="">
        <div class="title-general large-size"><? the_field( 'заголовок' ) ?></div>
        <div class="subtitle under-line medium-size"><? the_field( 'подзаголовок' ) ?></div>
    </div>
    <!--contact info-->
    <div class="row mt-5">
        <div class="col-lg-4 col-sm-6">
            <div class="list-info d-flex align-items-start">
                <img src="<?= path() ?>img/icon/contact-icon-1.png" alt="" class="list-image">
                <div class="list-body">
                    <div class="title-general medium-size mb-2"><? the_field( 'адрес' ) ?></div>
                    <p class="subtitle large-size"><? the_field( 'адрес', $lang ); ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="list-info d-flex align-items-start">
                <img src="<?= path() ?>img/icon/contact-icon.png" alt="" class="list-image">
                <div class="list-body">
                    <div class="title-general medium-size mb-2"><? the_field( 'телефон' ) ?></div>
					<?
					$phoneOne = get_field( 'телефон-1', $lang );
					$phoneTwo = get_field( 'телефон-2', $lang );
					?>
                    <a href="<?= phoneLink( $phoneOne ) ?>"><?= $phoneOne ?></a><br>
                    <a href="<?= phoneLink( $phoneTwo ) ?>"><?= $phoneTwo ?></a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12">
            <div class="list-info d-flex align-items-start">
                <img src="<?= path() ?>img/icon/contact-icon-2.png" alt="" class="list-image">
                <div class="list-body">
                    <div class="title-general medium-size mb-2"><? the_field( 'почта' ) ?></div>
					<? the_field( 'email-лы' ) ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?
get_template_part( 'template-parts/operation-form' );
?>
<!--map-->
<div class="map-frame"><? the_field( 'карта', pll_get_post( 8, $lang ) ) ?></div>
<? get_footer() ?>
