<?php
//veritabanı bağlantısını yapmamız gerekmekte
include "denemeconnect.php";

$sec = "select * from okul";

$sonuc = $baglan->query($sec);

if ($sonuc->num_rows > 0) 
{
  // verileri listeleyebiliriz
  while($cek = $sonuc->fetch_assoc()) 
   {
    $id=$cek["id"];
    $ogrenciad=$cek["ogrenciad"];

    echo $id."-".$ogrenciad."<br>";

   }
} 
else 
{
  echo "Sonuç Bulunamadı.";
}

?>