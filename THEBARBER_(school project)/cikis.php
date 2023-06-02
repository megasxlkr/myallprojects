<?php 
		
		// require_once 'baglan.php';
		session_start();
		session_destroy();

		//echo 'Başarıyla çıkış yaptınız bekleyiniz..';
	 
		header('Location:index.php');
			

?>