<?php
require_once "koneksivar.php";

$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
if ($conn->connect_error) {
	trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}


?>

<?php function RP($rupiah)
{
	return number_format($rupiah, "2", ",", ".");
} ?>

<?php

function BAL($tanggal){
 $arr=explode(" ",$tanggal);
 if($arr[1]=="Januari" || $arr[1]=="January"){$bul="01";}
 else if($arr[1]=="Februari" || $arr[1]=="February"){$bul="02";}
 else if($arr[1]=="Maret" || $arr[1]=="March"){$bul="03";}
 else if($arr[1]=="April" || $arr[1]=="April"){$bul="04";}
 else if($arr[1]=="Mei"  || $arr[1]=="May"){$bul="05";}
 else if($arr[1]=="Juni"  || $arr[1]=="June"){$bul="06";}
 else if($arr[1]=="Juli"  || $arr[1]=="July"){$bul="07";}
 else if($arr[1]=="Agustus"  || $arr[1]=="August"){$bul="08";}
 else if($arr[1]=="September"  || $arr[1]=="September"){$bul="09";}
 else if($arr[1]=="Oktober"  || $arr[1]=="October"){$bul="10";}
 else if($arr[1]=="November"  || $arr[1]=="November"){$bul="11";}
 else if($arr[1]=="Nopember"  || $arr[1]=="November"){$bul="11";}
 else if($arr[1]=="Desember"  || $arr[1]=="December"){$bul="12";}
return "$arr[2]-$bul-$arr[0]"; 
}



function WKT($sekarang)
{
	if ($sekarang == "0000-00-00") {
		$sekarang = date("Y-m-d");
	}

	$tanggal = substr($sekarang, 8, 2) + 0;
	$bulan = substr($sekarang, 5, 2);
	$tahun = substr($sekarang, 0, 4);

	$judul_bln = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
	$wk = $tanggal . " " . $judul_bln[(int)$bulan] . " " . $tahun;
	return $wk;
}
?>
<?php
function WKTP($sekarang)
{
	$tanggal = substr($sekarang, 8, 2) + 0;
	$bulan = substr($sekarang, 5, 2);
	$tahun = substr($sekarang, 2, 2);

	$judul_bln = array(1 => "Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des");
	$wk = $tanggal . " " . $judul_bln[(int)$bulan] . "'" . $tahun;
	return $wk;
}
?>

<?php
function process($conn, $sql)
{
	$s = false;
	$conn->autocommit(FALSE);
	try {
		$rs = $conn->query($sql);
		if ($rs) {
			$conn->commit();
			$last_inserted_id = $conn->insert_id;
			$affected_rows = $conn->affected_rows;
			$s = true;
		}
	} catch (Exception $e) {
		echo 'fail: ' . $e->getMessage();
		$conn->rollback();
	}
	$conn->autocommit(TRUE);
	return $s;
}

function getJum($conn, $sql)
{
	$rs = $conn->query($sql);
	$jum = $rs->num_rows;
	$rs->free();
	return $jum;
}

function getField($conn, $sql)
{
	$rs = $conn->query($sql);
	$rs->data_seek(0);
	$d = $rs->fetch_assoc();
	$rs->free();
	return $d;
}

function getData($conn, $sql){
	$rs = $conn->query($sql);
	$rs->data_seek(0);
	$arr = $rs->fetch_all(MYSQLI_ASSOC);
	//foreach($arr as $row) {
	//  echo $row['nama_kelas'] . '*<br>';
	//}

	$rs->free();
	return $arr;
}

function getPengguna($conn, $kode){
	$field = "nama_pengguna";
	$sql = "SELECT `$field` FROM `tb_pengguna` where `id_pengguna`='$kode'";
	$ada=getJum($conn,$sql);
	$nama="<label title='Sedang Menunggu Approval'>-</label>";
	if($ada>0){
		$rs = $conn->query($sql);
		$rs->data_seek(0);
		$row = $rs->fetch_assoc();
		$rs->free();
	$nama= $row[$field];
	}
	return $nama;
}

function getWarga($conn, $kode){
	$field = "nama_warga";
	$sql = "SELECT `$field` FROM `tb_warga` where `nik`='$kode'";
	$ada=getJum($conn,$sql);
	$nama="Unknown ".$kode;
	if($ada>0){
		$rs = $conn->query($sql);
		$rs->data_seek(0);
		$row = $rs->fetch_assoc();
		$rs->free();
	$nama= $row[$field];
	}
	return$nama;
}

function getInformasi($conn, $kode)
{
	$field = "judul";
	$sql = "SELECT `$field` FROM `tb_informasi` where `id_informasi`='$kode'";
	$rs = $conn->query($sql);
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
	return $row[$field];
}

function getProposal($conn, $kode)
{
	$field = "nama_proposal";
	$sql = "SELECT `$field` FROM `tb_proposal` where `id_proposal`='$kode'";
	$rs = $conn->query($sql);
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
	return $row[$field];
}

function getKegiatan($conn, $kode)
{
	$field = "nama_kegiatan";
	$sql = "SELECT `$field` FROM `tb_kegiatan` where `id_kegiatan`='$kode'";
	$rs = $conn->query($sql);
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
	return $row[$field];
}

?>

