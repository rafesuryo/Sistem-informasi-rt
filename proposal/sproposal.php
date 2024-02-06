
<script type="text/javascript">
	function PRINT(pk) {
		win = window.open('proposal/proposal_print.php?pk=' + pk, 'win', 'width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0');
	}
</script>


<link rel="stylesheet" href="jsacordeon/jquery-ui.css">
<link rel="stylesheet" href="resources/demos/style.css">
<script src="jsacordeon/jquery-1.12.4.js"></script>
<script src="jsacordeon/jquery-ui.js"></script>
<script>
	$(function() {
		$("#accordion").accordion({
			collapsible: true
		});
	});
</script>


<div id="accordion">

	<?php //tampilan tabel data
	$sqlc = "select distinct(`status`) from `$tbproposal` order by `status` asc";
	$jumc = getJum($conn, $sqlc);
	if ($jumc < 1) {
		echo "<h1>Maaf data surat belum tersedia</h1>";
	}
	$arrc = getData($conn, $sqlc);
	foreach ($arrc as $dc) {
		$status = $dc["status"];
		$sql = "select * from `$tbproposal` where  `status`='$status' order by `id_proposal` desc";
				$jum = getJum($conn, $sql);
	?>
		<h3>Proposal Status <?php echo $status. " $jum Data "; ?>:</h3>
		<div>
			Data Proposal | <img src='ypathicon/print.png' title='PRINT' OnClick="PRINT('<?php echo $status; ?>')"> |
			<table class="table table-bordered">
				<tr bgcolor="#cccccc">
						<th width="3%">No</td>
					<th width="5%">Tanggal</td>
					<th width="5%">Nomor</td>
					<th width="35%">Nama Proposal</td>
					<th width="5%"><label title='Dokumen Pengajuan Proposal'>PropMasuk</label></td>
					<th width="5%"><label title='Dokumen Jawaban Atas Proposal Yang Masuk'>PropKeluar</label></td>
					<th width="25%">Catatan</td>
			
				</tr>
				<?php
				$no=1;
				if ($jum > 0) {
					$arr = getData($conn, $sql);
					foreach ($arr as $d) {
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
				<td><a href='downloadgetfile.php?file=$file_jawaban' target='_blank'><small>Final</a></td>	
				
				<td><small>$jawaban <small><i>$keterangan  $PJ</small></td>
				</tr>";
						$no++;
					} //for dalam
				} //if
				else {
					echo "<tr><td colspan='6'><blink>Maaf, Data Proposal belum tersedia...</blink></td></tr>";
				}
				?>
			</table>

			<?php
		$jmldata = $jum;
		echo "<p align=center>Total data <b>$jmldata</b> item</p>";

		echo "</div>";
	} //for atas
		?>
		</div>

