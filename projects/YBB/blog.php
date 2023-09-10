<?php
   ob_start();
   session_start();
   include("admin/connection.php");

   $link = $_GET["link"];

   $data = $db->prepare("SELECT * FROM bloglarim WHERE link = ?");
   $data->execute([
      $link
   ]);
   $_data  = $data->fetch(PDO::FETCH_ASSOC);
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
               <a class="nav-link active" aria-current="page" href="./">Anasayfa</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="bloglar">Bloglar</a>
               </li>
               <?php
                  if(@$_SESSION["giris"])
                  {
                     echo '<li><a class="nav-link" href="admin">Admin</a></li>
                     <hr>
                     <li><a class="nav-link" href="admin/index.php?sayfa=logout">Çıkış Yap</a></li>';
                  }
               ?>
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
        <h1 class="baslik_text"><?php echo $_data["baslik"]; ?></h1>
        <div class="container">
            <div class="row">
                <div style="display:flex; justify-content:center;">
                    <img src="<?php echo $_data["resim"] ?>" style="width:750px; margin-bottom:30px;border-radius: 10px;box-shadow: 0 0 15px 15px black;max-height: 500px;object-fit: cover; pointer-events:none;">
                </div>
                <p style="font-size:18px;">
                    <?php echo $_data["metin"]; ?>
                </p>
                <p style="text-align:center; font-size: 24px;">
                    Yazar : <?php echo $_data["yazar"] ?>
                </p>
            </div>
        </div>
    </div>
</body>