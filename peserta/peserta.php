<?php
$pro = "simpan";

$id_kegiatan = "";
$nik = "";
$alasan = "";
$tanggal = "";
$jam = "";
$status = "";
$keterangan = "";
?>

<script type="text/javascript">
	function PRINT(pk) {
		win = window.open('peserta/peserta_print.php?pk=' + pk, 'win', 'width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0');
	}
</script>

<?php 
if($_GET["pro"]=="tambah" || $_GET["pro"]=="ubah" ){ 
?>


<?php
  $sql="select `id_peserta` from `$tbpeserta` order by `id_peserta` desc";
  $q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);
  $th=date("y");
  $bl=date("m")+0;if($bl<10){$bl="0".$bl;}

  $kd="PST".$th.$bl;//KEG1610001
  if($jum > 0){
   $d=mysqli_fetch_array($q);
   $idmax=$d["id_peserta"];
   
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
  $id_peserta=$idmax;
?>
<?php
$lbl="Tambah Kegiatan";
if (isset($_GET["pro"]) && $_GET["pro"] == "ubah") {
	$id_peserta = $_GET["kode"];
	$sql = "select * from `$tbpeserta` where `id_peserta`='$id_peserta'";
	$d = getField($conn, $sql);
	$id_peserta = $d["id_peserta"];
	$id_peserta0 = $d["id_peserta"];
	$id_kegiatan = $d["id_kegiatan"];
	$nik = $d["nik"];
	$alasan= $d["alasan"];
	$tanggal= $d["tanggal"];
	$jam = $d["jam"];
	$status= $d["status"];
	$keterangan= $d["keterangan"];
	$pro = "ubah";
	$lbl="Ubah Data Peserta";
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
					<td width="15%"><label for="id_peserta">ID Peserta</label>
					<td width="9">:
					<td colspan="2"><b><?php echo $id_peserta; ?></b>
				</tr>

				<tr>
					<td><label for="id_kegiatan">Nama Kegiatan</label>
					<td>:
					<td>
					<select class="form-control" name="id_kegiatan" style="width: 350px;">
					<option value="selected" disabled>-- Pilih --</option>	
						<?php  
						$sql="select * from `$tbkegiatan` where status='Aktif'";
							$arr=getData($conn,$sql);
								foreach($arr as $d) {						
										$id_kegiatan0=$d["id_kegiatan"];
										$nama_kegiatan=ucwords($d["nama_kegiatan"]);
							echo "<option value='$id_kegiatan0'"; if($id_kegiatan0==$id_kegiatan){echo"selected";} echo">$nama_kegiatan ($id_kegiatan0)</option>";
										}
										?>
						</select>
					</td>
				</tr>

				<tr>
					<td><label for="nik">Peserta</label>
					<td>:
					<td>
					<select class="form-control" name="nik" style="width: 350px;">
					<option value="selected" disabled>-- Pilih --</option>	
						<?php  
						$sql="select * from `$tbwarga` where status='Aktif'";
							$arr=getData($conn,$sql);
								foreach($arr as $d) {						
										$nik0=$d["nik"];
										$nama_warga=ucwords($d["nama_warga"]);
							echo "<option value='$nik0'"; if($nik0==$nik){echo"selected";} echo">$nama_warga ($nik0)</option>";
										}
										?>
						</select>
					</td>
				</tr>

				<tr>
					<td><label for="alasan">Catatan</label>
					<td>:
					<td><textarea name="alasan" class="form-control" cols="55" rows="2"><?php echo $alasan; ?></textarea>
					</td>
				</tr>


                 <?php
				 if (isset($_GET["pro"]) && $_GET["pro"] == "ubah") {
				 ?>
<tr>
<td><label for="status">Status</label>
<td>:
<td colspan="2">
<input type="radio" name="status" id="status" value="Proses" <?php if ($status == "Proses") {
echo "checked";
} ?> />Proses
<input type="radio" name="status" id="status" checked="checked" value="Disetujui" <?php if ($status == "Disetujui") {
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
						<input name="id_peserta" type="hidden" id="id_peserta" value="<?php echo $id_peserta; ?>" />
						<input name="id_peserta0" type="hidden" id="id_peserta0" value="<?php echo $id_peserta0; ?>" />
						<a href="?mnu=peserta"><input class="btn btn-danger" name="Batal" type="button" id="Batal" value="Batal" /></a>
					</td>
				</tr>
			</table>
		</form>
	</div>

	<?php  
} if(empty($_GET["pro"])){
?>	

<div align="right">
<a href='?mnu=peserta&pro=tambah'>
<button type='button' title='tambah' class='btn btn-success btn-sm btn-icon-text mr-1'>
+ Tambah Data</button></a>
</div><br>

	<?php //tampilan tabel data
	$sqlc = "select distinct(`id_kegiatan`) from `$tbpeserta` order by `id_kegiatan` desc";
	$jumc = getJum($conn, $sqlc);
	if ($jumc < 1) {
		echo "<h1>Maaf data peserta belum tersedia</h1>";
	}
	$arrc = getData($conn, $sqlc);
	foreach ($arrc as $dc) {
		$id_kegiatan = $dc["id_kegiatan"];
		$kegiatan = getKegiatan($conn,$id_kegiatan);
		$sql = "select * from `$tbpeserta` where  `id_kegiatan`='$id_kegiatan' order by `id_peserta` desc";
				$jum = getJum($conn, $sql);
	?>
		<h3><small>Peserta Kegiatan <?php echo $kegiatan. " :$jum Warga "; ?></small></h3>
		<div>
			Data Peserta | <img src='ypathicon/print.png' title='PRINT' OnClick="PRINT('<?php echo $id_kegiatan; ?>')"> |
			<table class="table table-bordered">
			<tr bgcolor="#cccccc">
					<th width="3%">No</td>
					<th width="15%">Tanggal</td>
					<th width="10%">NIK</td>
					<th width="20%">Nama Warga</td>
					<th width="55%">Alasan Kepesertaan</td>
					<th width="5%">Status</td>
					<th width="13%">Menu</td>
				</tr>
				<?php
				$no=1;
				if ($jum > 0) {
					$arr = getData($conn, $sql);
					foreach ($arr as $d) {
						$id_peserta = $d["id_peserta"];
						$id_kegiatan = $d["id_kegiatan"];
						
						$nik = $d["nik"];
						$alasan = $d["alasan"];
						$tanggal = WKTP($d["tanggal"]);
						$jam = $d["jam"];
						$status = $d["status"];
						$keterangan = $d["keterangan"];
						
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
				<td><small>$nik</td>
				<td><small>$nama_warga</td>	
				<td><small><i>$alasan</i></td>
				<td><small>$status <i>$keterangan</i></td>
				<td><div align='center'>
<a href='?mnu=peserta&pro=ubah&kode=$id_peserta&kegiatan=$kegiatan'><img src='ypathicon/ub.png' title='ubah'></a>
<a href='?mnu=peserta&pro=hapus&kode=$id_peserta&kegiatan=$kegiatan'><img src='ypathicon/ha.png' title='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $kegiatan pada data peserta ?..\")'></a></div></td>
				</tr>";
						$no++;
					} //for dalam
				} //if
				else {
					echo "<tr><td colspan='6'><blink>Maaf, Data Peserta Belum Tersedia...</blink></td></tr>";
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
			$id_peserta = strip_tags($_POST["id_peserta"]);
			$id_kegiatan = strip_tags($_POST["id_kegiatan"]);
			$nik = strip_tags($_POST["nik"]);
			$alasan = strip_tags($_POST["alasan"]);
			$tanggal = date("Y-m-d");
			$jam = date("H:i:s");
			$status = strip_tags($_POST["status"]);
			$keterangan = strip_tags($_POST["keterangan"]);
			$kegiatan = getKegiatan($conn,$d["id_kegiatan"]);

			if ($pro == "simpan") {
				$sql = " INSERT INTO `$tbpeserta` (
					`id_peserta` ,
					`id_kegiatan` ,
					`nik` ,
					`alasan` ,
					`tanggal` ,
					`jam` ,
					`status` ,
					`keterangan`
					) VALUES (
					'$id_peserta' ,
					'$id_kegiatan' ,
					'$nik' ,
					'$alasan' ,
					'$tanggal' ,
					'$jam' ,
					'Aktif' ,
					'$keterangan'
					)";

				$simpan = process($conn, $sql);
				if ($simpan) {
					echo "<script>alert('Data $kegiatan berhasil disimpan !');document.location.href='?mnu=peserta';</script>";
				} else {
					echo "<script>alert('Data $kegiatan gagal disimpan...');document.location.href='?mnu=peserta';</script>";
				}
			} else {
				//update
			$id_kegiatan0 = strip_tags($_POST["id_kegiatan0"]);
				$sql = "update `$tbpeserta` set 
					`id_kegiatan`='$id_kegiatan',
					`nik`='$nik',
					`alasan`='$alasan',
					`tanggal`='$tanggal',
					`jam`='$jam',
					`status`='$status',
					`keterangan`='$keterangan'
					 where `id_peserta`='$id_peserta0'";
					 
				$ubah = process($conn, $sql);
				if ($ubah) {
					echo "<script>alert('Data $kegiatan berhasil diubah !');document.location.href='?mnu=peserta';</script>";
				} else {
					echo "<script>alert('Data $kegiatan gagal diubah...');document.location.href='?mnu=peserta';</script>";
				}
			} //else simpan
		}
		?>

		<?php //hapus
		if (isset($_GET["pro"]) && $_GET["pro"] == "hapus") {
			$id_peserta = $_GET["kode"];
			$kegiatan = $_GET["kegiatan"];
			$sql = "delete from `$tbpeserta` where `id_peserta`='$id_peserta'";
			$hapus = process($conn, $sql);
			if ($hapus) {
				echo "<script>alert('Data $kegiatan berhasil dihapus !');document.location.href='?mnu=peserta';</script>";
			} else {
				echo "<script>alert('Data $kegiatan gagal dihapus...');document.location.href='?mnu=peserta';</script>";
			}
		}
		?>