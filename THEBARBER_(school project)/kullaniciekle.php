 <form name="form" method="post" action="">
 </form>


  <?php
    $db=new PDO("mysql:host=localhost; dbname=berber1; charset=utf8","root","");
    if(isset($_POST["kaydet"]))
  {
        $kad=$_POST["ad"];
        $ksoyad=$_POST["soyad"];
        $ktel_no=$_POST["tel_no"];
        $kislem=$_POST["islem"]; 

         if($db)
 {
        echo ""."<br>";
       $kaydet=$db->exec("INSERT INTO kisi (ad,soyad,tel_no,islem)VALUES('$kad','$ksoyad','$ktel_no','$kislem')");
       if($kaydet)
         {
             
           }
             else
          {
           echo "Kayıt ekleme başarısız oldu";
           }
    }
    
}

?>