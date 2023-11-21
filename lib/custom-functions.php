<?php


/**
 * 
 * Custom Functions
 */


define('MIN_FREQUENCY_LITERARY', 0);
define('MAX_FREQUENCY_LITERARY', 776197);
define('MIN_FREQUENCY_COLLOQUIALNESS', 1);
define('MAX_FREQUENCY_COLLOQUIALNESS', 9522);
define('MIN_CHARACTER_NUMBER', 1);
define('MAX_CHARACTER_NUMBER', 39);
define('NUMBER_ROWS_PAGE', 100);
define('NUMBER_DISPLAY_PAGINATION', 10);



function wpt_register_css() {
  /** bootstrap css */
  wp_register_style( 'bootstrap-css', get_stylesheet_directory_uri() . '/lib/css/bootstrap.min.css');
	wp_register_style( 'corpus-css', get_stylesheet_directory_uri() . '/lib/css/corpus-style.css');
  if( is_page('korean-corpus-search-engine') || is_page('korean-corpus-search-display')) {
    wp_enqueue_style('bootstrap-css');
		 wp_enqueue_style('corpus-css');
  } 
}

add_action( 'wp_enqueue_scripts', 'wpt_register_css' );


function wpt_register_scripts() {
  /** bootstrap script */
  wp_register_script( 'bootstrap-js', get_stylesheet_directory_uri() . '/lib/js/bootstrap.bundle.min.js', array('jquery'), '5.2.3', true );
  wp_register_script('corpus-js', get_stylesheet_directory_uri() . '/lib/js/corpus-ui.js', array('jquery'), '1.0.0', true );
  
  if(is_page('korean-corpus-search-engine')) {
    wp_enqueue_script('bootstrap-js');
    wp_enqueue_script('corpus-js');
  }
}
add_action( 'wp_enqueue_scripts', 'wpt_register_scripts' );


function wpc_elementor_shortcode( $atts ) {

  
}
add_shortcode( 'my_elementor_php_output', 'wpc_elementor_shortcode');





