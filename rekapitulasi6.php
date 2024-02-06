<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#examplec').DataTable();
} );
</script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

<div align="right">
	<a href="?mnu=rekapitulasi">Surat</a> | 
	<a href="?mnu=rekapitulasi2">Proposal</a> | 
	<a href="?mnu=rekapitulasi3">Kegiatan</a> | 
	<a href="?mnu=rekapitulasi4">Peserta</a> | 
	<a href="?mnu=rekapitulasi5">Rutinitas</a> | 
	<a href="?mnu=rekapitulasi6">Iuran</a> | 
</div>
<h1>Rekap Data Surat</h1>
<table id="examplec" class="display" style="width:100%">
        <thead>
            <tr>
				<th width="3%">No</td>
					<th width="5%">Struk</td>
					<th width="5%">Tanggal</td>
					<th width="55%">Informasi Iuran</td>
					<th width="13%">Nominal</td>
					<th width="25%">Keterangan</td>
            </tr>
        </thead>
        <tbody>
		<?php
		$no =0;
 $sql = "select * from `$tbiuran` order by `id_iuran` desc";
	$arr=getData($conn,$sql);
		foreach($arr as $d) {	
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
            </tr> ";
		}
		?>
        </tbody>
        <tfoot>
            <tr>
        	<th width="3%">No</td>
				<th width="5%">Struk</td>
					<th width="5%">Tanggal</td>
					<th width="55%">Informasi Iuran</td>
					<th width="13%">Nominal</td>
					<th width="25%">Keterangan</td>
            </tr>
        </tfoot>
    </table>



