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
?>
