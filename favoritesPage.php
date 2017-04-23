<?php
  require_once 'header.php';

  $result = queryMysql("SELECT * FROM favoriteDB where userID='" . $user . "'");


  while($row = mysqli_fetch_array($result))
  {
      if($row['type'] == 'cat')
      {
        $catResult = queryMysql("SELECT * FROM catDB where id='" . $row['petID'] . "'");
        while($rowCatDB = mysqli_fetch_array($catResult))
        {
        echo '<div style="padding-bottom: 20px;" class="col-sm-6 col-md-4 col-lg-4">';
        echo "<div id='". $rowCatDB['id']."' value ='cat'>";
        echo "<figure class='img-overlay'>";
        echo "<a href='petProfile.php?id=" . $rowCatDB['id'] . "&type=cat&image=" . $rowCatDB['image'] . "&name=". $rowCatDB['name'] . "&shelter=". $rowCatDB['shelter']. "&description=" . $rowCatDB['description'] . "&declawed=" . $rowCatDB['declawed'] .
        "&gender=" . $rowCatDB['gender']
        . "&age=" . $rowCatDB['age'] . "'><div class='img-overlay'>";
        echo "<img class='resize' src='images/" . $rowCatDB['image'] . "' >";
        if($rowCatDB['declawed'] == "yes")
        {
          echo "<div class='overlay'><label class='fa fa-check fa-2x text'> Declawed </label></br></br><label class='fa fa-usd fa-2x text'> " . $rowCatDB['fee'] . "</label></div>";
        }
        else {
          echo "<div class='overlay'><label class='fa fa-times fa-2x text'> Declawed </label></br></br><label class='fa fa-usd fa-2x text'> " . $rowCatDB['fee'] . "</label></div>";
        }
        echo "</div></a>";
        echo "<figcaption>" . $rowCatDB['name'] . "</figcaption><a href='favorite.php?id=". $rowCatDB['id']."&user=" .$user . "' style='color:green;' class='fa fa-heart-o fa-2x'></a>";
        echo "</figure>";
        echo "</div>";
        echo '</div>';
      }
    }
      else if ($row['type'] == 'dog')
      {
        $dogResult = queryMysql("SELECT * FROM dogDB where id=" . $row['id'] . "");
        echo '<div style="padding-bottom: 20px;" class="col-sm-6 col-md-4 col-lg-4">';
        echo "<div id='". $row['id']."' value ='dog'>";
        echo "<figure class='img-overlay'>";
        echo "<a href='petProfile.php?id=" . $row['id'] . "&type=dog&image=" . $row['image'] . "&name=" . $row['name'] . "&breed=" . $row['breed'] . "&shelter=" . $row['shelter'] . "&description=" . $row['description'] .
         "&fee=" . $row['fee']  . "&gender=" . $row['gender'] . "&age=" . $row['age'] . "'><div class='img-overlay'>";
        echo "<img class='resize' src='images/" . $row['image'] . "' >";
        echo "<div class='overlay'><label class='fa fa-paw fa-2x text'> " . $row['breed'] . "</label></br></br><label class='fa fa-usd fa-2x text'> " . $row['fee'] . "</label></div>";
        echo "</div>";
        echo "<figcaption>" . $row['name'] . "</figcaption><a href='favorite.php?id=". $row['id']."&user=" .$user . "' style='color:green;' class='fa fa-heart-o fa-2x'></a>";
        echo "</figure>";
        echo "</div>";
        echo '</div>';
      }
  }

?>
