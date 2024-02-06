<?php
$pro = "simpan";

$nama_proposal = "";
$deskripsi = "";
$nik = "";
$id_pengguna = "";
$file_proposal = "";
$file_jawaban = "";
$jawaban = "";
$tanggal = "";
$jam = "";
$status = "";
$keterangan = "";
?>

<script type="text/javascript">
	function PRINT(pk) {
		win = window.open('proposal/proposal_print.php?pk=' + pk, 'win', 'width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0');
	}
</script>

<?php 
if($_GET["pro"]=="tambah" || $_GET["pro"]=="ubah" ){ 
?>

<?php
  $sql="select `id_proposal` from `$tbproposal` order by `id_proposal` desc";
  $q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);
  $th=date("y");
  $bl=date("m")+0;if($bl<10){$bl="0".$bl;}

  $kd="PRO".$th.$bl;//KEG1610001
  if($jum > 0){
   $d=mysqli_fetch_array($q);
   $idmax=$d["id_proposal"];
   
   $bul=substr($idmax,5,2);
   $tah=substr($idmax,3,2);
    if($bul==$bl && $tah==$th){
     $urut=substr($idmax,7,3)+1;
     if($urut<10){$idmax="$kd"."00".$urut;}
     else if($urut<100){$idmax="$kd"."0".$urut;}
     else{$idmax="$kd".$urut;}
    }//==
    else{
     $idmax="$kd"."001";
     }   
   }//jum>0
  else{$idmax="$kd"."001";}
  $id_proposal=$idmax;
?>
<?php
$lbl="Tambah Proposal";
if (isset($_GET["pro"]) && $_GET["pro"] == "ubah") {
	$id_proposal = $_GET["kode"];
	$sql = "select * from `$tbproposal` where `id_proposal`='$id_proposal'";
	$d = getField($conn, $sql);
	$id_proposal = $d["id_proposal"];
	$id_proposal0 = $d["id_proposal"];
	$nama_proposal= $d["nama_proposal"];
	$deskripsi = $d["deskripsi"];
	$nik= $d["nik"];
	$id_pengguna = $d["id_pengguna"];
	$file_proposal= $d["file_proposal"];
	$file_proposal0= $d["file_proposal"];
	$final_jawaban= $d["file_jawaban"];
	$final_jawaban0= $d["file_jawaban"];
	$jawaban = $d["jawaban"];
	$tanggal= $d["tanggal"];
	$jam = $d["jam"];
	$status= $d["status"];
	$keterangan= $d["keterangan"];
	$pro = "ubah";
	$lbl="Ubah Data Proposal";
}
?>

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
	<h3><?php echo $lbl ?></h3>
	<div>

		<form action="" method="post" enctype="multipart/form-data">
			<table class="table">
				<tr>
					<th width="15%"><label for="id_proposal">ID Proposal</label>
					<th width="9">:
					<th colspan="2"><b><?php echo $id_proposal; ?></b>
				</tr>

				<tr>
					<td><label for="nama_proposal">Nama Proposal</label>
					<td>:
					<td width="683"><input style="width: 250px;" required name="nama_proposal" class="form-control" type="text" id="nama_proposal" value="<?php echo $nama_proposal; ?>" size="25" />
					</td>
				</tr>

				<tr>
					<td><label for="deskripsi">Deskripsi</label>
					<td>:
					<td width="683"><textarea name="deskripsi" class="form-control" cols="55" rows="2"><?php echo $deskripsi; ?></textarea>
					</td>
				</tr>
 
				<tr>
					<td height="24"><label for="file_proposal">File Proposal</label>
					<td>:
					<td><input style="width: 150px;"  name="file_proposal" class="form-control" type="file" id="file_proposal" value="<?php echo $file_proposal; ?>" size="25" />
					
					</td>
				</tr>

				<tr>
					<td height="24"><label for="file_jawaban">File Jawaban</label>
					<td>:
					<td><input style="width: 350px;"  name="file_jawaban" class="form-control" type="file" id="file_jawaban" value="<?php echo $file_jawaban; ?>" size="25" />
	
					</td>
				</tr>
				
				<tr>
					<td><label for="jawaban">Jawaban/Respon</label>
					<td>:
					<td>
						<textarea name="jawaban" class="form-control" cols="55" rows="2"><?php echo $jawaban; ?></textarea>
					</td>
				</tr>


