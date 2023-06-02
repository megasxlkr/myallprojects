
<?php
include 'baglan.php';
include 'baglanuye.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/carousel/">
<link href="bootstrap.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<style type="text/css">
  a{
    text-decoration: none;
    color: blue;
  }
  .resim1{
    border-radius: 52px;
  }
  .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
</style>
    <link href="carousel.css" rel="stylesheet">
   
  <title>Anasayfa</title>
</head>

<body class="bg-dark">
<div class="b-example-divider"></div>

  <header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <img src="resim/amblem.png" width="100" height="50">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="index.php" class="nav-link px-2 text-secondary">Anasayfa</a></li>
          <li><a href="hakkimizda.php" class="nav-link px-2 text-white">Hakkımızda</a></li>
           
          <li><a href="iletisim.php" class="nav-link px-2 text-white">İletişim</a></li>
        
        </ul>

        

        <div class="text-end">
           <a href="kayitol.php" class="btn btn-outline-light me-2">Üye Ol</a>
          <a href="randevu.php" class="btn btn-outline-light me-2">Giriş Yap</a>
           
        </div>
      </div> 

      
    </div>
  </header>


<body bgColor="#C0C0C0">
<br>
<center>
   
<div class="container">
    <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
    <div class="col-md-12">
   <!-- <img src="resim/logo.png" width:250px; height:250px;>    -->
    </div>
    <form  method="post" action="">
  <div class="col-md-12">
    <label for="validationCustom01" class="form-label"><font color="white">Adınız</font></label>
    <input type="text" class="form-control" id="validationCustom01" name="adi" required>
  </div>
  <div class="col-md-12">
    <label for="validationCustom02" class="form-label"><font color="white">Soyadınız</font></label>
    <input type="text" class="form-control" id="validationCustom02" name="soyadi" required>
  </div>
    <div class="col-md-12">
    <label for="validationCustom03" class="form-label"><font color="white">Telefon Numarası</font></label>
    <input type="text" class="form-control" id="validationCustom03" name="tel_no" required>
  </div>
    <div class="col-md-12">
    <label for="validationCustom03" class="form-label"><font color="white">Mail Adresi</font></label>
    <input type="text" class="form-control" id="validationCustom03" name="mail" required>
  </div>
    <div class="col-md-12">
    <label for="validationCustom02" class="form-label"><font color="white">Kullanıcı Adınız</font></label>
    <input type="text" class="form-control" id="validationCustom02" name="k_adi" required>
  </div>
  <div class="col-md-12">
    <label for="validationCustom03" class="form-label"><font color="white">Şifreniz</font></label>
    <input type="text" class="form-control" id="validationCustom03" name="sifre" required>
  </div>
  
  <div class="col-12">
     <input type="submit" class="btn btn-success" name="kaydet" value="Kayıt Ol"  ></input>
    
  </div>
</form>
 <form name="form" method="post" action="">
   <input type="submit" class="btn btn-success" name="giriss" value="Giriş Sayfasına Dön "  formaction="randevu.php" style="margin:15px;"></input>
  </form>

    </div>
        
     <div class="col-md-4"></div>   
    </div>
    </div>
  </center>

 
 <!--
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
  <a href="https://www.haberler.com/ekonomi/ucuz-fiyatlariyla-kasalarinda-kuyruklar-olusan-14862305-haberi/" target="_blank">
      <img src="resim/haber.jpg" class="d-block" alt="..."></a>
    
    </div>
    <div class="carousel-item">
  <a href="https://www.haberler.com/guncel/definecileri-kazi-sirasinda-basan-ekipler-14862306-haberi/"target="_blank">
      <img src="resim/hbr.jpg" class="d-block" alt="..."></a>
    </div>
    <div class="carousel-item">
  <a href="https://www.haberler.com/ekonomi/karpuzun-dilimi-25-tl-14862743-haberi/" target="_blank">
      <img src="resim/haber2.jpg" class="d-block" alt="..."></a>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev" border="0"  >
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  <img src="resim/sol.jpg" width="50%" height="50%">
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  <img src="resim/sag.jpg" width="50%" height="50%">
  </button>
</div><br> -->
<nav class="navbar fixed-bottom navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <?php 
      $sorgu = $baglanti->query("SELECT * FROM footer_name"); // Makale tablosundaki tüm verileri çekiyoruz.

while ($sonuc = $sorgu->fetch_assoc()) { 

$id = $sonuc['id']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
$berber_ismi = $sonuc['berber_ismi'];

?>
    <?php echo $berber_ismi; ?>
    <?php 
  }
  ?>

    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Anasayfa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="kayitol.php">Üye Ol</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">SAYGILI OL</a>
        </li>
        <li class="nav-item dropup">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown10" data-bs-toggle="dropdown" aria-expanded="false">Giriş Yap</a>
          <ul class="dropdown-menu" aria-labelledby="dropdown10">
             
            <li><a class="dropdown-item" href="randevu.php">Üye Girişi</a></li>
             
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
    
</body>
<?php
try{
   // $db=new PDO("mysql:host=localhost;dbname=uyeler;charset=utf8","root","");
    $k_adi=$_POST["k_adi"];
    $sifre=$_POST["sifre"];
    
    $sql = $db->prepare("insert into kayitol set k_adi=:k_adi,sifre=:sifre");
    $ekle = $sql->execute(array(
        "k_adi" => $k_adi,
        "sifre" => $sifre,
    ));
    if ($ekle)
        echo "Kayıt eklendi";
    else
        echo "Kayıt eklenemedi";
}
catch (PDOException $exception)
{
    print $exception->getMessage();
}
$db=null;
?>





</html>