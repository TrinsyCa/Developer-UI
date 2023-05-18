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
       <title>Yönetici Girişi</title>
       <link rel="stylesheet" href="../../styles.css">
       <style>
         table
         {
            border-radius:20px;
            overflow: hidden;
            box-shadow: 0 0 5px 2px red;
         }
         table a
         {
            text-decoration: none;
            color:white;
         }
       </style>
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
          <a class="nav-link active" aria-current="page" href="../addtext/">Blog Ekle</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
      <?php echo "<h1>Hoşgeldin ". $_SESSION["isim"]."</h1>"?>
         
      <div class="container">
         <div class="row">
            <div class="col-lg-12 mt-5 mb-5">
               <table class="table table-dark table-striped">
                  <tr>
                     <td></td>
                     <td>Başlık</td>
                     <td>Tarih</td>
                     <td></td>
                  </tr>
                  <?php
                     if(isset($_SESSION["giris"]))
                     {
                        include("../connection.php");
                        $veri = $db->prepare("SELECT * FROM bloglarim ORDER BY id DESC");
                        $veri->execute();
                        $islem = $veri->fetchAll(PDO::FETCH_ASSOC);
                     
                        foreach($islem as $row)
                        {
                           echo '<tr>
                                    <td></td>
                                    <td><a href="blog.php?link='.$row["baslik"].'"target="_blank">'.$row["baslik"].'</a></td>
                                    <td><a href="blog.php?link='.$row["baslik"].'"target="_blank">'.$row["tarih"].'</a></td>
                                    <td></td>
                                 </tr>';
                        }
                     }
                  ?>
                  <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                  </tr>
               </table>
            </div>
         </div>
      </div>
   </div>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
   </body>
</html>