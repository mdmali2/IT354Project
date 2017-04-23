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

          echo  $answer1 = $_POST['question-1-answers'];
          echo  $answer4 = $_POST['question-3-answers'];
      ?>

    </body>
  </html>
