<?php // Example 26-10: friends.php
  require_once 'header.php';

  if (!$loggedin)   { die("<script type='text/javascript'>window.top.location='index.php';</script>");}


  if (isset($_GET['view'])) $view = sanitizeString($_GET['view']);
  else                      $view = $user;

          $catResult = queryMysql("SELECT * FROM catDB");

          $dogResult = queryMysql("SELECT * FROM dogDB");


      while($row = mysqli_fetch_array($catResult))
      {
        echo '<div style="padding-bottom: 20px;" class="col-sm-6 col-md-4 col-lg-4">';
        echo "<div id='". $row['id']."' value ='cat'>";
        echo "<figure class='img-overlay'>";
        echo "<div class='img-overlay'>";
        echo "<img class='resize' src='images/" . $row['image'] . "' >";
        if($row['declawed'] == "yes")
        {
          echo "<div class='overlay'><label class='fa fa-check fa-2x text'> Declawed </label></br></br><label class='fa fa-usd fa-2x text'> " . $row['fee'] . "</label></div>";
        }
        else {
          echo "<div class='overlay'><label class='fa fa-times fa-2x text'> Declawed </label></br></br><label class='fa fa-usd fa-2x text'> " . $row['fee'] . "</label></div>";
        }
        echo "</div>";
        echo "<figcaption>" . $row['name'] . "</figcaption>";
        echo "</figure>";
        echo "</div>";
        echo '</div>';
      }

    while($row = mysqli_fetch_array($dogResult))
    {
      echo '<div style="padding-bottom: 20px;" class="col-sm-6 col-md-4 col-lg-4">';
      echo "<div id='". $row['id']."' value ='dog'>";
      echo "<figure class='img-overlay'>";
      echo "<div class='img-overlay'>";
      echo "<img class='resize' src='images/" . $row['image'] . "' >";
      echo "<div class='overlay'><label class='fa fa-paw fa-2x text'> " . $row['breed'] . "</label></br></br><label class='fa fa-usd fa-2x text'> " . $row['fee'] . "</label></div>";
      echo "</div>";
      echo "<figcaption>" . $row['name'] . "</figcaption>";
      echo "</figure>";
      echo "</div>";
      echo '</div>';
    }
    die("</div></body></html>");

  ?>
