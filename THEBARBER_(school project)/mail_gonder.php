 <?php
include 'PHPMailer/src/SMTP.php';
include 'PHPMailer/src/PHPMailer.php';
include 'PHPMailer/src/Exception.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\Exception; 

$adi=$_POST['adi'];
$soyadi=$_POST['soyadi'];
$mail_adresi=$_POST['mail_adresi'];
$mail = new PHPMailer();
$mail->Host = "ssl://smtp.gmail.com";
$mail->Username = 'miohomenevresim@gmail.com'; 
$mail->Password = 'myvjad-woxxor-Xomce1';
$mail->Port = 465; 
$mail->SMTPSecure = 'ssl';       
$mail->isSMTP(); 
$mail->SMTPAuth = true;
$mail->isHTML(true);
$mail->CharSet = "UTF-8";
$mail->setLanguage('tr', 'PHPMailer/language//');
//$mail->SMTPDebug  = 2;
$mail->setFrom('miohomenevresim@gmail.com', 'Mio Home Nevresim');
$mail->addAddress('miohomenevresim@gmail.com', 'Mio home Nevresim');

$mail->Subject = 'İletişim Formu';

$icerik = "Gönderenin Adı: ".$kadi."<br>".
 " Gönderenin Soyadı: ".$ksoyadi. "<br>".
 " Gönderenin Mail Adresi: ".$kmail."<br>";

$mail->MsgHTML($icerik);
$mail_gonder = $mail->send(); 
if($mail_gonder)
{ 
	echo 'Mail başarıyla gönderildi';
    header("location:iletisim.php");
}
else
{
	echo 'Mail gönderilemedi. Mail hata mesajı: '.
        $mail->ErrorInfo; 
}


?>