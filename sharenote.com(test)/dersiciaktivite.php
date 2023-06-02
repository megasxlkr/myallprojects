<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ders İçi Aktivite</title>
</head>
<body>
<?php
 
$arabalar= array("AUDI"=>"Q5",
    "MERCEDES"=>"S350",
    );
 
foreach($arabalar as $marka=>$model)
{
  echo "$marka Markalı Aracın modeli: $model <hr>";
}

echo count($arabalar)." sayısı dizinin eleman sayısına eşittir ";

echo "<pre>";
print_r($arabalar);
echo"</pre>";


 
$haftaici= array("pazartesi","Salı",
    "Çarşanba","Perşembe","Cuma","Cumartesi	","Pazar"
    );
 
foreach($haftaici as $haftagunleri)
{
  echo "$haftagunleri <br>";
}

$ogrenci = array();
$ogrenci[0]=array("Çisem","Balıkesir");
$ogrenci[1]=array("Ömer","Kastaöonu");
$ogrenci[2]=array("faruk","rize");
$ogrenci[3]=array("asd","asdasd");

echo "<pre>";
print_r($ogrenci);
echo"</pre>";


$kutuphane = array(

		[ 
"Kitabın Adı: "=>"Nutuk",
"Kitabın Yazarı: "=>"Mustafa Kemal Atatürk",
"YayınEvi: "=>"Yapı Kredi Yayınları"
],
 
 	[ 
"Kitabın Adı: "=>"Küçük Prens",
"Kitabın Yazarı: "=>"Antonie de saint-Exupery",
"YayınEvi: "=>"Can Çocuk Yayınları"
],
 

 	[ 
"Kitabın Adı: "=>"Simyacı",
"Kitabın Yazarı: "=>"Paulo Coelho",
"YayınEvi: "=>"Can Çocuk Yayınları"
],
 
);

 foreach ($kutuphane as $kitap  ) {
 	 foreach ($kitap as $anahtar => $deger) {
 	 	 echo $anahtar." - ".$deger."<br>";
 	 }
 	 echo "<hr>";
 }

?>
</body>
</html>

