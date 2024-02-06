<?php
$pro = "simpan";
$keterangan="";
$template_pengantar = "";
$template_undangan = "";
?>

<script type="text/javascript">
	function PRINT() {
		win = window.open('template/template_print.php', 'win', 'width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0');
	}
</script>

<?php 
if($_GET["pro"]=="tambah" || $_GET["pro"]=="ubah" ){ 
?>
 
<?php


$sql = "select `id_template` from `$tbtemplate` order by `id_template` desc";
$jum = getJum($conn, $sql);
$kd = "TMP";
if ($jum > 0) {
	$d = getField($conn, $sql);
	$idmax = $d['id_template'];
	$urut = substr($idmax, 3, 2) + 1; //01
	if ($urut < 10) {
		$idmax = "$kd" . "0" . $urut;
	} else {
		$idmax = "$kd" . $urut;
	}
} else {
	$idmax = "$kd" . "01";
}
$id_template = $idmax;

$lbl="Tambah template";
if (isset($_GET["pro"]) && $_GET["pro"] == "ubah") {
	$id_template = $_GET["kode"];
	$sql = "select * from `$tbtemplate` where `id_template`='$id_template'";
	$d = getField($conn, $sql);
	$id_template = $d["id_template"];
	$id_template0 = $d["id_template"];
	$template_pengantar= $d["template_pengantar"];
	$template_pengantar0= $d["template_pengantar"];
	$template_undangan= $d["template_undangan"];
	$template_undangan0= $d["template_undangan"];
	$keterangan= $d["keterangan"];
	$pro = "ubah";
	$lbl="Ubah Data template";
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
					<th width="15%"><label for="id_template">ID template</label>
					<th width="9">:
					<th colspan="2"><b><?php echo $id_template; ?></b>
				</tr>
				<tr>
					<td height="24"><label for="template_pengantar">Template /Dokumen Pengantar</label>
					<td>:
					<td>
					<input style="width: 150px;" required name="template_pengantar" class="form-control" type="file" id="template_pengantar" value="<?php echo $template_pengantar; ?>" size="25" />
					
					</td>
				</tr>

				<tr>
					<td height="24"><label for="template_undangan">Template /Dokumen Undangan</label>
					<td>:
					<td>
					<input style="width: 150px;"  name="template_undangan" class="form-control" type="file" id="template_undangan" value="<?php echo $template_undangan; ?>" size="25" />
					
					</td>
				</tr>

				<tr>
					<td><label for="keterangan">Keterangan</label>
					<td>:
					<td width="683"><textarea  required name="keterangan" class="form-control" cols="55" rows="2"><?php echo $keterangan; ?></textarea>
					</td>
				</tr>
				<tr>
					<td>
					<td>
					<td colspan="2">
						<input name="Simpan" class="btn btn-danger" type="submit" id="Simpan" value="Simpan" />
						<input name="pro" type="hidden" id="pro" value="<?php echo $pro; ?>" />
						<input name="id_template" type="hidden" id="id_template" value="<?php echo $id_template; ?>" />
						<input name="id_template0" type="hidden" id="id_template0" value="<?php echo $id_template0; ?>" />
						<input name="template_pengantar0" type="hidden" id="template_pengantar0" value="<?php echo $template_pengantar0; ?>" />
						<input name="template_undangan0" type="hidden" id="template_undangan0" value="<?php echo $template_undangan0; ?>" />
						<a href="?mnu=template"><input class="btn btn-primary" name="Batal" type="button" id="Batal" value="Batal" /></a>
					</td>
				</tr>
			</table>
		</form>
	</div>

<?php  
} if(empty($_GET["pro"])){
?>	

<?php
if($_SESSION["cstatus"]=="Warga"){
     echo"";
} else if($_SESSION["cstatus"]=="Sekertaris"){
?>
<div align="right">
<a href='?mnu=template&pro=tambah'>
<button type='button' title='tambah' class='btn btn-success btn-sm btn-icon-text mr-1'>
+ Tambah Data</button></a>
</div><br>
<?php 
} else if($_SESSION["cstatus"]=="Ketua RT"){
?>
<div align="right">
<a href='?mnu=template&pro=tambah'>
<button type='button' title='tambah' class='btn btn-success btn-sm btn-icon-text mr-1'>
+ Tambah Data</button></a>
</div><br>

<?php } ?>
		<h3>Template  Dokumen:</h3>
		<div>
			Data template | <img src='ypathicon/print.png' title='PRINT' OnClick="PRINT()"> |
				<table class="table table-bordered">
				<tr bgcolor="#cccccc">
					<th width="3%">No</td>
					<th width="20%">Template Pengantar</td>
					<th width="20%">Template Undangan</td>
					<th width="60%">Keterangan Rule Penggunaan</td>
					<th width="5%">Menu</td>
				</tr>
				<?php
                $sql = "select * from `$tbtemplate` order by `id_template` desc";
				$jum = getJum($conn, $sql);
				$no=1;
				if ($jum > 0) {
					$arr = getData($conn, $sql);
					foreach ($arr as $d) {
						$id_template = $d["id_template"];
						$template_pengantar = $d["template_pengantar"];
						$template_undangan = $d["template_undangan"];
						$keterangan= $d["keterangan"];
						
						$color = "#fff";
						if ($no % 2 == 0) {
							$color = "#eeeeee";
						}
						
						echo "<tr bgcolor='$color'>
				<td><small>$no</td>
				<td><small><a href='downloadgetfile.php?file=$template_pengantar' target='_blank'>Surat Pengantar</a></td>	
				<td><small><a href='downloadgetfile.php?file=$template_undangan' target='_blank'>Surat Undangan</a></td>	
				<td><small>$keterangan</td>
				<td><div align='center'>

";

if($_SESSION["cstatus"]=="Warga"){
     echo"";
} else if($_SESSION["cstatus"]=="Sekertaris"){
echo"    

<a href='?mnu=template&pro=ubah&kode=$id_template'><img src='ypathicon/ub.png' title='ubah'></a>
<a href='?mnu=template&pro=hapus&kode=$id_template'><img src='ypathicon/ha.png' title='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus template pada data template ?..\")'></a>";

} else if($_SESSION["cstatus"]=="Ketua RT"){
    echo"    
    
<a href='?mnu=template&pro=ubah&kode=$id_template'><img src='ypathicon/ub.png' title='ubah'></a>
<a href='?mnu=template&pro=hapus&kode=$id_template'><img src='ypathicon/ha.png' title='hapus' 
    onClick='return confirm(\"Apakah Anda benar-benar akan menghapus template pada data template ?..\")'></a>";
}
echo"
</div></td>
				</tr>";
						$no++;
					} //for dalam
				} //if
				else {
					echo "<tr><td colspan='6'><blink>Maaf, Data template belum tersedia...</blink></td></tr>";
				}
				?>
			</table>
		<?php
		$jmldata = $jum;
		echo "<p align=center>Total data <b>$jmldata</b> item</p>";

		echo "</div>";
		?>
		</div>

<?php
} //for atas
?>

		<?php //  simpan
		if (isset($_POST["Simpan"])) {
			$pro = strip_tags($_POST["pro"]);
			$keterangan = strip_tags($_POST["keterangan"]);
			$id_template = strip_tags($_POST["id_template"]);

			$template_pengantar0 = strip_tags($_POST["template_pengantar0"]);
			if ($_FILES["template_pengantar"] != "") {

			move_uploaded_file($_FILES["template_pengantar"]["tmp_name"], "$YPATH/" . $_FILES["template_pengantar"]["name"]);
			$template_pengantar = $_FILES["template_pengantar"]["name"];
			} else {

			$template_pengantar = $template_pengantar0;

			}

			if (strlen($template_pengantar) < 1) {

			$template_pengantar = $template_pengantar0;

			}

			$template_undangan0 = strip_tags($_POST["template_undangan0"]);
			if ($_FILES["template_undangan"] != "") {

			move_uploaded_file($_FILES["template_undangan"]["tmp_name"], "$YPATH/" . $_FILES["template_undangan"]["name"]);
			$template_undangan = $_FILES["template_undangan"]["name"];
			} else {

			$template_undangan = $template_undangan0;

			}

			if (strlen($template_undangan) < 1) {

			$template_undangan = $template_undangan0;

			}


			if ($pro == "simpan") {
				 $sql = " INSERT INTO `tb_template` (
					`id_template`, `template_pengantar`, `template_undangan`, `keterangan`) VALUES (
					'$id_template', '$template_pengantar', '$template_undangan', '$keterangan')";

				$simpan = process($conn, $sql);
				if ($simpan) {
					echo "<script>alert('Data $nama_template berhasil disimpan !');document.location.href='?mnu=template';</script>";
				} else {
					echo "<script>alert('Data $nama_template gagal disimpan...');document.location.href='?mnu=template';</script>";
				}
			} else {
				//update
			$id_template0 = strip_tags($_POST["id_template0"]);
				$sql = "update `$tbtemplate` set 
				    `template_pengantar`='$template_pengantar',
					`template_undangan`='$template_undangan',
					`keterangan`='$keterangan'
					 where `id_template`='$id_template0'";
					 
				$ubah = process($conn, $sql);
				if ($ubah) {
					echo "<script>alert('Data $nama_template berhasil diubah !');document.location.href='?mnu=template';</script>";
				} else {
					echo "<script>alert('Data $nama_template gagal diubah...');document.location.href='?mnu=template';</script>";
				}
			} //else simpan
		}
		?>

		<?php //hapus
		if (isset($_GET["pro"]) && $_GET["pro"] == "hapus") {
			$id_template = $_GET["kode"];
			$sql = "delete from `$tbtemplate` where `id_template`='$id_template'";
			$hapus = process($conn, $sql);
			if ($hapus) {
				echo "<script>alert('Data Template berhasil dihapus !');document.location.href='?mnu=template';</script>";
			} else {
				echo "<script>alert('Data Template gagal dihapus...');document.location.href='?mnu=template';</script>";
			}
		}
		?>