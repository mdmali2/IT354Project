<?php // Example 26-10: friends.php
  require_once 'header.php';

  if (!$loggedin)   { die("<script type='text/javascript'>window.top.location='index.php';</script>");}


  if (isset($_GET['view'])) $view = sanitizeString($_GET['view']);
  else $view = $user;

<<<<<<< HEAD

if(isset($_GET['type']))
{
  if (($_GET['type']) == 'cat')
=======
  if(isset($_GET['type']))
  {
  if(($_GET['type']) == 'cat')
>>>>>>> 875d47f9b329b3a35a3e103e6b6e616ed0e63640
  {
        $catDeclawed = sanitizeString($_GET['catDeclawed']);
        $catAge1 = sanitizeString($_GET['catAge1']);
        $catAge2 = sanitizeString($_GET['catAge2']);
        $catGender = sanitizeString($_GET['catGender']);
        if(($catGender=="*")){

          $catResult = queryMysql("SELECT * FROM catDB WHERE declawed = '".$catDeclawed."' and age <= '".$catAge2."'");
          }
          else {
            $catResult = queryMysql("SELECT * FROM catDB WHERE declawed = '".$catDeclawed."' and age <= '".$catAge2."'and gender = '".$catGender."'");
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
            echo "</div></a>";
            echo "<figcaption>" . $row['name'] . "</figcaption><a href='favorite.php?id=". $row['id']."&user=" .$user . "' style='color:green;' class='fa fa-heart-o fa-2x'></a>";
            echo "</figure>";
            echo "</div>";
            echo '</div>';
          }
  }

    else if(($_GET['type']) == 'dog')
    {
          $dogSize = sanitizeString($_GET['dogSize']);
          $dogAge1 = sanitizeString($_GET['dogAge1']);
          $dogAge2 = sanitizeString($_GET['dogAge2']);
          $dogGender = sanitizeString($_GET['dogGender']);
          if(($dogGender=="*")){

            $dogResult = queryMysql("SELECT * FROM dogDB WHERE size = '".$dogSize."' and age <= '".$dogAge2."'");
        }

        else {
          $dogResult = queryMysql("SELECT * FROM dogDB WHERE size = '".$dogSize."' and age <= '".$dogAge2."'and gender = '".$dogGender."'");
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
          echo "<figcaption>" . $row['name'] . "</figcaption><a href='favorite.php?id=". $row['id']."&user=" .$user . "' style='color:green;' class='fa fa-heart-o fa-2x'></a>";
          echo "</figure>";
          echo "</div>";
          echo '</div>';
        }
    }
  }
<<<<<<< HEAD
    else {
      $catResult = queryMysql("SELECT * FROM catDB");
=======
    else{
      $catResult = queryMysql("SELECT * FROM catDB");
      $dogResult = queryMysql("SELECT * FROM dogDB");
>>>>>>> 875d47f9b329b3a35a3e103e6b6e616ed0e63640
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
        echo "</div></a>";
        echo "<figcaption>" . $row['name'] . "</figcaption><a href='favorite.php?id=". $row['id']."&user=" .$user . "' style='color:green;' class='fa fa-heart-o fa-2x'></a>";
        echo "</figure>";
        echo "</div>";
        echo '</div>';
      }
<<<<<<< HEAD
=======
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
        echo "<figcaption>" . $row['name'] . "</figcaption><a href='favorite.php?id=". $row['id']."&user=" .$user . "' style='color:green;' class='fa fa-heart-o fa-2x'></a>";
        echo "</figure>";
        echo "</div>";
        echo '</div>';
      }

>>>>>>> 875d47f9b329b3a35a3e103e6b6e616ed0e63640
    }

    die("</div></body></html>");

  ?>
