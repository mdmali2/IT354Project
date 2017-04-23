<?php // Example 26-10: friends.php
  require_once 'header.php';

  if (!$loggedin)   { die("<script type='text/javascript'>window.top.location='index.php';</script>");}
  ?>
  <!DOCTYPE html>
  <html>
    <head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <title>Dog Answers</title>
    </head>
    <body>
      <h1>Your Answers:</h1>

        <?php



            $dogSize = $_POST['question-1-answers'];
            $dogAge1 = $_POST['question-2-answers1'];
            $dogAge2 = $_POST['question-2-answers2'];
            $dogGender = $_POST['question-3-answers'];

            $size = "<h4>Size: </h4>";
            $age1 = "<h4>Min Age: </h4>";
            $age2 = "<h4>Max Age: </h4>";
            $gender = "<h4>Gender: </h4>";


            echo $size . ' ' . "<h4>$dogSize</h4>";
            echo $age1 . ' ' . "<h4>$dogAge1</h4>";
            echo $age2 . ' ' . "<h4>$dogAge2</h4>";
            echo $gender . ' ' . "<h4>$dogGender</h4>";

            echo"<a href='user.php?dogSize=" . $dogSize ."&dogAge1=" . $dogAge1 ."&dogAge2=" . $dogAge2 ."&dogGender=" . $dogGender ."'>CLick here to see your pets!</a>";

      ?>



    </body>
  </html>
