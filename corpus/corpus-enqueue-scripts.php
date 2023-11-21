<?php

function corpus_register_css() {
  /** bootstrap css */
  wp_register_style( 'bootstrap-css', get_stylesheet_directory_uri() . '/corpus/assets/css/bootstrap.min.css');
	wp_register_style( 'corpus-css', get_stylesheet_directory_uri() . '/corpus/assets/css/corpus-style.css');
 
  if( is_page('korean-corpus-search-engine') || is_page('korean-corpus-search-display')) {
    wp_enqueue_style('bootstrap-css');
		 wp_enqueue_style('corpus-css');
  } 
}
add_action( 'wp_enqueue_scripts', 'corpus_register_css' );

function corpus_register_scripts() {
  /** bootstrap script */
  wp_register_script( 'bootstrap-js', get_stylesheet_directory_uri() . '/corpus/assets/js/bootstrap.bundle.min.js', array('jquery'), '5.2.3', true );
  wp_register_script('corpus-js', get_stylesheet_directory_uri() . '/corpus/assets/js/corpus-ui.js', array('jquery'), '1.0.0', true );
  wp_register_script('corpus-result-js', get_stylesheet_directory_uri() . '/corpus/assets/js/corpus-result.js', array('jquery'), '1.0.0', true );
  if(is_page('korean-corpus-search-engine')) {
    wp_enqueue_script('bootstrap-js');
    wp_enqueue_script('corpus-js');    
  }
  if(is_page('korean-corpus-search-display')) {
    wp_enqueue_script('corpus-result-js');
  }
}
add_action( 'wp_enqueue_scripts', 'corpus_register_scripts' );