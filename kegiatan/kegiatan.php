<?php
$pro = "simpan";

$nama_kegiatan = "";
$deskripsi = "";
$gambar = "";
$id_pengguna = "";
$kategori = "";
$tanggal = "";
$jam = "";
$status = "";
$keterangan = "";
?>

<script type="text/javascript">
	function PRINT(pk) {
		win = window.open('kegiatan/kegiatan_print.php?pk=' + pk, 'win', 'width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0');
	}
</script>

<script language="JavaScript">
	function buka(url) {
		window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');
	}
</script>

<?php 
if($_GET["pro"]=="tambah" || $_GET["pro"]=="ubah" ){ 
?>


<?php
$sql = "select `id_kegiatan` from `$tbkegiatan` order by `id_kegiatan` desc";
$q = mysqli_query($conn, $sql);
$jum = mysqli_num_rows($q);
$th = date("y");
$bl = date("m") + 0;
if ($bl < 10) {
	$bl = "0" . $bl;
}

$kd = "KGT" . $th . $bl; //KEG1610001
if ($jum > 0) {
	$d = mysqli_fetch_array($q);
	$idmax = $d["id_kegiatan"];

	$bul = substr($idmax, 5, 2);
	$tah = substr($idmax, 3, 2);
	if ($bul == $bl && $tah == $th) {
		$urut = substr($idmax, 7, 3) + 1;
		if ($urut < 10) {
			$idmax = "$kd" . "00" . $urut;
		} else if ($urut < 100) {
			$idmax = "$kd" . "0" . $urut;
		} else {
			$idmax = "$kd" . $urut;
		}
	} //==
	else {
		$idmax = "$kd" . "001";
	}
} //jum>0
else {
	$idmax = "$kd" . "001";
}
$id_kegiatan = $idmax;
?>
<?php
$lbl = "Tambah Data Kegiatan";
if (isset($_GET["pro"]) && $_GET["pro"] == "ubah") {
	$id_kegiatan = $_GET["kode"];
	$sql = "select * from `$tbkegiatan` where `id_kegiatan`='$id_kegiatan'";
	$d = getField($conn, $sql);
	$id_kegiatan = $d["id_kegiatan"];
	$id_kegiatan0 = $d["id_kegiatan"];
	$nama_kegiatan = $d["nama_kegiatan"];
	$deskripsi = $d["deskripsi"];
	$gambar = $d["gambar"];
	$gambar0 = $d["gambar"];
	$id_pengguna = $d["id_pengguna"];
	$kategori = $d["kategori"];
	$tanggal = $d["tanggal"];
	$jam = $d["jam"];
	$status = $d["status"];
	$keterangan = $d["keterangan"];
	$pro = "ubah";
	$lbl = "Ubah Data Kegiatan";
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
					<td width="15%"><label for="id_kegiatan">ID Kegiatan</label>
					<td width="9">:
					<td colspan="2"><b><?php echo $id_kegiatan; ?></b>
				</tr>

				<tr>
					<td><label for="nama_kegiatan">Nama Kegiatan</label>
					<td>:
					<td width="683"><input style="width: 350px;" required name="nama_kegiatan" class="form-control" type="text" id="nama_kegiatan" value="<?php echo $nama_kegiatan; ?>" size="25" />
					</td>
				</tr>

				<tr>
					<td><label for="deskripsi">Deskripsi</label>
					<td>:
					<td width="683"><textarea name="deskripsi" class="form-control" cols="55" rows="2"><?php echo $deskripsi; ?></textarea>
					</td>
				</tr>

				<tr>
					<td height="24"><label for="gambar">Gambar</label>
					<td>:
					<td><input style="width: 150px;" required name="gambar" class="form-control" type="file" id="gambar" value="<?php echo $gambar; ?>" size="25" />
					</td>
				</tr>

				

<tr>
<td><label for="kategori">Kategori Kegiatan</label>
<td>:
<td colspan="2">
<input type="radio" name="kategori" id="kategori" checked="checked" value="Umum" <?php if ($status == "Umum") {
echo "checked";
} ?> />Umum
<input type="radio" name="kategori" id="kategori" value="Karang Taruna" <?php if ($status == "Karang Tarun") {
echo "checked";
} ?> />Karang Taruna
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
<input name="gambar0" type="hidden" id="gambar0" value="<?php echo $gambar0; ?>" />
<input name="id_kegiatan" type="hidden" id="id_kegiatan" value="<?php echo $id_kegiatan; ?>" />
<input name="id_kegiatan0" type="hidden" id="id_kegiatan0" value="<?php echo $id_kegiatan0; ?>" />
<a href="?mnu=kegiatan"><input class="btn btn-danger" name="Batal" type="button" id="Batal" value="Batal" /></a>
</td>
</tr>
</table>
</form>
</div>

	<?php  
} if(empty($_GET["pro"])){
?>	

<div align="right">
<a href='?mnu=kegiatan&pro=tambah'>
<button type='button' title='tambah' class='btn btn-success btn-sm btn-icon-text mr-1'>
+ Tambah Data</button></a>
</div><br>

	<?php //tampilan tabel data
	$sqlc = "select distinct(`kategori`) from `$tbkegiatan` order by `kategori` asc";
	$jumc = getJum($conn, $sqlc);
	if ($jumc < 1) {
		echo "<h1>Maaf data surat belum tersedia</h1>";
	}
	$arrc = getData($conn, $sqlc);
	foreach ($arrc as $dc) {
		$kategori = $dc["kategori"];
		$sql = "select * from `$tbkegiatan` where  `kategori`='$kategori' order by `id_kegiatan` asc";
		$jum = getJum($conn, $sql);
	?>
		<h3>Kegiatan <?php echo $kategori . " : $jum Data "; ?></h3>
		<div>
			Data Kegiatan | <img src='ypathicon/print.png' title='PRINT' OnClick="PRINT('<?php echo $kategori; ?>')"> |
			<table class="table table-bordered">
				<tr bgcolor="#cccccc">
					<th width="3%">No</td>
					<th width="7%">Gambar</td>
					<th width="3%">Tanggal</td>
					<th width="75%">Nama Kegiatan</td>
					<th width="15%">Keterangan</td>
					<th width="5%">Menu</td>
				</tr>
				<?php
				$no = 1;
				if ($jum > 0) {
					$arr = getData($conn, $sql);
					foreach ($arr as $d) {
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
				<td><div align='center'>
<a href='?mnu=kegiatan&pro=ubah&kode=$id_kegiatan&nama_kegiatan=$nama_kegiatan'><img src='ypathicon/ub.png' title='ubah'></a>
<a href='?mnu=kegiatan&pro=hapus&kode=$id_kegiatan&nama_kegiatan=$nama_kegiatan'><img src='ypathicon/ha.png' title='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama_kegiatan pada data kegiatan ?..\")'></a></div></td>
				</tr>";
						$no++;
					} //for dalam
				} //if
				else {
					echo "<tr><td colspan='6'><blink>Maaf, Data Kegiatan Belum Tersedia...</blink></td></tr>";
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
			$id_kegiatan = strip_tags($_POST["id_kegiatan"]);
			$nama_kegiatan = strip_tags($_POST["nama_kegiatan"]);
			$deskripsi = strip_tags($_POST["deskripsi"]);
			$id_pengguna = strip_tags($_SESSION["cid"]);
			$kategori = strip_tags($_POST["kategori"]);
			$tanggal = date("Y-m-d");
			$jam = date("H:i:s");
			$status = strip_tags($_POST["status"]);
			$keterangan = strip_tags($_POST["keterangan"]);

			$gambar0 = strip_tags($_POST["gambar0"]);
			if ($_FILES["gambar"] != "") {

				move_uploaded_file($_FILES["gambar"]["tmp_name"], "$YPATH/" . $_FILES["gambar"]["name"]);
				$gambar = $_FILES["gambar"]["name"];
			} else {

				$gambar = $gambar0;
			}

			if (strlen($gambar) < 1) {

				$gambar = $gambar0;
			}

			if ($pro == "simpan") {
				$sql = " INSERT INTO `$tbkegiatan` (
					`id_kegiatan` ,
					`nama_kegiatan` ,
					`deskripsi` ,
					`gambar` ,
					`id_pengguna` ,
					`kategori` ,
					`tanggal` ,
					`jam` ,
					`status` ,
					`keterangan`
					) VALUES (
					'$id_kegiatan' ,
					'$nama_kegiatan' ,
					'$deskripsi' ,
					'$gambar' ,
					'$id_pengguna' ,
					'$kategori' ,
					'$tanggal' ,
					'$jam' ,
					'Aktif' ,
					'$keterangan'
					)";

				$simpan = process($conn, $sql);
				if ($simpan) {
					echo "<script>alert('Data $nama_kegiatan berhasil disimpan !');document.location.href='?mnu=kegiatan';</script>";
				} else {
					echo "<script>alert('Data $nama_kegiatan gagal disimpan...');document.location.href='?mnu=kegiatan';</script>";
				}
			} else {
				//update
				$id_kegiatan0 = strip_tags($_POST["id_kegiatan0"]);
				$sql = "update `$tbkegiatan` set 
					`nama_kegiatan`='$nama_kegiatan',
					`deskripsi`='$deskripsi',
					`gambar`='$gambar',
					`id_pengguna`='$id_pengguna',
					`kategori`='$kategori',
					`tanggal`='$tanggal',
					`jam`='$jam',
					`status`='$status',
					`keterangan`='$keterangan'
					 where `id_kegiatan`='$id_kegiatan0'";

				$ubah = process($conn, $sql);
				if ($ubah) {
					echo "<script>alert('Data $nama_kegiatan berhasil diubah !');document.location.href='?mnu=kegiatan';</script>";
				} else {
					echo "<script>alert('Data $nama_kegiatan gagal diubah...');document.location.href='?mnu=kegiatan';</script>";
				}
			} //else simpan
		}
		?>

		<?php //hapus
		if (isset($_GET["pro"]) && $_GET["pro"] == "hapus") {
			$id_informasi = $_GET["kode"];
			$nama_kegiatan = $_GET["nama_kegiatan"];
			$sql = "delete from `$tbkegiatan` where `id_kegiatan`='$id_kegiatan'";
			$hapus = process($conn, $sql);
			if ($hapus) {
				echo "<script>alert('Data $nama_kegiatan berhasil dihapus !');document.location.href='?mnu=kegiatan';</script>";
			} else {
				echo "<script>alert('Data $nama_kegiatan gagal dihapus...');document.location.href='?mnu=kegiatan';</script>";
			}
		}
		?>