<?php

try{
	$db = new PDO("mysql:host=localhost;dbname=reklam_uye;charset=utf8","root","");

}catch(PDOException $e){
	echo "Veritabanı Bağlantı İşlemi Başarısız Oldu";
	echo $e->getMessage();
	exit;
}
 



?>
 


