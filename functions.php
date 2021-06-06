<?php
/**
 * Дочерняя тема для темы magazinenp
 * 
 */

defined( 'ABSPATH' ) || exit;

/**
 * Helper
 */
function show($param){
	echo "<pre>";
	print_r($param);
	echo "</per>";
}

function dol_scripts_style() {

	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'dol-style', get_stylesheet_directory_uri() .'/assets/css/dol.css' );
	wp_enqueue_script( 'dol-script', get_stylesheet_directory_uri() . '/assets/js/dol.js', array(), $theme_version, true );
}
add_action( 'wp_enqueue_scripts', 'dol_scripts_style' );

/** 
 * class Dol
 */

require 'inc/class-dol.php';

/**
 * Регистрация меню для раздела документации в сайтбаре
 */

add_action( 'after_setup_theme', 'school6_register_nav_menu' );
function school6_register_nav_menu() {	

	register_nav_menu( 'document_sitebar', 'Document Side Bar' );

}

/**
 * Банеры для сайтбара (зеленый)
 */ 
require 'inc/sitebar-baners.php';

/**
 * Банеры для сайтбара (синий)
 */ 
require 'inc/sitebar-baners-sky.php';

/**
 * Банеры для сайтбара (желтый)
 */ 
require 'inc/sitebar-baners-sun.php';

/**
 * Банеры для сайтбара (розовый)
 */ 
require 'inc/sitebar-baners-rosa.php';

/**
 * Настройка footer
 */
add_action( 'dol_footer_copyright', 'dol_footer_copyright', 10 );
/**
 * function to show the footer info, copyright information
 */
if ( ! function_exists( 'dol_footer_copyright' ) ) :

	function dol_footer_copyright() {

		$site_link = '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" ><span>' . get_bloginfo( 'name', 'display' ) . '</span></a>';

		$wp_link = '<a href="' . esc_url( 'https://wordpress.org' ) . '" target="_blank" title="' . esc_attr__( 'WordPress', 'accelerate' ) . '" rel="nofollow"><span>' . esc_html__( 'WordPress', 'accelerate' ) . '</span></a>';

		$tg_link = '<a href="' . esc_url( 'https://themegrill.com/themes/accelerate' ) . '" target="_blank" title="' . esc_attr__( 'Accelerate', 'accelerate' ) . '" rel="nofollow"><span>' . esc_html__( 'Accelerate', 'accelerate' ) . '</span></a>';

		$default_footer_value = sprintf( __( 'Copyright &copy; %1$s %2$s. All rights reserved.', 'accelerate' ), date( 'Y' ), $site_link ) . '<br>' . sprintf( esc_html__( 'Theme: %1$s by %2$s.', 'accelerate' ), $tg_link, 'ThemeGrill' ) . ' ' . sprintf( esc_html__( 'Powered by %s.', 'accelerate' ), $wp_link );

		$accelerate_footer_copyright = '<div class="copyright">' . $default_footer_value . '</div>';

		echo $accelerate_footer_copyright;
	

		$dol_link = '<a href="' . esc_url( 'http://vandraren.ru/' ) . '" target="_blank" title="' . esc_attr__( 'VANDRAREN - Разработка web-проектов', 'accelerate' ) . '" rel="nofollow"><span>' . esc_html__( 'VANDRAREN - Разработка web-проектов', 'accelerate' ) . '</span></a>';

		$dol_footer_value = sprintf( __( 'Создание и техническая поддержка сайта: %1$s', 'accelerate' ), $dol_link );

	   	$dol_footer_copyright = '<div class="dol-developer-block">' . $dol_footer_value . '</div>';

		echo $dol_footer_copyright;

	}

endif;

/**
 * Top section
 */

add_action( 'dol_action_top_section', 'dol_top_section', 10 );
/**
 * function to show the footer info, copyright information
 */
if ( ! function_exists( 'dol_top_section' ) ) :

	function dol_top_section() {

		get_template_part( 'inc/top','section' ); 
	}

endif;

/**
 * Объявления для Top section
 */

add_action('init', 'dol_top_section_info');
function dol_top_section_info(){
	$labels = array(
		'name'               => 'Объявление', 
		'singular_name'      => 'Объявления', 
		'add_new'            => 'Добавить новое',
		'add_new_item'       => 'Добавить новое объявление',
		'edit_item'          => 'Редактировать объявление',
		'new_item'           => 'Новое объявление',
		'view_item'          => 'Посмотреть объявление',
		'search_items'       => 'Найти объявление',
		'not_found'          => 'Объявление не найдено',
		'not_found_in_trash' => 'В корзине объявление не найдено',
		'parent_item_colon'  => '',
		'menu_name'          => 'Объявления'
	  );
	 
	  $args = array(
		'labels' => $labels,
		'public' => true, // 
		'show_ui' => true, 
		'has_archive' => true, 
		'menu_icon' => 'dashicons-media-document', 
		'menu_position' => 20, 
		'supports' => array( 'title', 'editor' )
	);	
	register_post_type('top_section_info', $args  );
}
?>
