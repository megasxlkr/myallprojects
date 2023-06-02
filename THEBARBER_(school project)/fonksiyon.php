<?php
function oturum(){
    if(!isset($_SESSION['k_adi']) ) {
    header("location:randevu.php");
    exit;
    }else{
        return true;
    }

}

?>