<?php
if (isset($_GET["pro"]) && $_GET["pro"] == "ubah") {
?>
<tr>
<td><label for="status">Status</label>
<td>:
<td colspan="2">
<input type="radio" name="status" id="status" checked="checked" value="Proses" <?php if ($status == "Proses") {
echo "checked";
} ?> />Proses
<input type="radio" name="status" id="status" value="Disetujui" <?php if ($status == "Disetujui") {
echo "checked";
} ?> />Disetujui
<input type="radio" name="status" id="status" value="Ditolak" <?php if ($status == "Ditolak") {
echo "checked";
} ?> />Ditolak
</td>
</tr>

<tr>
<td height="24"><label for="keterangan">Keterangan</label>
<td>:
<td>
<textarea name="keterangan" class="form-control" cols="55" rows="2"><?php echo $keterangan; ?></textarea>
</td>
</tr>
<?php } ?>
				<tr>
					<td>
					<td>
					<td colspan="2">
						<input name="Simpan" class="btn btn-success" type="submit" id="Simpan" value="Simpan" />
						<input name="pro" type="hidden" id="pro" value="<?php echo $pro; ?>" />
						<input name="file_proposal0" type="hidden" id="file_proposal0" value="<?php echo $file_proposal0; ?>" />
						<input name="final_jawaban0" type="hidden" id="final_jawaban0" value="<?php echo $final_jawaban0; ?>" />
						<input name="id_proposal" type="hidden" id="id_proposal" value="<?php echo $id_proposal; ?>" />
						<input name="id_proposal0" type="hidden" id="id_proposal0" value="<?php echo $id_proposal0; ?>" />
						<a href="?mnu=proposal"><input class="btn btn-danger" name="Batal" type="button" id="Batal" value="Batal" /></a>
					</td>
				</tr>
			</table>
		</form>
	</div>

