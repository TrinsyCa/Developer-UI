<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rasgele Değer | TrinsyCa</title>
    <link rel="shortcut icon" href="php-icon.jpg">
</head>
<body>
    <?php
    $rastgele=rand(0,10);
    $notlar=array("Ali"=>rand(0,100),"Yağmur"=>rand(0,100),"Ege"=>rand(0,100),"Fırat"=>rand(0,100),"Erkan"=>rand(0,100),);

    foreach($notlar as $isim=>$not)   //Dongu her dönüşünde dizini elemanı $isim ve $not değişkenlerine aktarır.
    {
        echo $isim."-".$not."<br>";
    }
    ?>
</body>
</html>