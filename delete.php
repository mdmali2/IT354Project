<?php
require_once 'header.php';
  $id = $_GET["id"];
  $animalType = $_GET["animalType"];
  $result = "";
  $database="";
  if($animalType == 'cat')
  {
    $database = 'catDB';
  }
  else {
    $database = 'dogDB';
  }
  $result = queryMysql("DELETE FROM $database WHERE id='$id'");
  die("<script type='text/javascript'>window.top.location='index.php';</script>");
?>
