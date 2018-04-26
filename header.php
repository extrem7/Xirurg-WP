<!doctype html>
<html lang="<? bloginfo( 'language' ) ?>">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= wp_get_document_title() ?></title>
    <!-- CSS -->
	<? wp_head() ?>
</head>
<body <? body_class() ?>>
<!--Header-->
<? global $lang ?>
<header class="header <?= is_front_page() ? 'header-main' : 'fixed-top' ?>">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="logo">
            <? if(!is_front_page()): ?>
            <a href="<?= home_url() ?>">
            <? endif;?>
                <img src="<?= path() ?>img/logo.png" alt="">
                <div class="logo-text">
                    <? the_field( 'лого-текст', $lang ); ?>
                    <span><? the_field( 'лого-маленький-текст', $lang ); ?></span>
                </div>
            <? if(!is_home()): ?>
            </a>
            <? endif;?>
        </div>
        <button class="mobile-btn" id="mobile-menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <ul class="menu">
			<? wp_nav_menu( [
				'menu'       => 'Хедер',
				'container'  => null,
				'items_wrap' => '%3$s',
				'walker'     => new Bootstrap_Walker_Nav_Menu()
			] ); ?>
        </ul>
    </div>
	<? if ( is_front_page() ): ?>
        <div class="container">
            <div id="doctors-carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
					<?
					$status = true;
					$li     = 0;
					while ( have_rows( 'карусель' ) ) : the_row() ?>
                        <li data-target="#doctors-carousel" data-slide-to="<?= $li ?>"
                            class="<?= $status ? 'active' : '' ?>"></li>
						<?
						$status = false;
						$li ++;
					endwhile; ?>
                </ol>
                <div class="carousel-inner">
					<?
					$status = 'active';
					while ( have_rows( 'карусель' ) ) :
						the_row() ?>
                        <div class="carousel-item <?= $status ?>">
                            <div class="d-flex align-items-center justify-content-center h-100 flex-column-reverse flex-md-row">
                                <img <? the_repeater_image( 'фото' ) ?> class="img-fluid">
                                <div class="carousel-caption">
                                    <div class="name"><? the_sub_field( 'фио' ) ?></div>
                                    <div class="profile"><? the_sub_field( 'описание' ) ?></div>
									<? $link = get_sub_field( 'ссылка' ); ?>
                                    <a href="<?= $link['url'] ?>" target="<?= $link['target'] ?>"
                                       class="button btn-pink fon"><?= $link['title'] ?></a>
                                </div>
                            </div>
                        </div>
						<?
						$status = null;
					endwhile; ?>
                </div>
                <a class="carousel-control-prev" href="#doctors-carousel" role="button" data-slide="prev">
                    <img src="<?= path() ?>img/icon/left-arrow.png" alt="arrow">
                </a>
                <a class="carousel-control-next" href="#doctors-carousel" role="button" data-slide="next">
                    <img src="<?= path() ?>img/icon/right-arrow.png" alt="arrow">
                </a>
            </div>
        </div>
	<? endif; ?>
</header>
<!--Header-->
<? if ( ! is_front_page() ): ?>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
				<? print_breadcrumbs();
				//bcn_display() ?>
            </ol>
        </nav>
    </div>
<? endif; ?>
<!--Content-->
<main class="content" role="main">