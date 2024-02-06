<?php
$direktori = "ypathfile/";
$namafile=$_GET["file"];
 // echo "<li><a href='/download/downloadget.php?file=$file' title='$foto'>$foto</a> ($hits)</li>";
if (!file_exists($direktori.$namafile)) {
  echo "<h1>Access forbidden!</h1>
        <p>Maaf, file $namafile yang Anda download sudah tidak tersedia atau filenya (direktorinya) telah diproteksi.</p>";
  exit();
}
else {
  header("Content-Type: octet/stream");
  header("Content-Disposition: attachment; filename=\"".$namafile."\"");
  $fp = fopen($direktori.$namafile, "r");
  $data = fread($fp, filesize($direktori.$namafile));
  fclose($fp);
  print $data;
}
?>
