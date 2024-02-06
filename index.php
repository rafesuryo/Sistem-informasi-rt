<?php
if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
   error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
   error_reporting(E_ALL & ~E_NOTICE);
?>
<?php
session_start();
error_reporting(0);
require_once "konmysqli.php";

$mnu = "";
if (isset($_GET["mnu"])) {
   $mnu = $_GET["mnu"];
}
if (!isset($_SESSION["cid"])) {
   die("<script>location.href='login.php';</script>
   ");

}
?>
<?php require_once "layouts/header.php"; ?>

<body class="dashboard dashboard_1">
   <div class="full_container">
      <div class="inner_container">
         <?php require_once "layouts/sidebar.php"; ?>
         <div id="content">
            <?php require_once "layouts/topbar.php"; ?>
            <div class="midde_cont">
               <div class="container-fluid">
                  <div class="row column_title">
                     <div class="col-md-12">
                        <div class="page_title">
                           <h2>Dashboard</h2>
                        </div>
                     </div>
                  </div>
                  <?php
                  if ($mnu == "pengguna") {
                     require_once "pengguna/pengguna.php";
                  } else if ($mnu == "ubah_profil") {
                     require_once "pengguna/ubah_profil.php";
                  } else if ($mnu == "profil") {
                     require_once "pengguna/profil.php";   
                  
                  } else if ($mnu == "uprofil") {
                     require_once "warga/uprofil.php";
                  } else if ($mnu == "_profil") {
                     require_once "warga/_profil.php"; 
                     
                  } else if ($mnu == "warga") {
                     require_once "warga/warga.php";
                  } else if ($mnu == "surat") {
                     require_once "surat/surat.php";
                  } else if ($mnu == "iuran") {
                     require_once "iuran/iuran.php";
                  } else if ($mnu == "proposal") {
                     require_once "proposal/proposal.php";
                  } else if ($mnu == "informasi") {
                     require_once "informasi/informasi.php";
                  } else if ($mnu == "kegiatan") {
                     require_once "kegiatan/kegiatan.php";
                  } else if ($mnu == "peserta") {
                     require_once "peserta/peserta.php";
                  } else if ($mnu == "_warga") {
                     require_once "warga/_warga.php";

                  } else if ($mnu == "template") {
                     require_once "template/template.php";


                     //seketaris
                  } else if ($mnu == "surat") {
                     require_once "surat/surat.php";
                  } else if ($mnu == "siuran") {
                     require_once "iuran/siuran.php";
                  } else if ($mnu == "sproposal") {
                     require_once "proposal/sproposal.php";
                  } else if ($mnu == "sinformasi") {
                     require_once "informasi/sinformasi.php";
                  } else if ($mnu == "skegiatan") {
                     require_once "kegiatan/skegiatan.php";
                  } else if ($mnu == "speserta") {
                     require_once "peserta/speserta.php";


                     //bendahara
                  } else if ($mnu == "bsurat") {
                     require_once "surat/bsurat.php";
                  } else if ($mnu == "iuran") {
                     require_once "iuran/iuran.php";
                  } else if ($mnu == "sproposal") {
                     require_once "proposal/sproposal.php";
                  } else if ($mnu == "sinformasi") {
                     require_once "informasi/sinformasi.php";
                  } else if ($mnu == "skegiatan") {
                     require_once "kegiatan/skegiatan.php";
                  } else if ($mnu == "speserta") {
                     require_once "peserta/speserta.php";


                     //karang taruna
                  } else if ($mnu == "bsurat") {
                     require_once "surat/bsurat.php";
                  } else if ($mnu == "siuran") {
                     require_once "iuran/siuran.php";
                  } else if ($mnu == "kproposal") {
                     require_once "proposal/kproposal.php";
                  } else if ($mnu == "kegiatan") {
                     require_once "kegiatan/kegiatan.php";
                  } else if ($mnu == "peserta") {
                     require_once "peserta/peserta.php";

                  } else if ($mnu == "wiuran") {
                     require_once "iuran/wiuran.php";
                     

                  } else if ($mnu == "login") {
                     require_once "login.php";
                  } else if ($mnu == "logout") {
                     require_once "logout.php";
                  } 
				  else if ($mnu == "rekapitulasi") { require_once "rekapitulasi.php";}
				  else if ($mnu == "rekapitulasi2") { require_once "rekapitulasi2.php";}
				  else if ($mnu == "rekapitulasi3") { require_once "rekapitulasi3.php";}
				  else if ($mnu == "rekapitulasi4") { require_once "rekapitulasi4.php";}
				  else if ($mnu == "rekapitulasi5") { require_once "rekapitulasi5.php";}
				  else if ($mnu == "rekapitulasi6") { require_once "rekapitulasi6.php";}
				  
				  
				   else if ($mnu == "srekapitulasi") { require_once "rekapitulasi.php";}
				  else if ($mnu == "srekapitulasi2") { require_once "rekapitulasi2.php";}
				  else if ($mnu == "srekapitulasi3") { require_once "rekapitulasi3.php";}
				  else if ($mnu == "srekapitulasi4") { require_once "rekapitulasi4.php";}
				  else if ($mnu == "srekapitulasi5") { require_once "rekapitulasi5.php";}
				  else if ($mnu == "srekapitulasi6") { require_once "rekapitulasi6.php";}
				  
				  
				  
				  else if ($mnu == "grafik") { require_once "grafik.php";}
				  else if ($mnu == "grafik2") { require_once "grafik2.php";}
				  else if ($mnu == "grafik3") { require_once "grafik3.php";}
				  else if ($mnu == "grafik4") { require_once "grafik4.php";}
				  else if ($mnu == "grafik5") { require_once "grafik5.php";}
				  else if ($mnu == "grafik6") { require_once "grafik6.php";}
				  
				  
				 else if ($mnu == "srekapitulasi") {
                     require_once "rekapitulasi.php";
                  }
				   else if ($mnu == "krekapitulasi") {
                     require_once "rekapitulasi.php";
                  }
				  else {
                     require_once "home.php";
                  }
                  ?>
               </div>
               <?php require_once "layouts/footer.php"; ?>
            </div>
         </div>
      </div>
   </div>
   <?php 
   
   if($mnu=="rekapitulasi"||$mnu=="rekapitulasi2"||$mnu=="rekapitulasi3"||$mnu=="rekapitulasi4"||$mnu=="rekapitulasi5"||$mnu=="rekapitulasi6"){}
	else    if($mnu=="srekapitulasi"||$mnu=="srekapitulasi2"||$mnu=="srekapitulasi3"||$mnu=="srekapitulasi4"||$mnu=="srekapitulasi5"||$mnu=="srekapitulasi6"){}

   //else if($mnu=="warga"||$mnu=="swarga"){}
   else{
		require_once "layouts/js.php"; 
   }   
   ?>
</body>
</html>