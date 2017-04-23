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
        var size;
        var gender;

            $answer1 = $_POST['question-1-answers'];
            $answer4 = $_POST['question-3-answers'];

            if($answer1 == "Small")
            {
              size = "Small";
            }
            elseif($answer1 == "Medium")
            {
              size = "Medium";
            }
            elseif($answer1 == "Large")
            {
              size = "Large";
            }
            elseif($answer1 == "X-Large")
            {
              size = "X-Large";
            }

            if($answer4 == "Male")
            {
              gender = "Male";
            }
            elseif($answer4 == "Female")
            {
              gender = "Female";
            }
            elseif($answer4 == "Either")
            {
              gender = "Either";
            }

echo "Size:" + size;
</br>
echo "Gender:" + gender;
</br>
      ?>

    </body>
  </html>
