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
<html lang="tr-TR" data-bs-theme="dark">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Girişi | YBB</title>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
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
            <li class="nav-item">
               <a class="nav-link active" href="./">Admin Girişi</a>
            </li>
        </div>
      </div>
    </nav>
   <div class="wrapper">
      <div class="container">
         <div class="row" style="user-select:none; position:absolute; top:40%; left:50%; transform:translate(-50%,-50%);">
            <form action="" method="post">
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
      </div>
   </div>
</body>
</html>