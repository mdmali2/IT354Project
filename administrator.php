<?php
  require_once 'header.php';
  if (!$loggedin)   { die("<script type='text/javascript'>window.top.location='index.php';</script>");}

  echo "<div class='main'>";

  if (isset($_GET['view']))
  {
    $view = sanitizeString($_GET['view']);

    if ($view == $user) $name = "Your";
    else                $name = "$view's";

    $catResult = queryMysql("SELECT * FROM catDB");

    $dogResult = queryMysql("SELECT * FROM dogDB");

    while($row = mysqli_fetch_array($catResult))
    {
      echo '<div class="col-sm-6 col-md-4 col-lg-4">';
      echo "<div id='". $row['name']."'>";
      echo "<img class='resize' src='images/" . $row['image'] . "' >'";
      echo "<p>" . $row['name'] . "</p>" ;
      echo "</div>";
      echo '</div>';
    }

  while($row = mysqli_fetch_array($dogResult))
  {
    echo '<div class="col-sm-6 col-md-4 col-lg-4">';
    echo "<div id='". $row['name']."'>";
    echo "<img class='resize' src='images/" . $row['image'] . "' >'";
    echo "<p>" . $row['name'] . "</p>" ;
    echo "</div>";
    echo '</div>';
  }
  die("</div></body></html>");
}

?>

    </ul></div>
  </body>
</html>
