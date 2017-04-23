<?php
  require_once 'header.php';
  if ($loggedin)
  {
  $result = queryMySQL("SELECT admin FROM members
          WHERE user='$user' AND pass='$pass' AND admin = 1");
         if($result->num_rows == 1)
        {
		if ($loggedin) die("<script type='text/javascript'>window.top.location='administrator.php?view=$user';</script>");
          else  echo ' please sign up and/or log in to join in.';
		}
        else {
		if ($loggedin) die("<script type='text/javascript'>window.top.location='user.php?view=$user';</script>");
        else  echo ' please sign up and/or log in to join in.';
		}
  }


    echo '</span><br><br>' .
  '</body>' .
'</html>';
$error = $user = $pass = "";

  if (isset($_POST['user']))
  {
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);
    if ($user == "" || $pass == "")
        $error = "Not all fields were entered<br>";
    else
    {
      $result = queryMySQL("SELECT user,pass FROM members
        WHERE user='$user' AND pass='$pass'");

      if ($result->num_rows == 0)
      {
        $error = "<span class='error'>Username/Password
                  invalid</span><br><br>";
      }
      else
      {
        $_SESSION['user'] = $user;
        $_SESSION['pass'] = $pass;

        $result = queryMySQL("SELECT admin FROM members
          WHERE user='$user' AND pass='$pass' AND admin = 1");
         if($result->num_rows == 1)
        {
			$_SESSION['admin'] = 1;
          die("<script type='text/javascript'>window.top.location='administrator.php?view=$user';</script>");
        }
        else {
			$_SESSION['admin'] = 0;
          die("<script type='text/javascript'>window.top.location='quiz.php?view=$user';</script>");
        }

      }
    }
  }

  echo <<<_END
	<div class="login-page">
		<form method='post' class = "form-login form login-form" action='index.php'> $error
		<input type='text' maxlength='16' name='user' placeholder="username" value='$user'><br>
		<input type='password' maxlength='16' name='pass' placeholder="password" type="password" value='$pass'>

_END;
?>
  <button>login</button>
		  <p class="message">Not registered? <a href="signup.php">Create an account</a></p>
		</form>
	  </div>
	</div>
    <br>
    <br></div>
  </body>
</html>
