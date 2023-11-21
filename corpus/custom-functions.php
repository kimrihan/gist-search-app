<?php


/**
 * 코퍼스 커스텀 functions.php
 * 코퍼스 검색 엔진 템플릿 쇼트코드
 * 코퍼스 검색 결과 템플릿 쇼트코드
 */


define('MIN_FREQUENCY_LITERARY', 0);
define('MAX_FREQUENCY_LITERARY', 776197);
define('MIN_FREQUENCY_COLLOQUIALNESS', 1);
define('MAX_FREQUENCY_COLLOQUIALNESS', 9522);
define('MIN_CHARACTER_NUMBER', 1);
define('MAX_CHARACTER_NUMBER', 39);
define('NUMBER_ROWS_PAGE', 100);
define('NUMBER_DISPLAY_PAGINATION', 10);

include_once( get_stylesheet_directory() . '/corpus/corpus-enqueue-scripts.php');


function korean_corpus_search_shortcode() {
  if(!is_admin()) { 
    include_once( get_stylesheet_directory() . '/corpus/corpus-search-form.php');
  }
}
add_shortcode('korean_corpus_search_engine', 'korean_corpus_search_shortcode');


function korean_corpus_result_shortcode() {
  if(!is_admin()) { 
    include_once( get_stylesheet_directory() . '/corpus/corpus-search-result.php');
  }
}
add_shortcode('korean_corpus_search_result', 'korean_corpus_result_shortcode');