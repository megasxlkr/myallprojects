<?php 
include "config.php";
 
if(isset($_POST['submit'])){

  // Count total files
  $countfiles = count($_FILES['files']['name']);
 
  // Prepared statement
  $query = "INSERT INTO resimdeneme (name,image) VALUES(?,?)";

  $statement = $conn->prepare($query);

  // Loop all files
  for($i=0;$i<$countfiles;$i++){

    // File name
    $filename = $_FILES['files']['name'][$i];

    // Location
    $target_file = 'upload/'.$filename;

    // file extension
    $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
    $file_extension = strtolower($file_extension);

    // Valid image extension
    $valid_extension = array("png","jpeg","jpg");

    if(in_array($file_extension, $valid_extension)){

       // Upload file
       if(move_uploaded_file($_FILES['files']['tmp_name'][$i],$target_file)){

          // Execute query
    $statement->execute(array($filename,$target_file));

       }
    }
 
  }
  echo "File upload successfully";
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
</head>
<body>

<form method='post' action='' enctype='multipart/form-data'>
  <input type='file' name='files[]' multiple />
  <input type='submit' value='Submit' name='submit' />
</form>

</body>
</html>