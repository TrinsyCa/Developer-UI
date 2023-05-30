<?php 
   ob_start();
   session_start();
   include("connection.php");
   if(isset($_SESSION["giris"]))
   {
      header("Refresh: 0; url=./");
      return;
   }
?>
<!DOCTYPE html>
<html lang="tr" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yönetici Girişi | TrinsyBlog</title>
    <link rel="shortcut icon" href="../T_LOGO.png">
    
    <style>
      .container
      {
         width:100%;
         height:70vh;
         display:flex;
         align-items:center;
         justify-content:center;
      }
    </style>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
         <a class="navbar-brand" href="../" style="color:#E7B761; display:flex; align-items:center; gap: 10px;">
            <img src="../T_LOGO.png" alt="Logo" width="35" height="35" class="d-inline-block align-text-top">
            <h1 style="font-size: 20px; height:15px;">TrinsyBlog<?php if(isset($_SESSION["giris"])) { echo ' | '.$_SESSION["isim"]; }?></h1>
         </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="../"><i class="fa-solid fa-house"></i>&nbsp; Anasayfa</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="./"><i class="fa-solid fa-lock"></i>&nbsp; Admin</a>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     <i class="fa-solid fa-grip"></i>&nbsp; Kategori
                  </a>
                  <ul class="dropdown-menu">
                     <li><a class="dropdown-item" href="https://www.instagram.com/omer.islmoglu/" target="_blank"><i class="fa-solid fa-scroll"></i>&nbsp; Blog</a></li>
                     <li><hr class="dropdown-divider"></li>
                     <li><a class="dropdown-item" href="https://twitter.com/TrinsyCa" target="_blank"><i class="fa-solid fa-code"></i>&nbsp; Yazılım</a></li>
                     <li><a class="dropdown-item" href="https://oislamoglu.bistbilisim.com/" target="_blank"><i class="fa-solid fa-images"></i>&nbsp; Photoshop</a></li>
                     <li><a class="dropdown-item" href="https://oislamoglu.bistbilisim.com/" target="_blank"><i class="fa-solid fa-video"></i>&nbsp; Video Dizayn</a></li>
                     <li><a class="dropdown-item" href="https://twitter.com/TrinsyCa" target="_blank"><i class="fa-solid fa-code"></i>&nbsp; Robotik Kodlama</a></li>
                     <li><hr class="dropdown-divider"></li>
                     <li><a class="dropdown-item" href="https://oislamoglu.bistbilisim.com/" target="_blank"><i class="fa-solid fa-bullhorn"></i>&nbsp; Proje Duyuru</a></li>

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
         </div>
         <h4 style="color: #E7B761;"><i class="fa-solid fa-circle-user"></i> Yönetici Girişi</h4>
      </div>
   </nav>
   <div class="container">
      <div class="row" style="user-select:none;">
         <form action="" method="post">
         <table width="253" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="f0f0f0" style="border-radius: 8px; overflow:hidden; outline: 1px solid white;">
               <tr>
                  <td width="249" align="center" bgcolor="#E7B761">
                     <span class="menu" style="color:#151515; font-size:22px;"><img src="../T_LOGO.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">&nbsp;&nbsp;&nbsp;&nbsp;<b>Yönetici Girişi</b>&nbsp;&nbsp;&nbsp;&nbsp;<img src="../T_LOGO.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top"></span>
                  </td>
               </tr>
         </table>
         <table border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="f0f0f0">
               <tr>
                  <td width="120" style="color:#fff; font-size:20px; padding-left: 5px;">Kullanıcı Adı</td>
                  <td width="15">:</td>
                  <td width="197"><input type="text" name="kullanici"></td>
               </tr>
               <tr>
                  <td style="color:#fff; font-size:20px; padding-left: 5px;">Şifre</td>
                  <td>:</td>
                  <td><input type="password" name="sifre"></td>
               </tr>
               <tr>
                  <td><input type="submit" value="Giriş" style="width:276%;"></td>
               </tr>
         </table>
         <?php
        if(@$_POST)
        {
            @$kadi=trim(htmlspecialchars(@$_POST["kullanici"]));
            @$sifre=(htmlspecialchars(@$_POST["sifre"]));
            if(!@$kadi || !@$sifre)
            {
                echo "<p class='alert alert-danger' style='text-align:center; padding:7px; width:335px; margin:auto;'>Kullanıcı Adı veya Şifre Boş Bırakılamaz</p>";
                header("Refresh:1; url=login.php");
            }
            else
            {
                @$uye = $db->prepare("select * from admin where isim=? and sifre=?");
                @$uye->execute(array(mb_strtolower($kadi),mb_strtolower($sifre)));
                @$a=$uye->fetch(PDO::FETCH_ASSOC);
                @$y=$uye->rowCount();

                if($y)
                {
                    @$_SESSION["giris"] = "true";
                    @$_SESSION["isim"] = @$a["isim"];
                    @$_SESSION["sifre"] = @$a["sifre"];
                    @$_SESSION["adsoyad"] = @$a["adsoyad"];
                    echo "<p class='alert alert-success' style='text-align:center; padding:7px; width:335px; margin:auto;'>Giriş Başarılı</p>";
                    header("Refresh: 1; url=./");
                    exit;
                }
                else
                {
                    echo "<p class='alert alert-warning' style='text-align:center; padding:7px; width:335px; margin:auto;'>Kullanıcı Adı veya Şifre Hatalı</p>";
                    header("Refresh: 1; url=login.php");
                }
            }
        }
    ?>
         </form>
      </div>
   </div>
   <script src="https://kit.fontawesome.com/b40b33d160.js" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>