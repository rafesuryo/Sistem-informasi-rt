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
                     <!-- user profile section -->
                     <!-- profile image -->
                     <div class="col-lg-12">
                         <div class="full dis_flex center_text">
                             <div class="profile_img"><img width="180" class="rounded-circle" src="images/layout_img/user_img.jpg" alt="#" /></div>
                             <div class="profile_contant">
                                 <div class="contact_inner">
                                     <h3><?php echo $nama_pengguna; ?></h3>
                                     <p><strong>Bagian: </strong><?php echo $level; ?></p>
                                     <ul class="list-unstyled">
                                         <li><i class="fa fa-envelope-o"></i> : <?php echo $email; ?></li>
                                         <li><i class="fa fa-phone"></i>&nbsp;&nbsp;: <?php echo $telepon; ?></li>
                                     </ul>
                                 </div>
                                 <div class="user_progress_bar"></div>
                             </div>
                         </div>
                         <!-- profile contant section -->
                         <div class="full inner_elements margin_top_30">
                             <div class="tab_style2">
                                 <div class="tabbar">
                                     <nav>
                                         <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                             <a href="?mnu=ubah_profil" class="nav-item nav-link active">Ubah Profil</a>
                                        </div>
                                     </nav>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col-md-2"></div>
     </div>
 </div>