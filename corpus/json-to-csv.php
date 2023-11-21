<script src="https://cdn.jsdelivr.net/npm/json2csv"></script>
<script>
function start() {

  const arr = [];
  <?php 
    foreach($results_download as $row) {
      ?>
  arr.push(<?php echo json_encode($row) ?>)
  <?php
    }
   ?>;
  // console.log(typeof arr);
  // console.log(arr);
  // jsonData.forEach((item) => {
  //   delete item.id;
  //   delete item.ratio;
  // })
  // console.dir(arr);
  // console.log(json2csv.parse(arr));
  const chunk = 50000;

  const newArr = splitIntoChunk(arr, chunk);


  console.dir(newArr);
  for (let i = 0; i < newArr.length; i++) {

  }


  startCSVDownload(json2csv.parse(arr));

  // console.log(jsonData);
}

function splitIntoChunk(arr, chunk) {
  // 빈 배열 생성
  const result = [];

  for (index = 0; index < arr.length; index += chunk) {
    let tempArray;
    // slice() 메서드를 사용하여 특정 길이만큼 배열을 분리함
    tempArray = arr.slice(index, index + chunk);
    // 빈 배열에 특정 길이만큼 분리된 배열을 추가
    result.push(tempArray);
  }

  return result;
}

function startCSVDownload(csvData) {

  const element = document.createElement('a');

  element.setAttribute(
    'href',
    `data:text/csv;charset=utf-8, ${csvData}`
  );
  element.setAttribute('download', 'corpus-result.csv');
  element.style.display = 'none';

  document.body.appendChild(element);
  element.click();
  document.body.removeChild(element);
}
</script>