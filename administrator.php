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
      echo "<div id='". $row['id']."' value ='cat'>";
      echo "<figure class='img-overlay'>";
      echo "<a href='petProfile.php?id=" . $row['id'] . "&type=cat&image=" . $row['image'] . "&name=". $row['name'] . "&shelter=". $row['shelter']. "&description=" . $row['description'] . "&declawed=" . $row['declawed'] . "&gender=" . $row['gender']
      . "&age=" . $row['age'] . "'><div class='img-overlay'>";
      echo "<img class='resize' src='images/" . $row['image'] . "' >";
      if($row['declawed'] == "yes")
      {
        echo "<div class='overlay'><label class='fa fa-check fa-2x text'> Declawed </label></br></br><label class='fa fa-usd fa-2x text'> " . $row['fee'] . "</label></div>";
      }
      else {
        echo "<div class='overlay'><label class='fa fa-times fa-2x text'> Declawed </label></br></br><label class='fa fa-usd fa-2x text'> " . $row['fee'] . "</label></div>";
      }
      echo "</div>";
      echo "<figcaption>" . $row['name'] . "</figcaption><a href='delete.php?id=". $row['id']."&animalType=cat' class='fa fa-minus-circle fa-2x'></a>";
      echo "</figure>";
      echo "</div>";
      echo '</div>';
    }

  while($row = mysqli_fetch_array($dogResult))
  {
    echo '<div style="padding-bottom: 20px;" class="col-sm-6 col-md-4 col-lg-4">';
    echo "<div id='". $row['id']."' value ='dog'>";
    echo "<figure class='img-overlay'>";
    echo "<a href='petProfile.php?id=" . $row['id'] . "&type=dog&image=" . $row['image'] . "&name=" . $row['name'] . "&breed=" . $row['breed'] . "&shelter=" . $row['shelter'] . "&description=" . $row['description'] .
           "&fee=" . $row['fee']  . "&gender=" . $row['gender'] . "&age=" . $row['age'] . "'><div class='img-overlay'>";
    echo "<img class='resize' src='images/" . $row['image'] . "' >";
    echo "<div class='overlay'><label class='fa fa-paw fa-2x text'> " . $row['breed'] . "</label></br></br><label class='fa fa-usd fa-2x text'> " . $row['fee'] . "</label></div>";
    echo "</div>";
    echo "<figcaption>" . $row['name'] . " </figcaption><a href='delete.php?id=". $row['id']."&animalType=dog' class='fa fa-minus-circle fa-2x'></a>";
    echo "</figure>";
    echo "</div>";
    echo '</div>';
  }
  die("</div></body></html>");
}

?>

    </ul></div>
  </body>
</html>