function korean_corpus_search_shortcode() {
?>

<div class="corpus-form-radio my-3">
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="corpusSearchForm" value="characteristic"
      id="corpus-search-characteristic">
    <label class="form-check-label" for="corpus-search-characteristic">
      특성 검색
    </label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="corpusSearchForm" value="word" id="corpus-search-word" checked>
    <label class="form-check-label" for="corpus-search-word">
      단어 검색
    </label>
  </div>
</div>

<!-- 특성검색 FORM -->
<form action="/korean-corpus-search-display" method="get" class="corpus-form characteristic">
  <div class="accordion" id="accordion-characteristic">
    <div class="accordion-item">
      <h2 class="accordion-header" id="panelsStayOpen-headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse"
          data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
          코퍼스
        </button>
      </h2>

      <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
        aria-labelledby="panelsStayOpen-headingOne">
        <div class="accordion-body corpus-type-radio">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="ctype" id="corpus-literary" value="corpus_literary"
              checked />
            <label class="form-check-label" for="corpus-literary">
              문어 코퍼스
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="ctype" id="corpus-colloquialness"
              value="corpus_colloquialness" />
            <label class="form-check-label" for="corpus-colloquialness">
              구어 코퍼스
            </label>
            <div class="invalid-feedback">코퍼스는 필수 항목입니다.</div>
          </div>
        </div>
      </div>
    </div>


    <div class="accordion-item">
      <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
          품사
        </button>
      </h2>
      <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
        aria-labelledby="panelsStayOpen-headingTwo">
        <div class="accordion-body checkbox-word-class">
          <div class="form-check">
            <input class="form-check-input corpus_literary" type="checkbox" name="wordC[]" id="uninflected-word"
              value="체언" />
            <label class="form-check-label" for="uninflected-word">
              체언
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input corpus_literary" type="checkbox" name="wordC[]" id="predicate" value="용언" />
            <label class="form-check-label" for="predicate">
              용언
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input corpus_literary" type="checkbox" name="wordC[]" id="determiner"
              value="관형사" />
            <label class="form-check-label" for="determiner">
              관형사
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input corpus_literary" type="checkbox" name="wordC[]" id="adverb" value="부사" />
            <label class="form-check-label" for="adverb">
              부사
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input corpus_literary" type="checkbox" name="wordC[]" id="exclamation"
              value="감탄사" />
            <label class="form-check-label" for="exclamation">
              감탄사
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input corpus_literary" type="checkbox" name="wordC[]" id="postposition"
              value="조사" />
            <label class="form-check-label" for="postposition">
              조사
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input corpus_literary" type="checkbox" name="wordC[]" id="prefinal-ending"
              value="선어말어미" />
            <label class="form-check-label" for="prefinal-ending">
              선어말어미
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input corpus_literary" type="checkbox" name="wordC[]" id="final-ending"
              value="어말어미" />
            <label class="form-check-label" for="final-ending">
              어말어미
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input corpus_literary" type="checkbox" name="wordC[]" id="prefix" value="접두사" />
            <label class="form-check-label" for="prefix">
              접두사
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input corpus_literary" type="checkbox" name="wordC[]" id="suffix" value="접미사" />
            <label class="form-check-label" for="suffix">
              접미사
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input corpus_literary" type="checkbox" name="wordC[]" id="root" value="어근" />
            <label class="form-check-label" for="root">
              어근
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input corpus_literary" type="checkbox" name="wordC[]" id="mark" value="부호" />
            <label class="form-check-label" for="mark">
              부호
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input corpus_literary" type="checkbox" name="wordC[]" id="except-korean-lang"
              value="한글이외" />
            <label class="form-check-label" for="except-korean-lang">
              한글이외
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input corpus_colloquialness" type="checkbox" name="wordC[]" id="spoken" value="어절"
              onclick="return false;" />
            <label class="form-check-label" for="spoken">
              어절
            </label>
          </div>
        </div>
      </div>
    </div>


    <div class="accordion-item">
      <h2 class="accordion-header" id="panelsStayOpen-headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
          aria-controls="panelsStayOpen-collapseThree">
          빈도수
        </button>
      </h2>
      <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
        aria-labelledby="panelsStayOpen-headingThree">
        <div class="accordion-body frequency-value">
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="min-frequency" name="minF" placeholder="min" />
            <label for="min-frequency">최소 빈도</label>
          </div>
          <div class="form-floating">
            <input type="number" class="form-control" id="max-frequency" name="maxF" placeholder="max" />
            <label for="max-frequency">최대 빈도</label>
          </div>
        </div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header" id="panelsStayOpen-headingFour">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false"
          aria-controls="panelsStayOpen-collapseFour">
          글자수
        </button>
      </h2>

      <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse"
        aria-labelledby="panelsStayOpen-headingFour">

        <div class="accordion-body character-number">

          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="min-character" name="minC" placeholder="min" />
            <label for="min-character">최소 글자수</label>
          </div>

          <div class="form-floating">
            <input type="number" class="form-control" id="max-character" name="maxC" placeholder="max" />
            <label for="max-character">최대 글자수</label>
          </div>

        </div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header" id="panelsStayOpen-headingFive">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false"
          aria-controls="panelsStayOpen-collapseFive">
          제외
        </button>
      </h2>

      <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse"
        aria-labelledby="panelsStayOpen-headingFive">
        <div class="accordion-body exclusion-value">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="exclusion-character" name="exC" placeholder="제외 단어" />
            <label for="exclusion-character">제외 단어</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="exclusion-min-frequency" name="exMinF" placeholder="min" />
            <label for="exclusion-min-frequency">최소 빈도</label>
          </div>
          <div class="form-floating">
            <input type="number" class="form-control" id="exclusion-max-frequency" name="exMaxF" placeholder="max" />
            <label for="exclusion-max-frequency">최대 빈도</label>
          </div>
        </div>
      </div>
    </div>
  </div>

  <button class="btn btn-primary" type="submit" name="submitc">
    검색하기
  </button>
</form>

<!-- 단어검색 FORM -->
<form action="/korean-corpus-search-display" method="get" class="corpus-form word">
  <div class="input-group mb-3">
    <input type="text" class="form-control" name="word" placeholder="검색어를 입력해 주세요.">
    <button class="btn btn-outline-secondary" type="submit" name="submitw">검색하기</button>
  </div>

  <div class="accordion" id="accordion-word">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
          aria-expanded="true" aria-controls="collapseOne">
          위치
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
        data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <div class="checkbox-same-position">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="sp[]" id="same-totally" value="totally">
              <label class="form-check-label" for="same-totally">완전일치</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="sp[]" id="same-front" value="front">
              <label class="form-check-label" for="same-front">첫음절 일치</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="sp[]" id="same-last" value="rear">
              <label class="form-check-label" for="same-last">끝음절 일치</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="sp[]" id="same-portion" value="portion">
              <label class="form-check-label" for="same-portion">부분 일치</label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</form>

<?php  
}
add_shortcode('korean_corpus_search_engine', 'korean_corpus_search_shortcode');




