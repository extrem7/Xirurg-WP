<?php
add_action( 'init', 'register_operations' );

function register_operations() {
	register_post_type( 'operation', [
		'labels'        => [
			'name'               => pll__( 'Операции' ), // основное название для типа записи
			'singular_name'      => pll__( 'Операции' ), // название для одной записи этого типа
			'add_new'            => 'Добавить операцию', // для добавления новой записи
			'add_new_item'       => 'Добавление операции', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование операции', // для редактирования типа записи
			'new_item'           => '', // текст новой записи
			'view_item'          => 'Смотреть операцию', // для просмотра записи этого типа.
			'search_items'       => 'Искать операцию', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'menu_name'          => 'Операции', // название меню
		],
		'public'        => true,
		'menu_position' => 4,
		'menu_icon'     => 'dashicons-heart',
		'supports'      => array( 'title', 'editor', 'custom-fields', 'thumbnail' ),
		'has_archive'   => true,
		'rewrite'       => array( 'slug' => 'operations' ),
	] );
	register_post_type( 'doctor', [
		'labels'             => [
			'name'               => 'Врач', // основное название для типа записи
			'singular_name'      => 'Врач', // название для одной записи этого типа
			'add_new'            => 'Добавить врача', // для добавления новой записи
			'add_new_item'       => 'Добавление врача', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование врача', // для редактирования типа записи
			'new_item'           => '', // текст новой записи
			'view_item'          => 'Смотреть врача', // для просмотра записи этого типа.
			'search_items'       => 'Искать врача', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'menu_name'          => 'Врачи', // название меню
		],
		'public'             => true,
		'publicly_queryable' => false,
		'menu_position'      => 3,
		'menu_icon'          => 'dashicons-businessman',
		'supports'           => array( 'title', 'editor', 'custom-fields', 'thumbnail' ),
		'has_archive'        => false,
	] );
	register_taxonomy( 'type', array( 'operation' ), array(
		'label'                 => '',
		// определяется параметром $labels->name
		'labels'                => array(
			'name'              => 'Тип',
			'singular_name'     => 'Тип',
			'search_items'      => 'Искать тип',
			'all_items'         => 'Все типы',
			'view_item '        => 'Смотреть тип',
			'parent_item'       => 'Parent тип',
			'parent_item_colon' => 'Parent тип:',
			'edit_item'         => 'Редактировать тип',
			'update_item'       => 'Обновить тип',
			'add_new_item'      => 'Добавить тип',
			'new_item_name'     => 'Название типов',
			'menu_name'         => 'Тип',
		),
		'description'           => '',
		// описание таксономии
		'public'                => true,
		'publicly_queryable'    => null,
		// равен аргументу public
		'show_in_nav_menus'     => true,
		// равен аргументу public
		'show_ui'               => true,
		// равен аргументу public
		'show_tagcloud'         => true,
		// равен аргументу show_ui
		'show_in_rest'          => null,
		// добавить в REST API
		'rest_base'             => null,
		// $taxonomy
		'hierarchical'          => true,
		'update_count_callback' => '',
		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => null,
		// callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
		'show_admin_column'     => false,
		// Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
		'_builtin'              => false,
		'show_in_quick_edit'    => null,
		// по умолчанию значение show_ui
	) );
}

add_action( 'init', 'register_galleries' );
function register_galleries() {
	register_post_type( 'gallery', [
		'labels'        => [
			'name'               => pll__( 'Фотогалерея' ), // основное название для типа записи
			'singular_name'      => pll__( 'Фотогалерея' ), // название для одной записи этого типа
			'add_new'            => 'Добавить фотогалерею', // для добавления новой записи
			'add_new_item'       => 'Добавление фотогалереи', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование фотогалереи', // для редактирования типа записи
			'new_item'           => '', // текст новой записи
			'view_item'          => 'Смотреть фотогалерею', // для просмотра записи этого типа.
			'search_items'       => 'Искать фотогалерею', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'menu_name'          => 'Фотогалереи', // название меню
		],
		'public'        => true,
		'menu_position' => 5,
		'menu_icon'     => 'dashicons-format-gallery',
		'supports'      => array( 'title', 'editor', 'custom-fields', 'thumbnail', 'excerpt' ),
		'has_archive'   => true,
		'rewrite'       => array( 'slug' => 'gallery' ),
	] );
	register_post_type( 'video', [
		'labels'        => [
			'name'               => pll__( 'Видеогалерея' ), // основное название для типа записи
			'singular_name'      => pll__( 'Видеогалерея' ), // название для одной записи этого типа
			'add_new'            => 'Добавить видеогалерею', // для добавления новой записи
			'add_new_item'       => 'Добавление видеогалереи', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование видеогалереи', // для редактирования типа записи
			'new_item'           => '', // текст новой записи
			'view_item'          => 'Смотреть видеогалерею', // для просмотра записи этого типа.
			'search_items'       => 'Искать видеогалерею', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'menu_name'          => 'Видеогалереи', // название меню
		],
		'public'        => true,
		'menu_position' => 6,
		'menu_icon'     => 'dashicons-video-alt3',
		'supports'      => array( 'title', 'editor', 'custom-fields', 'thumbnail', 'excerpt' ),
		'has_archive'   => true,
		'rewrite'       => array( 'slug' => 'video' ),
	] );
}

/*cf7 select field*/
add_action( 'wpcf7_init', 'operation_select' );
function operation_select() {
	wpcf7_add_form_tag( array( 'operations', 'operations*' ),
		'create_operations_tag', true );
}

function create_operations_tag( $tag ) {

	$tag = new WPCF7_FormTag( $tag );

	if ( empty( $tag->name ) ) {
		return '';
	}

	$customlist = '';
	global $lang;

	$operations = get_field( 'форма-операции', $lang );

	$text = pll__( 'Операция которая вас интересует' );

	$customlist .= sprintf( '<option value="%1$s" selected disabled>%2$s</option>',
		'Default', $text );

	foreach ( $operations as $post ) {
		$post_title = $post->post_title;
		$customlist .= sprintf( '<option value="%1$s">%2$s</option>',
			esc_html( $post_title ), esc_html( $post_title ) );
	}

	wp_reset_query();
	$dark = '';
	if ( ! is_front_page() ) {
		$dark = 'dark';
	}
	$customlist = sprintf(
		'<select name="%1$s" class="control-form %4$s" id="%2$s">%3$s</select>', $tag->name,
		$tag->name . '-options',
		$customlist, $dark );

	return $customlist;
}

/*cf7 select field*/
// define the wpcf7_form_tag callback
function filter_wpcf7_form_tag( $tag, $this_exec ) {
	if ( is_front_page() ) {
		$key = array_search( 'class:dark', $tag['options'], true );
		if ( $key ) {
			unset( $tag['options'][ $key ] );
		}
	}

	return $tag;
}

// add the filter
add_filter( 'wpcf7_form_tag', 'filter_wpcf7_form_tag', 10, 2 );
