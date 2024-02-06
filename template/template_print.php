<style type="text/css">
	body {
		width: 100%;
	}
</style>

<body OnLoad="window.print()" OnFocus="window.close()">
	<?php
	include "../konmysqli.php";
	echo "<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
	$YPATH = "../ypathfile/";
	$pk = "";
	$field = "id_template";
	$TB = $tbtemplate;
	$item = "Surat";



	$sql = "select * from `$TB` order by `$field` asc";
	if (isset($_GET["pk"])) {
		$pk = $_GET["pk"];
		$sql = "select * from `$TB` where `$field`='$pk' order by `$field` asc";
	}

	echo "<h3><center>Laporan Doc/Template $item $pk</h3>";
	?>

	<table width="98%" border="0">
		<tr>
			<th width="3%">No</td>
					<th width="15%">Template Pengantar</td>
					<th width="15%">Template Undangan</td>
					<th width="65%">Keterangan<br>Rule Penggunaan</td>
		</tr>
		<?php
		$jum = getJum($conn, $sql);
		$no = 0;
		if ($jum > 0) {
			$arr = getData($conn, $sql);
			foreach ($arr as $d) {
				$no++;
						$id_template = $d["id_template"];
						$template_pengantar = $d["template_pengantar"];
						$template_undangan = $d["template_undangan"];
						$keterangan= $d["keterangan"];
						$color = "#dddddd";
						if ($no % 2 == 0) {
							$color = "#eeeeee";
						}
						echo "<tr bgcolor='$color'>
				<td><small>$no</td>
				<td><small><a href='downloadgetfile.php?file=$template_pengantar' target='_blank'>Berkas</a></td>	
				<td><small><a href='downloadgetfile.php?file=$template_undangan' target='_blank'>Berkas</a></td>	
				<td><small>$keterangan</td>
				</tr>";
			}
		} //if
		else {
			echo "<tr><td colspan='7'><blink>Maaf, Data $item belum tersedia...</blink></td></tr>";
		}

		echo "</table>";
		?>