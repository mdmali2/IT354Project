<?php 
  session_start();

  echo "<!DOCTYPE html>\n<html><head>";

  require_once 'functions.php';

  $userstr = ' (Guest)';

  if (isset($_SESSION['user']))
  {
    $user     = $_SESSION['user'];
	$pass    = $_SESSION['pass'];
	$admin = $_SESSION['admin'];
    $loggedin = TRUE;
    $userstr  = " ($user)";
  }
  else $loggedin = FALSE;

  echo "<title>$appname$userstr</title>"                            . 
       "<link rel='stylesheet' href='styles.css' type='text/css'>"  .
       "</head><body>"                                              .
       "<script src='javascript.js'></script>" .
	   "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>";
	   
?>
<?php if ($loggedin and $admin == 0) : ?>
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand active" href="#">Adopt Me</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li ><a href="#">Favorites</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="./">Profile <span class="sr-only">(current)</span></a></li>
            <li><a href="logout.php">Sign out</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav> 
<?php elseif ($loggedin and $admin == 1): ?>
	 <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand active" href="#">Adopt Me</a>
		  <a class="navbar-brand active" href="#">Upload Pet</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="./">Profile <span class="sr-only">(current)</span></a></li>
            <li><a href="logout.php">Sign out</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav> 
<?php else: ?>
	 <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
		 <a class="navbar-brand active" href="#">Hello, Welcome to Adopt Me!</a>
        </div><!--/.nav-collapse -->
      </div>
    </nav> 
<?php endif; ?>
