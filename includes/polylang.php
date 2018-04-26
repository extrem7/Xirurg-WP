<?php

global $lang;
$lang = pll_current_language( 'slug' );

add_action( 'after_setup_theme', function () {
	register_nav_menus( array(
		'header_menu' => 'Хедер',
	) );
} );

function register_strings() {
	pll_register_string( 'Блог фильтр', 'Отфильтровать' );
	pll_register_string( 'Ссылка блог', 'Подробно' );
	/* технические*/
	pll_register_string( 'Пагинация назад', 'Предыдущая' );
	pll_register_string( 'Пагинация вперед', 'Следующая' );
	pll_register_string( 'Предыдущие видео', 'Предыдущие видео' );
	pll_register_string( 'Следующие видео', 'Следующие видео' );
	/* технические*/
	pll_register_string( 'Похожие', 'Интересно знать' );
	pll_register_string( 'Похожие тект', 'узнайте последнюю информацию' );
	pll_register_string( 'Фотогалерея заголовок', 'Фотогалерея наших работ' );
	pll_register_string( 'Операции текст', 'ознакомтесь с результами операций' );
	pll_register_string( 'Видеогалерея заголовок', 'Видеогалерея наших работ' );
	pll_register_string( 'Закрыть', 'Закрыть' );
	/*врачи*/
	pll_register_string( 'Образование', 'Образование' );
	pll_register_string( 'Опыт работы', 'Опыт работы' );
	pll_register_string( 'Ваш врач', 'Ваш врач:' );
	pll_register_string( 'Специалист', 'Специалист в области данных операций' );
	pll_register_string( 'Операция', 'Операция которая вас интересует' );
	/*модалки*/
    pll_register_string( 'Доставка сообщения', 'Ваше сообщение успешно доставлено' );
    pll_register_string( 'Доставка', 'Доставка' );
    /*хлебные крошки*/
	pll_register_string( 'Главная', 'Операции' );
	pll_register_string( 'Операции', 'Операции' );
	pll_register_string( 'Операции', 'Операции' );
	pll_register_string( 'Фотогалерея', 'Фотогалерея' );
	pll_register_string( 'Видеогалерея', 'Видеогалерея' );
	pll_register_string( 'Ошибка 404', 'Ошибка 404' );
	pll_register_string( 'Страница', 'Страница' );
}

add_action( 'init', 'register_strings' );