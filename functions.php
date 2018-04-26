<?php

require_once 'includes/bootstrap_menu.php';
require_once 'includes/breadcrumbs.php';
require_once 'includes/operations.php';
require_once 'includes/polylang.php';
require_once 'includes/speed_up.php';
//wp setup
remove_action( 'welcome_panel', 'wp_welcome_panel' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'menus' );
show_admin_bar( false );

function sanitize_pagination( $content ) {
	// Remove role attribute
	$content = str_replace( 'role="navigation"', '', $content );

	// Remove h2 tag
	$content = preg_replace( '#<h2.*?>(.*?)<\/h2>#si', '', $content );

	return $content;
}

add_action( 'navigation_markup_template', 'sanitize_pagination' );

//if (is_admin() && isset($_GET['activated']) && $pagenow == "themes.php")
//wp_redirect('admin.php?page=theme-general-settings');
//register css|js
function registerThemeStyles() {
	wp_register_style( 'main', get_template_directory_uri() . '/css/main.css' );
	wp_enqueue_style( 'main' );
}

add_action( 'wp_print_styles', 'registerThemeStyles' );
function registerThemeJs() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', get_template_directory_uri() . '/node_modules/jquery/dist/jquery.min.js' );
	wp_enqueue_script( 'jquery' );
	wp_register_script( 'popper', get_template_directory_uri() . '/node_modules/popper.js/dist/umd/popper.min.js' );
	wp_enqueue_script( 'popper' );
	wp_register_script( 'bootstrap', get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.min.js' );
	wp_enqueue_script( 'bootstrap' );
	wp_register_script( 'jquery-touchswipe', get_template_directory_uri() . '/node_modules/jquery-touchswipe/jquery.touchswipe.min.js' );
	wp_enqueue_script( 'jquery-touchswipe' );
	wp_register_script( 'jquery.inputmask', get_template_directory_uri() . '/node_modules/jquery.inputmask/dist/jquery.inputmask.bundle.js' );
	wp_enqueue_script( 'jquery.inputmask' );
	wp_register_script( 'fancybox', get_template_directory_uri() . '/js/jquery.fancybox.min.js' );
	wp_enqueue_script( 'fancybox' );
	/*wp_register_script( 'fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js' );
	wp_enqueue_script( 'fancybox' );*/
	wp_register_script( 'main', get_template_directory_uri() . '/js/main.js' );
	wp_enqueue_script( 'main' );
}

add_action( 'wp_enqueue_scripts', 'registerThemeJs' );
// remove admin-menu links
function remove_menus() {
	remove_menu_page( 'edit-comments.php' );
}

add_action( 'admin_menu', 'remove_menus' );


//cool functions for development
function path() {
	return get_template_directory_uri() . '/';
}

function phoneLink( $phone ) {
	return 'tel:' . preg_replace( '/[^0-9]/', '', $phone );
}

function the_image( $name, $post = null ) {
	if ( $post == null ) {
		global $post;
	}
	echo 'src="' . get_field( $name, $post )['url'] . '" ';
	echo 'alt="' . get_field( $name, $post )['alt'] . '" ';
}

function the_checkbox( $field, $print, $post = null ) {
	if ( $post == null ) {
		global $post;
	}
	echo get_field( $field, $post ) ? $print : null;
}

function the_table( $field, $post = null ) {
	if ( $post == null ) {
		global $post;
	}
	$table = get_field( $field, $post );
	if ( $table ) {
		echo '<table>';
		if ( $table['header'] ) {
			echo '<thead>';
			echo '<tr>';
			foreach ( $table['header'] as $th ) {
				echo '<th>';
				echo $th['c'];
				echo '</th>';
			}
			echo '</tr>';
			echo '</thead>';
		}
		echo '<tbody>';
		foreach ( $table['body'] as $tr ) {
			echo '<tr>';
			foreach ( $tr as $td ) {
				echo '<td>';
				echo $td['c'];
				echo '</td>';
			}
			echo '</tr>';
		}
		echo '</tbody>';
		echo '</table>';
	}
}

function the_link( $field, $post = null, $classes = "" ) {
	if ( $post == null ) {
		global $post;
	}
	$link = get_field( $field, $post );
	if ( $link ) {
		echo "<a ";
		echo "href='{$link['url']}'";
		echo "class='$classes'";
		echo "target='{$link['target']}'>";
		echo $link['title'];
		echo "</a>";
	}
}

function the_repeater_image( $name ) {
	echo 'src="' . get_sub_field( $name )['url'] . '" ';
	echo 'alt="' . get_sub_field( $name )['alt'] . '" ';
}

function pre( $array ) {
	echo "<pre>";
	print_r( $array );
	echo "</pre>";
}

//options page
if ( function_exists( 'acf_add_options_page' ) ) {
	$main = acf_add_options_page( [
		'page_title' => 'Настройки темы',
		'menu_title' => "Настройки темы",
		'menu_slug'  => 'settings_ru',
		'capability' => 'edit_posts',
		'redirect'   => false,
		'position'   => 2,
		'icon_url'   => 'dashicons-admin-customizer',
		'post_id'    => 'ru',
	] );
	acf_add_options_sub_page( [
		'page_title'  => 'Налаштування теми',
		'menu_title'  => 'Налаштування теми',
		'parent_slug' => $main['menu_slug'],
		'menu_slug'   => 'settings_ua',
		'post_id'     => 'ua',
	] );
}