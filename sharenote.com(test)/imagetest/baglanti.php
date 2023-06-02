<?php
$sunucuadi = "localhost";
$kadi = "root"; //local kadi:root
$sifre = "";//local şifre:""
$vtadi = "blog";
 
// bağlantı oluşturma
try {
  $conn = new PDO("mysql:host=$sunucuadi;dbname=$vtadi", $kadi, $sifre);
  // Hata modunu etkinleştirme
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
echo $sql . "<br>" . $e->getMessage();
}
 ?>