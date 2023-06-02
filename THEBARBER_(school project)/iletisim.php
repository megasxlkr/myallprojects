<?php
include 'baglan.php';
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
   
  <title>Hakkımızda</title>
</head>

<body>
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


 
<br>
<center>
   <div class="container">
 <!--
<h1>İLETİŞİM</h1>
  
<div id="col-md-7"><br>

<form name="form" method="post" action="mail_gonder.php">
  <div class="col-md-12">
    <label for="validationCustom01" class="form-label">AD</label>
    <input type="text" class="form-control" id="validationCustom01" name="adi" required>
  </div>
  <div class="col-md-12">
    <label for="validationCustom02" class="form-label">SOYAD</label>
    <input type="text" class="form-control" id="validationCustom02" name="soyadi" required>
  </div>
  <div class="col-md-12">
    <label for="validationCustomUsername" class="form-label">MAİL ADRES</label>
    <div class="input-group has-validation">
      <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="mail_adresi" required>
    </div>
  </div>
   <div class="col-12">
    <button class="btn btn-primary" type="submit" name="gonder" style="position:relative; top:20px;">GÖNDER</button>
  </div>
</form>

</div>
 </center>
   -->

   <!--Section: Contact v.2-->
<section class="mb-4">

    <!--Section heading-->
  <!--  <h2 class="h1-responsive font-weight-bold text-center my-4">İLETİŞİM</h2>-->
    <!--Section description-->
  <img src="amblem.png">  
  <hr><p class="text-center w-responsive mx-auto mb-5">Sizlerden aldığımız mesaj ve öneriler ile kendimizi hergün daha da geliştirmeye çalışıyoruz. Alt tarafta bulunan formlar aracılığı ile bizlere ulaşabilirsiniz..</p>

    <div class="row">

        <!--Grid column-->
        <div class="col-md-9 mb-md-0 mb-5">
            
<form name="form" method="post" action="mail_gonder.php">
                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="name" name="adi" class="form-control" placeholder="Adınız..">
                          <!--  <label for="name" class="">A</label> -->
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="email" name="soyadi" class="form-control" placeholder="Email..">
                          <!--  <label for="email" class="">E</label> -->
                        </div>
                    </div>
                    <!--Grid column-->
<hr>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">
                            <textarea type="text" id="message" name="mail_adresi" rows="2" class="form-control md-textarea" placeholder="Mesajınız.."></textarea>
                          <!--  <label for="message">Mesajınız</label> -->
                        </div>

                    </div>
                </div>
                <!--Grid row-->

        

            <div class="col-12">
    <button class="btn btn-primary" type="submit" name="gonder" style="position:relative; top:20px;">GÖNDER</button>
  </div>
</form>
            <div class="status"></div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-3 text-center">
            <ul class="list-unstyled mb-0">
                <li><i class="fas fa-map-marker-alt fa-2x"></i>
                    <p>İstanbul, Turkiye</p>
                </li>

                <li><i class="fas fa-phone mt-4 fa-2x"></i>
                    <p>+ 333 234 567 89</p>
                </li>

                <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                    <p>iletisimbarberhair@gmail.com</p>
                </li>
            </ul>
        </div>
        <!--Grid column-->

    </div>

</section>
<!--Section: Contact v.2-->

 
 
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
<a>
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
</html>