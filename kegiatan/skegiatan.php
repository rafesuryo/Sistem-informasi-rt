

<script type="text/javascript">
	function PRINT(pk) {
		win = window.open('kegiatan/kegiatan_print.php?pk=' + pk, 'win', 'width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0');
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
	

	<?php //tampilan tabel data
	$sqlc = "select distinct(`kategori`) from `$tbkegiatan` order by `kategori` asc";
	$jumc = getJum($conn, $sqlc);
	if ($jumc < 1) {
		echo "<h1>Maaf Data Surat Belum Tersedia</h1>";
	}
	$arrc = getData($conn, $sqlc);
	foreach ($arrc as $dc) {
		$kategori = $dc["kategori"];
		$sql = "select * from `$tbkegiatan` where  `kategori`='$kategori' order by `id_kegiatan` asc";
		$jum = getJum($conn, $sql);
	?>
		<h3>Kegiatan Kategori <?php echo $kategori . " :$jum Data "; ?>:</h3>
		<div>
			Data Kegiatan | <img src='ypathicon/print.png' title='PRINT' OnClick="PRINT('<?php echo $kategori; ?>')"> |
			<table class="table table-bordered">
				<tr bgcolor="#cccccc">
					<th width="3%">No</td>
					<th width="7%">Gambar</td>
					<th width="3%">Tanggal</td>
					<th width="75%">Nama Kegiatan</td>
					<th width="15%">Keterangan</td>
					
				</tr>
				<?php
				$no = 1;
				if ($jum > 0) {
					$arr = getData($conn, $sql);
					foreach ($arr as $d) {
						$id_kegiatan = $d["id_kegiatan"];
						$nama_kegiatan = ucwords($d["nama_kegiatan"]);
						$deskripsi = $d["deskripsi"];
						$gambar = $d["gambar"];
						$id_pengguna = $d["id_pengguna"];
						$pengguna = getPengguna($conn, $d["id_pengguna"]);
						$kategori = $d["kategori"];
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
						echo "<a href='#' onclick='buka(\"kegiatan/zoom.php?id=$id_kegiatan\")'>
					<img src='$YPATH/$gambar' width='40' height='40' /></a></div>";
						echo "</td> 	
						<td><small>$tanggal $jam</td>
				<td><small><b>$nama_kegiatan</b><br>
				    <i><small>$deskripsi</i></small>, PJ: <small>$pengguna|$id_pengguna</td>
				<td><small>Status $status <i><small>$keterangan</i></small></td>
				</tr>";
						$no++;
					} //for dalam
				} //if
				else {
					echo "<tr><td colspan='6'><blink>Maaf, Data Kegiatan Belum Tersedia...</blink></td></tr>";
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
