<?php
   include("admin/connection.php"); 
   include("admin/linkfunc.php");
   ob_start();
   session_start();

   @$link = @$_GET["link"];

   $data = $db->prepare("SELECT * FROM bloglarim WHERE link = ?");
   $data->execute([
      @$link
   ]);
   @$_data  = $data->fetch(PDO::FETCH_ASSOC);

   if(!isset($_SESSION["giris"]))
   {
      $tiklanma = $_data["view"];
      $new_tiklanma = intval($tiklanma) + 1;
      $tiklanmaUpdate = $db->prepare("UPDATE bloglarim SET view = ? WHERE id = ?");
      $tiklanmaUpdate->execute([$new_tiklanma, $_data["id"]]);
   }
?>
<!DOCTYPE html>
<html lang="tr" data-bs-theme="dark">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?php echo $_data["baslik"]; if($_data["kategori"]) { echo ' - '.$_data["kategori"]; }?> | TrinsyBlog</title>
   <link rel="shortcut icon" href="../T_LOGO_yuvarlak.png">

   <link rel="stylesheet" href="../styles.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<div id="preloader">
   <img id="preloaderimg" src="../T_LOGO_yuvarlak.png" alt="Yükleniyor..">
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
          <a class="nav-link active" aria-current="page" href="../"><i class="fa-solid fa-house"></i>&nbsp; Anasayfa</a>
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
            echo '<a href="../admin/index.php?sayfa=logout" class="btn btn-outline-success" style="border-radius: 15px; position: relative;"><i class="fa-solid fa-user"></i> '.$_SESSION["isim"].'</a>';
         }
      ?>
    </div>
  </div>
</nav>
<div class="wrapper">
   <div id="alertBox" class="alert alert-dark" role="alert"></div>
   <style>
      .alert
      {
         position:fixed;
         top:60%;
         left:50%;
         transform:translate(-50%,-50%);
         background: #1a1d209a;
         opacity:0;
         user-select:none;
         pointer-events:none;
         transition: 0.35s;
         z-index: 9999999999999999;
      }
   </style>
   <div class="container">
      <div class="row">
         <div class="col-lg-12 mb-5 blog">
            <h1><?php echo $_data["baslik"]; ?></h1>
            <div>
               <img src="<?php echo $_data["resim"] ?>" style="width:100%; margin-bottom:30px;border-radius: 20px;box-shadow: 0 0 10px 5px #e2985b;max-height: 600px;object-fit: cover; pointer-events:none;">
            </div>
            <p style="font-size:18px;">
            <?php
               if (stripos($_data["metin"], "``") !== false)
               {
                  $metin_ex = explode("``", $_data["metin"]);
                  $_data["metin"] = "";
                  foreach ($metin_ex as $index => $row)
                  {
                     $_data["metin"] .= ($index % 2 === 0) ? $row : "<div class=\"code\"><button onclick='copyCode()' class=\"copy\"><i class='fa-solid fa-clone'></i>&nbsp; Kodu Kopyala</button><div id=\"code\">" . $row . "</div><button onclick='toggleText();' class=\"more-opt\" id=\"more-opt\"><i class='fa-solid fa-caret-down'></i>&nbsp; Daha Fazla</button></div>";
                  }
               }

               echo nl2br($_data["metin"]);
            ?>
            </p>
            <div class="details-col">
               <div class="details">
                  <div>
                     <?php 
                     if(@$_data["tarih"])
                     {
                        echo '<strong class="d-flex justify-content-center">
                        Tarih : '.@$_data["tarih"].'
                        </strong>';
                     }
                     if(@$_data["kategori"])
                     {
                        echo '<strong class="d-flex justify-content-center">
                        Kategori : &nbsp; <a href="../'.permalink(@$_data["kategori"]).'">'.@$_data["kategori"].'</a>
                        </strong>';
                     } 
                     if(@$_data["yazar_adsoyad"] && @$_data["yazar"])
                     {
                        echo '<strong class="d-flex justify-content-center">
                        Yazar : &nbsp; <a href="">'.@$_data["yazar_adsoyad"].'</a>
                        </strong>';
                     }
                     ?>
                  </div>
                  <style>
                     strong { font-size: 18px; }
                     strong a
                     {
                        color: red; font-style: italic; text-decoration:none;
                        position:relative;
                     }
                     strong a::after
                     {
                        content: '';
                        position:absolute;
                        left:0; right:0; top:24px; bottom:0;
                        width: 0;
                        height: 3px;
                        border-radius: 10px;
                        background-color: red;
                        display: block;
                        margin: auto;
                        transition: 0.5s;
                     }
                     strong a:hover::after
                     {
                        width:100%;
                     }
                     .details-col
                     {
                        display:flex;
                        justify-content:end;
                     }
                     .details
                     {
                        background:rgba(0,0,0,0.45);
                        border-radius:20px;
                        padding: 12px;
                        width:fit-content;
                        display:flex;
                        flex-direction:column;
                        gap: 10px;
                        box-shadow: 0 0 15px 5px rgba(0,0,0,0.45);
                     }
                  </style>
                  <div class="d-flex justify-content-center align-items-center">
                     <button onclick="kopyala();" alt="Kopyala" class="paylas"><i class="fa-solid fa-link"></i></button>
                     <style>
                        .paylas
                        { padding: 8px 10px; border-radius: 50%; background: transparent; border:3px solid rgba(180,180,180); color: rgba(180,180,180); transition: 0.3s; }
                        .paylas:hover 
                        { background-color:white; color: var(--bs-body-bg); border-color: white; }
                     </style>
                     <script>
                        function delay(time) 
                        {
                           return new Promise(resolve => setTimeout(resolve, time));
                        }
                        function kopyala()
                        {
                           var sayfaLinki = window.location.href;
                           navigator.clipboard.writeText(sayfaLinki)
                           .then(function() {
                              alert("Sayfa Linki Kopyalandı");
                           })
                           .catch(function() {
                              alert("Sayfa Linki Kopyalanamadı");
                           });
                           var alert = document.getElementById("alertBox");
                           alert.innerHTML = "Link Kopyalandı";
                           alert.style.opacity = "1";
                           alert.style.top = "50%";
                           delay(1300).then(() => alert.style.opacity = "0");
                           delay(1300).then(() => alert.style.top = "60%");
                        }
                     </script>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script src="https://kit.fontawesome.com/b40b33d160.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="../scripts/blog.js"></script>
</body>
</html>