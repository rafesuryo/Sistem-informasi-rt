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
                     <h2>Profil Warga</h2>
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
                                     <h4><?php echo $nama_warga; ?></h4>
                                     <h6><?php echo $nik; ?></h6>
                                     <p><strong><?php echo $alamat ; ?></strong></p>
                                     <ul class="list-unstyled">
                                        <li><i class="fa"></i>Tanggal Lahir : <?php echo $tanggal_lahir; ?></li>
                                        <li><i class="fa"></i>Jenis Kelamin : <?php echo $jenis_kelamin; ?></li>
                                        <li><i class="fa"></i>Agama : <?php echo $agama; ?></li>
                                        <li><i class="fa"></i>Status Perkawinan : <?php echo $status_perkawinan; ?></li>
                                         <li><i class="fa"></i>Username : <?php echo $username; ?></li>
                                         <li><i class="fa"></i><?php echo $telepon; ?></li>
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
                                             <a href="?mnu=uprofil" class="nav-item nav-link active">Ubah Profil</a>
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