<?php
global $wpdb;

/**
 * $page 페이지 번호
 * $starting_limit SQL LIMIT 시작점
 */
if(isset($_GET['pg']) && !empty($_GET['pg'])) {
  $page = trim($_GET['pg']);  
} else {
  $page = 1;			
}
$starting_limit = ($page-1) * NUMBER_ROWS_PAGE;

/**
 * $corpus_type 코퍼스 종류
 * 
 */
if(isset($_GET['ct'])) {
  if(empty($_GET['ct'])) {
    die('Error: corpus type field is required.');
  }
  $corpus_type = trim($_GET['ct']);
  $table_name = $wpdb->prefix . $corpus_type;
  $corpus_type_ko_lang = $corpus_type === 'corpus_literary' ? '문어' : '구어';
  
}

/**
 * 코퍼스 특성검색 
 */
if(isset($_GET['submitc'])) {
   
  /**
   * $word_class_assoc 품사 그룹에 맵핑되는 품사
   */  
  $word_class_assoc = array();
  $word_class_assoc['체언'] = ["'고유명사'","'일반명사'","'대명사'","'의존명사'","'수사'"];
  $word_class_assoc['용언'] = ["'동사'","'형용사'","'보조용언'","'긍정지정사'","'부정지정사'"];
  $word_class_assoc['관형사'] = ["'관형사'"];
  $word_class_assoc['부사'] = ["'일반부사'","'접속부사'"];
  $word_class_assoc['감탄사'] = ["'감탄사'"];
  $word_class_assoc['조사'] = ["'주격조사'","'보격조사'","'관형격조사'","'목적격조사'","'부사격조사'","'호격조사'","'인용격조사'","'보조사'","'접속조사'"];
  $word_class_assoc['선어말어미'] =["'선어말어미'"];
  $word_class_assoc['어말어미'] = ["'종결어미'","'연결어미'","'명사형전성어미'","'관형형전성어미'"];
  $word_class_assoc['접두사'] = ["'체언접두사'"];
  $word_class_assoc['접미사'] = ["'명사파생접미사'","'동사파생접미사'","'형용사파생접미사'"];
  $word_class_assoc['어근'] = ["'어근'"];
  $word_class_assoc['부호'] = ["'따옴표, 괄호표, 줄표'","'기타기호(논리수학기호,화폐기호)'","'마침표,물음표,느낌표'","'붙임표(물결,숨김,빠짐)'","'쉼표,가운뎃점,콜론,빗금'","'줄임표'","'분석불능범주'"];
  $word_class_assoc['한글이외'] = ["'외국어'","'한자'","'숫자'"];
  $word_class_assoc['어절'] = ["'어절'"];
  
  
  
  /**
   * 
   * $word_class_in_str 품사 그룹에 해당하는 품사
   */
  
  if(isset($_GET['wc'])) {
    $word_class = $_GET['wc'];  
  }
  
  $word_class_in_str = '';

  if($word_class) {
    $word_class_array = array();
    
    foreach($word_class as $value) {
      $value =  trim($value);
      $word_class_array = array_merge($word_class_array, $word_class_assoc[$value]);
    }
    
    $word_class_in_str = implode($word_class_array, ',');    
        
  } 
    
  /**
   * $sql_where_array 특성검색 SQL WHERE 절
   */
  
  $sql_where_array = array();


  if($word_class_in_str !== '') {
    $word_class_sql = "(word_class IN ($word_class_in_str))";
    array_push($sql_where_array, $word_class_sql);
  }

 

  /** 
   * $min_f: 최소 빈도 기본 값
   * $max_f: 최대 빈도 기본 값 
   */

  if($corpus_type === 'corpus_colloquialness') {
    $min_f = MIN_FREQUENCY_COLLOQUIALNESS;
    $max_f = MAX_FREQUENCY_COLLOQUIALNESS;
  } else {
    $min_f = MIN_FREQUENCY_LITERARY;
    $max_f = MAX_FREQUENCY_LITERARY;
  }
  
   /**
   * 최소, 최대 빈도 범위 설정
   */
  if( isset($_GET['minF']) && isset($_GET['maxF']) ) {
    
    $min_frequency = empty($_GET['minF']) ? $min_f : trim($_GET['minF']);
    $max_frequency = empty($_GET['maxF']) ? $max_f : trim($_GET['maxF']);
    $frequency_sql = "(REPLACE(frequency, ',', '') >= $min_frequency AND REPLACE(frequency, ',', '') <= $max_frequency)";
    array_push($sql_where_array, $frequency_sql);  

  }     

  /**
   * 최소, 최대 글자수 범위 설정
   */
  if( isset($_GET['minC']) && isset($_GET['maxC']) ) {

    $min_character = empty($_GET['minC']) ? MIN_CHARACTER_NUMBER : trim($_GET['minC']);
    $max_character = empty($_GET['maxC']) ? MAX_CHARACTER_NUMBER : trim($_GET['maxC']);
    $character_num_sql = "(CHAR_LENGTH(morpheme) >= $min_character AND CHAR_LENGTH(morpheme) <= $max_character)";
    array_push($sql_where_array, $character_num_sql);

  }

  /**
   * 제외 단어 설정
   */
  if( isset($_GET['exC']) && !empty($_GET['exC'])) {
 
    $exclusion_char = trim($_GET['exC']);
    $exclusion_char_sql = "NOT morpheme LIKE '%a$exclusion_char%' ESCAPE 'a'";    
    array_push($sql_where_array, $exclusion_char_sql);
  }

  /**
   * 제외 최소, 최대 빈도 범위 설정
   */
  if(isset($_GET['exMinF']) && isset($_GET['exMaxF'])) {
    $exclusion_min_frequency = trim($_GET['exMinF']);        
    $exclusion_max_frequency = trim($_GET['exMaxF']);

    if( !empty($_GET['exMinF']) &&  !empty($_GET['exMaxF'])) {
              
      $exclusion_frequency_sql = "NOT (REPLACE(frequency, ',', '') >= $exclusion_min_frequency AND REPLACE(frequency, ',', '') <= $exclusion_max_frequency)";
      array_push($sql_where_array, $exclusion_frequency_sql);
      
    }
  }

  

  /**
   * $sql_where WHERE 절 다중 조건 AND 연산
   * $num_rows 조회 결과 행 개수
   * $total_pages 전체 페이지 수
   * $results 쿼리 결과
   * $results_download 다운로드 파일 쿼리 결과 
   */
  $sql_where = implode($sql_where_array, ' AND ');


  if(!is_admin()) {
    $query = $wpdb->prepare("SELECT COUNT(*) AS cnt FROM $table_name WHERE $sql_where");
    $num_rows = $wpdb->get_var($query);
    $total_pages = ceil($num_rows / NUMBER_ROWS_PAGE);

    $query = $wpdb->prepare("SELECT p.morpheme,p.frequency,p.word_class, CHAR_LENGTH(p.morpheme) AS word_cnt FROM $table_name AS p JOIN ( SELECT id FROM $table_name WHERE $sql_where LIMIT $starting_limit,". NUMBER_ROWS_PAGE .") AS t ON p.id = t.id");
    $results = $wpdb->get_results($query);

    $query = $wpdb->prepare("SELECT p.morpheme,p.frequency,p.word_class, CHAR_LENGTH(p.morpheme) AS word_cnt FROM $table_name AS p JOIN ( SELECT id FROM $table_name WHERE $sql_where) AS t ON p.id = t.id");
    $results_download = $wpdb->get_results($query);
  }
}

