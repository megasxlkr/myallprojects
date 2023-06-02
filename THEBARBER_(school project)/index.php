<?php
include 'baglan.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">


  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">



    <link rel="stylesheet" href="assets/css/docs.theme.min.css">
    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/owlcarousel/assets/owl.theme.default.min.css">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/carousel/">
    <link href="bootstrap.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="assets/vendors/jquery.min.js"></script>
    <script src="assets/owlcarousel/owl.carousel.js"></script>
 <style type="text/css">
   #owl-demo .item{
   
}
#owl-demo .item img{
  
 
}
 </style>
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
          <li><a href="index.php" class="nav-link px-2 text-secondary">Anasayfa</a></li>
          <li><a href="hakkimizda.php" class="nav-link px-2 text-white">Hakkımızda</a></li>
           
          <li><a href="iletisim.php" class="nav-link px-2 text-white">İletişim</a></li>
        
        </ul>

       <!--  <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
        </form> -->

        <div class="text-end">
           <a href="kayitol.php" class="btn btn-outline-light me-2">Üye Ol</a>
          <a href="randevu.php" class="btn btn-outline-light me-2">Giriş Yap</a>
          
        </div>
      </div> 

      
    </div>
  </header>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/photo1.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5></h5>
        <p></p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/photo2.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5></h5>
        <p></p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/photo3.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5></h5>
        <p></p>
      </div>
    </div>
  </div>
  <!--
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button> -->
</div>


<h2><center>ORTAKLARIMIZ</center></h2>

<!--  Demos -->
    
      <div class="row">
        <div class="large-12 columns">
          <div class=" owl-demo fadeOut owl-carousel owl-theme">
            <div class="item">
              <h4></h4>
                       <img src="img/ortak1.jpeg" class="d-block w-100 " height="auto" alt="...">
            </div>

            <div class="item">
              <h4></h4>
                       <img src="img/powertech.jpeg">
            </div>

            <div class="item">
              <h4></h4>
                       <img src="img/ortak2.jpeg" class="d-block w-100 " height="auto" alt="...">

            </div>

            <div class="item">
              <h4></h4>
                      <img src="img/arkonem.png" class="d-block w-100 "  alt="...">

            </div>

            <div class="item">
              <h4></h4>
                      <img src="img/ortak12.png" class="d-block w-100 "  alt="...">
            </div>

            <div class="item">
              <h4></h4>
                      <img src="img/havlu1.jpeg" class="d-block w-100 "  alt="...">
            </div>

            <div class="item">
              <h4></h4>
                      <img src="img/wella.jpeg" class="d-block w-100 "  alt="...">
            </div>

            <div class="item">
              <h4></h4>
                       <img src="img/qwe.jpeg" class="d-block w-100 "  alt="...">
            </div>

            <div class="item">
              <h4></h4>
                        <img src="img/ert.jpeg" class="d-block w-100 "  alt="...">
            </div>

            <div class="item">
              <h4></h4>
                       <img src="img/sol.jpeg" class="d-block w-100 "  alt="...">
            </div>

            <div class="item">
              <h4></h4>
                      <img src="img/seren.jpeg" class="d-block w-100 "  alt="...">
            </div>

            <div class="item">
              <h4></h4>
                      <img src="img/tarak.jpeg" class="d-block w-100 "  alt="...">
            </div>

          </div>
 <br>
 <h2><center>MARKALAR</center></h2>



 <div id="owl-demo" class="owl-carousel">
          
  <div class="item"><img src="img/1.png" class="d-block w-100 " height="auto" alt="...">
</div>
  <div class="item"><img src="img/2.png" alt="Owl Image"></div>

  <div class="item"><img src="img/8.png" alt="Owl Image" height="auto"></div>

  <div class="item"><img src="img/3.jpeg" alt="Owl Image"></div>

  <div class="item"><img src="img/4.png" alt="Owl Image"></div>

  <div class="item"><img src="img/5.png" alt="Owl Image"></div>

  <div class="item"><img src="img/6.png" alt="Owl Image"></div>

  <div class="item"><img src="img/7.jpeg" alt="Owl Image"></div>
 
</div>
 

<br><br>
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

 
    <script type="text/javascript">

      $(document).ready(function(){

  $(".owl-carousel").owlCarousel({

loop:true,
items:3,
autoplay:true,
autoplayTimeout:1000,
autoplayHoverPause:true,
nav:true,
margin:10,
autoHeight:true,
itemsDesktop :[1199,3],
itemsDesktopSmall :[979,3]


  });
});
    </script>
 

    <script src="assets/vendors/highlight.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>


</html>