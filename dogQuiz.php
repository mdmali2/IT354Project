<?php // Example 26-10: friends.php
  require_once 'header.php';

  if (!$loggedin)   { die("<script type='text/javascript'>window.top.location='index.php';</script>");}
  ?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Dog Quiz</title>
  </head>
  <body>
    <h3>This is the Dog Quiz</h3>
    <form name="dogQuiz" class='form-login' action="dogAnswers.php" method="post">
      <ol>

        <li>
          <h3>What Size Dog?</h3>
          <div>
          <input type="radio" name="question-1-answers" id="question-1-answers-A" value="Small" checked="true"/>
          <label for="question-1-answers-A">A) Small</label>
          </div>

          <div>
          <input type="radio" name="question-1-answers" id="question-1-answers-B" value="Medium" />
          <label for="question-1-answers-B">B) Medium</label>
          </div>

          <div>
          <input type="radio" name="question-1-answers" id="question-1-answers-C" value="Large" />
          <label for="question-1-answers-C">C) Large</label>
          </div>

          <div>
          <input type="radio" name="question-1-answers" id="question-1-answers-D" value="X-Large" />
          <label for="question-1-answers-D">D) X-Large</label>
          </div>
        </li>

        <li>
        <h3>What Age Range?</h3>
        <div>
        <input type="text" name="question-2-answers1" id="question-2-answers-A" placeholder="Enter Min Age" required/>
        </div>

        <div>
        <input type="text" name="question-2-answers2" id="question-2-answers-B" placeholder="Enter Max Age" required/>
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
          <input type="radio" name="question-3-answers" id="question-3-answers-C" value="*" checked="true" />
          <label for="question-3-answers-C">C) Either</label>
          </div>
        </li>

      </ol>
      <input id="submit" value="Submit Quiz" name="submit" type="submit"/>
    </form>
  </body>
</html>
