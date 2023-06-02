<?php
include 'baglan.php';
?>

<!DOCTYPE html>
<html lang="tr"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İletişim</title>
     <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="all.min.css">
    <link rel="stylesheet" href="templatemo-style.css">
</head>
<body>
 
    <div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <i class="fas fa-film mr-2"></i>
                Reklam.COM
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



    <div class="container-fluid tm-mt-60">
        <div class="row tm-mb-50">
            <div class="col-lg-4 col-12 mb-5">
                <h2 class="tm-text-primary mb-5">İletişim Sayfası</h2>

                <form id="contact-form" action="contact.php" method="POST" class="tm-contact-form mx-auto">

                    <div class="form-group">
                        <input type="text" name="isminiz" class="form-control rounded-0" placeholder="İsim" required />
                    </div>

                    <div class="form-group">
                        <input type="email" name="emailadresiniz" class="form-control rounded-0" placeholder="Email Adresiniz" required />
                    </div>

                    <div class="form-group">
                        <textarea rows="8" name="mesaj" class="form-control rounded-0" placeholder="Mesajınız.." required=></textarea>
                    </div>

                    <div class="form-group tm-text-right">
                        <button type="submit" name="mesajgonder" class="btn btn-primary">Gönder</button>
                    </div>


                </form>


            </div>





            <div class="col-lg-4 col-12 mb-5">
                <div class="tm-address-col">
                    <h2 class="tm-text-primary mb-5">Adresimiz</h2>
                    <p class="tm-mb-50">Türkiye / İstanbul. </p>
                    <p class="tm-mb-50">İstanbul Gelişim University / AVCILAR</p>
                    <address class="tm-text-gray tm-mb-50">
                        Mustafa Kemal Paşa Durağı<br>
                        Metrobüs Yolu alt sokağı
                    </address>
                    <ul class="tm-contacts">
                        <li>
                            <a href="#" class="tm-text-gray">
                                <i class="fas fa-envelope"></i>
                                Email: info@reklamci.com.tr
                            </a>
                        </li>
                        <li>
                            <a href="#" class="tm-text-gray">
                                <i class="fas fa-phone"></i>
                                Tel: 0555-555-555-55
                            </a>
                        </li>
                        <li>
                            <a href="#" class="tm-text-gray">
                                <i class="fas fa-globe"></i>
                                URL: www.reklamci.epizy.com
                            </a>
                        </li>
                    </ul>
                </div>                
            </div>


            <div class="col-lg-4 col-12">
                <h2 class="tm-text-primary mb-5">Konumumuz</h2>
                <!-- Map -->
                <div class="mapouter mb-4">
                    <div class="gmap-canvas">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6022.488988923375!2d28.690220564603823!3d40.998021525831696!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14caa0f5088d375d%3A0xfc55898b29bc7b33!2zxLBTVEFOQlVMIEdFTMSwxZ7EsE0gw5xOxLBWRVJTxLBURVPEsA!5e0!3m2!1str!2str!4v1670411151716!5m2!1str!2str" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>               
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

</body>
</html>




<?php

$db=new PDO("mysql:host=localhost;dbname=reklam_uye;charset=utf8","root","");

//ekleme
if (isset($_POST['mesajgonder'])) {

    $isminiz=$_POST["isminiz"];
    $emailadresiniz=$_POST["emailadresiniz"];
    $mesaj=$_POST["mesaj"];


    $kaydet = $db -> exec("insert into mesajkutusu(isminiz,emailadresiniz,mesaj)VALUES('$isminiz','$emailadresiniz','$mesaj')");

    if ($kaydet) {
        echo "Talebiniz Gönderildi";
    }
    else{
        echo"Hatalı Giriş.";
    }

}
?>