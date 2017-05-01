<?php // Example 26-10: friends.php
  require_once 'header.php';
  echo "<link rel='stylesheet' href='styles.css' type='text/css'>";
  if (!$loggedin)   { die("<script type='text/javascript'>window.top.location='index.php';</script>");}
  ?>
  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title>Quiz</title>
    </head>
    <body>
    <div class="form-login">
    <center>
      <h3>Select Quiz:</h3>
      <form action="dogQuiz.php">
          <button class="modalBtn" type="submit" value="Dog Quiz" />Dog Quiz</button>
      </form>
      </br>
      <form action="catQuiz.php">
        <button class="modalBtn" type="submit" value="Cat Quiz" />Cat Quiz</button>
      </form>
    </center>
    </body>
  </div>
  </html>
