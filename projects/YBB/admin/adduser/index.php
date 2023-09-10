<?php
   ob_start();
   session_start();
   include("../connection.php");
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
      .baslik_text
         {
            color: white;
            text-align:center;
            padding: 50px 0;
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
               <a class="nav-link" aria-current="page" href="./">Anasayfa</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="bloglar">Bloglar</a>
               </li>
               </li>
                  <li><a class="nav-link active" href="./">Admin</a></li>
                  <hr>
                  <li><a class="nav-link" href="../index.php?sayfa=logout">Çıkış Yap</a></li>
                  </ul>
               <?php
                if(isset($_SESSION["giris"]))
                {
                    echo '<li style="color:white; position:absolute; right:20px; list-style-type:none;">Kullanıcı : '.$_SESSION["isim"].'</li>';
                }
               ?>
            </ul>
        </div>
      </div>
    </nav>
    <div class="wrapper">
      <h1 class="baslik_text">
         Yazar Ekle
      </h1>
         
      <div class="container">
         <div class="row">
            <div class="col-lg-12 mt-5 mb-5">
               <form action="" method="post" style="user-select:none;">
                  <strong>Kullanıcı Adı : </strong>
                  <input type="text" name="isim" class="form-control">
                  <br>
                  <strong>Şifre : </strong>
                  <input type="password" name="sifre" class="form-control">
                  <br>
                  <div style="display:flex; justify-content: space-between; align-items:center; padding-bottom: 20px;">
                     <p></p>
                     <input type="submit" value="Yazar Ekle" class="btn btn-outline-success">
                  </div>
               </form>
               <?php
                  if(@$_POST)
                  {
                     $isim = $_POST["isim"];
                     $sifre = $_POST["sifre"];

                     if(empty($isim) ||  empty($sifre))
                     {
                        echo '<p class="alert alert-warning">Lütfen Boş Bırakmayınız..</p>';
                        header("Refresh:1; url=./");
                     }
                     else
                     {
                        $veriekle = $db->prepare("INSERT INTO admin SET isim = ? ,  sifre = ?");
                        $veriekle -> execute([
                           $isim,
                           $sifre
                        ]);
                        if($veriekle)
                        {
                           echo '<p class="alert alert-success">Yazar Başarıyla Eklendi</p>';
                           header("Refresh: 2; url=../../");
                        }
                        else
                        {
                           echo '<p class="alert alert-danger">Yazar Ekleme İle İlgili Bir Sorun Oluştu</p>';
                           header("Refresh:3; url=./");
                        }
                     }
                  }
               ?>
            </div>
         </div>
      </div>
   </div>
   <script src="https://kit.fontawesome.com/b40b33d160.js" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>