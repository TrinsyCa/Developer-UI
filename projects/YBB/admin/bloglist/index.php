<?php
   ob_start();
   session_start();
   include("../connection.php");
   include("../kisalt.php");
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
   <?php
      if(!isset($_SESSION["giris"]))
      {
         header("Refresh: 0; url=login.php");
         return;
      }
   ?>
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
        <a class="navbar-brand" href="../../">
            <img src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="34" height="28" class="d-inline-block align-text-center">
            Yusuf Buğra Blog
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="../../">Anasayfa</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="../../">Bloglar</a>
            </li>
                  <li><a class="nav-link active" href="../">Admin</a></li>
                  <hr>
                  <li><a class="nav-link" href="../index.php?sayfa=logout">Çıkış Yap</a></li>
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
         Blog List
      </h1>
         
      <div class="container">
         <div class="row">
            <div class="col-lg-12 mt-5 mb-5">
               <table class="table table-dark table-striped">
                  <tr>
                     <td></td>
                     <td style="padding-left: 15px; font-size: 24px;">Başlık</td>
                     <td style="text-align:center; font-size: 24px;">Yazar</td>
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
                           if($row["tarih"] == null)
                           {
                              $row["tarih"] = '<i style="color:grey;" class="fa-solid fa-question"></i>';
                           }
                           echo '<tr>
                                    <td></td>
                                    <td><a href="../../blog.php?link='.$row["link"].'"target="_blank">'.$row["baslik"].'</a></td>
                                    <td style="text-align:center;"><a href="../../blog.php?link='.$row["link"].'"target="_blank">'.$row["yazar"].'</a></td>
                                    <td style="text-align:center;"><a href="../../blog.php?link='.$row["link"].'"target="_blank">'.$row["tarih"].'</a></td>
                                    <td style="text-align:center;">
                                       <button class="do-btn edit-btn" onclick="duzenle('.$row["id"].', \''.$_SESSION["isim"].'\')"><i class="fa-solid fa-pen-to-square"></i></button>
                                       <button class="do-btn trash-btn" onclick="sil('.$row["id"].', \''.$row["baslik"].'\' , \''.kisalt($row["baslik"] , 30).'\')"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                    <td></td>
                                 </tr>
                                 <style> td a { color:white; }</style>';
                        }
                     }
                  ?>
               </table>
            </div>
         </div>
      </div>
   </div>
   <script>

      function sil(sutunId,haber_baslik,haber_baslik_short) {
         // Silmek istediğine emin misin sorusunu göster
         if (confirm('"'+ haber_baslik_short+ '"' + " Adlı Bloğu silmek istediğinize emin misiniz?")) {
            // AJAX isteği gönder
            $.post("sil.php", { sutunId: sutunId })
               .done(function(response) {
                  // Silme işlemi başarılı olduğunda sütunu tablodan kaldır
                  if (response === "Sütun silindi") {
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
      }
      

      function duzenle(sutunId, yazar, yazarAdSoyad) {
    var baslik = prompt("Başlık girin:");
    var metin = prompt("Metin girin:");
    var resim = prompt("Resim URL'si girin:");
    var tarih = new Date().toISOString();

    var onayMesaji = "Değişiklikleri Onaylıyor Musunuz?\n" +
        "Yeni Başlık: " + baslik + "\n" +
        "Yeni Metin: " + metin + "\n" +
        "Yeni Resim: " + resim + "\n" +
        "Yeni Yazar: " + yazar + "\n" +
        "Yeni Tarih: " + tarih;

    console.log(onayMesaji);

    if (confirm(onayMesaji)) {
        if (baslik === null || metin === null || resim === null || tarih === null || sutunId === null || yazar === null) {
            alert("Lütfen Bilgileri Boş Bırakmayın");
            console.clear();
        }
        else {
            // AJAX isteği gönder
            $.post("duzenle.php", {
                    sutunId: sutunId,
                    baslik: baslik,
                    metin: metin,
                    resim: resim,
                    yazar: yazar,
                    tarih: tarih
                })
                .done(function(response) {
                    // İşlem başarılı olduğunda konsola mesajı yazdır
                    console.log(response);

                    location.reload();
                })
                .fail(function() {
                    console.log("Hata oluştu");
                });
        }
    }
    else
    {
      alert("Değişiklik iptal edildi");
      console.clear();
    }
}
   </script>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="https://kit.fontawesome.com/b40b33d160.js" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>