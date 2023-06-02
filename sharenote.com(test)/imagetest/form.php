<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TasarimKodlama.com</title>
</head>
<body>
 
<form method="post" action="upload.php"  enctype="multipart/form-data">
<table class="table1">
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">İsim</label></td>
		<td width="30"></td>
		<td><input type="text" name="ad" placeholder="Adınız" required /></td>
	</tr>
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Soyisim</label></td>
		<td width="30"></td>
		<td><input type="text" name="soyad" placeholder="Soyadınız" required /></td>
	</tr>
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Resim Seçin</label></td>
		<td width="30"></td>
		<td><input type="file" name="resim"></td>
	</tr>
</table>
<button type="submit" name="Submit" >Yükle</button>
</form>
 
</body>
</html> 