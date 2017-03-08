<?php // Example 26-10: friends.php
  require_once 'header.php';

  if (!$loggedin)   { die("<script type='text/javascript'>window.top.location='index.php';</script>");}
 

  if (isset($_GET['view'])) $view = sanitizeString($_GET['view']);
  else                      $view = $user;
?>

    </div><br>
  </body>
</html>
