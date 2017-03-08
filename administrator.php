<?php
  require_once 'header.php';

  if (!$loggedin)   { die("<script type='text/javascript'>window.top.location='index.php';</script>");}

  echo "<div class='main'>";

  if (isset($_GET['view']))
  {
    $view = sanitizeString($_GET['view']);

    if ($view == $user) $name = "Your";
    else                $name = "$view's";

    echo "<h3>$name Profile</h3>";
    showProfile($view);
    echo "<a class='button' href='messages.php?view=$view'>" .
         "View $name messages</a><br><br>";
    die("</div></body></html>");
  }
?>

    </ul></div>
  </body>
</html>
