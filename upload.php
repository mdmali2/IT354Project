<?php
require_once 'functions.php';

if(isset($_POST['submit']))
{
    $msg = "";
    $target = "images/" .basename($_FILES['image']['name']);
    $image = $_FILES['image']['name'];
    $name = $_POST['name'];
    $petname = sanitizeString($_POST['name']);
    $animal = sanitizeString($_POST['animal']);
    $shelter = sanitizeString($_POST['shelter']);
    $description = sanitizeString($_POST['description']);

    if($animal =='Cat')
      {
        $result = queryMysql("INSERT INTO catDB (image, name, shelter, description) VALUES('$image', '$name', '$shelter', '$description')");
      }
      else if ($animal =='Dog')
      {
        $size = sanitizeString($_POST['size']);
        $breed = sanitizeString($_POST['breed']);
        $result = queryMysql("INSERT INTO dogDB (image, name, shelter, description, size, breed) VALUES('$image', '$name','$shelter', '$description','$size','$breed')");
      }
      else
      {
        die("<script type='text/javascript'>window.top.location='index.php';</script>");
      }
      if(move_uploaded_file($_FILES['image']['tmp_name'], $target))
      {
        $msg = "Image uploaded successfully";
      }
      else {
        $msg = "Image uploaded unsuccessfully";
      }
    }
?>
