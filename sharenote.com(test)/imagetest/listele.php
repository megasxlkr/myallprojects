<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tasarım Kodlama</title>
</head>
<body>
 
<table cellpadding="0" cellspacing="0" width="50%">
    <thead>
        <tr>
            <th>Ad</th>
            <th>Soyad</th>
            <th>Resim</th>
        </tr>
    </thead>
    <tbody>
<?php
	require_once('baglanti.php');
	$result = $conn->prepare("SELECT * FROM tbl_resim ORDER BY tbl_resim_id ASC");
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
	$id=$row['tbl_resim_id'];
?>
<tr>
<td>
	<?php if($row['resim_konum'] != ""): ?>
	<img src="dosyalar/<?php echo $row['resim_konum']; ?>" width="100px" style="border:1px solid #333333;">
	<?php else: ?>
	<img src="dosyalar/default.png" width="100px" height="100px" style="border:1px solid #333333;">
	<?php endif; ?>
</td>
<td> <?php echo $row ['ad']; ?></td>
<td> <?php echo $row ['soyad']; ?></td>
</tr>
<?php } ?>
</tbody>
</table>
    
</body>
</html>