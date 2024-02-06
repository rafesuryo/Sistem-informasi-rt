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
					<th width="15%">Tanggal</td>
					<th width="25%">Kegiatan</td>
					<th width="10%">NIK</td>
					<th width="20%">Nama Warga</td>
					<th width="55%">Alasan Kepesertaan</td>
					<th width="5%">Status</td>
            </tr>
        </thead>
        <tbody>
		<?php
		$no =0;
 $sql = "select * from `$tbpeserta` order by `id_kegiatan` desc";
	$arr=getData($conn,$sql);
		foreach($arr as $d) {	
		$no++;
				$id_peserta = $d["id_peserta"];
						$id_kegiatan = $d["id_kegiatan"];
						
						$nik = $d["nik"];
						$alasan = $d["alasan"];
						$tanggal = WKTP($d["tanggal"]);
						$jam = $d["jam"];
						$status = $d["status"];
						$keterangan = $d["keterangan"];
						$kegiatan=getKegiatan($conn,$id_kegiatan);
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
				<td><small>$kegiatan</td>
				<td><small>$nik</td>
				<td><small>$nama_warga</td>	
				<td><small><i>$alasan</i></td>
				<td><small>$status <i>$keterangan</i></td>
            </tr> ";
		}
		?>
        </tbody>
        <tfoot>
            <tr>
        	<th width="3%">No</td>
					<th width="15%">Tanggal</td>
					<th width="15%">Kegiatan</td>
					<th width="10%">NIK</td>
					<th width="20%">Nama Warga</td>
					<th width="55%">Alasan Kepesertaan</td>
					<th width="5%">Status</td>
            </tr>
        </tfoot>
    </table>



