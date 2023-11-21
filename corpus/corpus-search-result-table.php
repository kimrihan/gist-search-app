<?php
/**
 * 검색 결과 테이블 생성
 */

?>

<div class="table-container">
  <div class="table-header">
    <h1 class="table-title">검색 결과 <span>(<?php echo $num_rows?>)</span></h1>
    <div class="table-description my-5">
      <ul>
        <?php
        if(isset($_GET['submitc'])) {
        $replce_word_class = str_replace(['\'', ','], ['',', '], $word_class_in_str);
        ?>
        <li><span>코퍼스 :</span><span><?php echo $corpus_type_ko_lang ?></span></li>
        <li><span>품사 :</span><span><?php echo $replce_word_class ?></span></li>
        <li><span>빈도수 :</span><span><?php echo $min_frequency ?> ~ <?php echo $max_frequency ?></span></li>
        <li><span>글자수 :</span><span><?php echo $min_character ?> ~ <?php echo $max_character ?></span></li>
        <li><span>제외 단어 :</span><span><?php echo stripcslashes($exclusion_char) ?></span></li>
        <li><span>제외 빈도수 :</span><span><?php echo $exclusion_min_frequency ?> ~
            <?php echo $exclusion_max_frequency ?></span></li>

        <?php
        } else {          
        ?>

        <li><span>코퍼스 :</span><span><?php echo $corpus_type_ko_lang ?></span></li>
        <li><span>검색어 :</span><span><?php echo stripcslashes($target_word) ?></span></li>
        <li><span>위치 선택 :</span><span><?php echo implode($same_position_tag_arr, ', ') ?></span></li>
        <?php
        }
        ?>
      </ul>
      <button type="button" class="btn btn-danger" id="download-btn" onclick="startDownload();">다운로드
        CSV</button>

    </div>
  </div>
  <div class="corpus-table-wrapper">
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
          <td><?php echo htmlspecialchars($row->morpheme) ?></td>
          <td><?php echo htmlspecialchars($row->word_class) ?></td>
          <td><?php echo htmlspecialchars($row->frequency) ?></td>
          <td><?php echo htmlspecialchars($row->word_cnt) ?></td>
          <td><?php echo $corpus_type_ko_lang ?></td>
        </tr>
        <?php
  }
  ?>
      </tbody>
    </table>
  </div>
</div>