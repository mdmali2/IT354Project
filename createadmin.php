<?php
require_once 'functions.php';
if(isset($_POST['submit']))
{
  require_once 'header.php';
  $name=sanitizeString($_POST['name']);
  $shelter=sanitizeString($_POST['shelter']);
  $result = queryMysql("INSERT INTO staff (user, shelter) VALUES('$name', '$shelter')");
  $result = queryMysql("UPDATE members SET admin=1 WHERE user='$name'");
  die("<script type='text/javascript'>window.top.location='administrator.php?view=$user';</script>");
}

if(isset($_POST['user_name']))
{
 $name=sanitizeString($_POST['user_name']);

 $checkdata= queryMysql("SELECT * FROM members WHERE user='$name'");

 if(mysqli_num_rows($checkdata) > 0)
 {
   $checkdata= queryMysql("SELECT * FROM members WHERE user='$name' and admin= 1");
   if(mysqli_num_rows($checkdata) > 0)
   {
     echo "User is already apart of another shelter";
   }
    else {
      echo "Make this user a shelter administrator";
    }
   }
 else
 {
  echo "Username not found";
 }
 exit();
}

?>
