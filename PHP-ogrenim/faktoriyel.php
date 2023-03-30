<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="php-icon.jpg">
    <title>PHP Öğrenim - Faktöriyel Hesaplama | TrinsyCa</title>
</head>
<body>

<form action="" method="post">
<input type="number" name="tamsayi">
<button type="submit" name="Hesap"> Hesapla </button>
</form>

<?php
if(isset($_POST["Hesap"])) {
$sayi = $_POST['tamsayi'];
if($sayi < 0){
    echo "lütfen negatif sayı girmeyiniz.";
}else{
    $sonuc= 1;
    for ($i=1; $i <= $sayi; $i++) {
        $sonuc = $sonuc * $i;
    }

    echo $sayi." sayısının faktöriyeli= ".$sonuc;
}

}
?>
</body></form>
</html>