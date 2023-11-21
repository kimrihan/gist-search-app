<script>
const jsonData = <?php echo json_encode($results); ?>;
const headers = Object.keys(jsonData[0]).toString();
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

function start() {
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