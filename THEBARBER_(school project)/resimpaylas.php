<?php
 
session_start();if($_SESSION["adi"]=="admin" && $_SESSION["sifre"]==123456){}else { header("Location:admin.php");} ?>

 

    <!-- PHP -->


    <?php
    if($_FILES){
        include "baglan2.php";

        $kadi           = $_SESSION["kadi"];
        $sorgu          = $db ->query ("SELECT image_count FROM kullanici_verileri WHERE k_adi = '$kadi' " ) -> fetch();

       
        $sayi           = $sorgu["image_count"];
        $maxSize        = 4000000;
        $dosyaUzantisi  = substr($_FILES["image"]["name"],-4,4); 
        $dosyaAdi       = $SESSION['id']."".rand(0,99999999).$dosyaUzantisi;
        $dosyaYolu      = "resimler/".$dosyaAdi;
        $tmp_name       = $_FILES["image"]["tmp_name"];
        $size           = $_FILES["image"]["size"];
        $fileType       = $_FILES["image"]["type"];
       
            if ($size<=$maxSize) {
            
                if (is_uploaded_file($tmp_name) ) {

                    
                    $tasi=move_uploaded_file($_FILES["image"]["tmp_name"],$dosyaYolu);
                        if ($tasi) {

                         $updateIMG=$db->prepare("select image_count from kullanici_verileri WHERE k_adi=?;");
                         $updateIMG->execute(array($_SESSION['kadi']));
                         $islem=$updateIMG->fetch();
                         $imageCountAdd=$islem["image_count"]+1;
                         $id=$_SESSION['id'];
                         $kayit2=$db->exec("update kullanici_verileri set image_count=$imageCountAdd WHERE ID=$id");

                         $kayit=$db->prepare("insert into images set
                         image_name=?,
                         image_type=?,
                         image_size=?,
                         user_name=?
                        ");

                        $kayit->execute(array($dosyaYolu,$fileType,$size,$kadi));

                           

                        echo "Dosya başarıyla yüklendi, Veritabanına işlendi ve anasayfaya gönderildi.<br>Ana sayfaya yönlendiriliyorsunuz...";
                        header("location:index.php");

                        } //if-tasi ends
                    
                        else{
                            echo "Dosya taşınırken bir hata oluştu.";
                        }
                        
                } // if-isUploadedFile ends
                else{
                    echo "Geçici klasörde dosya yok!";
                }

            }//if-maxSize ends
            else{
                echo "Dosya boyutu çok büyük!";
            }

    } //if-$files ends
    else{
        echo "Dosya Seçilmedi";
    }
    ?>
</body>
</html>