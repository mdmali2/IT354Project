<?php // Example 26-10: friends.php
  require_once 'header.php';

  if (!$loggedin)   { die("<script type='text/javascript'>window.top.location='index.php';</script>");}
  ?>
  <!DOCTYPE html>
  <html>
    <head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <title>Dog Answers</title>
      <style>
      .button {
            font: bold 18px Arial;
            text-decoration: none;
            background-color: #4CAF50;
            color: #FFFFFF;
            padding: 2px 6px 2px 6px;
            border-top: 1px solid #CCCCCC;
            border-right: 1px solid #333333;
            border-bottom: 1px solid #333333;
            border-left: 1px solid #CCCCCC;
          }
      </style>
    </head>
    <body>


        <?php
            echo "<center class='form-login'>";
            echo "<h2>Your Answers:</h2>";
            echo "</br>";
            $dogSize = $_POST['question-1-answers'];
            $dogAge1 = $_POST['question-2-answers1'];
            $dogAge2 = $_POST['question-2-answers2'];
            $dogGender = $_POST['question-3-answers'];

            $size = "<span>Size: </span>";
            $age1 = "<span>Min Age: </span>";
            $age2 = "<span>Max Age: </span>";
            $gender = "<span>Gender: </span>";


            echo $size . ' ' . "<span>$dogSize</span>";
            echo "</br>";
            echo $age1 . ' ' . "<span>$dogAge1</span>";
            echo "</br>";
            echo $age2 . ' ' . "<span>$dogAge2</span>";
            echo "</br>";
            echo $gender . ' ' . "<span>$dogGender</span>";
            echo "</br></br>";

            echo"<a class='button' href='user.php?dogSize=" . $dogSize ."&type=dog&dogAge1=" . $dogAge1 ."&dogAge2=" . $dogAge2 ."&dogGender=" . $dogGender ."'>Click here to see your pets!</a>";
            echo "</center>";
      ?>



    </body>
  </html>
