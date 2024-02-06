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
$sql = "select `jenis` from `$tbinformasi` where `jenis` like '%Donasi%'";
$jum1 = getJum($conn, $sql);
 $sql = "select `jenis` from `$tbinformasi` where `jenis` like '%Non-Donasi%'";
$jum2 = getJum($conn, $sql);


?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Jenis', 'Jumlah'],
          ['Donasi',     <?php echo $jum1;?>],
          ['Non-Donasi',      <?php echo $jum2;?>]
        ]);

        var options = {
          title: 'Laporan Jenis Kegiatan Rutinitas Donasi dan Non Donasi '
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


