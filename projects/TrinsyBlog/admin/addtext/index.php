<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="tr" data-bs-theme="dark">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Blog Ekle - Admin Paneli | TrinsyBlog</title>
   <link rel="shortcut icon" href="../../T_LOGO.png">

   <link rel="stylesheet" href="../../styles.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   <?php
      session_start();
      if(!isset($_SESSION["giris"]))
         {
            echo '<b style="color:red; user-select:none; position:absolute; top:50%; left:50%; transform: translate(-50%,-50%); font-size:22px; font-style: italic;">
                  Bu sayfayi görüntüleme yetkiniz yoktur.
               <p style="text-align:center; color: #E7B761; font-size:28px; text-shadow: 0 0 15px #E2985B;">
               <img src="../../T_LOGO.png" alt="Logo" width="35" height="35" class="d-inline-block align-text-center"> 
                  TrinsyBlog
                  <img src="../../T_LOGO.png" alt="Logo" width="35" height="35" class="d-inline-block align-text-center"> 
               </p>
               </b>';
            return;
         }
   ?>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
         <a class="navbar-brand" href="../../" style="color:#E7B761; display:flex; align-items:center; gap: 10px;">
            <img src="../../T_LOGO.png" alt="Logo" width="35" height="35" class="d-inline-block align-text-top">
            <h1 style="font-size: 20px; height:15px;">TrinsyBlog<?php echo ' | '.$_SESSION["isim"]; ?></h1>
         </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="../../"><i class="fa-solid fa-house"></i>&nbsp; Anasayfa</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="../"><i class="fa-solid fa-lock"></i>&nbsp; Admin</a>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     <i class="fa-solid fa-grip"></i>&nbsp; Kategori
                  </a>
                  <ul class="dropdown-menu">
                     <li><a class="dropdown-item" href="../../blog"><i class="fa-solid fa-scroll"></i>&nbsp; Blog</a></li>
                     <li><hr class="dropdown-divider"></li>
                     <li><a class="dropdown-item" href="../../yazılım"><i class="fa-solid fa-code"></i>&nbsp; Yazılım</a></li>
                     <li><a class="dropdown-item" href="../../photoshop"><i class="fa-solid fa-images"></i>&nbsp; Photoshop</a></li>
                     <li><a class="dropdown-item" href="../../video-dizayn"><i class="fa-solid fa-video"></i>&nbsp; Video Dizayn</a></li>
                     <li><a class="dropdown-item" href="../../robotik-kodlama"><i class="fa-solid fa-code"></i>&nbsp; Robotik Kodlama</a></li>
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
                  echo '<a href="../index.php?sayfa=logout" class="btn btn-outline-success" style="border-radius: 15px; position: relative;"><i class="fa-solid fa-user"></i> '.$_SESSION["isim"].'</a>';
            ?>
         </div>
      </div>
   </nav>
