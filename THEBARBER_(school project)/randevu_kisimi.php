<?php 
include'baglanuye.php';
 include'baglan.php';
 oturum();
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

<body class="bg-white">
<div class="b-example-divider"></div>
  <header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <img src="resim/amblem.png" width="100" height="50">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <!--  <li><a href="index.php" class="nav-link px-2 text-secondary">Anasayfa</a></li> -->
        
        
        </ul>

        <div class="text-end">
           <?php echo $_SESSION['k_adi']." "."Hoşgeldin";?>
           <br>
           <a href="cikis.php">Çıkış Yap</a>
          
        </div>
      </div> 

      
    </div>
  </header>


<body bgColor="#C0C0C0">
<br>
<center>
  <div class="resim1">
    
</div>
  </center>

 
 <div class="container">
    <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
    <div class="col-md-12">
    </div>
    <form name="form" method="post" action="">
  <div class="col-md-12">
    <label for="validationCustom01" class="form-label"><font color="black">Adınız</font></label>
    <input type="text" class="form-control" id="validationCustom01" name="ad" required>
  </div>
  <div class="col-md-12">
    <label for="validationCustom02" class="form-label"><font color="black">Saat</font></label>
    <input type="text" class="form-control" id="validationCustom02" name="saat" required>
  </div>
    <div class="col-md-12">
    <label for="validationCustom03" class="form-label"><font color="black">Telefon Numarası</font></label>
    <input type="text" class="form-control" id="validationCustom03" name="tel_no" required>
  </div>
    <div class="col-md-12">
    <label for="validationCustom03" class="form-label"><font color="black">İşlem</font></label>
    <input type="text" class="form-control" id="validationCustom03" name="islem" required>
  </div>
   
 
  
  <div class="col-12">
     <input type="submit" class="btn btn-success" name="kaydet" value="Sıra Al"  style="margin:15px;"></input>
    
  </div>
</form>
  

    </div>
    <!-- ############################################################## -->

<!-- Veritabanına eklenmiş verileri sıralamak için önce üst kısmı hazırlayalım. -->
<div class="col-md-7">

<table class="table">
    
     

<!-- Şimdi ise verileri sıralayarak çekmek için PHP kodlamamıza geçiyoruz. -->

<?php 

$sorgu = $baglanti->query("SELECT * FROM kisi"); // Makale tablosundaki tüm verileri çekiyoruz.

while ($sonuc = $sorgu->fetch_assoc()) { 

$ad = $sonuc['ad']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
$saat = $sonuc['saat'];
$tel_no = $sonuc['tel_no'];
$islem = $sonuc['islem'];

// While döngüsü ile verileri sıralayacağız. Burada PHP tagını kapatarak tırnaklarla uğraşmadan tekrarlatabiliriz. 
?>
    
    <tr>
        <td><?php echo $ad; ?></td>
        <td><?php echo $saat; ?></td>
        <td><?php echo $tel_no; ?></td>
        <td><?php echo $islem; ?></td>
         
        
    </tr>

<?php 
} 
// Tekrarlanacak kısım bittikten sonra PHP tagının içinde while döngüsünü süslü parantezi kapatarak sonlandırıyoruz. 
?>
</table>


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
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">SAYGILI OL</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>
    
</body>

<?php
     
    $db = new PDO("mysql:host=sql207.epizy.com;dbname=epiz_31583199_berberim;charset=utf8","epiz_31583199","dgmQ6F5baJv");
    if(isset($_POST["kaydet"]))
  {
        $kad=$_POST["ad"];
        $saat=$_POST["saat"];
        $ktel_no=$_POST["tel_no"];
        $kislem=$_POST["islem"]; 

         if($db)
 {
        echo ""."<br>";
       $kaydet=$db->exec("INSERT INTO kisi (ad,saat,tel_no,islem)VALUES('$kad','$saat','$ktel_no','$kislem')");
       if($kaydet)
         {
             echo "kayıt";
           }
             else
          {
           echo "Kayıt ekleme başarısız oldu";
           }
    }
    
}

?>


</html>
