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
					<th width="7%">Gambar</td>
					<th width="70%">Judul dan Deskripsi Informasi</td>
					<th width="5%">Jenis</td>
					<th width="10%">Status</td>
            </tr>
        </thead>
        <tbody>
		<?php
		$no =0;
 $sql = "select * from `$tbinformasi` order by `id_informasi` desc";
	$arr=getData($conn,$sql);
		foreach($arr as $d) {	
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
            </tr> ";
		}
		?>
        </tbody>
        <tfoot>
            <tr>
        	<th width="3%">No</td>
					<th width="7%">Gambar</td>
					<th width="70%">Judul dan Deskripsi Informasi</td>
					<th width="5%">Jenis</td>
					<th width="10%">Status</td>
            </tr>
        </tfoot>
    </table>



