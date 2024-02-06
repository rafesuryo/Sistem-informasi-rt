<style type="text/css">
	body {
		width: 100%;
	}
</style>

<body OnLoad="window.print()" OnFocus="window.close()">
	<?php
	include "../konmysqli.php";
	echo "<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
	$YPATH = "../ypathfile/";
	$pk = "";
	$field = "kategori";
	$TB = $tbinformasi;
	$item = "Informasi";

	$sql = "select * from `$TB` order by `$field` asc";
	if (isset($_GET["pk"])) {
		$pk = $_GET["pk"];
		$sql = "select * from `$TB` where `$field`='$pk' order by `$field` asc";
	}

	echo "<h3><center>Laporan Data $item Kategori $pk</h3>";
	?>


	<table width="98%" border="0">
		<tr>
			<th width="3%">No</td>
					<th width="7%">Gambar</td>
					<th width="70%">Judul dan Deskripsi Informasi</td>
					<th width="5%">Jenis</td>
					<th width="10%">Status</td>
		</tr>
		<?php
		$jum = getJum($conn, $sql);
		$no = 0;
		if ($jum > 0) {
			$arr = getData($conn, $sql);
			foreach ($arr as $d) {
				$no++;
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
			}
		} //if
		else {
			echo "<tr><td colspan='7'><blink>Maaf, Data $item belum tersedia...</blink></td></tr>";
		}

		echo "</table>";
		?>