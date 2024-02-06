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
					<th width="5%">Tanggal</td>
					<th width="5%">Nomor</td>
					<th width="35%">Nama Proposal</td>
					<th width="5%"><label title='Dokumen Pengajuan Proposal'>DocProp</label></td>
					<th width="5%"><label title='Dokumen Jawaban Atas Proposal Yang Masuk'>DocRes</label></td>
					<th width="25%">Catatan</td>
            </tr>
        </thead>
        <tbody>
		<?php
		$no =0;
 $sql = "select * from `$tbproposal` order by `id_proposal` desc";
	$arr=getData($conn,$sql);
		foreach($arr as $d) {	
		$no++;
					$id_proposal = $d["id_proposal"];
						$nama_proposal = ucwords($d["nama_proposal"]);
						$deskripsi = $d["deskripsi"];
						$nik = $d["nik"];
						$nama = getWarga($conn,$nik);
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
				</td>
            </tr> ";
		}
		?>
        </tbody>
        <tfoot>
            <tr>
          <th width="3%">No</td>
					<th width="5%">Tanggal</td>
					<th width="5%">Nomor</td>
					<th width="35%">Nama Proposal</td>
					<th width="5%"><label title='Dokumen Pengajuan Proposal'>DocProp</label></td>
					<th width="5%"><label title='Dokumen Jawaban Atas Proposal Yang Masuk'>DocRes</label></td>
					<th width="25%">Catatan</td>
            </tr>
        </tfoot>
    </table>



