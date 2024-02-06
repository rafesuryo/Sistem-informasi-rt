<?php
include"../konmysqli.php";


echo"<link href='../$PATH/$css' rel='stylesheet' type='text/css' />";
$sql="SELECT `bukti_struk` FROM `$tbiuran` WHERE `id_iuran`='".$_GET["id"]."'";
if(getJum($conn,$sql)>0){
	$d = getField($conn,$sql);
	$gambar=$d["bukti_struk"];
}
else{$gambar="avatar.jpg";}
echo "<p align=center><img src='../$YPATH/$gambar' border='0' width='100%' height='100%'></p>";
