 <?php 

if ($_GET) 
{

include("baglan.php"); // veritabanı bağlantımızı sayfamıza ekliyoruz.

// id'si seçilen veriyi silme sorgumuzu yazıyoruz.
if ($baglanti->query("DELETE FROM kisi WHERE id =".(int)$_GET['id'])) 
{
    header("location:anlik_berber_trafik.php"); // Eğer sorgu çalışırsa ekle.php sayfasına gönderiyoruz.
}
}

?>