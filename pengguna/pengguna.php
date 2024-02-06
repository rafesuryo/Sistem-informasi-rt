<?php
$pro = "simpan";

$nama_pengguna = "";
$level = "";
$username = "";
$password = "";
$telepon = "";
$email = "";
$status = "";
$keterangan = "";
?>

<script type="text/javascript">
	function PRINT(pk) {
		win = window.open('warga/warga_print.php?pk=' + pk, 'win', 'width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0');
	}
</script>

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
$sql = "select `id_pengguna` from `$tbpengguna` order by `id_pengguna` desc";
$jum = getJum($conn, $sql);
$kd = "PGN";
if ($jum > 0) {
	$d = getField($conn, $sql);
	$idmax = $d['id_pengguna'];
	$urut = substr($idmax, 3, 2) + 1; //01
	if ($urut < 10) {
		$idmax = "$kd" . "0" . $urut;
	} else {
		$idmax = "$kd" . $urut;
	}
} else {
	$idmax = "$kd" . "01";
}
$id_pengguna = $idmax;
?>

<?php
$lbl = "Tambah Data Pengguna";
if (isset($_GET["pro"]) && $_GET["pro"] == "ubah") {
	$id_pengguna = $_GET["kode"];
	$sql = "select * from `tb_pengguna` where `id_pengguna`='$id_pengguna'";
	$d = getField($conn, $sql);
	$id_pengguna = $d["id_pengguna"];
	$id_pengguna0 = $d["id_pengguna"];
	$nama_pengguna = $d["nama_pengguna"];
	$level = $d["level"];
	$username = $d["username"];
	$password = $d["password"];
	$telepon = $d["telepon"];
	$email = $d["email"];
	$status = $d["status"];
	$keterangan = $d["keterangan"];
	$pro = "ubah";
	$lbl = "Ubah Data Pengguna";
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
					<td width="15%"><label for="id_pengguna">ID Pengguna</label>
					<td width="9">:
					<td colspan="2"><b><?php echo $id_pengguna; ?></b>
				</tr>
				<tr>
					<td><label for="nama_pengguna">Nama Pengguna</label>
					<td>:
					<td width="683"><input style="width: 250px;" required name="nama_pengguna" class="form-control" type="text" id="nama_pengguna" value="<?php echo $nama_pengguna; ?>" size="25" />
					</td>
				</tr>
				<tr>
					<td><label for="level">Level</label>
					<td>:
					<td colspan="2">
						<input type="radio" name="level" id="level" checked="checked" value="Ketua RT" <?php if ($level == "Ketua RT") {
																											echo "checked";
																										} ?> />Ketua RT
						<input type="radio" name="level" id="level" value="Seketaris" <?php if ($level == "Seketaris") {
																							echo "checked";
																						} ?> />Seketaris
						<input type="radio" name="level" id="level" value="Bendahara" <?php if ($level == "Bendahara") {
																							echo "checked";
																						} ?> />Bendahara
						<input type="radio" name="level" id="level" value="Karang Taruna" <?php if ($level == "Karang Taruna") {
																								echo "checked";
																							} ?> />Karang Taruna
						<input type="radio" name="level" id="level" value="Warga" <?php if ($level == "Warga") {
																								echo "checked";
																							} ?> />Warga																	
					</td>
				</tr>
				<tr>
					<td height="24"><label for="telepon">Telepon</label>
					<td>:
					<td><input style="width: 150px;" required name="telepon" class="form-control" type="number" id="telepon" value="<?php echo $telepon; ?>" size="25" />
					</td>
				</tr>

				<tr>
					<td height="24"><label for="email">Email</label>
					<td>:
					<td><input style="width: 350px;" required name="email" class="form-control" type="email" id="email" value="<?php echo $email; ?>" size="25" />
					</td>
				</tr>

				<tr>
					<td height="24"><label for="username">Username</label>
					<td>:
					<td><input style="width: 170px;" required name="username" class="form-control" type="text" id="username" value="<?php echo $username; ?>" size="25" /></td>
				</tr>

				<tr>
					<td height="24"><label for="password">Password</label>
					<td>:
					<td><input style="width: 170px;" required name="password" class="form-control" type="password" id="password" value="<?php echo $password; ?>" size="25" /></td>
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
						<input name="id_pengguna" type="hidden" id="id_pengguna" value="<?php echo $id_pengguna; ?>" />
						<input name="id_pengguna0" type="hidden" id="id_pengguna0" value="<?php echo $id_pengguna0; ?>" />
						<a href="?mnu=pengguna"><input class="btn btn-primary" name="Batal" type="button" id="Batal" value="Batal" /></a>
					</td>
				</tr>
			</table>
		</form>
	</div>

	<?php  
} if(empty($_GET["pro"])){
?>	

<div align="right">
<a href='?mnu=pengguna&pro=tambah'>
<button type='button' title='tambah' class='btn btn-success btn-sm btn-icon-text mr-1'>
+ Tambah Data</button></a>
</div><br>

	<?php
	$sqlc = "select distinct(`status`) from `$tbpengguna` order by `status` asc";
	$jumc = getJum($conn, $sqlc);
	if ($jumc < 1) {
		echo "<h1>Maaf data pengguna belum tersedia</h1>";
	}
	$arrc = getData($conn, $sqlc);
	foreach ($arrc as $dc) {
		$status = $dc["status"];
		$sql = "select * from `$tbpengguna` where  `status`='$status' order by `id_pengguna` asc";
		$jum = getJum($conn, $sql);
	?>
		<h3>Data Pengguna Status  <?php echo $status . " : $jum Data "; ?></h3>
		<div>
			Data Pengguna Status <?php echo $status;?>
			<div class="table-container">
    <table class="table">
					<tr bgcolor="#cccccc">
					<th width="3%">No</td>
					<th width="5%">IDPGN</td>
					<th width="25%">Nama Pengguna</td>
					<th width="15%">Level</td>
					<th width="10%">Telepon</td>
					<th width="15%">Email</td>
					<th width="25%">Keterangan</td>
					<th width="13%">Menu</td>
				</tr>
				<?php
				$no = 1;
				if ($jum > 0) {
					$arr = getData($conn, $sql);
					foreach ($arr as $d) {
						$id_pengguna = $d["id_pengguna"];
						$nama_pengguna = ucwords($d["nama_pengguna"]);
						$level = $d["level"];
						$telepon = $d["telepon"];
						$email = $d["email"];
						$username = $d["username"];
						$password = $d["password"];
						$status = $d["status"];
						$keterangan = $d["keterangan"];
						
						$color = "#fff";
						if ($no % 2 == 0) {
							$color = "#eeeeee";
						}
						echo "<tr bgcolor='$color'>
				<td><small>$no</td>
				<td><small>$id_pengguna</td>
				<td><small><a href='mailto:$email'>$nama_pengguna</a></td>
				<td><small>$level</td>	
				<td><small>$telepon</td>	
				<td><small><a href='mailto:$email'>$email</a></td>
				<td><small>$keterangan</td>
				<td><div align='center'>
<a href='?mnu=pengguna&pro=ubah&kode=$id_pengguna&nama_pengguna=$nama_pengguna'><img src='ypathicon/ub.png' title='ubah'></a>
<a href='?mnu=pengguna&pro=hapus&kode=$id_pengguna&nama_pengguna=$nama_pengguna'><img src='ypathicon/ha.png' title='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama_pengguna pada data pengguna ?..\")'></a></div></td>
				</tr>";
						$no++;
					} //for dalam
				} //if
				else {
					echo "<tr><td colspan='6'><blink>Maaf, Data pengguna belum tersedia...</blink></td></tr>";
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
			$id_pengguna = strip_tags($_POST["id_pengguna"]);
			$nama_pengguna = strip_tags($_POST["nama_pengguna"]);
			$level = strip_tags($_POST["level"]);
			$username = strip_tags($_POST["username"]);
			$password = strip_tags($_POST["password"]);
			$telepon = strip_tags($_POST["telepon"]);
			$email = strip_tags($_POST["email"]);

			if ($pro == "simpan") {
				$sql = " INSERT INTO `$tbpengguna` (
					`id_pengguna` ,
					`nama_pengguna` ,
					`level` ,
					`username` ,
					`password` ,
					`telepon` ,
					`email` ,
					`status` ,
					`keterangan`
					) VALUES (
					'$id_pengguna', 
					'$nama_pengguna',
					'$level',					
					'$username',
					'$password', 
					'$telepon',
					'$email',
					'Aktif',
					'$keterangan'
					)";

				$simpan = process($conn, $sql);
				if ($simpan) {
					echo "<script>alert('Data $nama_pengguna berhasil disimpan !');document.location.href='?mnu=pengguna';</script>";
				} else {
					echo "<script>alert('Data $nama_pengguna gagal disimpan...');document.location.href='?mnu=pengguna';</script>";
				}
			} else {
				//update
				$id_pengguna0 = strip_tags($_POST["id_pengguna0"]);
				$status = strip_tags($_POST["status"]);
				$keterangan = strip_tags($_POST["keterangan"]);

				$sql = "update `$tbpengguna` set 
					`nama_pengguna`='$nama_pengguna',
					`level`='$level',
					`username`='$username',
					`password`='$password',
					`telepon`='$telepon' ,
					`email`='$email',
					`status`='$status',
					`keterangan`='$keterangan'
					 where `id_pengguna`='$id_pengguna0'";

				$ubah = process($conn, $sql);
				if ($ubah) {
					echo "<script>alert('Data $nama_pengguna berhasil diubah !');document.location.href='?mnu=pengguna';</script>";
				} else {
					echo "<script>alert('Data $nama_pengguna gagal diubah...');document.location.href='?mnu=pengguna';</script>";
				}
			} //else simpan
		}
		?>

		<?php //hapus
		if (isset($_GET["pro"]) && $_GET["pro"] == "hapus") {
			$id_pengguna = $_GET["kode"];
			$nama_pengguna = $_GET["nama_pengguna"];
			$sql = "delete from `$tbpengguna` where `id_pengguna`='$id_pengguna'";
			$hapus = process($conn, $sql);
			if ($hapus) {
				echo "<script>alert('Data $nama_pengguna berhasil dihapus !');document.location.href='?mnu=pengguna';</script>";
			} else {
				echo "<script>alert('Data $nama_pengguna gagal dihapus...');document.location.href='?mnu=pengguna';</script>";
			}
		}
		?>