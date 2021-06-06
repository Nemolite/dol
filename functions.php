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

?>
