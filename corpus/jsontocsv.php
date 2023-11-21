<?php

/** 
 * 검색 결과 CSV 파일로 변환 후 다운로드
 */

?>
<script>
function startDownload() {
  const jsonData = [];
  <?php 
    foreach($results_download as $row) {
      ?>
  jsonData.push(<?php echo json_encode($row) ?>)
  <?php
    }
   ?>;

  const headers = Object.keys(jsonData[0]).filter((name) => (name === 'morpheme' || name === 'frequency' || name ===
    'word_class' || name === 'word_cnt')).map((name) => {
    switch (name) {
      case 'morpheme':
        return '검색어';
      case 'frequency':
        return '빈도수';
      case 'word_class':
        return '품사';
      case 'word_cnt':
        return '글자수';
    }
  }).toString();

  const main = jsonData.map((item) => {
    return Object.values(item);
  });

  const modifyMain = main.map((array) => {
    return array.map(item => {
      if (item.includes(',')) {
        return '"' + item + '"';
      } else {
        return item;
      }

    });
  });

  const csv = [headers, ...modifyMain].join('\n');

  startCSVDownload(csv);
}

function startCSVDownload(input) {

  const blob = new Blob([input], {
    type: 'application/csv'
  });
  const url = URL.createObjectURL(blob);

  const a = document.createElement('a');
  a.download = 'corpus-csv.csv';
  a.href = url;
  a.style.display = 'none';

  document.body.appendChild(a);

  a.click();
  a.remove();
  URL.revokeObjectURL(url);
}
</script>