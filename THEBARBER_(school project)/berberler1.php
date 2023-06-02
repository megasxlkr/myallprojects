
<?php
include ("randevu.php");
if(isset($_POST["giris"]))
{
	$k_adi = $_POST["k_adi"];
	$ksifre = $_POST["sifre"];
    
    $berber1  = $db -> query("SELECT * FROM kayitol WHERE k_adi='$k_adi' and sifre='$ksifre'", PDO::FETCH_ASSOC);
        if($berber1->rowCount()>0)  
			{
				session_start();
                $adi=$berber1->fetch();
				//$_SESSION["oturum"] = "true";
				$_SESSION["k_adi"] = $k_adi;
				$_SESSION["ksifre"] = $ksifre;
                header("refresh:2;url=berberler.php");
            }
                else
                {
                
                    header("refresh:2;url=randevu.php");
                }
    
}
?>