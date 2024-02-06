
<script type="text/javascript">
	function PRINT(pk) {
		win = window.open('informasi/informasi_print.php?pk=' + pk, 'win', 'width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0');
	}
</script>

<script language="JavaScript">
	function buka(url) {
		window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');
	}
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
	$sqlc = "select distinct(`kategori`) from `$tbinformasi` order by `kategori` asc";
	$jumc = getJum($conn, $sqlc);
	if ($jumc < 1) {
		echo "<h1>Maaf data informasi belum tersedia</h1>";
	}
	$arrc = getData($conn, $sqlc);
	foreach ($arrc as $dc) {
		$kategori = $dc["kategori"];
		$sql = "select * from `$tbinformasi` where  `kategori`='$kategori' order by `id_informasi` desc";
				$jum = getJum($conn, $sql);
	?>
		<h3>Data Informasi Kategori <?php echo $kategori. " : $jum Data "; ?>:</h3>
		<div>
			Data Informasi | <img src='ypathicon/print.png' title='PRINT' OnClick="PRINT('<?php echo $kategori; ?>')"> |
			<table class="table table-bordered">
				<tr bgcolor="#cccccc">
					<th width="3%">No</td>
					<th width="7%">Gambar</td>
					<th width="70%">Judul dan Deskripsi Informasi</td>
					<th width="5%">Jenis</td>
					<th width="10%">Status</td>
				</tr>
				<?php
				$no=1;
				if ($jum > 0) {
					$arr = getData($conn, $sql);
					foreach ($arr as $d) {
					$id_informasi = $d["id_informasi"];
						$judul = ucwords($d["judul"]);
						$deskripsi = $d["deskripsi"];
						$gambar = $d["gambar"];
						$id_pengguna = $d["id_pengguna"];
						$pengguna = getPengguna($conn,$d["id_pengguna"]);
						$kategori = $d["kategori"];
						$jenis = $d["jenis"];
						$tanggal = WKTP($d["tanggal"]);
						$jam = $d["jam"];
						$status = $d["status"];
						$keterangan = $d["keterangan"];
						$color = "#dddddd";
						if ($no % 2 == 0) {
							$color = "#eeeeee";
						}
						echo "<tr bgcolor='$color'>
				<td><small>$no</td>
				<td><small><div align='center'>";
					echo"<a href='#' onclick='buka(\"informasi/zoom.php?id=$id_informasi\")'>
					<img src='$YPATH/$gambar' width='40' height='40' /></a> 
					</div>";
				echo"</td> 	
				<td><small><b>$judul |Kode $id_informasi</b>
				<br><small><i>$deskripsi,  PJ (Karang Taruna): $pengguna|$id_pengguna , Tertanggal: $tanggal $jam  Wib
				<td><small>$jenis</td>
				<td><small>$status <small><i>$keterangan</i></small></td>
				</tr>";
						$no++;
					} //for dalam
				} //if
				else {
					echo "<tr><td colspan='6'><blink>Maaf, Data Informasi Belum Tersedia...</blink></td></tr>";
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
