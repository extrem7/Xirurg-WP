<? global $lang ?>
</main>
<!--/Content-->
<!--Footer-->
<footer class="bg-blue">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="d-flex align-items-center justify-content-between flex-column flex-md-row">
                    <div class="logo">
                        <img src="<?= path() ?>img/logo.png" alt="">
                        <div class="logo-text">
                            <? the_field('лого-текст', $lang); ?>
                            <span><? the_field('лого-маленький-текст', $lang); ?></span>
                        </div>
                    </div>
                    <div class="footer-phone">
                        <?
                        $phoneOne = get_field('телефон-1', $lang);
                        $phoneTwo = get_field('телефон-2', $lang);
                        ?>
                        <a href="<?= phoneLink($phoneOne) ?>"><?= $phoneOne ?></a>
                        <a href="<?= phoneLink($phoneTwo) ?>"><?= $phoneTwo ?></a>
                    </div>
                    <address>
                        <? the_field('адрес', $lang); ?>
                    </address>
                </div>
            </div>
            <div class="col-lg-12 text-center mt-3 copyright">
                <div class="subtitle"><? the_field('копирайт', $lang); ?>

                    <? the_link('копирайт-ссылка', $lang) ?></div>
            </div>
        </div>
    </div>
</footer>
<div id="overlay"></div>
<div class="modal" tabindex="-1" role="dialog" id="succesModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title title-general medium-size text-center"><? pll_e('Доставка'); ?></h5>
            </div>
            <div class="modal-body text-center">
                <p><? pll_e('Ваше сообщение успешно доставлено'); ?></p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="button btn-ciant" data-dismiss="modal"><? pll_e('Закрыть'); ?></button>
            </div>
        </div>
    </div>
</div>
<!--/Footer-->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<? wp_footer() ?>
</body>
</html>