<?php  
} if(empty($_GET["pro"])){
?>

<div align="right">
<a href='?mnu=proposal&pro=tambah'>
<button type='button' title='tambah' class='btn btn-success btn-sm btn-icon-text mr-1'>
+ Tambah Data</button></a>
</div><br>

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
		<h3>Proposal Status <?php echo $status. " : $jum Data "; ?></h3>
		<div>
			Data Proposal | <img src='ypathicon/print.png' title='PRINT' OnClick="PRINT('<?php echo $status; ?>')"> |
			<table class="table table-bordered">
				<tr bgcolor="#cccccc">
					<th width="3%">No</td>
					<th width="5%">Tanggal</td>
					<th width="5%">Nomor</td>
					<th width="35%">Nama Proposal</td>
					<th width="5%"><label title='Dokumen Pengajuan Proposal'>DocProp</label></td>
					<th width="5%"><label title='Dokumen Jawaban Atas Proposal Yang Masuk'>DocRes</label></td>
					<th width="25%">Catatan</td>
					<th width="13%">Menu</td>
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
				<td><a href='downloadgetfile.php?file=$file_jawaban' target='_blank'><small>Final</a></td>	
				
				<td><small>$jawaban <small><i>$keterangan  $PJ</small></td>
				<td><div align='center'>
<a href='?mnu=proposal&pro=ubah&kode=$id_proposal&nama_proposal=$nama_proposal'><img src='ypathicon/ub.png' title='ubah'></a>
<a href='?mnu=proposal&pro=hapus&kode=$id_proposal&nama_proposal=$nama_proposal'><img src='ypathicon/ha.png' title='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama_proposal pada data proposal ?..\")'></a></div></td>
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

<?php
} //for atas
?>

		<?php //  simpan
		if (isset($_POST["Simpan"])) {
			$pro = strip_tags($_POST["pro"]);
			$id_proposal = strip_tags($_POST["id_proposal"]);
			$nama_proposal = strip_tags($_POST["nama_proposal"]);
			$deskripsi = strip_tags($_POST["deskripsi"]);
			$nik = strip_tags($_POST["nik"]);
			$id_pengguna = strip_tags($_POST["id_pengguna"]);
			$jawaban = strip_tags($_POST["jawaban"]);
			$tanggal = date("Y-m-d");
			$jam = date("H:i:s");

			$file_proposal0 = strip_tags($_POST["file_proposal0"]);
			if ($_FILES["file_proposal"] != "") {

			move_uploaded_file($_FILES["file_proposal"]["tmp_name"], "$YPATH/" . $_FILES["file_proposal"]["name"]);
			$file_proposal = $_FILES["file_proposal"]["name"];
			} else {

			$file_proposal = $file_proposal0;

			}

			if (strlen($file_proposal) < 1) {

			$file_proposal = $file_proposal0;

			}

			$file_jawaban0 = strip_tags($_POST["file_jawaban0"]);
			if ($_FILES["file_jawaban"] != "") {

			move_uploaded_file($_FILES["file_jawaban"]["tmp_name"], "$YPATH/" . $_FILES["file_jawaban"]["name"]);
			$file_jawaban = $_FILES["file_jawaban"]["name"];
			} else {

			$file_jawaban = $file_jawaban0;

			}

			if (strlen($file_jawaban) < 1) {

			$file_jawaban = $file_jawaban0;

			}

//model

			if ($pro == "simpan") {
				$sql = " INSERT INTO `$tbproposal` (
					`id_proposal` ,
					`nama_proposal` ,
					`deskripsi` ,
					`nik` ,
					`id_pengguna` ,
					`file_proposal` ,
					`file_jawaban` ,
					`jawaban` ,
					`tanggal` ,
					`jam` ,
					`status` ,
					`keterangan`
					) VALUES (
					'$id_proposal', 	
					'$nama_proposal',
					'$deskripsi',				
					'$nik',
					'$id_pengguna',
					'$file_proposal', 
					'$file_jawaban',
					'$jawaban',
					'$tanggal',
					'$jam',
					'Aktif',
					'$keterangan'
					)";

				$simpan = process($conn, $sql);
				if ($simpan) {
					echo "<script>alert('Data $nama_proposal berhasil disimpan !');document.location.href='?mnu=proposal';</script>";
				} else {
					echo "<script>alert('Data $nama_proposal gagal disimpan...');document.location.href='?mnu=proposal';</script>";
				}
			} else {
				//update
			$id_proposal0 = strip_tags($_POST["id_proposal0"]);
			$status = strip_tags($_POST["status"]);
			$keterangan = strip_tags($_POST["keterangan"]);
				$sql = "update `$tbproposal` set 
					`nama_proposal`='$nama_proposal',
					`deskripsi`='$deskripsi',
					`nik`='$nik',
					`id_pengguna`='$id_pengguna',
					`file_proposal`='$file_proposal',
					`file_jawaban`='$file_jawaban' ,
					`jawaban`='$jawaban',
					`tanggal`='$tanggal',
					`jam`='$jam',
					`status`='$status',
					`keterangan`='$keterangan'
					 where `id_proposal`='$id_proposal0'";
					 
				$ubah = process($conn, $sql);
				if ($ubah) {
					echo "<script>alert('Data $nama_proposal berhasil diubah !');document.location.href='?mnu=proposal';</script>";
				} else {
					echo "<script>alert('Data $nama_proposal gagal diubah...');document.location.href='?mnu=proposal';</script>";
				}
			} //else simpan
		}
		?>

		<?php //hapus
		if (isset($_GET["pro"]) && $_GET["pro"] == "hapus") {
			$id_proposal = $_GET["kode"];
			$nama_proposal = $_GET["nama_proposal"];
			$sql = "delete from `$tbproposal` where `id_proposal`='$id_proposal'";
			$hapus = process($conn, $sql);
			if ($hapus) {
				echo "<script>alert('Data $nama_proposal berhasil dihapus !');document.location.href='?mnu=proposal';</script>";
			} else {
				echo "<script>alert('Data $nama_proposal gagal dihapus...');document.location.href='?mnu=proposal';</script>";
			}
		}
		?>