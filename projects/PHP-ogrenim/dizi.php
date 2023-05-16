<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diziler | TrinsyCa</title>
    <link rel="shortcut icon" href="php-icon.jpg">
</head>
<body>
    <?php
    $aylar=array("Ocak","Şubat","Mart","Nisan","Mayıs","Haziran","Temmuz","Ağustos","Eylül","Ekim","Kasım","Aralık",
    "Ocak","Şubat","Mart","Nisan","Mayıs","Haziran","Temmuz","Ağustos","Eylül","Ekim","Kasım","Aralık");
    for($i=0;$i<12;$i++){
        echo $aylar[$i]."<br>";
    }
    echo "<br>----------------------------<br>";

    foreach($aylar as $x){ // veritabanından veri çekerken sıklıkla kulanılır.
        echo $x."<br>";  //Dongu her dönüşünde dizinin elemanı $x değişkenine aktarır.
    }
    ?>
</body>
</html>