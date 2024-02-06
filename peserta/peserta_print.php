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
	$field = "id_kegiatan";
	$TB = $tbpeserta;
	$item = "Peserta";



	$sql = "select * from `$TB` order by `$field` asc";
	if (isset($_GET["pk"])) {
		$pk = $_GET["pk"];
		$sql = "select * from `$TB` where `$field`='$pk' order by `$field` asc";
	}

	echo "<h3><center>Laporan Data $item ".getKegiatan($conn,$pk)."</h3>";
	?>




	<table width="98%" border="0">
		<tr>
		<th width="3%">No</td>
					<th width="15%">Tanggal</td>
					<th width="10%">NIK</td>
					<th width="20%">Nama Warga</td>
					<th width="55%">Alasan Kepesertaan</td>
					<th width="5%">Status</td>
		</tr>
		<?php
		$jum = getJum($conn, $sql);
		$no = 0;
		if ($jum > 0) {
			$arr = getData($conn, $sql);
			foreach ($arr as $d) {
				$no++;
				$id_peserta = $d["id_peserta"];
						$id_kegiatan = $d["id_kegiatan"];
						
						$nik = $d["nik"];
						$alasan = $d["alasan"];
						$tanggal = WKTP($d["tanggal"]);
						$jam = $d["jam"];
						$status = $d["status"];
						$keterangan = $d["keterangan"];
						
							$sqld = "select * from `tb_warga` where `nik`='$nik'";
							$dd = getField($conn, $sqld);
							$nik = $dd["nik"];
							$nama_warga= $dd["nama_warga"];
							$jenis_kelamin= $dd["jenis_kelamin"];
							$tanggal_lahir= WKT($dd["tanggal_lahir"]);
							$agama= $dd["agama"];
							$alamat= $dd["alamat"];
							$telepon= $dd["telepon"];
						
						
						$color = "#dddddd";
						if ($no % 2 == 0) {
							$color = "#eeeeee";
						}
						echo "<tr bgcolor='$color'>
				<td><small>$no</td>
				<td><small>$tanggal $jam Wib</td>
				<td><small>$nik</td>
				<td><small>$nama_warga</td>	
				<td><small><i>$alasan</i></td>
				<td><small>$status <i>$keterangan</i></td>
				</tr>";
			}
		} //if
		else {
			echo "<tr><td colspan='7'><blink>Maaf, Data $item belum tersedia...</blink></td></tr>";
		}

		echo "</table>";
		?>