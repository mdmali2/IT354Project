<?php // Example 26-10: friends.php
  require_once 'header.php';

  if (!$loggedin)   { die("<script type='text/javascript'>window.top.location='index.php';</script>");}
  ?>
  <!DOCTYPE html>
  <html>
    <head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <title>Cat Answers</title>
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
            $catDeclawed = $_POST['question-1-answers'];
            $catAge1 = $_POST['question-2-answers1'];
            $catAge2 = $_POST['question-2-answers2'];
            $catGender = $_POST['question-3-answers'];

            $declawed = "<span>Declawed: </span>";
            $age1 = "<span>Min Age: </span>";
            $age2 = "<span>Max Age: </span>";
            $gender = "<span>Gender: </span>";


            echo $declawed . ' ' . "<span>$catDeclawed</span>";
            echo "</br>";
            echo $age1 . ' ' . "<span>$catAge1</span>";
            echo "</br>";
            echo $age2 . ' ' . "<span>$catAge2</span>";
            echo "</br>";
            echo $gender . ' ' . "<span>$catGender</span>";
            echo "</br>";
            echo "</br>";

            echo"<a class='button' href='user.php?catDeclawed=" . $catDeclawed ."&type=cat&catAge1=" . $catAge1 ."&catAge2=" . $catAge2 ."&catGender=" . $catGender ."'>Click here to see your pets!</a>";
            echo "</center>";

      ?>

    </body>
  </html>