<div class="wrapper">
      <h1 style="color:#E7B761;">
         Blog Ekle | TrinsyBlog
      </h1>
   <div class="container">
      <div class="row">
         <div class="col-lg-12 mt-5 mb-5">
            <?php
            include("../connection.php");
            include("../linkfunc.php");
               if(@$_POST)
               {
                  @$baslik = htmlspecialchars(@$_POST["baslik"]);
                  @$metin = htmlspecialchars(@$_POST["metin"]);
                  @$resim = htmlspecialchars(@$_POST["resim"]);
                  @$kategori = htmlspecialchars(@$_POST["kategori"]);
                  @$link = permalink(@$_POST["baslik"])."/about=".permalink(@$_POST["kategori"]);
                  @$yazar = @$_SESSION["adsoyad"];

                  if(empty(@$baslik) || empty(@$metin) || empty(@$resim) || empty(@$kategori))
                  {
                     echo '<p class="alert alert-warning">Lütfen Boş Bırakmayınız..</p>';
                     header("Refresh:1; url=./");
                  }
                  else
                  {
                     $veriekle = $db->prepare("INSERT INTO bloglarim SET baslik = ? , metin = ? , link = ? , resim = ? , kategori = ? , yazar = ?");
                     $veriekle -> execute([
                        @$baslik,
                        @$metin,
                        @$link,
                        @$resim,
                        @$kategori,
                        @$yazar
                     ]);
                     if($veriekle)
                     {
                        echo '<p class="alert alert-success">Blog Yazısı Başarıyla Eklendi</p>';
                        header("Refresh: 2; url=../../");
                     }
                     else
                     {
                        echo '<p class="alert alert-danger">Blog Yazısı İle İlgili Bir Sorun Oluştu</p>';
                        header("Refresh:3; url=./");
                     }
                  }
               }
            ?>
            <form action=""method="post" style="user-select:none;">
               <strong>Başlık: </strong>
               <input type="text" name="baslik" class="form-control">
               <br>
               <strong>Yazı: </strong>
               <textarea name="metin" id="" cols="30" rows="10" class="form-control"></textarea>
               <br>
               <strong>Resim Linki: </strong>
               <input type="text" name="resim" class="form-control">
               <!--<input type="file" name="resim" class="form-control">-->
               <br>
               <input type="text" name="kategori" id="kategori" class="form-control" style="user-select:none; pointer-events:none; display:none;">
               <div style="display:flex; justify-content: space-between; align-items:center;">
                  <div class="btn-group dropend kategori">
                     <button class="btn btn-secondary dropdown-toggle" type="button" id="kategoriemote" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-grip"></i>&nbsp; Kategori
                     </button>
                     
                     <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a onclick="blog();" class="dropdown-item"><i class="fa-solid fa-scroll"></i>&nbsp; Blog</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a onclick="kodlama();" class="dropdown-item"><i class="fa-solid fa-code"></i>&nbsp; Yazılım</a></li>
                        <li><a onclick="photoshop();" class="dropdown-item"><i class="fa-solid fa-images"></i>&nbsp; Photoshop</a></li>
                        <li><a onclick="video_dizayn();" class="dropdown-item"><i class="fa-solid fa-video"></i>&nbsp; Video Dizayn</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a onclick="proje_duyuru();" class="dropdown-item"><i class="fa-solid fa-bullhorn"></i>&nbsp; Proje Duyuru</a></li>
                     </ul>
                  </div>
                  <script>
                     ke = document.getElementById("kategoriemote");
                     k = document.getElementById("kategori");

                     function blog() { ke.innerHTML = '<i class="fa-solid fa-scroll"></i>&nbsp; Blog'; k.value = "Blog"; }
                     function kodlama() { ke.innerHTML = '<i class="fa-solid fa-code"></i>&nbsp; Yazılım'; k.value = "Yazılım"; }
                     function photoshop() { ke.innerHTML = '<i class="fa-solid fa-images"></i>&nbsp; Photoshop'; k.value = "Photoshop"; }
                     function video_dizayn() { ke.innerHTML = '<i class="fa-solid fa-video"></i>&nbsp; Video Dizayn'; k.value = "Video Dizayn"; }
                     function proje_duyuru() { ke.innerHTML = '<i class="fa-solid fa-bullhorn"></i>&nbsp; Proje Duyuru'; k.value = "Proje Duyuru"; }
                  
                     //btn = document.getElementById("btntxt");
                     //function btnn() { btn.value = "sa"; }
                  </script>
                  <div><?php echo '<a class="author_href" href=../../@'.@$_SESSION["isim"].' target="_blank">Yazar : '.@$_SESSION["adsoyad"].'</a>'; ?></div>
                  <style>
                     .author_href
                     { font-size:22px; color:#ADB5BD; text-decoration:none; transition:0.35s; position:relative; }
                     .author_href::after
                     { position:absolute; bottom:-4px; left:0; right:0; content:''; display:block; width:0; height:4px; border-radius:10px; margin:auto; transition:0.35s; background-color: #ADB5BD; }
                     .author_href:hover
                     { color:red; }
                     .author_href:hover::after
                     { width:100%; background-color:red; }
                  </style>
                  <input type="submit" value="Paylaş" class="btn btn-outline-success">
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<script src="https://kit.fontawesome.com/b40b33d160.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>