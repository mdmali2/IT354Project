<?php
  require_once 'header.php';
  if (!$loggedin)   { die("<script type='text/javascript'>window.top.location='index.php';</script>");}

  echo "<div class='main'>";

  if (isset($_GET['view']))
  {
    $view = sanitizeString($_GET['view']);

    if ($view == $user) $name = "Your";
    else                $name = "$view's";

    $shelter = queryMysql("SELECT shelter FROM staff WHERE user='$user'");

    while ($row = $shelter->fetch_assoc()) {
        echo "<h1> Current Pets in Shelter: ". $row['shelter']. "</h1><hr>";
        $catResult = queryMysql("SELECT * FROM catDB WHERE shelter='". $row['shelter'] ."'");
    }
    $shelter = queryMysql("SELECT shelter FROM staff WHERE user='$user'");
    while ($row = $shelter->fetch_assoc()) {
        $dogResult = queryMysql("SELECT * FROM dogDB WHERE shelter='". $row['shelter'] ."'");
    }

    while($row = mysqli_fetch_array($catResult))
    {

      echo '<div style="padding-bottom: 20px;" class="col-sm-6 col-md-4 col-lg-4">';
      echo "<div id='". $row['name']."'>";
      echo "<figure>";
      echo "<img class='resize' src='images/" . $row['image'] . "' >";
      echo "<figcaption>" . $row['name'] . "</figcaption>";
      echo "</figcaption>";
      echo "</div>";
      echo '</div>';
    }

  while($row = mysqli_fetch_array($dogResult))
  {
    echo '<div style="padding-bottom: 20px;" class="col-sm-6 col-md-4 col-lg-4">';
    echo "<div id='". $row['name']."'>";
    echo "<figure>";
    echo "<img class='resize' src='images/" . $row['image'] . "' >";
    echo "<figcaption>" . $row['name'] . "</figcaption>";
    echo "</figcaption>";
    echo "</div>";
    echo '</div>';
  }
  die("</div></body></html>");
}

?>

    </ul></div>
  </body>
</html>
