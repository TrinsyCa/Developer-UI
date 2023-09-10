<?php
   ob_start();
   include("../connection.php");
   include("../linkfunc.php");
?>
<!DOCTYPE html>
<html lang="tr" data-bs-theme="dark">
   <head>
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Blog List - Admin Paneli | TrinsyBlog</title>
       <link rel="shortcut icon" href="../../T_LOGO.png">

       <link rel="stylesheet" href="../../styles.css">
       <style>
         table
         {
            border-radius:20px;
            overflow: hidden;
            box-shadow: 0 0 15px 8px #E7B761;
         }
         table a
         {
            text-decoration: none;
            color:white;
         }
         .do-btn
         {
            padding: 0 5px;
            border-radius: 8px;
         }
         #edit-btn
         {
            background:#0079FF;
         }
         #trash-btn
         {
            background:red;
         }
       </style>
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
       <?php
         session_start();
         if(!isset($_SESSION["giris"]))
         {
            echo '<b style="color:red; user-select:none; position:absolute; top:50%; left:50%; transform: translate(-50%,-50%); font-size:22px; font-style: italic;">
                  Bu sayfayi görüntüleme yetkiniz yoktur.
               <a href="../../" style="text-decoration:none; text-align:center; color: #E7B761; font-size:28px; text-shadow: 0 0 15px #E2985B; display:flex; justify-content:center; align-items:center;  gap: 10px; margin-top: 5px;">
                  <img src="../../T_LOGO.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-center"> 
                     <h1>TrinsyBlog</h1>
                  <img src="../../T_LOGO.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-center"> 
               </a>
               </b>';
            return;
         }
      ?>
   </head>
   <body>
   <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
         <a class="navbar-brand" href="./" style="color:#E7B761; display:flex; align-items:center; gap: 10px;">
            <img src="../../T_LOGO.png" alt="Logo" width="35" height="35" class="d-inline-block align-text-top">
            <h1 style="font-size: 20px; height:15px;">TrinsyBlog<?php if(isset($_SESSION["giris"])) { echo ' | '.$_SESSION["isim"]; }?></h1>
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
               if(isset($_SESSION["giris"]))
               {
                  echo '<a href="../index.php?sayfa=logout" class="btn btn-outline-success" style="border-radius: 15px; position: relative;"><i class="fa-solid fa-user"></i> '.$_SESSION["isim"].'</a>';
               }
            ?>
         </div>
      </div>
   </nav>
   <div class="wrapper">
      <h1 style="color:#E7B761;">
         Blog List | TrinsyBlog
      </h1>
         
      <div class="container">
         <div class="row">
            <div class="col-lg-12 mt-5 mb-5">
               <table class="table table-dark table-striped">
                  <tr>
                     <td></td>
                     <td style="padding-left: 15px; font-size: 24px;">Başlık</td>
                     <td style="text-align:center; font-size: 24px;">Kategori</td>
                     <td style="text-align:center; font-size: 24px;">Tarih</td>
                     <td style="text-align:center; width: 150px; font-size:24px;">Sil / Düzenle</td>
                     <td></td>
                  </tr>
                  <?php
                     if(isset($_SESSION["giris"]))
                     {
                        $veri = $db->prepare("SELECT * FROM bloglarim ORDER BY id DESC");
                        $veri->execute();
                        $islem = $veri->fetchAll(PDO::FETCH_ASSOC);
                     
                        foreach($islem as $row)
                        {
                           if($row["baslik"] == null)
                           {
                              $row["baslik"] = '<i style="color:grey;" class="fa-solid fa-question"></i>';
                           }
                           if($row["kategori"] == null)
                           {
                              $row["kategori"] = '<i style="color:grey;" class="fa-solid fa-question"></i>';
                           }
                           if($row["tarih"] == null)
                           {
                              $row["tarih"] = '<i style="color:grey;" class="fa-solid fa-question"></i>';
                           }
                           echo '<tr>
                                    <td></td>
                                    <td><a href="../../blog.php?link='.$row["link"].'"target="_blank">'.$row["baslik"].'</a></td>
                                    <td style="text-align:center;"><a href="../../blog.php?link='.$row["link"].'"target="_blank">'.$row["kategori"].'</a></td>
                                    <td style="text-align:center;"><a href="../../blog.php?link='.$row["link"].'"target="_blank">'.$row["tarih"].'</a></td>
                                    <td style="text-align:center;">
                                    <button onclick="duzenle(sutunId)">Düzenle</button>
                                       <button id="trash-btn" class="do-btn" onclick="sil('.$row["id"].');"><i class="fa-solid fa-trash"></i></button>
                                    </td>
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
                     <td></td>
                     <td></td>
                  </tr>
               </table>
            </div>
         </div>
      </div>
   </div>
   <script>
      var sutunId = 123;
      function sil(sutunId) {
       // AJAX isteği gönder
       $.post("sil.php", { sutunId: sutunId })
         .done(function(response) {
            // Silme işlemi başarılı olduğunda sütunu tablodan kaldır
            if (response === "Sütun başarıyla silindi") {
               // Sütunu hedefleyen seçiciyi kullanarak satırı kaldır
               $("tr[data-sutunId='" + sutunId + "']").remove();
            }
            console.log(response);

            location.reload();
         })
         .fail(function() {
            console.log("Sütün silinirken bir hata oluştu");
         });
      }
      

      function duzenle(sutunId) {
         var baslik = prompt("Başlık girin:");
         var metin = prompt("Metin girin:");
         var resim = prompt("Resim URL'si girin:");
         var kategori = prompt("Kategori girin:");
         var yazar = prompt("Yazar girin:");
         var yazarAdSoyad = prompt("Yazar adı ve soyadı girin:");
         var tarih = prompt("Tarih girin:");

         // AJAX isteği gönder
         $.post("duzenle.php", {
               sutunId: sutunId,
               baslik: baslik,
               metin: metin,
               resim: resim,
               kategori: kategori,
               yazar: yazar,
               yazarAdSoyad: yazarAdSoyad,
               tarih: tarih
            })
            .done(function(response) {
               // İşlem başarılı olduğunda konsola mesajı yazdır
               console.log(response);

               // Sayfayı yenile
               location.reload();
            })
            .fail(function() {
               console.log("Hata oluştu");
            });
         }
   </script>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="https://kit.fontawesome.com/b40b33d160.js" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
   </body>
</html>