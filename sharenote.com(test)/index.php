<?php 

include 'logic.php';

?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShareNotes</title>
   <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="all.min.css">
    <link rel="stylesheet" href="templatemo-style.css">

 <!-- VUE JS source from it-->
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<!-- Vue JS codes on here-->


<!-- React Sources -->
    <script src= "https://unpkg.com/react@16/umd/react.production.min.js"></script>
<script src= "https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>
<script src="https://unpkg.com/babel-standalone@6.15.0/babel.min.js"></script>

<!-- end-->

</head>
<body>
    <!-- Page Loader -->
    <div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <i class="fas fa-film mr-2"></i>
                ShareNotes.com
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link nav-link-1 active" aria-current="page" href="index.php">Reklamlar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-2" href="about.php">Hakkımızda</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-link-3" href="logup.php">Üye Girişi</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-link-3" href="register.php">Üye Ol</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-4" href="contact.php">İletişim</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    </div>

    <div class="container-fluid tm-container-content tm-mt-60">


        <div class="row mb-4">
            <div id="app">
                {{ message }}
            </div>
        <p onclick="myFunction()">Güncel Başlık İçin Tıkla..</p>
        </div>

        <div class="row"> <!-- blogs from database -->
   <?php foreach($query as $q) { ?>
<div class="col-lg-4 d-flex justify-content-center align-items-center">
    <div class="card text-white bg-dark mt-5">
        <div class="card-body style=width: 55rem;">
            <h5 class="card-title"><?php echo $q['title']?></h5>
            <p class="card-text"><?php echo $q['content']?></p>
                       <a href="viewpost2.php?id=<?php echo $q['id'] ?>" class="btn btn-light">Read More..<span class="text-danger">&rarr;</a>
        </div>
    </div>
</div>

<?php }?>

  </div>
 </div>
</div>
       
    <footer class="tm-bg-gray pt-5 pb-3 tm-text-gray tm-footer">
        <div class="container-fluid tm-container-small">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 px-5 mb-5">
                    <h3 class="tm-text-primary mb-4 tm-footer-title">Reklam.COM</h3>
                    <p>Reklam.COM her zaman ücretsiz olarak kalıcaktır. Sadece üye olarak bu hizmeti ücretsiz olarak kullanabilirsiniz.</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                    <h3 class="tm-text-primary mb-4 tm-footer-title">Linkler</h3>
                    <ul class="tm-footer-links pl-0">
                        <li><a href="index.php">Anasayfa</a></li>
                        <li><a href="about.php">Hakkımızda</a></li>
                        <li><a href="register.php">Üye Ol</a></li>
                        <li><a href="contact.php">İletişim</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                    <ul class="tm-social-links d-flex justify-content-end pl-0 mb-5">
                        <li class="mb-2"><a href="#"><i class="fab fa-facebook"></i></a></li>
                        <li class="mb-2"><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li class="mb-2"><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li class="mb-2"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                    </ul>
                    <a href="#" class="tm-text-gray text-right d-block mb-2">Kullanım Yönergesi</a>
                    <a href="#" class="tm-text-gray text-right d-block">Gizlilik Politikası</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-7 col-12 px-5 mb-3">
                   Reklam.COM 2022|Tüm Hakları Saklıdır
                </div>
                <div class="col-lg-4 col-md-5 col-12 px-5 text-right">
                    Tarafından Tasarlandı, OmerFarukTurhan</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>

<!-- Vuejs code on bottom -->
    <script>
var myObject = new Vue({
  el: '#app',
  data: {message: 'Son Yazılar!'}
})

function myFunction() {
    myObject.message = "Güncel Yazılar!";
}
</script>


</body>
</html>