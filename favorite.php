<?php
  require_once 'header.php';
  $user = sanitizeString($_GET['user']);
  $type = sanitizeString($_GET['type']);
  $petID = sanitizeString($_GET['petID']);
  $result = queryMysql("SELECT * FROM favoritedb where userID = '" .$user . "'and petID = '" . $petID . "' and type = '" . $type . "'");
  if(mysqli_fetch_array($result) == 0)
  {
    echo "alert('updated')";
    $result = queryMysql("INSERT INTO favoritedb (userID, petID, type) VALUES('$user', '$petID', '$type')");
  }
  else {
    echo "alert('deleted')";
     $result = queryMysql("DELETE FROM favoritedb where userID = '" .$user . "'and petID = '" . $petID . "' and type = '" . $type . "'");
  }
?>
