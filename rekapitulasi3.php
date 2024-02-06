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
					<th width="3%">Tanggal</td>
					<th width="75%">Nama Kegiatan</td>
					<th width="15%">Keterangan</td>
            </tr>
        </thead>
        <tbody>
		<?php
		$no =0;
 $sql = "select * from `$tbkegiatan` order by `id_kegiatan` desc";
	$arr=getData($conn,$sql);
		foreach($arr as $d) {	
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
            </tr> ";
		}
		?>
        </tbody>
        <tfoot>
            <tr>
         <th width="3%">No</td>
					<th width="7%">Gambar</td>
					<th width="3%">Tanggal</td>
					<th width="75%">Nama Kegiatan</td>
					<th width="15%">Keterangan</td>
            </tr>
        </tfoot>
    </table>



