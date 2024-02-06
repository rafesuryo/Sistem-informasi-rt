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
	$TB = $tbkegiatan;
	$item = "Kegiatan";



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
					<th width="3%">Tanggal</td>
					<th width="75%">Nama Kegiatan</td>
					<th width="15%">Keterangan</td>
		</tr>
		<?php
		$jum = getJum($conn, $sql);
		$no = 0;
		if ($jum > 0) {
			$arr = getData($conn, $sql);
			foreach ($arr as $d) {
				$no++;
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
			}
		} //if
		else {
			echo "<tr><td colspan='7'><blink>Maaf, Data $item belum tersedia...</blink></td></tr>";
		}

		echo "</table>";
		?>