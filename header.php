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
	   "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>" .
     "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>" .
  "<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>" .
  "<script
  src='https://code.jquery.com/jquery-3.2.0.min.js'
  integrity='sha256-JAW99MJVpJBGcbzEuXk4Az05s/XyDdBomFqNlM3ic+I='
  crossorigin='anonymous'></script>" .
"</head><body>";
?>
<?php if ($loggedin and $admin==0 ) : ?>
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
                <li><a href="#">Favorites</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="./">Profile <span class="sr-only">(current)</span></a>
                </li>
                <li><a href="logout.php">Sign out</a>
                </li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>

<?php elseif ($loggedin and $admin==1 ): ?>
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
            <a class="navbar-brand" href="#choice" data-toggle="modal">Upload Pet</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="./">Profile <span class="sr-only">(current)</span></a>
                </li>
                <li><a href="logout.php">Sign out</a>
                </li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>
<div class="modal fade" data-backdrop="false" id="choice" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">What type of pet?</h4>
            </div>
            <div class="modal-body">
              <center>
                <button class="modalBtn" type="button" data-toggle="modal" data-target="#cat">Cat</button>
                <button class="modalBtn" type="button" data-toggle="modal" data-target="#dog">Dog</button>
              </center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" data-backdrop="false" id="cat" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Please fill out the form</h4>
            </div>
            <div class="modal-body">
                <form method='post' enctype="multipart/form-data" action="upload.php" class="form">
                    <input type="input" readonly placeholder="Cat" value="Cat" name="animal"></input>
                    <input type="input" readonly value="<?php
                    showShelter($user);
                    ?>" name="shelter">
                    </input>
                    <input type="input" placeholder="Name" name="name"></input>
                    <input type="input" placeholder="Description" name="description"></input>
                    <input type="file" name="image">
            </div>
            <div class="modal-footer">
                    <input type="submit" name="submit" class="btn btn-default"></input>
                </form>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" data-backdrop="false" id="dog" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Please fill out the form</h4>
            </div>
            <div class="modal-body">
                <form method='post' class="form"  action="upload.php" enctype="multipart/form-data">
                    <input type="input" readonly placeholder="Dog" value="Dog" name="animal"></input>
                    <input type="input" readonly value="<?php
                      showShelter($user);
                      ?>" name="shelter">
                    </input>
                    <select name="breed">
                        <option selected="selected" disabled="disabled" value="Choose here">Choose here</option>
                        <option value="Afghan Hound"> Afghan Hound</option>
                        <option value="Airedale Terrier">Airedale Terrier</option>
                        <option value="Akita">Akita</option>
                        <option value="Alaskan Malamute">Alaskan Malamute</option>
                    </select>
                    <select name="size">
                        <option selected="selected" disabled="disabled" value="Choose here">Choose here</option>
                        <option value="X-Small">X-Small</option>
                        <option value="Small">Small</option>
                        <option value="Medium">Medium</option>
                        <option value="Large">Large</option>
                        <option value="X-Large">X-Large</option>
                    </select>
                    <input type="input" placeholder="Name" name="name"></input>
                    <input type="input" placeholder="Description" name="description"></input>
                    <input type="file" name="image">
            </div>
            <div class="modal-footer">
                    <input type="submit" name="submit" class="btn btn-default"></input>
                </form>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</div>
<?php else: ?>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand active" href="#">Hello, Welcome to Adopt Me!</a>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>
<?php endif; ?>
