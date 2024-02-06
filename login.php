<?php
session_start();
require_once "konmysqli.php";
?>
<<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <title><?php echo $tittle ?></title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content=""> 
      <link rel="icon" href="images/fevicon.png" type="image/png" />
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <link rel="stylesheet" href="style.css" />
      <link rel="stylesheet" href="css/responsive.css" />
      <link rel="stylesheet" href="css/colors.css" />
      <link rel="stylesheet" href="css/bootstrap-select.css" />
      <link rel="stylesheet" href="css/perfect-scrollbar.css" />
      <link rel="stylesheet" href="css/custom.css" />
      <link rel="stylesheet" href="js/semantic.min.css" />
      <link rel="stylesheet" href="css/captcha.css" />
      <link rel="stylesheet" href=
                                    "https://use.fontawesome.com/releases/v5.15.3/css/all.css"
                                          integrity=
                                    "sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk"
                                          crossorigin="anonymous">
   </head>
   <body class="inner_page login">
      <div class="full_container">
         <div class="container">
            <div class="center verticle_center full_height">
               <div class="login_section">
                  <div class="logo_login">
                     <div class="center">
                        <!-- <img width="210" src="images/logo/logo.png" alt="#" /> -->
                        <h2= class="text-light">Login Website</h2>
                        <h3= class="text light">Sistem Informasi dan Administrasi RT 09 Komplek Kimia Farma II</h3>
                     </div>
                  </div>
                  <div class="login_form">
                     <form method="post">
                        <fieldset>
                           <div class="field">
                              <label class="label_field">Username</label>
                              <input type="text" name="user" required placeholder="Username" />
                           </div>
                           <div class="field">
                              <label class="label_field">Password</label>
                              <input type="password" name="pass" required placeholder="Password" />
                           </div>
                           <div class="field">
                              <tr>
                                 <td>Captcha</td>				
                                 <td>
                                    <img src="mycaptcha.php" alt="gambar" />
                                  </td>
                              </tr>
                           </div>
                           <div class="field">
                           <td>Isikan captcha </td>
				                  <td><input name="captcha" value="" required/></td>
                           </div>

                              <link rel="stylesheet"
    
                       
                           <div class="field margin_0">
                              <label class="label_field hidden">hidden label</label>
                              <button class="main_bt" type="submit" name="Login">submit</button>
							  <button class="main_bt" type="reset" name="Reset">Reset</button>
                           </div>
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/animate.js"></script>
      <script src="js/bootstrap-select.js"></script>
      <script src="js/perfect-scrollbar.min.js"></script>
      <script src="js/captcha.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <script src="js/custom.js"></script>
   </body>
</html>
<?php
if (isset($_POST["Login"])) {
  $usr = $_POST["user"];
  $pas = $_POST["pass"];
  $captcha = $_POST["captcha"];


  $sql1 = "select * from `$tbpengguna` where `username`='$usr' and `password`='$pas' and `status`='Aktif'";
  $sql2 = "select * from `$tbwarga` where `username`='$usr' and `password`='$pas' and `status`='Aktif'";
  
  if (getJum($conn, $sql1) > 0) {
    $d = getField($conn, $sql1);
    $kode = $d["id_pengguna"];
    $nama = $d["nama_pengguna"];
    $level = $d["level"];
    $_SESSION["cid"] = $kode;
    $_SESSION["cnama"] = $nama;
    $_SESSION["cstatus"] = $level;


    if ($captcha != $_SESSION["captcha"]){
      session_destroy();
      echo "<script>alert('captcha tidak sesuai...');
           document.location.href='index.php?mnu=login';</script>";
    }

   //  $_SESSION["ccaptcha"] = $captcha;
    echo "<script>alert('Otentikasi " . $_SESSION["cstatus"] . " an " . $_SESSION["cnama"] . " (" . $_SESSION["cid"] . ") berhasil Login!');
		document.location.href='index.php?mnu=home';</script>";
  }
  elseif (getJum($conn, $sql2) > 0) {
   $d = getField($conn, $sql2);
   $kode = $d["nik"];
   $nama = $d["nama_warga"];

   $_SESSION["cid"] = $kode;
   $_SESSION["cnama"] = $nama;
   $_SESSION["cstatus"] = "Warga";
   if ($captcha != $_SESSION["captcha"]){
      session_destroy();
      echo "<script>alert('captcha tidak sesuai...');
           document.location.href='index.php?mnu=login';</script>";
    }
   echo "<script>alert('Otentikasi " . $_SESSION["cstatus"] . " an " . $_SESSION["cnama"] . " (" . $_SESSION["cid"] . ") berhasil Login!');
     document.location.href='index.php?mnu=home';</script>";
 } else {
    session_destroy();
    echo "<script>alert('Otentikasi Login GAGAL !,Silakan cek data Anda kembali...');
			document.location.href='index.php?mnu=login';</script>";
  }
}


?>