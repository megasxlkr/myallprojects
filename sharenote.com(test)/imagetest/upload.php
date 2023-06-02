<?php
 
require_once ('baglanti.php');
 
if (isset($_POST['Submit'])) {
 
move_uploaded_file($_FILES["resim"]["tmp_name"],"dosyalar/" . $_FILES["resim"]["name"]);			
$dosya=$_FILES["resim"]["name"];
$ad=$_POST['ad'];
$soyad=$_POST['soyad'];
 
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO tbl_resim (ad, soyad, resim_konum)
VALUES ('$ad', '$soyad', '$dosya')";
 
$conn->exec($sql);
echo "<script>alert('Kayıt başarıyla yapıldı!!!');</script>";
}
?>