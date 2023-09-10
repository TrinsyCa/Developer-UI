<?php
include("../connection.php");

// POST verilerini alın
$sutunId = $_POST["sutunId"];
$baslik = $_POST["baslik"];
$metin = $_POST["metin"];
$resim = $_POST["resim"];
$yazar = $_POST["yazar"];
$tarih = $_POST["tarih"];
$link = $_POST["baslik"];

if(empty($baslik) || empty($metin) || empty($resim))
{
   echo '<p class="alert alert-warning">Lütfen Boş Bırakmayınız..</p>';
   exit;
}
else
{
    $veriguncelle = $db->prepare("UPDATE bloglarim SET baslik = :baslik, metin = :metin, resim = :resim, link = :link, yazar = :yazar, tarih = :tarih WHERE id = :id");
   $veriguncelle->execute([
      ":id" => $sutunId,
      ":baslik" => $baslik,
      ":metin" => $metin,
      ":resim" => $resim,
      ":link" => $link,
      ":yazar" => $yazar,
      ":tarih" => $tarih
   ]);

   if($veriguncelle->rowCount() > 0) {
      echo "success";
   } else {
      echo "error";
   }
}
?>