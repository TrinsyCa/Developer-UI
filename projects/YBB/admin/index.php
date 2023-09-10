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
              <a class="nav-link" aria-current="page" href="../">Anasayfa</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="../bloglar">Bloglar</a>
            </li>
                  <li><a class="nav-link active" href="./">Admin</a></li>
                  <hr>
                  <li><a class="nav-link" href="index.php?sayfa=logout">Çıkış Yap</a></li>
            </ul>
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
            <?php echo "Hoşgeldin ". $_SESSION["isim"]?>
      </h1>
      <div class="container">
         <div class="row admin-menu">
            <div class="admin-menu-btns">
               <a href="addtext" class="btn btn-outline-success admin-menus">Blog Ekle</a>
               <a href="bloglist" class="btn btn-outline-success admin-menus">Blog List</a>
               <a href="adduser" class="btn btn-outline-success admin-menus">Yazar Ekle</a>
               <a href="yazarlar" class="btn btn-outline-success admin-menus">Yazarlar</a>
            </div>
         </div>
      </div>
      <style>
         .baslik_text
         {
            color: white;
            text-align:center;
            padding: 50px 0;
         }
         .admin-menu-btns
         {
            display:flex;
            flex-direction:column;
            align-items:center;
            gap: 15px;
         }
         .admin-menu
         {
            padding-top:30px;
            display:flex;
            flex-direction: column;
            justify-content:center;
            align-items:center;
         }
         .admin-menus
         {
            width:500px;
            font-size:28px;
         }
      </style>
   </div>
</body>
</html>