
<script type="text/javascript">
	function PRINT(pk) {
		win = window.open('warga/warga_print.php?pk=' + pk, 'win', 'width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0');
	}
</script>

<script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal_lahir").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script> 


<link rel="stylesheet" href="jsacordeon/jquery-ui.css">
<link rel="stylesheet" href="resources/demos/style.css">
<script src="jsacordeon/jquery-1.12.4.js"></script>
<script src="jsacordeon/jquery-ui.js"></script>
<script>
	$(function() {
		$("#accordion").accordion({
			collapsible: true
		});
	});
</script>



<div id="accordion">


	<?php
	$sqlc = "select distinct(`status`) from `$tbwarga` order by `status` asc";
	$jumc = getJum($conn, $sqlc);
	if ($jumc < 1) {
		echo "<h1>Maaf data warga belum tersedia</h1>";
	}
	$arrc = getData($conn, $sqlc);
	foreach ($arrc as $dc) {
		$status = $dc["status"];
		$sql = "select * from `$tbwarga` where  `status`='$status' order by `nik` desc";
				$jum = getJum($conn, $sql);
	?>
		<h3>Warga Status <?php echo $status. " :$jum Data "; ?>:</h3>
		<div>
		 Warga Status <?php echo $status;?> |<img src='ypathicon/print.png' title='PRINT' OnClick="PRINT('<?php echo $status; ?>')"> |
			<table class="table table-bordered">
				<tr bgcolor="#cccccc">
				    <th width="3%">No</td>
					<th width="5%">NIK</td>
					<th width="15%">Nama Warga</td>
					<th width="15%">TGL-Lahir</td>
					<th width="10%">JKelamin</td>
					<th width="25%">Alamat</td>
					<th width="8%">Agama</td>
					<th width="7%">Status</td>
				</tr>
				<?php
				$no=1;
				if ($jum > 0) {
					$arr = getData($conn, $sql);
					foreach ($arr as $d) {
						$nik = $d["nik"];
						$nama_warga= $d["nama_warga"];
						$jenis_kelamin= $d["jenis_kelamin"];
						$tanggal_lahir= WKT($d["tanggal_lahir"]);
						$agama= $d["agama"];
						$alamat= $d["alamat"];
						$telepon= $d["telepon"];
						$status_perkawinan= $d["status_perkawinan"];
						$status= $d["status"];
						$keterangan= $d["keterangan"];

						$color = "#fff";
						if ($no % 2 == 0) {
							$color = "#eeeeee";
						}
						echo "<tr bgcolor='$color'>
				<td><small>$no</td>
				<td><small>$nik</td>
				<td><small><a href='mailto:$nama_warga'>$nama_warga </a></td>
				<td><small>$tanggal_lahir</td>	
				<td><small>$jenis_kelamin</td>	
				<td><small>$alamat</td>
				<td><small>$agama</td>	
				<td><small>$status_perkawinan</td>	
			</tr>";
						$no++;
					} //for dalam
				} //if
				else {
					echo "<tr><td colspan='6'><blink>Maaf, Data warga belum tersedia...</blink></td></tr>";
				}
				?>
			</table>

		<?php
		$jmldata = $jum;
		echo "<p align=center>Total data <b>$jmldata</b> item</p>";

		echo "</div>";
	} //for atas
		?>
		</div>
