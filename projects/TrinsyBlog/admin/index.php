<?php
    session_start();
    include("connect.php");
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yönetici Girişi</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form action="giris.php" method="post">
        <table width="253" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="f0f0f0">
            <tr>
                <td width="249" align="center" bgcolor="#0099CC">
                    <span class="menu">Yönetici Girişi</span>
                </td>
            </tr>
        </table>
        <table border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="f0f0f0">
            <tr>
                <td width="90">Kullanıcı Adı</td>
                <td width="3">:</td>
                <td width="152"><input type="text" name="kullanici"></td>
            </tr>
            <tr>
                <td>Şifre</td>
                <td>:</td>
                <td><input type="text" name="sifre"></td>
            </tr>
            <tr>
                <td></td><td></td>
                <td><input type="submit" value="Giriş"></td>
            </tr>
        </table>
    </form>
</body>
</html>
<?php
   if($_POST)
   {
       $kadi=trim($_POST["kullanici"]);
       $sifre=($_POST["sifre"]);
       if(!$kadi || !$sifre)
       {
           echo "Kullanıcı adı veya şifre boş bırakılamaz";
           header("Refresh:1; url=index.php");
       }
       else
       {
           $uye = $db->prepare("select * from admin where isim=? and sifre=?");
           $uye->execute(array(mb_strtolower($kadi),mb_strtolower($sifre)));
           $a=$uye->fetch(PDO::FETCH_ASSOC);
           $y=$uye->rowCount()
           if($y)
           {
               $_SESSION["giris"] = "true";
               $_SESSION["isim"] = $a["isim"];
               $_SESSION["sifre"] = $a["sifre"];
               echo "Giriş Başarılı";
               header("Location: panelim.php");
               exit;
           }
           else
           {
               echo "üye bulunamadı";
               header("Refresh: 1; url=index.php");
           }
       }
   }
?>