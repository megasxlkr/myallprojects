<?php 
$resimcek = $db->prepare("SELECT * FROM resimyukleme");
$resimcek->execute(); 
if($resimcek->rowCount()){ 
foreach($resimcek as $row){      
        ?>   
        <img src="<?php echo $row["resim"];?>" alt="Buraya aciklamasını felan çekersiniz size kalmış." />  
<?php 
    }
}else{
echo "Henüz hiç resim yok."; 
}
?>