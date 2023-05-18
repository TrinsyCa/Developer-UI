<?php 
   session_start();
   include("connection.php");
?>
<!DOCTYPE html>
<html lang="tr" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrinsyBlog</title>
    
    
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
   <a class="navbar-brand" href="../">
      <img src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
      TrinsyBlog
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../">Bloglar</a>
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
    </div>
  </div>
</nav>
    <div class="container">
      <div class="row">
      <form action="" method="post">
        <table width="253" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="f0f0f0">
            <tr>
                <td width="249" align="center" bgcolor="#E2985B">
                    <span class="menu" style="color:#fff; font-size:22px;">Yönetici Girişi</span>
                </td>
            </tr>
        </table>
        <table border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="f0f0f0">
            <tr>
                <td width="120" style="color:#fff; font-size:20px;">Kullanıcı Adı</td>
                <td width="15">:</td>
                <td width="197"><input type="text" name="kullanici"></td>
            </tr>
            <tr>
                <td style="color:#fff; font-size:20px;">Şifre</td>
                <td>:</td>
                <td><input type="text" name="sifre"></td>
            </tr>
            <tr>
                <td></td><td></td>
                <td><input type="submit" value="Giriş" style="width:100%;"></td>
            </tr>
        </table>
    </form>
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
                $uye = $db->prepare("select * from admin where isim=? and sifre=?");
                $uye->execute(array(mb_strtolower($kadi),mb_strtolower($sifre)));
                $a=$uye->fetch(PDO::FETCH_ASSOC);
                $y=$uye->rowCount();

                if($y)
                {
                    $_SESSION["giris"] = "true";
                    $_SESSION["isim"] = $a["isim"];
                    $_SESSION["sifre"] = $a["sifre"];
                    echo "<p class='alert alert-success' style='text-align:center; padding:7px; width:335px; margin:auto;'>Giriş Başarılı</p>";
                    header("Refresh: 1; url=index.php");
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
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>