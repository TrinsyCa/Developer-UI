<?php
   $host = "localhost";
   $dbname = "trinsyca_ybb";
   $charset = "utf8";
   $root = "trinsyca_trinsyca";
   $password = "@x@o_zIs@x%5W%$1406//@";

   try {
      $db = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset;", $root , $password);
   } catch (PDOExeption $error) {
      echo $error->getMessage();
   }
?>