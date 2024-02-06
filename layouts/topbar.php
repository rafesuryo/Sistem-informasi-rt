<div class="topbar">
   <nav class="navbar navbar-expand-lg navbar-light">
      <div class="full">
         <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
         <div class="logo_section">
            <!-- <a href="index.html"><img class="img-responsive" src="images/logo/logo.png" alt="#" /></a> -->
         </div>
         <div class="right_topbar">
            <div class="icon_info">
               <ul class="user_profile_dd">
                  <li>
                     <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="images/layout_img/user_img.jpg" alt="#" /><span class="name_user"><?php echo $_SESSION["cnama"]; ?></span></a>
                     <div class="dropdown-menu">
                        <?php
                        if($_SESSION["cstatus"]=="Ketua RT"){
                           echo"";
                        }else if($_SESSION["cstatus"]=="Sekertaris"){
                           echo"<a class='dropdown-item' href='?mnu=profil'>Profil</a>";
                        }else if($_SESSION["cstatus"]=="Bendahara"){
                           echo"<a class='dropdown-item' href='?mnu=profil'>Profil</a>";
                        }else if($_SESSION["cstatus"]=="Karang Taruna"){
                           echo"<a class='dropdown-item' href='?mnu=profil'>Profil</a>";
                        }
                        ?>
                        <a class="dropdown-item" href="?mnu=logout"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </nav>
</div>