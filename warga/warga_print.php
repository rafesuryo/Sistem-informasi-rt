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
	$TB = $tbwarga;
	$item = "Warga";



	$sql = "select * from `$TB` order by `$field` asc";
	if (isset($_GET["pk"])) {
		$pk = $_GET["pk"];
		$sql = "select * from `$TB` where `$field`='$pk' order by `$field` asc";
	}

	echo "<h3><center>Laporan Data $item Status $pk</h3>";
	?>




	<table width="98%" border="0">
		<tr>
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
		$jum = getJum($conn, $sql);
		$no = 0;
		if ($jum > 0) {
			$arr = getData($conn, $sql);
			foreach ($arr as $d) {
				$no++;
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
			}
		} //if
		else {
			echo "<tr><td colspan='7'><blink>Maaf, Data $item belum tersedia...</blink></td></tr>";
		}

		echo "</table>";
		?>