function korean_corpus_result_shortcode() {

	if(isset($_GET['submitc']) && isset($_GET['ctype'])) {
    
		global $wpdb;
		
		if(empty($_GET['ctype'])) {
			die('Error: corpus type field is required.');
		}
		
		$corpus_type = $_GET['ctype'];
    $table_name = $wpdb->prefix . $corpus_type;
		$corpus_type_ko_lang = $corpus_type === 'corpus_literary' ? '문어' : '구어';
		
		/**
		 * $word_class_assoc: 각 품사 그룹(key)에 맵핑되는 품사(value) 연관 배열
		 */
		
		$word_class_assoc = array();
		$word_class_assoc['체언'] = ["'고유명사'","'일반명사'","'대명사'","'의존명사'","'수사'"];
		$word_class_assoc['용언'] = ["'동사'","'형용사'","'보조용언'","'긍정지정사'","'부정지정사'"];
		$word_class_assoc['관형사'] = ["'관형사'"];
		$word_class_assoc['부사'] = ["'일반부사'","'접속부사'"];
		$word_class_assoc['감탄사'] = ["'감탄사'"];
		$word_class_assoc['조사'] = ["'주격조사'","'보격조사'","'관형격조사'","'목적격조사'","'부사격조사'","'호격조사'","'인용격조사'","'부조사'","'접속조사'"];
		$word_class_assoc['선어말어미'] =["'선어말어미'"];
		$word_class_assoc['어말어미'] = ["'종결어미'","'연결어미'","'명사형전성어미'","'관형형전성어미'"];
		$word_class_assoc['접두사'] = ["'체언접두사'"];
		$word_class_assoc['접미사'] = ["'명사파생접미사'","'동사파생접미사'","'형용사파생접미사'"];
		$word_class_assoc['어근'] = ["'어근'"];
		$word_class_assoc['부호'] = ["'따옴표, 괄호표, 줄표'","'기타기호(논리수학기호,화폐기호)'","'마침표,물음표,느낌표'","'붙임표(물결,숨김,빠짐)'","'쉼표,가운뎃점,콜론,빗금'","'줄임표'","'분석불능범주'"];
		$word_class_assoc['한글이외'] = ["'외국어,한자,숫자'"];
		$word_class_assoc['어절'] = ["'어절'"];
    
		
		
		/**
		 * 품사 타입 string 생성
		 */

		if(isset($_GET['wordC'])) {
			$word_class = empty($_GET['wordC']) ? NULL : $_GET['wordC'];
		}
		
		if($word_class === NULL) {

			$word_class_in_str = '';
					
		} else {
			
			$word_class_array = array();
			
			foreach($word_class as $value) {
				$word_class_array = array_merge($word_class_array, $word_class_assoc[$value]);
			}
			
			$word_class_in_str = implode($word_class_array, ',');
		
		}
			
		
		$sql_where_array = array(); // WHERE 절 SQL


		/**
		 * 코퍼스 타입 : 구어 
		 * $min_f: 구어 최소 빈도 기본 값
		 * $max_f: 구어 최대 빈도 기본 값
		 * $char_column_name: DB 어절 컬럼 네임 값 할당
		 * $word_c: '어절' -> 어절 변경 후 값 할당
		 */
		if($corpus_type === 'corpus_colloquialness') {
			$min_f = MIN_FREQUENCY_COLLOQUIALNESS;
			$max_f = MAX_FREQUENCY_COLLOQUIALNESS;

			$char_column_name = 'word_segment';

			// $word_c = str_replace('\'','', $word_class_in_str);		
		}

		/**
		 * 코퍼스 타입 : 문어 
		 * $min_f: 문어 최소 빈도 기본 값
		 * $max_f: 문어 최대 빈도 기본 값
		 * $char_column_name: DB 행태소 컬럼 네임 값 할당
		 * $word_class_sql: 선택된 품사 SQL 생성 후 $sql_where_array에 푸시
		 * 
		 */
		if($corpus_type === 'corpus_literary') {
			$min_f = MIN_FREQUENCY_LITERARY;
			$max_f = MAX_FREQUENCY_LITERARY;

			$char_column_name = 'morpheme';
			
			$word_class_sql = "(word_class IN ($word_class_in_str))";
	
			if($word_class_in_str !== '') {
				array_push($sql_where_array, $word_class_sql);
			}

		}
		
		/**
		 * 최소 빈도, 최대 빈도 범위 SQL 생성 후 $sql_where_array에 푸시 
		 */
		if( isset($_GET['minF']) && isset($_GET['maxF']) ) {

			$min_frequency = empty($_GET['minF']) ? $min_f : $_GET['minF'];
			$max_frequency = empty($_GET['maxF']) ? $max_f : $_GET['maxF'];			
	
			$frequency_sql = "(REPLACE(frequency, ',', '') >= $min_frequency AND REPLACE(frequency, ',', '') <= $max_frequency)";
			array_push($sql_where_array, $frequency_sql);  

		}     

		/**
		 * 최소 글자수, 최대 글자수 범위 SQL 생성 후 $sql_where_array에 푸시
		 */
		if( isset($_GET['minC']) && isset($_GET['maxC']) ) {

			$min_character = empty($_GET['minC']) ? MIN_CHARACTER_NUMBER : $_GET['minC'];
			$max_character = empty($_GET['maxC']) ? MAX_CHARACTER_NUMBER : $_GET['maxC'];

			$character_num_sql = "(CHAR_LENGTH(morpheme) >= $min_character AND CHAR_LENGTH(morpheme) <= $max_character)";
			array_push($sql_where_array, $character_num_sql);

		}
	
		/**
		 * 제외 단어 SQL 생성 후 $sql_where_array에 푸시
		 */
		if( isset($_GET['exC']) && !empty($_GET['exC'])) {
        
			$exclusion_char = $_GET['exC'];

			$exclusion_char_sql = "NOT morpheme LIKE '%$exclusion_char%'";
			array_push($sql_where_array, $exclusion_char_sql);

		}

		/**
		 * 제외 최소 빈도, 제외 최대 빈도 범위 SQL 생성 후 $sql_where_array에 푸시
		 */
		if(isset($_GET['exMinF']) && isset($_GET['exMaxF'])) {
			$exclusion_min_frequency = $_GET['exMinF'];        
			$exclusion_max_frequency = $_GET['exMaxF'];

			if( !empty($_GET['exMinF']) &&  !empty($_GET['exMaxF'])) {
								
				$exclusion_frequency_sql = "NOT (REPLACE(frequency, ',', '') >= $exclusion_min_frequency AND REPLACE(frequency, ',', '') <= $exclusion_max_frequency)";
				array_push($sql_where_array, $exclusion_frequency_sql);
			}
		}
	
		

		/**
		 * $sql_where: $sql_where_array을 AND 연산자와 함께 string으로 변환
		 * $num_rows: 조회 결과 행 개수
		 * $total_pages = 전체 페이지 수
		 */
		$sql_where = implode($sql_where_array, ' AND ');
		if(!is_admin()) {
			$num_rows = $wpdb->get_var("SELECT COUNT(*) AS cnt FROM $table_name WHERE $sql_where");
		}	
		$total_pages = ceil($num_rows / NUMBER_ROWS_PAGE);	
	


		/**
		 * 페이지네이션
		 * 
		 * $start_btn: 각 화면 페이지네이션 버튼 시작 숫자
		 * $query_str = 페이지네이션 버튼 이동 시, URI에 쌓이는 'pg=페이지숫자' 제거 
		 *   
		 */
		if(isset($_GET['pg']) && !empty($_GET['pg'])) {
			$page = $_GET['pg'];
		
		} else {
			$page = 1;			
		}
		
		$start_btn = (int)(($page-1) / NUMBER_DISPLAY_PAGINATION) * NUMBER_DISPLAY_PAGINATION + 1;
		
		$query_str = $_SERVER['REQUEST_URI'];
		
		$query_str = preg_replace("/&pg=\d+/", "", $query_str);	
		$query_str = preg_replace("/&dw=+/", "", $query_str);	
		
	
		?>
<ul class="corpus-pagination-container">
  <?php
			
				if($start_btn - 1 >= NUMBER_DISPLAY_PAGINATION) {
					$prev_btn = $start_btn - 1;
					echo '<li class="page-item prev"><a href="'.$query_str.'&pg='.$prev_btn.'" class="text-light"><button class="btn btn-dark btn-sm mx-1 my-3">'.'<'.'</button></a></li>';
				}

				for($btn = $start_btn; $btn < $start_btn + NUMBER_DISPLAY_PAGINATION; $btn++) {
					
					if($btn > $total_pages) {
						break;
					}
					$current_page = (int)$page === $btn ? ' current-page' : '';
					
					echo '<li class="page-item"><a href="'.$query_str.'&pg='.$btn.'" class="text-light"><button class="btn btn-outline-secondary btn-sm mx-1 my-3'.$current_page.'">'.$btn.'</button></a></li>';
				
				}

				if($start_btn + NUMBER_DISPLAY_PAGINATION <= $total_pages) {
					$next_btn = $start_btn + NUMBER_DISPLAY_PAGINATION;
					echo '<li class="page-item next"><a href="'.$query_str.'&pg='.$next_btn.'" class="text-light"><button class="btn btn-dark btn-sm mx-1 my-3">'.'>'.'</button></a></li>';
				}
				
					?>
</ul>
<?php

		$starting_limit = ($page-1) * NUMBER_ROWS_PAGE;

		if(!is_admin()) {
			$results = $wpdb->get_results("SELECT * FROM $table_name AS p JOIN ( SELECT *, CHAR_LENGTH(morpheme) AS word_cnt FROM $table_name WHERE $sql_where LIMIT $starting_limit,". NUMBER_ROWS_PAGE .") AS t ON p.id = t.id");
		}

  
	?>
<div class="table-container">
  <div class="table-header">
    <h1 class="table-title">검색 결과 <span>(<?php echo $num_rows?>)</span></h1>
    <div class="table-description my-5">
      <ul>
        <?php
				$replce_word_class = str_replace(['\'', ','], ['',', '], $word_class_in_str);
				?>
        <li>코퍼스: <span><?php echo $corpus_type_ko_lang ?></span></li>
        <li>품사: <span><?php echo $replce_word_class ?></span></li>
        <li>빈도수: <span><?php echo $min_frequency ?> ~ <?php echo $max_frequency ?></span></li>
        <li>글자수: <span><?php echo $min_character ?> ~ <?php echo $max_character ?></span></li>
        <li>제외 단어: <span><?php echo $exclusion_char ?></span></li>
        <li>제외 빈도수: <span><?php echo $exclusion_min_frequency ?> ~ <?php echo $exclusion_max_frequency ?></span></li>
      </ul>

      <button type="button" class="btn btn-danger" id="download-btn" onclick="start();">CSV 파일 다운로드</button>

    </div>

  </div>
  <table border=1 class="corpus-table">
    <thead>
      <th>검색어</th>
      <th>품사</th>
      <th>빈도수</th>
      <th>글자수</th>
      <th>코퍼스 종류</th>
    </thead>
    <tbody>
      <?php
		foreach($results as $row) {		
	
		?>
      <tr>
        <td><?php echo $row->morpheme ?></td>
        <td><?php echo $row->word_class?></td>
        <td><?php echo $row->frequency ?></td>
        <td><?php echo $row->word_cnt ?></td>
        <td><?php echo $corpus_type_ko_lang ?></td>
      </tr>
      <?php
		}
		?>
    </tbody>
  </table>
</div>



<?php
include_once( get_stylesheet_directory() . '/lib/jsontocsv.php');

	}
}
add_shortcode('korean_corpus_search_result', 'korean_corpus_result_shortcode');


