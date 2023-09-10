<?php
   ob_start();
   session_start();
?>
<!DOCTYPE html>
<html lang="tr-TR" data-bs-theme="dark">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Yusuf Buğra Blog</title>
   <link rel="shortcut icon" href="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg">
   
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

   <style>
      *
      {
         padding: 0;
         margin: 0;
         box-sizing: border-box;
      }
      .haber-resim
      {
         height: 190px;
         width: 100%;
         object-fit: cover;
      }
      .haber
      {
         padding: 0;
         border-radius: 15px;
         overflow: hidden;
      }
   </style>
</head>
<body>
   <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="./">
            <img src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="34" height="28" class="d-inline-block align-text-center">
            Yusuf Buğra Blog
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav" style="display:flex; align-items:center;">
               <li class="nav-item">
               <a class="nav-link active" aria-current="page" href="./">Anasayfa</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="bloglar">Bloglar</a>
               </li>
               <?php
                  if(!@$_SESSION["giris"])
                  {
                     echo '<li class="nav-item">
                              <a class="nav-link" href="admin/">Admin Girişi</a>
                           </li>';
                  }
                  if(@$_SESSION["giris"])
                  {
                     echo '<li class="nav-item dropdown">
                              <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                 Admin
                              </button>
                              <ul class="dropdown-menu dropdown-menu-dark">
                                 <li><a class="dropdown-item" href="admin/blog-ekle">Blog Ekle</a></li>
                                 <li><a class="dropdown-item" href="admin/blog-duzenle">Blog Düzenle</a></li>
                                 <hr>
                                 <li><a class="dropdown-item" href="admin/kullanici-ekle">Kullanıcı Ekle</a></li>
                                 <li><a class="dropdown-item" href="admin/kullanici-duzenle">Kullanıcı Düzenle</a></li>
                                 <hr>
                                 <li><a class="dropdown-item" href="admin/index.php?sayfa=logout">Çıkış Yap</a></li>
                              </ul>
                           </li>';
                  }
               ?>
               <?php
                  if(isset($_SESSION["giris"]))
                  { echo '<li style="color:white; position:absolute; right:20px;">Kullanıcı : '.$_SESSION["isim"].'</li>'; }
               ?>
            </ul>
        </div>
      </div>
    </nav>
    <div class="wrapper">
      <h1 style="text-align: center; padding: 50px 0;">Yusuf Buğra Blog</h1>
      <div class="container">
         <div class="row" style="display: flex; justify-content: center; gap: 35px;">
            <div class="card mb-3 haber" style="max-width: 600px; max-height: 192px;">
               <div class="row g-0">
                 <div class="col-md-4">
                   <img src="../../img/bg-wallpaper.jpg" class="img-fluid rounded-start haber-resim">
                 </div>
                 <div class="col-md-8">
                   <div class="card-body">
                     <h5 class="card-title">Card title</h5>
                     <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                     <div style="display: flex; justify-content: space-between;">
                        <p class="card-text" style="padding-top: 10px;"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                        <p class="card-text"><a href="#" class="btn btn-primary">Devamını Gör</a></p>
                     </div>
                   </div>
                 </div>
               </div>
            </div>
            <div class="card mb-3 haber" style="max-width: 600px; max-height: 192px;">
               <div class="row g-0">
                 <div class="col-md-4">
                   <img src="../../img/TrinsyCa.png" class="img-fluid rounded-start haber-resim">
                 </div>
                 <div class="col-md-8">
                   <div class="card-body">
                     <h5 class="card-title">Card title</h5>
                     <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                     <div style="display: flex; justify-content: space-between;">
                        <p class="card-text" style="padding-top: 10px;"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                        <p class="card-text"><a href="#" class="btn btn-primary">Devamını Gör</a></p>
                     </div>
                   </div>
                 </div>
               </div>
            </div>
         </div>
      </div>
    </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>