<?php
/**
   * 페이지네이션
   * 
   * $start_btn: 각 화면 페이지네이션 버튼 시작 숫자
   * $query_str = 페이지네이션 버튼 이동, URI에 중복 추가 되는 pg 쿼리 스트링 삭제
   *   
   */
 
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