/**
 * 코퍼스 단어검색
 * 
 * $target_word 타겟 검색어
 * $same_position_tag_arr 일치 위치 한글화
 * $where_sql_arr SQL WHERE 배열
 * $sql_where SQL WHERE 문자열
 */

if(isset($_GET['submitw'])) {
 
  $target_word = trim($_GET['word']);  
 
  $same_position_tag_arr = array();
  
  if(isset($_GET['sp'])) {
    $same_position_arr = $_GET['sp'];
  }
  $where_sql_arr = array();
  $sql_where = '';
    
  if($target_word) {
    $sql_where = 'WHERE ';
    if($same_position_arr) {
      
      foreach( $same_position_arr as $item) {
        $item = trim($item);

        switch($item) {
          case 'totally':
            array_push($same_position_tag_arr, '완전 일치');
            array_push($where_sql_arr, "morpheme = '$target_word'");	
            break;
          case 'front':
            array_push($same_position_tag_arr, '첫음절 일치');           
            array_push($where_sql_arr, "(morpheme LIKE 'a$target_word%' ESCAPE 'a' AND NOT morpheme ='$target_word')");
            break;
          case 'rear':           
            array_push($same_position_tag_arr, '끝음절 일치');
            array_push($where_sql_arr, "(morpheme LIKE '%a$target_word' ESCAPE 'a' AND NOT morpheme ='$target_word')");
            break;
          case 'portion':           
            array_push($same_position_tag_arr, '부분 일치');
            array_push($where_sql_arr, "(morpheme LIKE '%a$target_word%' ESCAPE 'a' AND NOT morpheme ='$target_word')");
            break;
          default:
            
        }

      }
        
    } else {
      array_push($where_sql_arr, "morpheme = '$target_word'");
      array_push($where_sql_arr, "(morpheme LIKE '%a$target_word%' ESCAPE 'a' AND NOT morpheme ='$target_word')");

    }

    $sql_where .= implode($where_sql_arr, ' OR ');

  } else {    
    die('<div class="message-container"><p>검색어를 입력해 주세요.</p><a href="/korean-corpus-search-engine" class="btn btn-danger">돌아가기</a></div>');
  }

  if(!is_admin()){
    $query = $wpdb->prepare("SELECT COUNT(*) AS cnt FROM $table_name $sql_where");
    $num_rows = $wpdb->get_var($query);
    $total_pages = ceil($num_rows / NUMBER_ROWS_PAGE);
    
    $query = $wpdb->prepare("SELECT morpheme, frequency, word_class, CHAR_LENGTH(morpheme) AS word_cnt FROM $table_name $sql_where LIMIT $starting_limit,".NUMBER_ROWS_PAGE);
    $results = $wpdb->get_results($query);
  
    $query =  $wpdb->prepare("SELECT morpheme, frequency, word_class, CHAR_LENGTH(morpheme) AS word_cnt FROM $table_name $sql_where");   
    $results_download = $wpdb->get_results($query);
  }
}

if(!is_admin()) {
  include_once(get_stylesheet_directory() . '/corpus/corpus-search-result-table.php');
  include_once( get_stylesheet_directory() . '/corpus/pagination.php');
  include_once( get_stylesheet_directory() . '/corpus/jsontocsv.php');  
}