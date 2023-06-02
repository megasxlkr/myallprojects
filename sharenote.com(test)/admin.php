<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$database = "reklam_uye";
$message = "";
try
{
    $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(isset($_POST["giris"]))
    {
        if(empty($_POST["ka"]) || empty($_POST["sfr"]))
        {
            $message = '<label>All fields are required</label>';
        }
        else
        {
            $query = "SELECT * FROM adminler WHERE ka = :ka AND sfr = :sfr";
            $statement = $connect->prepare($query);
            $statement->execute(
                array(
                    'ka'     =>     $_POST["ka"],
                    'sfr'     =>     $_POST["sfr"]
                )
            );
            $count = $statement->rowCount();
            if($count > 0)
            {
                $_SESSION["ka"] = $_POST["ka"];
                header("location:adminindex.php");
            }
            else
            {
                $message = '<label>Hatalı Giriş</label>';
            }
        }
    }
}
catch(PDOException $error)
{
    $message = $error->getMessage();
}
?>


<?php include 'baglan.php'; ?>
<!DOCTYPE html>
<html lang="tr">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="all.min.css">
    <link rel="stylesheet" href="templatemo-style.css">
    <link rel="stylesheet" type="text/css" href="login.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <style type="text/css">

    </style>

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




<br><hr>
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Giriş Yap</h3>
                <div class="d-flex justify-content-end social_icon">
                    <span><i class="fab fa-facebook-square"></i></span>
                    <span><i class="fab fa-google-plus-square"></i></span>
                    <span><i class="fab fa-twitter-square"></i></span>
                </div>
            </div>
            <div class="card-body">

                <form action="admin.php" method="post">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="ka" class="form-control"   placeholder="Kullanıcı Adınız">
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="sfr" class="form-control"   placeholder="Şifreniz">
                    </div>
                    <div class="row align-items-center remember">
                        <input type="checkbox">Beni Hatırla
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Giriş Yap" name="giris" class="btn float-right login_btn">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<hr>


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
