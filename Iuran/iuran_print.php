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
	$field = "status";
	$TB = $tbiuran;
	$item = "Iuran";



	$sql = "select * from `$TB` order by `$field` asc";
	if (isset($_GET["pk"])) {
		$pk = $_GET["pk"];
		$sql = "select * from `$TB` where `$field`='$pk' order by `$field` asc";
	}

	echo "<h3><center>Laporan Data $item $pk</h3>";
	?>




	<table width="98%" border="0">
		<tr>
			<th width="3%">No</td>
					<th width="5%">Struk</td>
					<th width="10%">Tanggal</td>
					<th width="55%">Informasi Iuran</td>
					<th width="13%">Nominal</td>
					<th width="25%">Keterangan</td>
					</tr>
				<?php
				$jum = getJum($conn, $sql);
				$no = 0;
				if ($jum > 0) {
					$arr = getData($conn, $sql);
					foreach ($arr as $d) {
						$no++;
						$id_iuran = $d["id_iuran"];
						$id_informasi = $d["id_informasi"];
						$informasi="";
						if (strlen($id_informasi)<5){
							$informasi = "Kegiatan ".getInformasi($conn,$d["id_informasi"]);
						}
						$pesan = $d["pesan"];
						$nik = $d["nik"];
						$nama = getWarga($conn,$d["nik"]);
						$nominal = RP($d["nominal"]);
						$tanggal = WKTP($d["tanggal"]);
						$jam = $d["jam"];
						$bukti_struk = $d["bukti_struk"];
						$status = $d["status"];
						$keterangan = $d["keterangan"];
						$color = "#dddddd";
						if ($no % 2 == 0) {
							$color = "#eeeeee";
						}
						echo "<tr bgcolor='$color'>
				<td><small>$no</td>
				<td><div align='center'>";
					echo"<a href='#' onclick='buka(\"iuran/zoom.php?id=$id_iuran\")'>
					<img src='$YPATH/$bukti_struk' width='40' height='40' /></a></div>";
				echo"</td> 	
				<td><small>$tanggal $jam Wib</td>
				<td><small><b>$pesan</b> $informasi<br>
				<i><small>Nama Warga :</b> $nama |NIK: $nik
				<td><small>Rp. $nominal</td>
				<td><small>$keterangan</td>
				</tr>";
					}
				} //if
				else {
					echo "<tr><td colspan='7'><blink>Maaf, Data $item belum tersedia...</blink></td></tr>";
				}

				echo "</table>";
				?>