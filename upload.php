<?php
require_once 'header.php';
if(isset($_POST['submit']))
{
    $msg = "";
    $target = "images/" .basename($_FILES['image']['name']);
    $image = "";
    $name = $_POST['name'];
    $petname = sanitizeString($_POST['name']);
    $animal = sanitizeString($_POST['animal']);
    $shelter = sanitizeString($_POST['shelter']);
    $description = sanitizeString($_POST['description']);
    $fee = sanitizeString($_POST['fee']);
    if($animal =='Cat')
      {
        $declawed = sanitizeString($_POST['declawed']);
        $temp = explode(".", $_FILES['image']['name']);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $result = queryMysql("INSERT INTO catDB (image, name, shelter, description, declawed, fee) VALUES('$newfilename', '$name', '$shelter', '$description', '$declawed', '$fee')");
      }
      else if ($animal =='Dog')
      {
        $temp = explode(".", $_FILES['image']['name']);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $size = sanitizeString($_POST['size']);
        $breed = sanitizeString($_POST['breed']);
        $result = queryMysql("INSERT INTO dogDB (image, name, shelter, description, size, breed, fee) VALUES('$newfilename', '$name','$shelter', '$description','$size','$breed','$fee')");
      }
      else
      {
        die("<script type='text/javascript'>window.top.location='index.php';</script>");
      }
      if(move_uploaded_file($_FILES['image']['tmp_name'], "images/" . $newfilename))
      {
        $msg = "Image uploaded successfully";
        die("<script type='text/javascript'>window.top.location='administrator.php?view=$user';</script>");
      }
      else {
        $msg = "Image uploaded unsuccessfully";
      }
    }
?>
