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
          echo "<div class='overlay'><label style='red' class='fa fa-check fa-2x text'> Declawed </label></br></br><label class='fa fa-usd fa-2x text'> " . $rowCatDB['fee'] . "</label></div>";
        }
        else {
          echo "<div class='overlay'><label class='fa fa-times fa-2x text'> Declawed </label></br></br><label class='fa fa-usd fa-2x text'> " . $rowCatDB['fee'] . "</label></div>";
        }
        echo "</div></a>";
        echo "<figcaption>" . $rowCatDB['name'] . "</figcaption><a href='favorite.php?id=". $rowCatDB['id']."&user=" .$user . "'></a>";
        echo "</figure>";
        echo "</div>";
        echo '</div>';
      }
    }
      else if ($row['type'] == 'dog')
      {
        $dogResult = queryMysql("SELECT * FROM dogDB where id='" . $row['petID'] . "'");
        while($rowDogDB = mysqli_fetch_array($dogResult))
        {
          echo '<div style="padding-bottom: 20px;" class="col-sm-6 col-md-4 col-lg-4">';
          echo "<div id='". $rowDogDB['id']."' value ='dog'>";
          echo "<figure class='img-overlay'>";
          echo "<a href='petProfile.php?id=" . $rowDogDB['id'] . "&type=dog&image=" . $rowDogDB['image'] . "&name=" . $rowDogDB['name'] . "&breed=" . $rowDogDB['breed'] . "&shelter=" . $rowDogDB['shelter'] . "&description=" . $rowDogDB['description'] .
           "&fee=" . $rowDogDB['fee']  . "&gender=" . $rowDogDB['gender'] . "&age=" . $rowDogDB['age'] . "'><div class='img-overlay'>";
          echo "<img class='resize' src='images/" . $rowDogDB['image'] . "' >";
          echo "<div class='overlay'><label class='fa fa-paw fa-2x text'> " . $rowDogDB['breed'] . "</label></br></br><label class='fa fa-usd fa-2x text'> " . $rowDogDB['fee'] . "</label></div>";
          echo "</div>";
          echo "<figcaption>" . $rowDogDB['name'] . "</figcaption><a href='favorite.php?id=". $rowDogDB['id']."&user=" .$user . "'></a>";
          echo "</figure>";
          echo "</div>";
          echo '</div>';
      }
      }
  }

?>
