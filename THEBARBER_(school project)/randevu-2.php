<?php include'baglanuye.php'; ?>
<?php 
if(isset($_POST['submit'])){
	
	$k_adi = $_POST['k_adi'];
	$sifre = $_POST['sifre'];
	
	$girisyap = $db -> prepare("SELECT * FROM kayitol WHERE k_adi=:k AND sifre=:s");
	$girisyap->execute([':k'=>$k_adi, ':s'=>$sifre]);
	if($girisyap -> rowCount()){
		
		$row = $girisyap->fetch(PDO::FETCH_OBJ);
		$_SESSION['oturum'] = true;
		$_SESSION['k_adi'] = $row->k_adi;
		$_SESSION['kayit_id'] = $row->kayit_id;
		
		header('location:randevu_kisimi.php?basarili');
	}
	else
	{
        header('location:randevu.php?basarisiz');
	}
}
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




  
 <div id="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div align="center"><img src="resim/logo.png" ></div>
<br>
                        <form action="randevu.php" method="post">

					<div class="input-group form-group">
						
						<input type="text" name="k_adi" class="form-control" placeholder="Kullanıcı Adınız">
						
					</div>
					
					<div class="input-group form-group">
						 
						<input type="password" name="sifre" class="form-control" placeholder="Kullanıcı Şifreniz">
					</div>
			 
				  <button type="submit" class="btn btn-success" name="submit" style="margin:15px;">Giriş</button>
				  	
				</form>  
                </div>
        </div>
  </center>


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
          <a class="nav-link active" aria-current="page" href="anasayfa.php">Anasayfa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="uyegiris_ol.php">Üye Ol</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">SAYGILI OL</a>
        </li>
        <li class="nav-item dropup">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown10" data-bs-toggle="dropdown" aria-expanded="false">Giriş Yap</a>
          <ul class="dropdown-menu" aria-labelledby="dropdown10">
            
            <li><a class="dropdown-item" href="uyegiris.php">Üye Girişi</a></li>
             
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
    
</body>
</html>
