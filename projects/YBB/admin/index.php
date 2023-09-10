<!DOCTYPE html>
<html lang="tr-TR" data-bs-theme="dark">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin | YBB</title>

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
        <a class="navbar-brand" href="../">
            <img src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="34" height="28" class="d-inline-block align-text-center">
            Yusuf Buğra Blog
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../">Anasayfa</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="../bloglar">Bloglar</a>
            </li>
            <li class="nav-item dropdown">
               <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                  Admin
               </button>
               <ul class="dropdown-menu dropdown-menu-dark">
                  <li><a class="dropdown-item" href="blog-ekle">Blog Ekle</a></li>
                  <li><a class="dropdown-item" href="blog-duzenle">Blog Düzenle</a></li>
                  <hr>
                  <li><a class="dropdown-item" href="kullanici-ekle">Kullanıcı Ekle</a></li>
                  <li><a class="dropdown-item" href="kullanici-duzenle">Kullanıcı Düzenle</a></li>
                  <hr>
                  <li><a class="dropdown-item" href="index.php?sayfa=logout">Çıkış Yap</a></li>
               </ul>
            </li>
            </ul>
        </div>
      </div>
    </nav>
</body>
</html>