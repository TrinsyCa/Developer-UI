<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="php-icon.jpg">
    <title>PHP Öğrenim - Satranç Tahtası | TrinsyCa</title>

    <style>
.siyah{
    background-color:#000; color:#FFF;
}

    </style>
</head>
<body>

<?php
echo '<table width="400" height="400" border="1">';
$sayac=1;
for($i=0;$i<8;$i++)
{
echo '<tr>';
    for($a=0;$a<8;$a++)
    {
        $c=$a+$i;
        if($c%2==1) {echo '<td class="siyah">'.$sayac.'</td>'; }
        else { echo '<td>'.$sayac.'</td>'; }

        $sayac++;
    }
    echo '</tr>';
}

echo '</table>';
?>
</body>
</html>