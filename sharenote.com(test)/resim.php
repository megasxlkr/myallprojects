<?php

include "database_connection.php";
include "baglan.php";

if(isset($_POST['submit'])) {

    $countfiles = count($_FILES['files']['name']);

    $query = "INSERT INTO resimdeneme (name,image) VALUES(?,?)";

    $statement = $conn->prepare($query);

    for($i = 0; $i < $countfiles; $i++) {

        $filename = $_FILES['files']['name'][$i];

        $target_file = 'uploads/'.$filename;

        $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
        $file_extension = strtolower($file_extension);

        $valid_extension = array("png","jpeg","jpg");

        if(in_array($file_extension, $valid_extension)){
            if(move_uploaded_file($_FILES['files']['tmp_name'][$i],$target_file))
            {
                $statement->execute(array($filename,$target_file));
            }
        }
    }
    echo "File upload successfully";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content=
    "width=device-width, initial-scale=1.0">
    <title>Reklam Yayınla</title>
</head>

<body>
<h1>Reklam Menü</h1>

<form method='post' action=''>
    <input type='file' name='files[]' multiple >
    <input type='submit' value='Gönder' name='submit' >
</form>

<a href="view.php">|View Uploads|</a>
</body>

</html>
