<?php
$pro = "simpan";
$nik="";
$nama_warga = "";
$jenis_kelamin = "";
$tanggal_lahir = "";
$alamat = "";
$agama = "";
$telepon = "";
$username = "";
$password = "";
$status_perkawinan = "";
$status = "";
$keterangan = "";
?>
<script type="text/javascript">
	function PRINT(pk) {
		win = window.open('warga/warga_print.php?pk=' + pk, 'win', 'width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0');
	}
</script>
<link type="text/css" href="<?php echo "$PATH/base/"; ?>ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo "$PATH/"; ?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/"; ?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/"; ?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/"; ?>ui/i18n/ui.datepicker-id.js"></script>



<script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal_lahir").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script> 

<?php 
if($_GET["pro"]=="tambah" || $_GET["pro"]=="ubah" ){ 
?>

<?php
$lbl="Tambah Data Warga";
if (isset($_GET["pro"]) && $_GET["pro"] == "ubah") {
	$nik = $_GET["kode"];
	$sql = "select * from `tb_warga` where `nik`='$nik'";
	$d = getField($conn, $sql);
	$nik = $d["nik"];
	$nik0 = $d["nik"];
	$nama_warga= $d["nama_warga"];
	$jenis_kelamin= $d["jenis_kelamin"];
	$tanggal_lahir= WKT($d["tanggal_lahir"]);
	$agama= $d["agama"];
	$alamat= $d["alamat"];
	$telepon= $d["telepon"];
	$username = $d["username"];
	$password= $d["password"];
	$status_perkawinan= $d["status_perkawinan"];
	$status= $d["status"];
	$keterangan= $d["keterangan"];
	$pro = "ubah";
	$lbl="Ubah Data Warga";
}
?>

<link rel="stylesheet" href="jsacordeon/jquery-ui.css">
<link rel="stylesheet" href="resources/demos/style.css">
<script src="jsacordeon/jquery-1.12.4.js"></script>
<script src="jsacordeon/jquery-ui.js"></script>
<script>
	$(function() {
		$("#accordionS").accordion({
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
					<td width="15%"><label for="nik">NIK</label>
					<td width="9">:
					<td colspan="2"><input style="width: 250px;" required name="nik" class="form-control" type="text" id="nik" value="<?php echo $nik; ?>" size="25" />
					</td>
				</tr>
				<tr>
					<td><label for="nama_warga">Nama Warga</label>
					<td>:
					<td width="683"><input style="width: 350px;" required name="nama_warga" class="form-control" type="text" id="nama_warga" value="<?php echo $nama_warga; ?>" size="25" />
					</td>
				</tr>
				<tr>
					<td><label for="jenis_kelamin">Jenis Kelamin</label>
					<td>:
					<td colspan="2">
					<input type="radio" name="jenis_kelamin" id="jenis_kelamin" checked="checked" value="Laki-Laki" <?php if ($status == "Laki-Laki") {
					echo "checked";
					} ?> />Laki-Laki
					<input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan" <?php if ($status == "Perempuan") {
					echo "checked";
					} ?> />Perempuan
					</td>
				</tr>

				<tr>
				  <td height="24"><label for="tanggal_lahir">Tanggal Lahir</label>
					<td>:
					<td><input style="width: 150px;" required name="tanggal_lahir" class="form-control" type="text" id="tanggal_lahir" value="<?php echo $tanggal_lahir; ?>" size="25" />
				  </td>
				</tr>

				<tr>
				 <td height="24"><label for="alamat">Alamat</label>
					<td>:
					<td>
					<textarea name="alamat" class="form-control" cols="55" rows="2"><?php echo $alamat; ?></textarea>
				 </td>
				</tr>

				<tr>
					<td height="24"><label for="agama">Agama</label>
					<td>:
					<td><select class="form-control" name="agama" style="width: 250px;" >
					<option selected> -- Pilih --</option>
					<option value="Islam" <?php if($agama=="Islam") {echo"selected";}?>>Islam</option>
					<option value="Kristen" <?php if($agama=="Kristen") {echo"selected";}?>>Kristen</option>
					<option value="Budha" <?php if($agama=="Budha") {echo"selected";}?>>Budha</option>
					<option value="Hindu" <?php if($agama=="Hindu") {echo"selected";}?>>Hindu</option>
					<option value="Tionghoa" <?php if($agama=="Tionghoa") {echo"selected";}?>>Tionghoa</option>
					</select>
					</td>
				</tr>
				<tr>
					<td height="24"><label for="telepon">Telepon</label>
					<td>:
					<td><input style="width: 170px;" required name="telepon" class="form-control" type="number" id="telepon" value="<?php echo $telepon; ?>" size="25" />
					</td>
				</tr>
	
<tr>
<td><label for="status_perkawinan">Status Perkawinan</label>
<td>:
<td colspan="2">
<input type="radio" name="status_perkawinan" id="status_perkawinan" checked="checked" value="Nikah" <?php if ($status == "Nikah") {
echo "checked";
} ?> />Nikah
<input type="radio" name="status_perkawinan" id="status_perkawinan" value="Belum Nikah" <?php if ($status == "Belum Nikah") {
echo "checked";
} ?> />Belum Nikah
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
<input name="Simpan" class="btn btn-success" type="submit" id="Simpan" value="Simpan" />
<input name="pro" type="hidden" id="pro" value="<?php echo $pro; ?>" />
<input name="nik0" type="hidden" id="nik0" value="<?php echo $nik0; ?>" />
<a href="?mnu=warga"><input class="btn btn-danger" name="Batal" type="button" id="Batal" value="Batal" /></a>
</td>
</tr>
</table>
</form>
</div>
<?php  
} if(empty($_GET["pro"])){
?>	

<div align="right">
<a href='?mnu=warga&pro=tambah'>
<button type='button' title='tambah' class='btn btn-success btn-sm btn-icon-text mr-1'>
+ Tambah Data</button></a>
</div><br>
	<?php
	$sqlc = "select distinct(`status`) from `$tbwarga` order by `status` asc";
	$jumc = getJum($conn, $sqlc);
	if ($jumc < 1) {
		echo "<h1>Maaf data warga belum tersedia</h1>";
	}
	$arrc = getData($conn, $sqlc);
	foreach ($arrc as $dc) {
		$status = $dc["status"];
		$sql = "select * from `$tbwarga` where  `status`='$status' order by `nik` desc";
				$jum = getJum($conn, $sql);
	?>
		<h3>Warga Status <?php echo $status. " :$jum Data "; ?>:</h3>
		<div>
			 Warga Status <?php echo $status;?> |<img src='ypathicon/print.png' title='PRINT' OnClick="PRINT('<?php echo $status; ?>')"> |
			<table class="table table-bordered">
				<tr bgcolor="#cccccc">
				    <th width="3%">No</td>
					<th width="5%">NIK</td>
					<th width="15%">Nama Warga</td>
					<th width="15%">TGL-Lahir</td>
					<th width="10%">JKelamin</td>
					<th width="25%">Alamat</td>
					<th width="8%">Agama</td>
					<th width="7%">Status</td>
					<th width="5%">Menu</td>
				</tr>
				<?php
				$no=1;
				if ($jum > 0) {
					$arr = getData($conn, $sql);
					foreach ($arr as $d) {
						$nik = $d["nik"];
						$nama_warga= $d["nama_warga"];
						$jenis_kelamin= $d["jenis_kelamin"];
						$tanggal_lahir= WKT($d["tanggal_lahir"]);
						$agama= $d["agama"];
						$alamat= $d["alamat"];
						$telepon= $d["telepon"];
						$status_perkawinan= $d["status_perkawinan"];
						$status= $d["status"];
						$keterangan= $d["keterangan"];

						$color = "#fff";
						if ($no % 2 == 0) {
							$color = "#eeeeee";
						}
						echo "<tr bgcolor='$color'>
				<td><small>$no</td>
				<td><small>$nik</td>
				<td><small><a href='mailto:$nama_warga'>$nama_warga </a></td>
				<td><small>$tanggal_lahir</td>	
				<td><small>$jenis_kelamin</td>	
				<td><small>$alamat</td>
				<td><small>$agama</td>	
				<td><small>$status_perkawinan</td>		
				<td><div align='center'>
<a href='?mnu=warga&pro=ubah&kode=$nik&nama_warga=$nama_warga'><img src='ypathicon/ub.png' title='ubah'></a>
<a href='?mnu=warga&pro=hapus&kode=$nik&nama_warga=$nama_warga'><img src='ypathicon/ha.png' title='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama_warga pada data warga ?..\")'></a></div></td>
				</tr>";
						$no++;
					} //for dalam
				} //if
				else {
					echo "<tr><td colspan='6'><blink>Maaf, Data warga belum tersedia...</blink></td></tr>";
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

		<?php 
		if (isset($_POST["Simpan"])) {
			$pro = strip_tags($_POST["pro"]);
			$nik = strip_tags($_POST["nik"]);
			$nama_warga = strip_tags($_POST["nama_warga"]);
			$jenis_kelamin = strip_tags($_POST["jenis_kelamin"]);
			$tanggal_lahir = BAL($_POST["tanggal_lahir"]);
			$alamat = strip_tags($_POST["alamat"]);
			$agama = strip_tags($_POST["agama"]);
			$telepon = strip_tags($_POST["telepon"]);
			$status_perkawinan = strip_tags($_POST["status_perkawinan"]);
			$status = strip_tags($_POST["status"]);
			$keterangan = strip_tags($_POST["keterangan"]);

			if ($pro == "simpan") {
				$sql = " INSERT INTO `$tbwarga` (
					`nik` ,
					`nama_warga` ,
					`jenis_kelamin` ,
					`tanggal_lahir` ,
					`alamat` ,
					`agama` ,
					`telepon` ,
					`status_perkawinan` ,
					`status` ,
					`keterangan`
					) VALUES (
					'$nik', 
					'$nama_warga' ,
					'$jenis_kelamin' ,
					'$tanggal_lahir' ,
					'$alamat' ,
					'$agama' ,
					'$telepon' ,
					'$status_perkawinan' ,
					'Aktif' ,
					'$keterangan'
					)";

				$simpan = process($conn, $sql);
				if ($simpan) {
					echo "<script>alert('Data $nama_warga berhasil disimpan !');document.location.href='?mnu=warga';</script>";
				} else {
					echo "<script>alert('Data $nama_warga gagal disimpan...');document.location.href='?mnu=warga';</script>";
				}
			} else {
				
			$nik0 = strip_tags($_POST["nik0"]);
				$sql = "update `$tbwarga` set 
					`nama_warga`='$nama_warga',
					`jenis_kelamin`='$jenis_kelamin',
					`tanggal_lahir`='$tanggal_lahir',
					`alamat`='$alamat',
					`agama`='$agama',
					`telepon`='$telepon',
					`status_perkawinan`='$status_perkawinan',
					`status`='$status',
					`keterangan`='$keterangan'
					 where `nik`='$nik0'";
					 
				$ubah = process($conn, $sql);
				if ($ubah) {
					echo "<script>alert('Data $nama_warga berhasil diubah !');document.location.href='?mnu=warga';</script>";
				} else {
					echo "<script>alert('Data $nama_warga gagal diubah...');document.location.href='?mnu=warga';</script>";
				}
			} //else simpan
		}
		?>

		<?php //hapus
		if (isset($_GET["pro"]) && $_GET["pro"] == "hapus") {
			$nik = $_GET["kode"];
			$nama_warga = $_GET["nama_warga"];
			$sql = "delete from `$tbwarga` where `nik`='$nik'";
			$hapus = process($conn, $sql);
			if ($hapus) {
				echo "<script>alert('Data $nama_warga berhasil dihapus !');document.location.href='?mnu=warga';</script>";
			} else {
				echo "<script>alert('Data $nama_warga gagal dihapus...');document.location.href='?mnu=warga';</script>";
			}
		}
		?>