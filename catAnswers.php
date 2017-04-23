<?php // Example 26-10: friends.php
  require_once 'header.php';

  if (!$loggedin)   { die("<script type='text/javascript'>window.top.location='index.php';</script>");}
  ?>
  <!DOCTYPE html>
  <html>
    <head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <title>Cat Answers</title>
    </head>
    <body>
      <h1>Your Answers:</h1>

        <?php

            $catDeclawed = $_POST['question-1-answers'];
            $catAge1 = $_POST['question-2-answers1'];
            $catAge2 = $_POST['question-2-answers2'];
            $catGender = $_POST['question-3-answers'];

            $declawed = "<h4>Declawed: </h4>";
            $age1 = "<h4>Min Age: </h4>";
            $age2 = "<h4>Max Age: </h4>";
            $gender = "<h4>Gender: </h4>";


            echo $declawed . ' ' . "<h4>$catDeclawed</h4>";
            echo $age1 . ' ' . "<h4>$catAge1</h4>";
            echo $age2 . ' ' . "<h4>$catAge2</h4>";
            echo $gender . ' ' . "<h4>$catGender</h4>";

            echo"<a href='user.php?catDeclawed=" . $catDeclawed ."&type=cat&catAge1=" . $catAge1 ."&catAge2=" . $catAge2 ."&catGender=" . $catGender ."'>CLick here to see your pets!</a>";


      ?>

    </body>
  </html>
