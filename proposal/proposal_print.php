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
	$TB = $tbproposal;
	$item = "Proposal";



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
					<th width="5%">Tanggal</td>
					<th width="5%">Nomor</td>
					<th width="35%">Nama Proposal</td>
					<th width="5%"><label title='Dokumen Pengajuan Proposal'>DocProp</label></td>
					<th width="5%"><label title='Dokumen Jawaban Atas Proposal Yang Masuk'>DocRes</label></td>
					<th width="25%">Catatan</td>
		</tr>
		<?php
		$jum = getJum($conn, $sql);
		$no = 0;
		if ($jum > 0) {
			$arr = getData($conn, $sql);
			foreach ($arr as $d) {
				$no++;
				$id_proposal = $d["id_proposal"];
						$nama_proposal = ucwords($d["nama_proposal"]);
						$deskripsi = $d["deskripsi"];
						$nik = $d["nik"];
						$nama = getWarga($conn,$d["nik"]);
						$id_pengguna = $d["id_pengguna"];
						$pengguna = getPengguna($conn,$d["id_pengguna"]);
						$file_proposal = $d["file_proposal"];
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
						$res="<label title='menunggu proses approval'>-</label>";
						if(strlen($file_jawaban)>5){
							$res="<a href='downloadgetfile.php?file=$file_jawaban' target='_blank'><small>Respon</a>";
						}
						$PJ="-";
						if(strlen($id_pengguna)>3){
							$PJ="PJ: $pengguna |$id_pengguna";
						}
						echo "<tr bgcolor='$color'>
				<td><small>$no</td>
				<td><small>$tanggal<br>$jam</td>
				<td><small>$id_proposal</td>				
				<td><small><b>$nama_proposal</b>
				<br><small>$deskripsi</small>,</td>
				<td><a href='downloadgetfile.php?file=$file_proposal' target='_blank'><small>Proposal</a></td>	
				<td>$res</td>
				<td><small>$jawaban <small><i>$keterangan  $PJ</small></td>
				</tr>";
			}
		} //if
		else {
			echo "<tr><td colspan='7'><blink>Maaf, Data $item belum tersedia...</blink></td></tr>";
		}

		echo "</table>";
		?>