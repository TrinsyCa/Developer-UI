<?php
   include("../connection.php");
   include("../linkfunc.php");
?>
<!DOCTYPE html>
<html lang="tr" data-bs-theme="dark">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>TrinsyBlog</title>

   <link rel="stylesheet" href="../../styles.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   <?php
      session_start();
      if(!isset($_SESSION["giris"]))
      {
         echo '<b style="color:red; position:absolute; top:50%; left:50%; transform: translate(-50%,-50%); font-size:22px; font-style: italic;">Bu sayfayi görüntüleme yetkiniz yoktur.<p style="text-align:center; color: #E2985B; text-shadow: 0 0 15px #E2985B;">TrinsyBlog</p></b>';
         return;
      }
   ?>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
   <a class="navbar-brand" href="../../">
      <img src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
      TrinsyBlog
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../../">Bloglar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../">Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../bloglist/">Blog List</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Sosyal Medya
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="https://www.instagram.com/omer.islmoglu/" target="_blank">İnstagram</a></li>
            <li><a class="dropdown-item" href="https://twitter.com/TrinsyCa" target="_blank">Twitter</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="https://oislamoglu.bistbilisim.com/" target="_blank">Web Sitesi</a></li>
          </ul>
        </li>
      </ul>
      <?php echo '<a href="../index.php?sayfa=logout" class="btn btn-outline-success" style="border-radius: 15px; position: relative; margin-left: 15px;">'.$_SESSION["isim"].' - Çıkış Yap</a>'; ?>
    </div>
  </div>
</nav>
<div class="wrapper">
   <h1>Blog Yazısı Ekle</h1>
   <div class="container">
      <div class="row">
         <div class="col-lg-12 mt-5 mb-5">
            <?php
               if($_POST)
               {
                  $baslik = htmlspecialchars(@$_POST["baslik"]);
                  $metin = htmlspecialchars(@$_POST["metin"]);
                  $resim = htmlspecialchars(@$_POST["resim"]);
                  $link = permalink(@$_POST["baslik"]);

                  if(empty($baslik) || empty($metin) || empty($resim))
                  {
                     echo '<p class="alert alert-warning">Lütfen Boş Bırakmayınız..</p>';
                  }
                  else
                  {
                     $veriekle = $db->prepare("INSERT INTO bloglarim SET baslik = ? , metin = ? , link = ? , resim = ?");
                     $veriekle -> execute([
                        $baslik,
                        $metin,
                        $link,
                        $resim
                     ]);
                     if($veriekle)
                     {
                        echo '<p class="alert alert-success">Blog Yazısı Başarıyla Eklendi</p>';
                        header("REFRESH:2;URL=/");
                     }
                     else
                     {
                        echo '<p class="alert alert-danger">Blog Yazısı İle İlgili Bir Sorun Oluştu</p>';
                     }
                  }
               }
            ?>
            <form action=""method="post">
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
               <input type="submit" value="Paylaş" class="btn btn-outline-success">
            </form>
         </div>
      </div>
   </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>