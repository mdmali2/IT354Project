<?php // Example 26-5: signup.php
  require_once 'header.php';

  echo <<<_END
  <script>
    function checkUser(user)
    {
      if (user.value == '')
      {
        O('info').innerHTML = ''
        return
      }

      params  = "user=" + user.value
      request = new ajaxRequest()
      request.open("POST", "checkuser.php", true)
      request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
      request.setRequestHeader("Content-length", params.length)
      request.setRequestHeader("Connection", "close")

      request.onreadystatechange = function()
      {
        if (this.readyState == 4)
          if (this.status == 200)
            if (this.responseText != null)
              O('info').innerHTML = this.responseText
      }
      request.send(params)
    }

    function ajaxRequest()
    {
      try { var request = new XMLHttpRequest() }
      catch(e1) {
        try { request = new ActiveXObject("Msxml2.XMLHTTP") }
        catch(e2) {
          try { request = new ActiveXObject("Microsoft.XMLHTTP") }
          catch(e3) {
            request = false
      } } }
      return request
    }
  </script>
  <div class='main'><h3>Please enter your details to sign up</h3>
_END;

  $error = $user = $pass = "";
  if (isset($_SESSION['user'])) destroySession();

  if (isset($_POST['user']))
  {
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);

    if ($user == "" || $pass == "")
      $error = "Not all fields were entered<br><br>";
    else
    {
      $result = queryMysql("SELECT * FROM members WHERE user='$user'");

      if ($result->num_rows)
        $error = "That username already exists<br><br>";
      else
      {
		switch($_POST['userType']) {
        case "shelter":
            $admin = 1;
            break;
        case "user":
            $admin = 0;
            break;
        default:
            $admin = 1;
		}
        queryMysql("INSERT INTO members VALUES('$user', '$pass', '$admin')");
		
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
          die("<script type='text/javascript'>window.top.location='administrator.php?view=$user';</script>");
        }
        else {
          die("<script type='text/javascript'>window.top.location='user.php?view=$user';</script>");
        }

      }
      }
    }
  }
  
    echo <<<_END
	<div class="login-page">
		<form method='post' class="form login-form" action='signup.php'> $error
		<p>Hello! Welcome to $appname</p>
		 <input type='text' maxlength='16' placeholder="username" name='user' value='$user'
      onBlur='checkUser(this)'><span id='info'></span><br>
		<input type='password' maxlength='16' placeholder="password" name='pass'
      value='$pass'><br>
		<label class="choice">
		  <input type="radio" checked="checked" name="userType" id="userType" value="user" /> User
		</label>
		<label class="choice">
		  <input type="radio" name="userType" id="userType" value="shelter" />
		  Shelter
		</label>
_END;
?>
<p>&nbsp;</p>
  <button>Sign up</button>
		  <p class="message">Already have an account? <a href="index.php">Login</a></p>
		</form>
	  </div><br>
  </body>
</html>
