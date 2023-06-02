<?php

if ($_FILES["dosya"]) {

  $yol = "images"; # Yüklenecek klasör / dizin

  $yuklemeYeri = __DIR__ . DIRECTORY_SEPARATOR . $yol . DIRECTORY_SEPARATOR . $_FILES["dosya"]["name"];

  $sonuc = move_uploaded_file($_FILES["dosya"]["tmp_name"], $yuklemeYeri);

  echo $sonuc ? "Dosya başarıyla yüklendi" : "Hata oluştu";

} else {

  echo "Lütfen bir dosya seçin";

}

?>