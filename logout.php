<?php // Example 26-12: logout.php
  require_once 'header.php';

  if (isset($_SESSION['user']))
  {
    destroySession();
    echo die("<script type='text/javascript'>window.top.location='index.php';</script>");
  }
  else die("<script type='text/javascript'>window.top.location='index.php';</script>");
?>

    <br><br></div>
  </body>
</html>
