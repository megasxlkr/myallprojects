<?php
include 'PHPMailer/src/SMTP.php';
include 'PHPMailer/src/PHPMailer.php';
include 'PHPMailer/src/Exception.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\Exception; 

$mail = new PHPMailer();
$mail->Host = "smtp.gmail.com";
$mail->Username = 'omerturhanceo@icloud.com'; 
$mail->Password = 'wxkl3651Aa';
$mail->Port = 587; 
$mail->SMTPSecure = 'tls'; 
$mail->isSMTP(); 
$mail->SMTPAuth = true;
$mail->isHTML(true);
$mail->CharSet = "UTF-8";
$mail->setLanguage('tr', 'PHPMailer/language/');
//$mail->SMTPDebug  = 2;
$mail->setFrom('omerturhanceo@icloud.com', 'Gelişim Üniversitesi');
$mail->addAddress('omerturhanceo@icloud.com', 'Çisem Yaşar');

$mail->Subject = 'Deneme mail gönderimi';
$mail->Body =
"
	<html>
		<head>
		</head>
		<body>
			<h3>Bu mail Gelişim Üniversitesi Meslek Yüksekokulu Bilgisayar Programcılığı İkinci Öğretim Öğrencileri Tarafından PhpMailler ile mail gönderimini test etmek amacıyla gönderilmiştir.</h3>
		</body>
	</html>
";
$mail_gonder = $mail->send(); 
if($mail_gonder)
{ 
	echo 'Mail başarıyla gönderildi';
}
else
{
	echo 'Mail gönderilemedi. Mail hata mesajı: '.
        $mail->ErrorInfo; 
}
?>



