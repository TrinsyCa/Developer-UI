<!DOCTYPE html>
<html lang="tr" data-bs-theme="dark">
   <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Admin | TrinsyBlog</title>
       <link rel="shortcut icon" href="../T_LOGO.png">

       <link rel="stylesheet" href="../styles.css">
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
      <?php
         session_start();
         if(!isset($_SESSION["giris"]))
         {
            header("Refresh: 0; url=login.php");
            return;
         }
      ?>
   </head>
   <body>
   <?php 
      ob_start();
      @$sayfa = $_GET["sayfa"]; 	
      Switch($sayfa)
      {
         case "logout";	
         include("logout.php");	
         break;
      }
   ?>
   <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
         <a class="navbar-brand" href="../" style="color:#E7B761; display:flex; align-items:center; gap: 10px;">
            <img src="../T_LOGO.png" alt="Logo" width="35" height="35" class="d-inline-block align-text-top">
            <h1 style="font-size: 20px; height:15px;">TrinsyBlog<?php if(isset($_SESSION["giris"])) { echo ' | '.$_SESSION["isim"]; }?></h1>
         </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="../"><i class="fa-solid fa-house"></i>&nbsp; Anasayfa</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="./"><i class="fa-solid fa-lock"></i>&nbsp; Admin</a>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     <i class="fa-solid fa-grip"></i>&nbsp; Kategori
                  </a>
                  <ul class="dropdown-menu">
                     <li><a class="dropdown-item" href="../blog"><i class="fa-solid fa-scroll"></i>&nbsp; Blog</a></li>
                     <li><hr class="dropdown-divider"></li>
                     <li><a class="dropdown-item" href="../yazilim"><i class="fa-solid fa-code"></i>&nbsp; Yazılım</a></li>
                     <li><a class="dropdown-item" href="../photoshop"><i class="fa-solid fa-images"></i>&nbsp; Photoshop</a></li>
                     <li><a class="dropdown-item" href="../video-dizayn"><i class="fa-solid fa-video"></i>&nbsp; Video Dizayn</a></li>
                     <li><a class="dropdown-item" href="../robotik-kodlama"><i class="fa-solid fa-code"></i>&nbsp; Robotik Kodlama</a></li>
                     <li><hr class="dropdown-divider"></li>
                     <li><a class="dropdown-item" href="../proje-duyuru" target="_blank"><i class="fa-solid fa-bullhorn"></i>&nbsp; Proje Duyuru</a></li>
                  </ul>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     <i class="fa-solid fa-heart"></i>&nbsp; Sosyal Medya
                  </a>
                  <ul class="dropdown-menu">
                     <li><a class="dropdown-item" href="https://www.instagram.com/omer.islmoglu/" target="_blank"><i class="fa-brands fa-instagram"></i>&nbsp; İnstagram</a></li>
                     <li><a class="dropdown-item" href="https://twitter.com/TrinsyCa" target="_blank"><i class="fa-brands fa-twitter"></i>&nbsp; Twitter</a></li>
                     <li><hr class="dropdown-divider"></li>
                     <li><a class="dropdown-item" href="https://oislamoglu.bistbilisim.com/" target="_blank"><i class="fa-solid fa-globe"></i>&nbsp; Web Sitesi</a></li>
                  </ul>
               </li>
            </ul>
            <?php
               if(isset($_SESSION["giris"]))
               {
                  echo '<a href="index.php?sayfa=logout" class="btn btn-outline-success" style="border-radius: 15px; position: relative;"><i class="fa-solid fa-user"></i> '.$_SESSION["isim"].'</a>';
               }
            ?>
         </div>
      </div>
   </nav>
   <div class="wrapper">
      <h1 style="color:#E7B761;">
            <?php echo "Hoşgeldin ". $_SESSION["isim"]?>
      </h1>
      <div class="container">
         <div class="row admin-menu">
            <div class="admin-menu-btns">
               <a href="addtext" class="btn btn-outline-success admin-menus">Blog Ekle</a>
               <a href="bloglist" class="btn btn-outline-success admin-menus">Blog List</a>
            </div>
            <div class="admin-menu-btns">
               <a href="adduser" class="btn btn-outline-success admin-menus">Yazar Ekle</a>
               <a href="yazarlar" class="btn btn-outline-success admin-menus">Yazarlar</a>
            </div>
         </div>
      </div>
      <style>
         .admin-menu
         {
            padding-top:30px;
            display:flex;
            flex-direction: column;
            gap:10px;
            justify-content:center;
            align-items:center;
         }
         .admin-menu-btns
         {
            display:flex;
            justify-content:center;
            align-items:center;
         }
         .admin-menu-btns .admin-menus:nth-child(1)
         {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
            width:300px;
         }
         .admin-menu-btns .admin-menus:nth-child(2)
         {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
            width:300px;
         }
         .admin-menus
         {
            border-radius: 18px;
            width:600px;
            font-size:24px;
         }
      </style>
   </div>
   <script src="https://kit.fontawesome.com/b40b33d160.js" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
   </body>
</html>