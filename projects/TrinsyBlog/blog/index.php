<?php
   include("../admin/connection.php"); 
   include("../admin/linkfunc.php");
   session_start();
   ob_start();
?>
<!DOCTYPE html>
<html lang="tr" data-bs-theme="dark">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Blog | TrinsyBlog</title>
   <link rel="shortcut icon" href="../T_LOGO.png">

   <link rel="stylesheet" href="../styles.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<div id="preloader">
   <img id="preloaderimg" src="../../../img/T_LOGO_yuvarlak.png" alt="Yükleniyor..">
</div>
<style>
   body
   {
      overflow:hidden;
   }
   ::-webkit-scrollbar
   {
      width: 0;
   }
   #preloader
   {
      position: absolute;
      background: #050505;
      width: 100%;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 99999;
      user-select: none;
      pointer-events: none;
      transition: 0.6s;
      overflow: hidden;
   }
   #preloader img
   {
      width: 220px;
      box-shadow: 0 0 100px 50px #151515;
      border-radius: 70px;
      overflow: hidden;
      animation: preloader_anim 1.8s ease-in-out infinite;
      transition: 1.3s;
   }
   @keyframes preloader_anim
   {
      0%
      {
         width: 220px;
      }
      50%
      {
         width: 320px;
         border-radius: 85px;
      }
   }
</style>
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
        <?php
         
         if(isset($_SESSION["giris"]))
         {
            echo '<li class="nav-item">
                     <a class="nav-link" aria-current="page" href="../admin/"><i class="fa-solid fa-lock"></i>&nbsp; Admin</a>
                  </li>';
         }
         ?>
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-grip"></i>&nbsp; Kategori
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item active" href="./"><i class="fa-solid fa-scroll"></i>&nbsp; Blog</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../yazilim"><i class="fa-solid fa-code"></i>&nbsp; Yazılım</a></li>
            <li><a class="dropdown-item" href="../photoshop"><i class="fa-solid fa-images"></i>&nbsp; Photoshop</a></li>
            <li><a class="dropdown-item" href="../video-dizayn"><i class="fa-solid fa-video"></i>&nbsp; Video Dizayn</a></li>
            <li><a class="dropdown-item" href="../robotik-kodlama"><i class="fa-solid fa-code"></i>&nbsp; Robotik Kodlama</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../proje-duyuru"><i class="fa-solid fa-bullhorn"></i>&nbsp; Proje Duyuru</a></li>

          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
            echo '<a href="../admin/index.php?sayfa=logout" class="btn btn-outline-success" style="border-radius: 15px; position: relative;"><i class="fa-solid fa-user"></i> '.$_SESSION["isim"].'</a>';
         }
      ?>
    </div>
  </div>
</nav>
<div class="wrapper">
   <h1 style="color:#E7B761;">
      Blog 
   </h1>
   <div class="container">
      <div class="row">
      <?php
         $veri = $db->prepare("SELECT * FROM bloglarim WHERE kategori='Blog' ORDER BY id DESC");
         $veri->execute();
         $islem = $veri->fetchAll(PDO::FETCH_ASSOC);
         foreach($islem as $row)
         {
            echo '<div class="col-lg-4 mb-4">
                     <div class="card">
                        <a href="../blog.php?link='.$row["link"].'">
                           <div>
                              <div>
                                 <a href="@'.$row["yazar"].'" class="author" target="_blank">'.$row["yazar"].'</a>
                                 <a href="../blog.php?link='.$row["link"].'">
                                    <img class="card-pic" src="'.$row["resim"].'" >
                                    <div class="card-pic-shadow"></div>
                                 </a>
                              </div>
                              <style>
                                 .card img{ transition: 0.4s; border-bottom: 3px solid transparent; position:relative; }
                                 .card:hover img{scale:1.1;; border-bottom: 3px solid #E7B761;} 
                                 .card-pic-shadow { position:absolute; top:0; width:415px; height:165px; background: linear-gradient(to bottom, rgba(0,0,0,0.6), transparent 80%); opacity:0; transition:0.35s; }
                                 .card:hover .card-pic-shadow { opacity:1; }
                                 .author { position:absolute; z-index:100; top:5px; right:-55px; opacity:0; transition:0.4s;  font-style: italic; color:rgba(255,255,255,0.9); }
                                 .card:hover .author { right:10px; opacity:1; }
                                 .author::after
                                 {
                                    content: "";
                                    position:absolute;
                                    left:0; right:0; top:20px; bottom:0;
                                    width: 0;
                                    height: 3px;
                                    border-radius: 10px;
                                    background-color: rgba(255,255,255,0.9) ;
                                    display: block;
                                    margin-left: auto;
                                    transition: 0.5s;
                                 }
                                 .author:hover::after { width:100%; }
                              </style>
                           </div>
                           <a href="../blog.php?link='.$row["link"].'" class="card-body" style="padding:16px;">
                              <div class="card-title"><h3 style="color:#E7B761; text-shadow: 0 4px 4px black;">'.kisalt($row["baslik"],22).'</h3></div>
                              <div class="card-text" style="width:100%; height:100%; color:rgba(255,255,255,0.6);">'.kisalt($row["metin"], 120).'</div>
                              <a href="../blog.php?link='.$row["link"].'" style="display:flex; justify-content:space-between; align-items:center; width: 94%; height: 40px; position:absolute; bottom: 10px; right: 10px;>
                                 <span style="width: 100%; display:flex; align-items:center"><p class="card-date">Tarih: '.$row["tarih"].'</p></span> <style> .card-date { height:1px; color:rgba(255,255,255,0.5); margin-top:65px; opacity:0; transition:0.5s; } .card:hover .card-date { opacity:1; margin-top:0; } </style>
                                 <div class="btn btn-outline-success" style="border-radius: 15px;">Devamını Oku</div>
                              </a>
                           </a>
                        </a>
                     </div>
                  </div>';
         }
      ?>
      </div>
   </div>
</div>
<script src="https://kit.fontawesome.com/b40b33d160.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script>
   const preloader = document.getElementById("preloader");
   const preloaderimg = document.getElementById("preloaderimg");
   const body = document.querySelector("body");
   function delay(time) 
   {
      return new Promise(resolve => setTimeout(resolve, time));
   }
   window.addEventListener('load', function()
   {
      preloaderimg.style.marginTop = "1200px";
      preloaderimg.style.width = "220px";
      preloader.style.opacity = "0";
      delay(300).then(() => body.style.overflow = "auto");
   });
</script>
</body>
</html>