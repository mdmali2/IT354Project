<?php // Example 26-10: friends.php
  require_once 'header.php';

  if (!$loggedin)   { die("<script type='text/javascript'>window.top.location='index.php';</script>");}
  ?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Cat Quiz</title>
  </head>
  <body>
    <h3>This is the Cat Quiz</h3>
    <form class='form-login' action="catAnswers.php" method="post">
      <ol>

        <li>
          <h3>Does your Cat need to be Declawed?</h3>
          <div>
          <input type="radio" name="question-1-answers" id="question-1-answers-A" value="Yes" />
          <label for="question-1-answers-A">A) Yes</label>
          </div>

          <div>
          <input type="radio" name="question-1-answers" id="question-1-answers-B" value="No" />
          <label for="question-1-answers-B">B) No</label>
          </div>
        </li>

        <li>
        <h3>What Age Range?</h3>
        <div>
        <input type="text" name="question-2-answers1" id="question-2-answers-A" value="Enter Min Age" />
        </div>

        <div>
        <input type="text" name="question-2-answers2" id="question-2-answers-B" value="Enter Max Age" />
        </div>
      </li>

        <li>
          <h3>Male, Female or Either?</h3>
          <div>
          <input type="radio" name="question-3-answers" id="question-3-answers-A" value="Male" />
          <label for="question-3-answers-A">A) Male</label>
          </div>

          <div>
          <input type="radio" name="question-3-answers" id="question-3-answers-B" value="Female" />
          <label for="question-3-answers-B">B) Female</label>
          </div>

          <div>
          <input type="radio" name="question-3-answers" id="question-3-answers-C" value="*" />
          <label for="question-3-answers-C">C) Either</label>
          </div>
        </li>

      </ol>
      <input type="submit" value="Submit Quiz">
    </form>
  </body>
</html>
