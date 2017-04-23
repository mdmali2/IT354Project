<?php // Example 26-10: friends.php
  require_once 'header.php';

  if (!$loggedin)   { die("<script type='text/javascript'>window.top.location='index.php';</script>");}
  ?>
  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title>Quiz</title>
    </head>
    <body>
      <h3>Select Quiz:</h3>
      <form action="dogQuiz.php">
          <input type="submit" value="Dog Quiz" />
      </form>
    </br>
  </br>
  <form action="catQuiz.php">
      <input type="submit" value="Cat Quiz" />
  </form>
    </body>
  </html>
