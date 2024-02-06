<?php
$id_pengguna = $_SESSION["cid"];
$sql = "select * from `tb_pengguna` where `id_pengguna`='$id_pengguna'";
$d = getField($conn, $sql);
$id_pengguna = $d["id_pengguna"];
$nama_pengguna = $d["nama_pengguna"];
$level = $d["level"];
$username = $d["username"];
$password = $d["password"];
$telepon = $d["telepon"];
$email = $d["email"];
$status = $d["status"];
$keterangan = $d["keterangan"];
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
                                <td width="15%"><label for="id_pengguna">Nama Pengguna</label>
                                <td width="9">:
                                <td><input style="width: 250px;" readonly required name="nama_pengguna" class="form-control" type="text" id="nama_pengguna" value="<?php echo $nama_pengguna; ?>" size="25" />
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
                            <tr>
                                <td>
                                <td>
                                <td colspan="2">
                                    <input name="Simpan" class="btn btn-danger" type="submit" id="Simpan" value="Simpan" />
                                    <input name="id_pengguna" type="hidden" id="id_pengguna" value="<?php echo $id_pengguna; ?>" />
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
        $id_pengguna = strip_tags($_POST["id_pengguna"]);
        $nama_pengguna = strip_tags($_POST["nama_pengguna"]);
        $level = strip_tags($_POST["level"]);
        $username = strip_tags($_POST["username"]);
        $password = strip_tags($_POST["password"]);
        $telepon = strip_tags($_POST["telepon"]);
        $email = strip_tags($_POST["email"]);

        $id_pengguna0 = strip_tags($_POST["id_pengguna0"]);
        $status = strip_tags($_POST["status"]);
        $keterangan = strip_tags($_POST["keterangan"]);

        $sql = "update `$tbpengguna` set 
					`username`='$username',
					`password`='$password',
					`telepon`='$telepon' ,
					`email`='$email'
					 where `id_pengguna`='$id_pengguna'";

        $ubah = process($conn, $sql);
        if ($ubah) {
            echo "<script>alert('Data profil $nama_pengguna berhasil diubah !');document.location.href='?mnu=profil';</script>";
        } else {
            echo "<script>alert('Data profil $nama_pengguna berhasil diubah !');document.location.href='?mnu=ubah_profil';</script>";
        }
    }
    ?>