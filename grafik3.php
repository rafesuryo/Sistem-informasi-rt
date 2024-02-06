<div align="right">
	<a href="?mnu=grafik">Surat</a> | 
	<a href="?mnu=grafik2">Proposal</a> | 
	<a href="?mnu=grafik3">Kegiatan</a> | 
	<a href="?mnu=grafik4">Peserta</a> | 
	<a href="?mnu=grafik5">Rutinitas</a> | 
	<a href="?mnu=grafik6">Iuran</a> | 
</div>
<hr>

<?php
$sql = "select `status` from `$tbkegiatan` where `kategori` like '%Umum%'";
$jum1 = getJum($conn, $sql)+0;
 $sql = "select `status` from `$tbkegiatan` where `kategori` like '%Karang Taruna%'";
$jum2 = getJum($conn, $sql)+0;


?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
           ['Status', 'Jumlah'],
          ['Umum',     <?php echo $jum1;?>],
          ['Karang Taruna',      <?php echo $jum2;?>]
        ]);

        var options = {
          title: 'Laporan Jenis Kegiatan Umum / Karang Taruna '
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 1300px; height: 500px;"></div>
  </body>
</html>