function corpus_word_search_result_shortcode() {

	global $wpdb;
	
	if(isset($_GET['submitw'])) {

		$target_word = htmlspecialchars(trim($_GET['word']));
		$same_position_arr = $_GET['sp'];
		
		$same_position_tag = '';
		$where_sql_arr = array();
		$sql_where = '';
		
		if($target_word) {
			$sql_where = 'WHERE ';
			if($same_position_arr) {
				
				foreach( $same_position_arr as $item) {
					$item = htmlspecialchars(trim($item));
	
					switch($item) {
						case 'totally':
							$same_position_tag .= "<span>완전 일치</span>";
							array_push($where_sql_arr, "morpheme = '$target_word'");	
							break;
						case 'front':
							$same_position_tag .= "<span>첫음절 일치</span>";
							array_push($where_sql_arr, "(morpheme LIKE '$target_word%' AND NOT morpheme ='$target_word')");
							break;
						case 'rear':
							$same_position_tag .= "<span>끝음절 일치</span>";
							array_push($where_sql_arr, "(morpheme LIKE '%$target_word' AND NOT morpheme ='$target_word')");
							break;
						case 'portion':
							$same_position_tag .= "<span>부분 일치</span>";
							array_push($where_sql_arr, "(morpheme LIKE '%$target_word%' AND NOT morpheme ='$target_word')");
							break;
						default:
							
					}
	
				}
					
			} else {
				array_push($where_sql_arr, "morpheme = '$target_word'");
				array_push($where_sql_arr, "(morpheme LIKE '%$target_word%' AND NOT morpheme ='$target_word')");
	
			}

			$sql_where .= implode($where_sql_arr, ' OR ');	
		} else {
			
			die('<h1>검색결과가 없습니다.</h1>');
		}
					




	$literary_table_name = $wpdb->prefix . 'corpus_literary';
	$colloquialness_table_name = $wpdb->prefix . 'corpus_colloquialness';






	if(!is_admin()){
		$num_rows = $wpdb->get_var("SELECT COUNT(*) AS cnt FROM $colloquialness_table_name $sql_where");
	
	}
	$total_pages = ceil($num_rows / NUMBER_ROWS_PAGE);	
	
/**
		 * 페이지네이션
		 * 
		 * $start_btn: 각 화면 페이지네이션 버튼 시작 숫자
		 * $query_str = 페이지네이션 버튼 이동 시, URI에 쌓이는 'pg=페이지숫자' 제거 
		 *   
		 */
		if(isset($_GET['pg']) && !empty($_GET['pg'])) {
			$page = $_GET['pg'];
		
		} else {
			$page = 1;			
		}
		
		$start_btn = (int)(($page-1) / NUMBER_DISPLAY_PAGINATION) * NUMBER_DISPLAY_PAGINATION + 1;
		
		$query_str = $_SERVER['REQUEST_URI'];
		
		$query_str = preg_replace("/&pg=\d+/", "", $query_str);	

		
	
		?>
<ul class="corpus-pagination-container">
  <?php
			
				if($start_btn - 1 >= NUMBER_DISPLAY_PAGINATION) {
					$prev_btn = $start_btn - 1;
					echo '<li class="page-item prev"><a href="'.$query_str.'&pg='.$prev_btn.'" class="text-light"><button class="btn btn-dark btn-sm mx-1 my-3">'.'이전'.'</button></a></li>';
				}

				for($btn = $start_btn; $btn < $start_btn + NUMBER_DISPLAY_PAGINATION; $btn++) {
					
					if($btn > $total_pages) {
						break;
					}
					$current_page = (int)$page === $btn ? ' current-page' : '';
					
					echo '<li class="page-item"><a href="'.$query_str.'&pg='.$btn.'" class="text-light"><button class="btn btn-outline-secondary btn-sm mx-1 my-3'.$current_page.'">'.$btn.'</button></a></li>';
				
				}

				if($start_btn + NUMBER_DISPLAY_PAGINATION <= $total_pages) {
					$next_btn = $start_btn + NUMBER_DISPLAY_PAGINATION;
					echo '<li class="page-item next"><a href="'.$query_str.'&pg='.$next_btn.'" class="text-light"><button class="btn btn-dark btn-sm mx-1 my-3">'.'다음'.'</button></a></li>';
				}
				
					?>
</ul>
<?php

	$starting_limit = ($page-1) * NUMBER_ROWS_PAGE;


	if(!is_admin()) {
		$results = $wpdb->get_results("(SELECT *, CHAR_LENGTH(morpheme) AS word_cnt FROM $colloquialness_table_name $sql_where ) UNION ALL (SELECT *, CHAR_LENGTH(morpheme) AS word_cnt FROM $literary_table_name $sql_where ) LIMIT $starting_limit,".NUMBER_ROWS_PAGE);
	}


	?>
<div class="table-container">
  <div class="table-header">
    <h1 class="table-title">검색 결과 <span></span></h1>
  </div>
  <div class="table-description my-5">

  </div>
  <table border=1 class="corpus-table">
    <thead>
      <th>검색어</th>
      <th>품사</th>
      <th>빈도수</th>
      <th>글자수</th>
      <th>코퍼스 종류</th>
    </thead>
    <tbody>
      <?php
		foreach($results as $row) {
		
			// if($corpus_type === 'corpus_literary') {
			// 	$word_c = $row->word_class;
			// }
		?>
      <tr>
        <td><?php echo $row->morpheme?></td>
        <td><?php echo $row->word_class ?></td>
        <td><?php echo $row->frequency ?></td>
        <td><?php echo $row->word_cnt ?></td>
        <td><?php echo $row->word_class === '어절' ? '구어' : '문어' ?></td>
      </tr>
      <?php
		}
		?>
    </tbody>
  </table>
</div>
<?php
}
}

add_shortcode('corpus_word_search_result', 'corpus_word_search_result_shortcode');