<nav id="sidebar">
<div class="sidebar_blog_1">
<div class="sidebar-header">
<div class="logo_section">
<a href="?mnu=home"><img class="logo_icon img-responsive" src="images/logo/logo_icon.jpg" alt="#" /></a>
</div>
</div>
<div class="sidebar_user_info">
<div class="icon_setting"></div>
<div class="user_profle_side">
<div class="user_img"><img class="img-responsive" src="images/layout_img/user_img.jpg" alt="#" /></div>
<div class="user_info">
<h6><?php echo $_SESSION["cnama"]; ?></h6>
<p><span class="online_animation"></span> Online</p>
</div>
</div>
</div>
</div>
<div class="sidebar_blog_2">
<h4>Menu <?php echo $_SESSION["cstatus"]; ?></h4>
<ul class="list-unstyled components">
<li class="active"><a href="?mnu=home"><i class="fa fa-home yellow_color"></i> <span>Dashboard</span></a></li>

<?php
if($_SESSION["cstatus"]=="Ketua RT"){
?>
<li class="active">
<a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-users purple_color"></i> <span>Penduduk</span></a>
<ul class="collapse list-unstyled" id="dashboard">
<li>
<a href="?mnu=pengguna"> <span>Pengguna</span></a>
</li>
<li>
<a href="?mnu=warga"> <span>Warga</span></a>
</li>
</ul>
</li>
<?php
$sqlc = "select `status` from `$tbsurat` where status='Proses'";
$jum = getJum($conn, $sqlc);$surat="";if($jum>0){$surat="<sup><font color='yellow'>$jum</font></sup>";}
$sqlc = "select `status` from `$tbiuran` where status='Proses'";
$jum = getJum($conn, $sqlc);$iuran="";if($jum>0){$iuran="<sup><font color='yellow'>$jum</font></sup>";}
$sqlc = "select `status` from `$tbproposal` where status='Proses'";
$jum = getJum($conn, $sqlc);$proposal="";if($jum>0){$proposal="<sup><font color='yellow'>$jum</font></sup>";}
?>
<li class="active">
<a href="#surat" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
<i class="fa fa-envelope white_color"></i> <span>Surat</span> ( <?php echo $surat;?> )</a>
<ul class="collapse list-unstyled" id="surat">
<li>
<a href="?mnu=template"> <span>Template</span></a>
</li>
<li>
<a href="?mnu=surat"> <span>Surat</span> ( <?php echo $surat;?> ) </a>
</li>
</ul>
</li>

<li><a href="?mnu=iuran"><i class="fa fa-money green_color"></i> <span>Iuran</span> ( <?php echo $iuran;?> )</a></li>
<li class="active">
<a href="#additional_page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
<i class="fa fa-smile-o yellow_color"></i> <span>Kartan</span>( <?php echo $proposal;?> )</a>
<ul class="collapse list-unstyled" id="additional_page">
<li>
<a href="?mnu=proposal"> <span>Proposal</span> ( <?php echo $proposal;?> )</a>
</li>

<li>
<a href="?mnu=kegiatan"> <span>Kegiatan</span> </a>
</li>
<li>
<a href="?mnu=peserta"> <span>Peserta</span></a>
</li>
<li>
<a href="?mnu=informasi"> <span>Informasi</span></a>
</li>

</ul>
</li>


<?php
} else if($_SESSION["cstatus"]=="Sekertaris"){
?>
<li><a href="?mnu=profil"><i class="fa fa-user orange_color"></i> <span>Profil</span></a></li>
<li><a href="?mnu=_warga"><i class="fa fa-users blue1_color"></i> <span>Warga</span></a></li>
<li class="active">
<a href="#surat" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-envelope white_color"></i> <span>Surat</span></a>
<ul class="collapse list-unstyled" id="surat">
<li>
<a href="?mnu=template"> <span>Template</span></a>
</li>
<li>
<a href="?mnu=surat"> <span>Surat</span></a>
</li>
</ul>
</li>
<li><a href="?mnu=siuran"><i class="fa fa-money green_color"></i> <span>Iuran</span></a></li>
<li class="active">
<a href="#additional_page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-clone yellow_color"></i> <span>Kartan</span></a>
<ul class="collapse list-unstyled" id="additional_page">
<li>
<a href="?mnu=sproposal"> <span>Proposal</span></a>
</li>
<li>
<a href="?mnu=skegiatan"> <span>Kegiatan</span></a>
</li>
<li>
<a href="?mnu=speserta"> <span>Peserta</span></a>
</li>
<li>
<a href="?mnu=sinformasi"> <span>Informasi</span></a>
</li>


</ul>
</li>


<?php
} else if($_SESSION["cstatus"]=="Bendahara"){
?>
<li><a href="?mnu=profil"><i class="fa fa-user orange_color"></i> <span>Profil</span></a></li>
<li><a href="?mnu=_warga"><i class="fa fa-users blue1_color"></i> <span>Warga</span></a></li>
<li><a href="?mnu=bsurat"><i class="fa fa-envelope white_color"></i> <span>Surat</span></a></li>
<li><a href="?mnu=template"><i class="fa fa-envelope white_color"></i> <span>Template</span></a></li>
<li><a href="?mnu=iuran"><i class="fa fa-money green_color"></i> <span>Iuran</span></a></li>
<li class="active">
<a href="#additional_page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-clone yellow_color"></i> <span>Kartan</span></a>
<ul class="collapse list-unstyled" id="additional_page">
<li>
<a href="?mnu=sproposal"> <span>Proposal</span></a>
</li>

<li>
<a href="?mnu=skegiatan"> <span>Kegiatan</span></a>
</li>
<li>
<a href="?mnu=speserta"> <span>Peserta</span></a>
</li>
<li>
<a href="?mnu=sinformasi"> <span>Informasi</span></a>
</li>

</ul>
</li>


<?php
} else if($_SESSION["cstatus"]=="Karang Taruna"){
?>
<li><a href="?mnu=profil"><i class="fa fa-user orange_color"></i> <span>Profil</span></a></li>
<li><a href="?mnu=_warga"><i class="fa fa-users blue1_color"></i> <span>Warga</span></a></li>
<li><a href="?mnu=bsurat"><i class="fa fa-envelope white_color"></i> <span>Surat</span></a></li>
<li><a href="?mnu=template"><i class="fa fa-envelope white_color"></i> <span>Template</span></a></li>
<li><a href="?mnu=siuran"><i class="fa fa-money green_color"></i> <span>Iuran</span></a></li>
<li class="active">
<a href="#additional_page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-clone yellow_color"></i> <span>Kartan</span></a>
<ul class="collapse list-unstyled" id="additional_page">
<li>
<a href="?mnu=kproposal"> <span>Proposal</span></a>
</li>

<li>
<a href="?mnu=kegiatan"> <span>Kegiatan</span></a>
</li>
<li>
<a href="?mnu=peserta"> <span>Peserta</span></a>
</li>
<li>
<a href="?mnu=informasi"> <span>Informasi</span></a>
</li>

</ul>
</li>


<?php
} else if($_SESSION["cstatus"]=="Warga"){
?>
<li><a href="?mnu=profil"><i class="fa fa-user orange_color"></i> <span>Profil</span></a></li>
<li><a href="?mnu=template"><i class="fa fa-envelope white_color"></i> <span>Template</span></a></li>
<li><a href="?mnu=bsurat"><i class="fa fa-envelope white_color"></i> <span>Surat</span></a></li>
<li><a href="?mnu=wiuran"><i class="fa fa-money green_color"></i> <span>Iuran</span></a></li>
<li class="active">
<a href="#additional_page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-clone yellow_color"></i> <span>Kartan</span></a>
<ul class="collapse list-unstyled" id="additional_page">
<li>
<a href="?mnu=sproposal"> <span>Proposal</span></a>
</li>

<li>
<a href="?mnu=skegiatan"> <span>Kegiatan</span></a>
</li>
<li>
<a href="?mnu=speserta"> <span>Peserta</span></a>
</li>
<li>
<a href="?mnu=sinformasi"> <span>Informasi</span></a>
</li>
<li>
</ul>
</li>
<?php } ?>
<li><a href="?mnu=logout"><i class="fa fa-sign-out red_color"></i> <span>Logout</span></a></li>
</ul>
</div>
</nav>