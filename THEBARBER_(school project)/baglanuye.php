
<?php
ob_start();
session_start();


try{
	$db = new PDO("mysql:host=sql207.epizy.com;dbname=epiz_31583199_berberim;charset=utf8","epiz_31583199","dgmQ6F5baJv");

}catch(PDOException $e){
	echo "Veritabanı Bağlantı İşlemi Başarısız Oldu";
	echo $e->getMessage();
	exit;
}
require_once __DIR__.'/fonksiyon.php';




?>
 


