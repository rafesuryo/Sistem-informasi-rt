<?php
$pro = "simpan";

$id_iuran = "";
$id_informasi = "";
$pesan = "";
$nik = "";
$nominal = "";
$tanggal = "";
$jam = "";
$bukti_struk = "";
$status = "";
$keterangan = "";
?>

<script type="text/javascript">
	function PRINT(pk) {
		win = window.open('iuran/iuran_print.php?pk=' + pk, 'win', 'width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0');
	}
</script>





<?php 
if($_GET["pro"]=="tambah" || $_GET["pro"]=="ubah" ){ 
?>

<?php
  $sql="select `id_iuran` from `$tbiuran` order by `id_iuran` desc";
  $q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);
  $th=date("y");
  $bl=date("m")+0;if($bl<10){$bl="0".$bl;}

  $kd="IRN".$th.$bl;//KEG1610001
  if($jum > 0){
   $d=mysqli_fetch_array($q);
   $idmax=$d["id_iuran"];
   
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
  $id_iuran=$idmax;
?>

<?php
$lbl="Tambah Data Iuran";
if (isset($_GET["pro"]) && $_GET["pro"] == "ubah") {
	$id_iuran = $_GET["kode"];
	$sql = "select * from `tb_iuran` where `id_iuran`='$id_iuran'";
	$d = getField($conn, $sql);
	$id_iuran = $d["id_iuran"];
	$id_iuran0 = $d["id_iuran"];
	$id_informasi= $d["id_informasi"];
	$pesan= $d["pesan"];
	$nik= $d["nik"];
	$nominal= $d["nominal"];
	$tanggal= $d["tanggal"];
	$jam= $d["jam"];
	$bukti_struk= $d["bukti_struk"];
	$bukti_struk0= $d["bukti_struk"];
	$status= $d["status"];
	$keterangan= $d["keterangan"];
	$pro = "ubah";
	$lbl="Ubah Data warga";
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
					<td width="15%"><label for="id_iuran">ID Iuran</label>
					<td width="9">:
					<td colspan="2"><b><?php echo $id_iuran; ?></b>
				</tr>
				<tr>
					<td><label for="id_informasi">Informasi</label>
					<td>:
					<td>
					<select class="form-control" name="id_informasi" style="width: 350px;">
					<option value="selected" disabled>-- Pilih --</option>	
					<?php  
					$sql="select * from `$tbinformasi` where jenis='Donasi' and status='Aktif'";
						$arr=getData($conn,$sql);
							foreach($arr as $d) {						
									$id_informasi0=$d["id_informasi"];
									$judul=ucwords($d["judul"]);
						echo "<option value='$id_informasi0'"; if($id_informasi0==$id_informasi){echo"selected";} echo">$judul ($id_informasi0)</option>";
									}
									?>
						
					</select>
					</td>
				</tr>

				<tr>
					<td height="24"><label for="pesan">Catatan</label>
					<td>:
					<td>
						<textarea name="pesan" class="form-control" cols="55" rows="2"><?php echo $pesan; ?></textarea>
					</td>
				</tr>

				<tr>
					<td><label for="nik">Warga</label>
					<td>:
					<td width="683">
					<select class="form-control" name="nik" style="width: 250px;">
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
					<td><label for="nominal">Nominal</label>
					<td>:
					<td width="683"><input style="width: 200px;" required name="nominal" class="form-control" type="number" id="nominal" value="<?php echo $nominal; ?>" size="25" />
					</td>
				</tr>

				<tr>
					<td><label for="bukti_struk">Bukti Nota</label>
					<td>:
					<td width="683"><input style="width: 250px;" required name="bukti_struk" class="form-control" type="file" id="bukti_struk" value="<?php echo $bukti_struk; ?>" size="25" />
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
						<input type="radio" name="status" id="status" value="Valid" <?php if ($status == "Valid") {
																								echo "checked";
																							} ?> />Valid
						<input type="radio" name="status" id="status" value="InValid" <?php if ($status == "InValid") {
																								echo "checked";
																							} ?> />InValid
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
						<input name="bukti_struk0" type="hidden" id="bukti_struk0" value="<?php echo $bukti_struk0; ?>" />
						<input name="id_iuran" type="hidden" id="id_iuran" value="<?php echo $id_iuran; ?>" />
						<a href="?mnu=iuran"><input class="btn btn-danger" name="Batal" type="button" id="Batal" value="Batal" /></a>
					</td>
				</tr>
			</table>
		</form>
	</div>

	<?php  
} if(empty($_GET["pro"])){
?>	

<div align="right">
<a href='?mnu=siuran&pro=tambah'>
<button type='button' title='tambah' class='btn btn-success btn-sm btn-icon-text mr-1'>
+ Tambah Data</button></a>
</div><br>

<?php //tampilan tabel data
	$sqlc = "select distinct(`status`) from `$tbiuran` order by `status` desc";
	$jumc = getJum($conn, $sqlc);
	if ($jumc < 1) {
		echo "<h1>Maaf data iuran belum tersedia</h1>";
	}
	$arrc = getData($conn, $sqlc);
	foreach ($arrc as $dc) {
		$status = $dc["status"];
		$sql = "select * from `$tbiuran` where  `status`='$status' order by `id_iuran` asc";
				$jum = getJum($conn, $sql);
	?>
		<h4>Iuran Warga Status <?php echo $status. " $jum Data "; ?>:</h4>
		<div>
			Iuran Warga Status <?php echo $status;?>| <img src='ypathicon/print.png' title='PRINT' OnClick="PRINT('<?php echo $status; ?>')"> |
			<table class="table table-bordered">
				<tr bgcolor="#cccccc">
					<th width="3%">No</td>
					<th width="5%">Struk</td>
					<th width="10%">Tanggal</td>
					<th width="55%">Informasi Iuran</td>
					<th width="13%">Nominal</td>
					<th width="25%">Keterangan</td>
				</tr>
				<?php
				$no=1;
				if ($jum > 0) {
					$arr = getData($conn, $sql);
					foreach ($arr as $d) {
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
				</tr>";
						$no++;
					} //for dalam
				} //if
				else {
					echo "<tr><td colspan='6'><blink>Maaf, Data iuran belum tersedia...</blink></td></tr>";
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
			$id_iuran = strip_tags($_POST["id_iuran"]);
			$id_informasi = strip_tags($_POST["id_informasi"]);
			$pesan = strip_tags($_POST["pesan"]);
			$nik = strip_tags($_POST["nik"]);
			$nominal = strip_tags($_POST["nominal"]);
			$tanggal = date("Y-m-d");
			$jam = date("H:i:s");
			$status = strip_tags($_POST["status"]);
			$keterangan = strip_tags($_POST["keterangan"]);

			$informasi = getInformasi($conn,$d["id_informasi"]);

			$bukti_struk0 = strip_tags($_POST["bukti_struk0"]);
			if ($_FILES["bukti_struk"] != "") {

			move_uploaded_file($_FILES["bukti_struk"]["tmp_name"], "$YPATH/" . $_FILES["bukti_struk"]["name"]);
			$bukti_struk = $_FILES["bukti_struk"]["name"];
			} else {

			$bukti_struk = $bukti_struk0;

			}

			if (strlen($bukti_struk) < 1) {

			$bukti_struk = $bukti_struk0;

			}

			if ($pro == "simpan") {
				 $sql = " INSERT INTO `$tbiuran` (
					`id_iuran` ,
					`id_informasi` ,
					`pesan` ,
					`nik` ,
					`nominal` ,
					`tanggal` ,
					`jam` ,
					`bukti_struk` ,
					`status` ,
					`keterangan`
					) VALUES (
					'$id_iuran', 
					'$id_informasi',
					'$pesan',					
					'$nik',
					'$nominal', 
					'$tanggal',
					'$jam',
					'$bukti_struk',
					'Proses',
					'$keterangan'
					)";

				$simpan = process($conn, $sql);
				 if ($simpan) {
				 	echo "<script>alert('Data $informasi berhasil disimpan !');document.location.href='?mnu=siuran';</script>";
				 } else {
				 	echo "<script>alert('Data $informasi gagal disimpan...');document.location.href='?mnu=siuran';</script>";
				 }
			} 
		}
		?>
