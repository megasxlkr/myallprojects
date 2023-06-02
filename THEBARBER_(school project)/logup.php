<?php

session_start();
if(isset($_POST["giris"]))
{
    $_SESSION["adi"]=$_POST["adi"];
    $_SESSION["sifre"]=$_POST["sifre"];
    header("location:admin1.php");
}

?>
