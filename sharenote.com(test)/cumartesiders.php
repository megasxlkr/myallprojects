
<?php
include 'denemeconnect.php';
error_reporting(0); 
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ders</title>
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>



 <div class="card-body">

                <form action="cumartesiders.php" method="post">


                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="kimlik" class="form-control" placeholder="Kimlik Numaranız">    
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="ogrenciad" class="form-control" placeholder="Adınız">    
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="ogrencisoyad" class="form-control" placeholder="Soyadınız">    
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="ogrencidurum" class="form-control" placeholder="Öğrenci Durumu">    
                    </div>

                    

                    <div class="form-group">
                        <input type="submit" name="kaydet" value="Kaydet" class="btn float-right login_btn">
                        <input type="submit" name="guncelle" value="Güncelle" class="btn float-right login_btn">

                        <input type="submit" name="sil" value="Sil" class="btn float-right login_btn">
                        <input type="submit" name="listeleme" value="Lİsteleme" class="btn float-right login_btn">
                       

                    </div>


                </form>

            </div>
           
        </div>


</body>
</html>

<?php


  $db=new PDO("mysql:host=localhost;dbname=gelisim;charset=utf8","root","");


//ekleme
     if (isset($_POST['kaydet'])) {

     	$kimlik=$_POST["kimlik"];
    $ogrenciad=$_POST["ogrenciad"];
    $ogrencisoyad=$_POST["ogrencisoyad"];
    $ogrencidurum=$_POST["ogrencidurum"];

    $kaydet = $db -> exec("insert into okul (kimlik,ogrenciad,ogrencisoyad,ogrencidurum)VALUES('$kimlik','$ogrenciad','$ogrencisoyad','$ogrencidurum')");

    if ($kaydet) {
    	echo "Eklendi";
    }
    else{
    	echo"eklenmedi";
    }
    
    }

    public static void setTimeout(Runnable runnable, int delay){
        new Thread(() -> {
            try {
                Thread.sleep(delay);
                runnable.run();
            }
            catch (Exception e){
                System.err.println(e);
            }
        }).start();
    }


//güncelleme
    if (isset($_POST['guncelle'])) {

    	$kimlik=$_POST["kimlik"];
    $ogrenciad=$_POST["ogrenciad"];
    $ogrencisoyad=$_POST["ogrencisoyad"];
    $ogrencidurum=$_POST["ogrencidurum"];

    $guncelle = $db -> exec("UPDATE okul set ogrenciad='$ogrenciad',ogrencisoyad='$ogrencisoyad',ogrencidurum='$ogrencidurum' where kimlik='$kimlik' ");

    if ($guncelle) {
    	echo "Güncellendi";
    }
    else{
    	echo"Güncellenmedi";
    }
    
    }


//silme

     if (isset($_POST['sil'])) {

    	$kimlik=$_POST["kimlik"];
    $ogrenciad=$_POST["ogrenciad"];
    $ogrencisoyad=$_POST["ogrencisoyad"];
    $ogrencidurum=$_POST["ogrencidurum"];

    $sil = $db -> exec("DELETE from okul where ogrenciad='$ogrenciad' ");

    if ($sil) {
    	echo "Silindi";
    }
    else{
    	echo"Silinmerdi";
    }
    
    }


//listeleme
    
if (isset($_POST['listeleme'])) {
	try {
 
    $baglanti = new PDO("mysql:host=localhost;dbname=gelisim","root","");
    $baglanti->exec("SET NAMES utf8");
    $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
    $sorgu = $baglanti->query("SELECT ogrenciad, ogrencisoyad, ogrencidurum FROM okul");
 
    while ($cikti = $sorgu->fetch(PDO::FETCH_ASSOC)) {
        echo "Ad: " . $cikti["ogrenciad"] . "<br /> Soyad: " . $cikti["ogrencisoyad"] . "<br /> E-Posta: " . $cikti["ogrencidurum"] . "<hr />";
    }
 
} catch (PDOException $e) {
    die($e->getMessage());
}
 
$baglanti = null;
}
    
 
 
?>