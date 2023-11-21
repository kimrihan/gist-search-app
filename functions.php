<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'hello-elementor','hello-elementor','hello-elementor-theme-style' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

// END ENQUEUE PARENT ACTION


//my scrtip 연결
function gist_fisrt_custom_scripts() {
    wp_register_script( 'gist_first', get_stylesheet_directory_uri() . '/gist_first.js',  array ('jquery'), '1.0.0', true );
    wp_enqueue_script( 'gist_first' ); 
} 
add_action( 'wp_enqueue_scripts', 'gist_fisrt_custom_scripts', 100);

function gist_second_custom_scripts() {
    wp_register_script( 'gist_second', get_stylesheet_directory_uri() . '/gist_second.js',  array ('jquery'), '1.0.0', true );
    wp_enqueue_script( 'gist_second' ); 
} 
add_action( 'wp_enqueue_scripts', 'gist_second_custom_scripts', 100);


include_once( get_stylesheet_directory() . '/corpus/custom-functions.php');

//k-board thumnail
add_filter('kboard_content_get_thumbnail', 'my_kboard_content_get_thumbnail_20191223', 10, 4);
function my_kboard_content_get_thumbnail_20191223($thumbnail_url, $width, $height, $content){
	
	$board = $content->getBoard();
	
	if($board->skin == 'venus-webzine'){ // 게시판 스킨
		if(!$thumbnail_url){
			$thumbnail_url = '/wp-content/uploads/2023/07/gist_thumnail_empty.jpg'; // 이미지 주소 편집
		}
	}
	
	return $thumbnail_url;
}