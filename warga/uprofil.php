<?php
	$nik = $_SESSION["cid"];
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
?>
<div class="row column1">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Profil </h2>
                </div>
            </div>
            <div class="full price_table padding_infor_info">
                <div class="row">
                    <form action="" method="post" enctype="multipart/form-data">
                        <table class="table">
                            <tr>
                                <td width="15%"><label for="id_pengguna">Nama Warga</label>
                                <td width="9">:
                                <td><input style="width: 250px;" readonly required name="nama_warga" class="form-control" type="text" id="nama_warga" value="<?php echo $nama_warga; ?>" size="25" />
                                </td>
                            </tr>

                            <tr>
                                <td height="24"><label for="telepon">Telepon</label>
                                <td>:
                                <td><input style="width: 150px;" required name="telepon" class="form-control" type="number" id="telepon" value="<?php echo $telepon; ?>" size="25" />
                                </td>
                            </tr>

                            <tr>
                                <td height="24"><label for="email">Status Perkawinan</label>
                                <td>:
                                <td><input style="width: 350px;" required name="status_perkawinan" class="form-control" type="status_perkawinan" id="status_perkawinan" value="<?php echo $status_perkawinan; ?>" size="25" />
                                </td>
                            </tr>

                            <tr>
                                <td height="24"><label for="email">Agama</label>
                                <td>:
                                <td><input style="width: 350px;" required name="agama" class="form-control" type="agama" id="agama" value="<?php echo $agama; ?>" size="25" />
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
                            <tr>
                                <td>
                                <td>
                                <td colspan="2">
                                    <input name="Simpan" class="btn btn-danger" type="submit" id="Simpan" value="Simpan" />
                                    <input name="nik" type="hidden" id="nik" value="<?php echo $nik; ?>" />
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

    <?php //  simpan
    if (isset($_POST["Simpan"])) {
        $nik = strip_tags($_POST["nik"]);
        $nama_warga = strip_tags($_POST["nama_warga"]);
        $jenis_kelamin = strip_tags($_POST["jenis_kelamin"]);
        $tanggal_lahir = strip_tags($_POST["tanggal_lahir"]);
        $alamat = strip_tags($_POST["alamat"]);
        $agama = strip_tags($_POST["agama"]);
        $telepon = strip_tags($_POST["telepon"]);
        $status_perkawinan = strip_tags($_POST["status_perkawinan"]);
        $username = strip_tags($_POST["username"]);
        $password = strip_tags($_POST["password"]);
        $status = strip_tags($_POST["status"]);
        $keterangan = strip_tags($_POST["keterangan"]);
        
        $sql = "update `$tbwarga` set 
        `alamat`='$alamat',
        `agama`='$agama',
        `telepon`='$telepon',status_perkawinan`='$status_perkawinan',
        `username`='$username',
        `password`='$password' 
         where `nik`='$nik'";

        $ubah = process($conn, $sql);
        if ($ubah) {
            echo "<script>alert('Data profil $nama_warga berhasil diubah !');document.location.href='?mnu=_profil';</script>";
        } else {
            echo "<script>alert('Data profil $nama_warga berhasil diubah !');document.location.href='?mnu=uprofil';</script>";
        }
    }
    ?>