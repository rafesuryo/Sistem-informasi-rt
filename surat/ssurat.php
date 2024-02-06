<?php
$pro = "simpan";

$no_surat = "";
$nama_surat = "";
$deskripsi = "";
$file_surat = "";
$nik = "";
$id_pengguna = "";
$file_jawaban = "";
$jawaban = "";
$tanggal = "";
$jam = "";
$status = "";
$keterangan = "";
?>

<script type="text/javascript">
	function PRINT(pk) {
		win = window.open('surat/surat_print.php?pk=' + pk, 'win', 'width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0');
	}
</script>

<?php 
if($_GET["pro"]=="tambah" || $_GET["pro"]=="ubah" ){ 
?>

<?php
  $sql="select `id_surat` from `$tbsurat` order by `id_surat` desc";
  $q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);
  $th=date("y");
  $bl=date("m")+0;if($bl<10){$bl="0".$bl;}

  $kd="SRT".$th.$bl;//KEG1610001
  if($jum > 0){
   $d=mysqli_fetch_array($q);
   $idmax=$d["id_surat"];
   
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
  $id_surat=$idmax;
?>
<?php
$lbl="Tambah Surat";
if (isset($_GET["pro"]) && $_GET["pro"] == "ubah") {
	$id_surat = $_GET["kode"];
	$sql = "select * from `$tbsurat` where `id_surat`='$id_surat'";
	$d = getField($conn, $sql);
	$id_surat = $d["id_surat"];
	$id_surat0 = $d["id_surat"];
	$no_surat = $d["no_surat"];
	$nama_surat= $d["nama_surat"];
	$deskripsi = $d["deskripsi"];
	$nik= $d["nik"];
	$id_pengguna = $d["id_pengguna"];
	$file_surat= $d["file_surat"];
	$file_surat0= $d["file_surat"];
	$final_jawaban= $d["file_jawaban"];
	$final_jawaban0= $d["file_jawaban"];
	$jawaban = $d["jawaban"];
	$tanggal= $d["tanggal"];
	$jam = $d["jam"];
	$status= $d["status"];
	$keterangan= $d["keterangan"];
	$pro = "ubah";
	$lbl="Ubah Data Surat";
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
					<th width="70"><label for="id_surat">ID Surat</label>
					<th width="9">:
					<th colspan="2"><b><?php echo $id_surat; ?></b>
				</tr>

				<tr>
					<td><label for="no_surat">No Surat</label>
					<td>:
					<td width="683"><input style="width: 250px;" required name="no_surat" class="form-control" type="text" id="no_surat" value="<?php echo $no_surat; ?>" size="25" />
					</td>
				</tr>

				<tr>
					<td><label for="nama_surat">Nama Surat</label>
					<td>:
					<td width="683"><input style="width: 250px;" required name="nama_surat" class="form-control" type="text" id="nama_surat" value="<?php echo $nama_surat; ?>" size="25" />
					</td>
				</tr>

				<tr>
					<td><label for="deskripsi">Deskripsi</label>
					<td>:
					<td width="683"><textarea name="deskripsi" class="form-control" cols="55" rows="2"><?php echo $deskripsi; ?></textarea>
					</td>
				</tr>

				<tr>
					<td><label for="nik">Pilih Warga</label>
					<td>:
					<td width="683">
						<select class="form-control" name="nik" style="width: 250px;">
						<option selected disabled>-- Pilih --</option>
						<?php  
						$sql="select * from `$tbwarga` ";
							$arr=getData($conn,$sql);
								foreach($arr as $d) {						
										$nik0=$d["nik"];
										$nama_warga=ucwords($d["nama_warga"]);
							echo "<option value='$nik0'"; if($nik0==$nik){echo"selected";} echo">$nama_warga ($nik0)</option>";
										}
										?>
						</select></td>
				</tr>

			 

				<tr>
					<td height="24"><label for="file_surat">File</label>
					<td>:
					<td><input style="width: 150px;" name="file_surat" class="form-control" type="file" id="file_surat" value="<?php echo $file_surat; ?>" size="25" />
					
					</td>
				</tr>

				<tr>
					<td height="24"><label for="final_jawaban">File Jawaban</label>
					<td>:
					<td><input style="width: 350px;" name="final_jawaban" class="form-control" type="file" id="final_jawaban" value="<?php echo $final_jawaban; ?>" size="25" />
	
					</td>
				</tr>
				
				<tr>
					<td><label for="jawaban">Jawaban</label>
					<td>:
					<td width="683"><textarea name="jawaban" class="form-control" cols="55" rows="2"><?php echo $jawaban; ?></textarea>
					</td>
				</tr>
	

                 <?php
				 if (isset($_GET["pro"]) && $_GET["pro"] == "ubah") {
				 ?>
				<tr>
					<td><label for="status">Status</label>
					<td>:
					<td colspan="2">
						<input type="radio" name="status" id="status" checked="checked" value="Aktif" <?php if ($status == "Aktif") {
																											echo "checked";
																										} ?> />Aktif
						<input type="radio" name="status" id="status" value="Tidak Aktif" <?php if ($status == "Tidak Aktif") {
																								echo "checked";
																							} ?> />Tidak Aktif
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
						<input name="Simpan" class="btn btn-danger" type="submit" id="Simpan" value="Simpan" />
						<input name="pro" type="hidden" id="pro" value="<?php echo $pro; ?>" />
						<input name="file_surat0" type="hidden" id="file_surat0" value="<?php echo $file_surat0; ?>" />
						<input name="file_jawaban0" type="hidden" id="file_jawaban0" value="<?php echo $file_jawaban0; ?>" />
						<input name="id_surat" type="hidden" id="id_surat" value="<?php echo $id_surat; ?>" />
						<input name="id_surat0" type="hidden" id="id_surat0" value="<?php echo $id_surat0; ?>" />
						<a href="?mnu=surat"><input class="btn btn-primary" name="Batal" type="button" id="Batal" value="Batal" /></a>
					</td>
				</tr>
			</table>
		</form>
	</div>

	<?php  
} if(empty($_GET["pro"])){
?>	

<div align="right">
<a href='?mnu=ssurat&pro=tambah'>
<button type='button' title='tambah' class='btn btn-success btn-sm btn-icon-text mr-1'>
+ Tambah Data</button></a>
</div><br>


	<?php //tampilan tabel data
	$sqlc = "select distinct(`status`) from `$tbsurat` order by `status` asc";
	$jumc = getJum($conn, $sqlc);
	if ($jumc < 1) {
		echo "<h1>Maaf data surat belum tersedia</h1>";
	}
	$arrc = getData($conn, $sqlc);
	foreach ($arrc as $dc) {
		$status = $dc["status"];
		$sql = "select * from `$tbsurat` where  `status`='$status' order by `id_surat` desc";
				$jum = getJum($conn, $sql);
	?>
		<h3>Data Surat <?php echo $status. " $jum Data "; ?>:</h3>
		<div>
			Data Surat | <img src='ypathicon/print.png' title='PRINT' OnClick="PRINT('<?php echo $status; ?>')"> |
			<table class="table table-bordered">
				<tr bgcolor="#cccccc">
					<th width="3%">No</td>
					<th width="10%">Tanggal</td>
					<th width="3%">No-Surat</td>
					<th width="25%">Deskripsi Dan Uraian Surat</td>
					<th width="25%">Nama Warga</td>
					<th width="15%">Jawaban</td>
					<th width="7%">Masuk</td>
					<th width="7%">Keluar</td>
					<th width="5%">Menu</td>
				</tr>
				<?php
				$no=1;
				if ($jum > 0) {
					$arr = getData($conn, $sql);
					foreach ($arr as $d) {
				$id_surat = $d["id_surat"];
						$no_surat = ucwords($d["no_surat"]);
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
				<td><small>$id_surat<br>
				<i>$no_surat</i>
				</td>
				<td><small><b>$nama_surat</b><br>
				<small><i>Deskripsi:$deskripsi<small></i> </td/>
				<td><small>$warga  NIK:$nik</td>
			
				<td><small>Status:$jawaban, <br><small><i>Petugas Kel: $pengguna | $id_pengguna</small></i></td>
			<td><a href='downloadgetfile.php?file=$file_surat' target='_blank'><small>Doc Masuk</a></td>	
			<td><a href='downloadgetfile.php?file=$file_jawaban' target='_blank'><small>Doc Keluar</a></td>	
			
			
				<td><div align='center'>
<a href='?mnu=surat&pro=ubah&kode=$id_surat&nama_surat=$nama_surat'><img src='ypathicon/ub.png' title='ubah'></a>
<a href='?mnu=surat&pro=hapus&kode=$id_surat&nama_surat=$nama_surat'><img src='ypathicon/ha.png' title='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama_surat pada data surat ?..\")'></a></div></td>
				</tr>";
						$no++;
					} //for dalam
				} //if
				else {
					echo "<tr><td colspan='6'><blink>Maaf, Data Surat belum tersedia...</blink></td></tr>";
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
			$id_surat = strip_tags($_POST["id_surat"]);
			$no_surat = strip_tags($_POST["no_surat"]);
			$nama_surat = strip_tags($_POST["nama_surat"]);
			$deskripsi = strip_tags($_POST["deskripsi"]);
			$nik = strip_tags($_POST["nik"]);
			$id_pengguna = strip_tags($_SESSION["cid"]);
			$jawaban = strip_tags($_POST["jawaban"]);
			$tanggal = date("Y-m-d");
			$jam = date("H:i:s");
			$status = strip_tags($_POST["status"]);
			$keterangan = strip_tags($_POST["keterangan"]);

			$file_surat0 = strip_tags($_POST["file_surat0"]);
			if ($_FILES["file_surat"] != "") {

			move_uploaded_file($_FILES["file_surat"]["tmp_name"], "$YPATH/" . $_FILES["file_surat"]["name"]);
			$file_surat = $_FILES["file_surat"]["name"];
			} else {

			$file_surat = $file_surat0;

			}

			if (strlen($file_surat) < 1) {

			$file_surat = $file_surat0;

			}

			$file_surat0 = strip_tags($_POST["file_surat0"]);
			if ($_FILES["file_surat"] != "") {

			move_uploaded_file($_FILES["file_surat"]["tmp_name"], "$YPATH/" . $_FILES["file_surat"]["name"]);
			$file_surat = $_FILES["file_surat"]["name"];
			} else {

			$file_surat = $file_surat0;

			}

			if (strlen($file_surat) < 1) {

			$file_jawaban = $file_jawaban0;

			}

			if ($pro == "simpan") {
				$sql = " INSERT INTO `$tbsurat` (
					`id_surat` ,
					`no_surat` ,
					`nama_surat` ,
					`deskripsi` ,
					`nik` ,
					`id_pengguna` ,
					`file_surat` ,
					`file_jawaban` ,
					`jawaban` ,
					`tanggal` ,
					`jam` ,
					`status` ,
					`keterangan`
					) VALUES (
					'$id_surat', 
					'$no_surat', 	
					'$nama_surat',
					'$deskripsi',				
					'$nik',
					'$id_pengguna',
					'$file_surat', 
					'$file_jawaban',
					'-',
					'$tanggal',
					'$jam',
					'Aktif',
					'$keterangan'
					)";

				$simpan = process($conn, $sql);
				if ($simpan) {
					echo "<script>alert('Data $nama_surat berhasil disimpan !');document.location.href='?mnu=surat';</script>";
				} else {
					echo "<script>alert('Data $nama_surat gagal disimpan...');document.location.href='?mnu=surat';</script>";
				}
			} else {
				//update
			$id_surat0 = strip_tags($_POST["id_surat0"]);
				$sql = "update `$tbsurat` set 
				    `no_surat`='$no_surat',
					`nama_surat`='$nama_surat',
					`deskripsi`='$deskripsi',
					`nik`='$nik',
					`id_pengguna`='$id_pengguna',
					`file_surat`='$file_surat',
					`file_jawaban`='$file_jawaban' ,
					`jawaban`='$jawaban',
					`tanggal`='$tanggal',
					`jam`='$jam',
					`status`='$status',
					`keterangan`='$keterangan'
					 where `id_surat`='$id_surat0'";
					 
				$ubah = process($conn, $sql);
				if ($ubah) {
					echo "<script>alert('Data $nama_surat berhasil diubah !');document.location.href='?mnu=surat';</script>";
				} else {
					echo "<script>alert('Data $nama_surat gagal diubah...');document.location.href='?mnu=surat';</script>";
				}
			} //else simpan
		}
		?>

		<?php //hapus
		if (isset($_GET["pro"]) && $_GET["pro"] == "hapus") {
			$id_surat = $_GET["kode"];
			$nama_surat = $_GET["nama_surat"];
			$sql = "delete from `$tbsurat` where `id_surat`='$id_surat'";
			$hapus = process($conn, $sql);
			if ($hapus) {
				echo "<script>alert('Data $nama_surat berhasil dihapus !');document.location.href='?mnu=surat';</script>";
			} else {
				echo "<script>alert('Data $nama_surat gagal dihapus...');document.location.href='?mnu=surat';</script>";
			}
		}
		?>