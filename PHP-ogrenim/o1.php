<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelime Bul</title>
</head>
<body>
    <?php $aylar = array("Ocak","Şubat","Ahmet","Nazif","Hikmet","Emre","Yılmaz","Ömer","Ahmet","Nazif","Hikmet","Aralık");
    for($i=0;$i<5;$i++)
    {
        $ras=rand(0,100);
        $dizi[$i]=$ras;
        echo $dizi[$i]."<br>";
    }
    echo "Gün";
    echo "<select name='gun'>";

    for($i=1;$i<=31;$i++)
    echo "<option>$i</option>";
    echo "</select>";

    echo "ay";
    echo "<select name ='ay'>";
    for ($i=0;$i<=11;$i++)
    echo "<option>$aylar[$i]</option>";
    echo "</select>";

    echo "yil";
    echo "<select name='yil'>";
    for($i=1950;$i<=2023;$i++)
    echo "<option>$i</option>";
    echo "</select>";
?>
</select>  
</body>
</html>