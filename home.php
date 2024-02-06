<?php		
	$sql="select `nik` from `$tbwarga` where status='Aktif'";
	$jum1=getJum($conn,$sql);

	$sql="select id_pengguna from `$tbpengguna` where status='Aktif'";
	$jum2=getJum($conn,$sql);
	
	 $sql="select id_informasi from `$tbinformasi` where status='Aktif'";
	 $jum3=getJum($conn,$sql);
	
	$sql="select id_kegiatan from `$tbkegiatan` where status='Aktif'";
	$jum4=getJum($conn,$sql);
?>
<div class="row column3">
   <!-- testimonial -->
   <div class="col-md-12">
      <div class="dark_bg full margin_bottom_30">
         <div class="full graph_revenue">
            <div class="row">
               <div class="col-md-12">
                  <div class="content testimonial">
                     <div id="testimonial_slider" class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for carousel items -->
                        <div class="carousel-inner">
                           <div class="item carousel-item active">
                              <p class="overview"><b><?php echo $_SESSION["cnama"]; ?></b><?php echo $_SESSION["cstatus"]; ?></p>
                              <br>
                              <h2 class="text-cnter">Selamat Datang di Website Informasi Adminsitrasi <br> <br>Komplek Kimia Farmia II</h2> <br>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="row column1">
   <div class="col-md-6 col-lg-3">
      <div class="full counter_section margin_bottom_30">
         <div class="couter_icon">
            <div>
               <i class="fa fa-users yellow_color"></i>
            </div>
         </div>
         <div class="counter_no">
            <div>
               <p class="total_no"><?php echo $jum1 ?></p>
               <p class="head_couter">Total Warga</p>
            </div>
         </div>
      </div>
   </div>
   <div class="col-md-6 col-lg-3">
      <div class="full counter_section margin_bottom_30">
         <div class="couter_icon">
            <div>
               <i class="fa fa-user red_color"></i>
            </div>
         </div>
         <div class="counter_no">
            <div>
               <p class="total_no"><?php echo $jum2 ?></p>
               <p class="head_couter">Total Pengguna</p>
            </div>
         </div>
      </div>
   </div>
   <div class="col-md-6 col-lg-3">
      <div class="full counter_section margin_bottom_30">
         <div class="couter_icon">
            <div>
               <i class="fa fa-bell green_color"></i>
            </div>
         </div>
         <div class="counter_no">
            <div>
               <p class="total_no"><?php echo $jum3 ?></p>
               <p class="head_couter">Informasi</p>
            </div>
         </div>
      </div>
   </div>
   <div class="col-md-6 col-lg-3">
      <div class="full counter_section margin_bottom_30">
         <div class="couter_icon">
            <div>
               <i class="fa fa-futbol-o red_color"></i>
            </div>
         </div>
         <div class="counter_no">
            <div>
               <p class="total_no"><?php echo $jum4 ?></p>
               <p class="head_couter">Kegiatan</p>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="row column4 graph">
   <div class="col-md-6 margin_bottom_30">
      <div class="dash_blog">
         <div class="dash_blog_inner">
            <div class="dash_head">
               <h3><span>List Informasi</span><span class="plus_green_bt"></h3>
            </div>
            <div class="list_cont">
               <p></p>
            </div>
            <div class="task_list_main">
               <ul class="task_list">
               <?php
               $sql = "select * from `$tbinformasi` where  `status`='Aktif' order by `id_informasi` asc";
               $arr = getData($conn, $sql);
               foreach ($arr as $d) {
                  $id_informasi = $d["id_informasi"];
                  $judul= $d["judul"];
                  $deskripsi= $d["deskripsi"];
                  $gambar= $d["gambar"];
                  $gambar0= $d["gambar"];
                  $id_pengguna= $d["id_pengguna"];
                  $kategori= $d["kategori"];
                  $jenis= $d["jenis"];
                  $tanggal= WKT($d["tanggal"]);
                  $jam= $d["jam"];
                  $status= $d["status"];
                  $keterangan= $d["keterangan"];
                  ?>
                  <li><a href="#"><?php echo $judul ?></a><br><small>Post: x<?php echo $tanggal." - $jam "; ?></small></li>
                  <?php } ?>
               </ul>
            </div>
         </div>
      </div>
   </div>
   <div class="col-md-6">
      <div class="dash_blog">
         <div class="dash_blog_inner">
            <div class="dash_head">
               <h3><span> List Pengguna</span></h3>
            </div>
            <div class="list_cont">
               <p></p>
            </div>
            <div class="msg_list_main">
               <ul class="msg_list">
               <?php
            $sql = "select * from `$tbpengguna` where  `status`='Aktif' order by `id_pengguna` asc";
            $arr = getData($conn, $sql);
            foreach ($arr as $d) {
               $id_pengguna = $d["id_pengguna"];
               $nama_pengguna = ucwords($d["nama_pengguna"]);
               $level = $d["level"];
               $telepon = $d["telepon"];
               $email = $d["email"];
               $username = $d["username"];
               $password = $d["password"];
               $status = $d["status"];
               $keterangan = $d["keterangan"];
               ?>
                  <li>
                     <span><img src="images/layout_img/user_img.jpg" class="img-responsive" alt="#" /></span>
                     <span>
                        <span class="name_user"><?php echo $nama_pengguna ?></span>
                        <span class="msg_user"><?php echo $level ?></span>
                        <span class="time_ago"><?php echo $status ?></span>
                     </span>
                  </li>
                 <?php } ?>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>