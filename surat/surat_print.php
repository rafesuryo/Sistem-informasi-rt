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
	$TB = $tbsurat;
	$item = "Surat";



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
					<th width="10%">Tanggal</td>
					<th width="3%">No-Surat</td>
					<th width="25%">Deskripsi Dan Uraian Surat</td>
					<th width="25%">Nama Warga</td>
					<th width="15%">Jawaban</td>
					<th width="7%">Masuk</td>
					<th width="7%">Keluar</td>
		</tr>
		<?php
		$jum = getJum($conn, $sql);
		$no = 0;
		if ($jum > 0) {
			$arr = getData($conn, $sql);
			foreach ($arr as $d) {
				$no++;
					$id_surat = $d["id_surat"];
						$nama_surat = ucwords($d["nama_surat"]);
						$deskripsi = $d["deskripsi"];
						$nik = $d["nik"];
						$warga = getWarga($conn,$d["nik"]);
						$id_pengguna = $d["id_pengguna"];
						$pengguna = getPengguna($conn,$d["id_pengguna"]);
						$file_surat = $d["file_surat"];
						$file_jawaban = $d["file_jawaban"];
						$jawaban = $d["jawaban"];
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
				<td><small>$tanggal  $jam Wib</td>
				<td><small>$id_surat</td>
				<td><small><b>$nama_surat</b><br>
				<small><i>Deskripsi:$deskripsi<small></i> </td/>
				<td><small>$warga  NIK:$nik</td>
			
				<td><small>Status:$jawaban, <br><small><i>Petugas Kel: $pengguna</small></i></td>
			<td><a href='downloadgetfile.php?file=$file_surat' target='_blank'><small>Doc Temp</a></td>	
			<td><a href='downloadgetfile.php?file=$file_jawaban' target='_blank'><small>Doc Jawaban</a></td>	
			
				</tr>";
			}
		} //if
		else {
			echo "<tr><td colspan='7'><blink>Maaf, Data $item belum tersedia...</blink></td></tr>";
		}

		echo "</table>";
		?>