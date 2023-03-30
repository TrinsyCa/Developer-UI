<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="php-icon.jpg">
    <title>PHP Öğrenim - Pozitif Sayı - Negatif Sayı Bulma | TrinsyCa</title>
</head>
<body>
<form action="" method="post">
<table border="1">
    <tr><td>Sayı: <input type="text" name="sayi1" /></td>
</tr>
<tr><td><input type="submit" value="incele" /></td></tr>
</table>

<?php
$a=$_POST["sayi1"];
if($a>0)
{echo $a." sayısı pozitif bir sayıdır";}
 else if ($a<0)
{echo $a."sayısı nefatif bir sayıdır";}
 else
 {echo "Girilen sayı".$a." 'dır";}
?>
</body></form>
</html>