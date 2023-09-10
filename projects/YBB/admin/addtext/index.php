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
   <title>Admin | YBB</title>
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
        <a class="navbar-brand" href="../../">
            <img src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="34" height="28" class="d-inline-block align-text-center">
            Yusuf Buğra Blog
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav" style="display:flex; align-items:center;">
               <li class="nav-item">
               <a class="nav-link" aria-current="page" href="../../">Anasayfa</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="../bloglar">Bloglar</a>
               </li>
               </li>
                  <li><a class="nav-link active" href="../">Admin</a></li>
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
         Blog Ekle
      </h1>
   <div class="container">
      <div class="row">
         <div class="col-lg-12 mt-5 mb-5">
            <?php
            include("../connection.php");
               if(@$_POST)
               {
                  $baslik = $_POST["baslik"];
                  $metin = $_POST["metin"];
                  $resim = $_POST["resim"];
                  $link = $_POST["baslik"];
                  $yazar = $_SESSION["isim"];

                  if(empty(@$baslik) || empty(@$metin) || empty(@$resim))
                  {
                     echo '<p class="alert alert-warning">Lütfen Boş Bırakmayınız..</p>';
                     header("Refresh:1; url=./");
                  }
                  else
                  {
                     $veriekle = $db->prepare("INSERT INTO bloglarim SET baslik = ? , metin = ? , link = ? , resim = ? , yazar = ?");
                     $veriekle -> execute([
                        $baslik,
                        $metin,
                        $link,
                        $resim,
                        $yazar,
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
                  <div><?php echo '<p class="author">Yazar : '.@$_SESSION["isim"].'</p>'; ?></div>
                  <input type="submit" value="Paylaş" class="btn btn-outline-success">
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<style>
.author
{
    font-size:22px;
    color:#ADB5BD;
    text-decoration:none;
    transition:0.35s;
    position:relative;
}
.author:hover
{
    color:white;
}
.author:hover::after
{
    width:100%; background-color:red;
}
 .baslik_text
{
    color: white;
    text-align:center;
    padding: 50px 0;
}
</style>
</body>