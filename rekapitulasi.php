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
					<th width="10%">Tanggal</td>
					<th width="3%">No-Surat</td>
					<th width="25%">Deskripsi Dan Uraian Surat</td>
					<th width="25%">Nama Warga</td>
					<th width="15%">Jawaban</td>
					<th width="7%">Temp</td>
					<th width="7%">Doc</td>
            </tr>
        </thead>
        <tbody>
		<?php
		$no =0;
 $sql = "select * from `$tbsurat` order by `id_surat` desc";
	$arr=getData($conn,$sql);
		foreach($arr as $d) {	
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
			
				<td><small>Status:$jawaban, <br><small><i>Petugas Kel: $pengguna | $id_pengguna</small></i></td>
			<td><a href='downloadgetfile.php?file=$file_surat' target='_blank'><small>Doc Temp</a></td>	
			<td><a href='downloadgetfile.php?file=$file_jawaban' target='_blank'><small>Doc Jawaban</a></td>	
			
			
				</td>
            </tr> ";
		}
		?>
        </tbody>
        <tfoot>
            <tr>
           <th width="3%">No</td>
					<th width="10%">Tanggal</td>
					<th width="3%">No-Surat</td>
					<th width="25%">Deskripsi Dan Uraian Surat</td>
					<th width="25%">Nama Warga</td>
					<th width="15%">Jawaban</td>
					<th width="7%">Temp</td>
					<th width="7%">Doc</td>
            </tr>
        </tfoot>
    </table>



