<?php
include("../connection.php");
include("../linkfunc.php");

// POST verilerini alın
$sutunId = $_POST["sutunId"];
$baslik = $_POST["baslik"];
$metin = $_POST["metin"];
$resim = $_POST["resim"];
$kategori = $_POST["kategori"];
$yazar = $_POST["yazar"];
$yazarAdSoyad = $_POST["yazarAdSoyad"];
$tarih = $_POST["tarih"];

@$baslik = htmlspecialchars(@$_POST["baslik"]);
@$metin = htmlspecialchars(@$_POST["metin"]);
@$resim = htmlspecialchars(@$_POST["resim"]);
@$kategori = htmlspecialchars(@$_POST["kategori"]);
@$link = permalink(@$_POST["baslik"])."/about=".permalink(@$_POST["kategori"]);
@$yazar = @$_SESSION["isim"];
@$yazarAdSoyad = @$_SESSION["adsoyad"];

if(empty(@$baslik) || empty(@$metin) || empty(@$resim) || empty(@$kategori))
{
   echo '<p class="alert alert-warning">Lütfen Boş Bırakmayınız..</p>';
   exit;
}
else
{
    $veriguncelle = $db->prepare("UPDATE bloglarim SET baslik = ?, metin = ?, resim = ?, kategori = ?, link = ?, yazar = ?, yazar_adsoyad = ?, tarih = ? WHERE id = ?");
   $veriguncelle->execute([
      @$baslik,
      @$metin,
      @$resim,
      @$kategori,
      @$link,
      @$yazar,
      @$yazarAdSoyad,
      @$tarih,
      @$sutunId
   ]);

   if($veriguncelle->rowCount() > 0) {
      echo "success";
   } else {
      echo "error";
   }
}
?>