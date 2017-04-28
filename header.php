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
  "<script src='https://use.fontawesome.com/abd4dde156.js'></script>".
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
            <a class="navbar-brand active" href="index.php">Adopt Me</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="favoritesPage.php">Favorites</a>
                </li>
                <li><a href="Quiz.php">Animal Quiz</a>
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
            <a class="navbar-brand active" href="<script type='text/javascript'>window.top.location='administrator.php?view=$user';</script>">Adopt Me</a>
            <a class="navbar-brand" href="#choice" data-toggle="modal">Upload Pet</a>
            <a class="navbar-brand" href="#createAdmin" data-toggle="modal">Add Volunteer</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">

                </li>
                <li><a href="logout.php">Sign out</a>
                </li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>
<div class="modal fade" data-backdrop="false" id="createAdmin" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Enter the username of the person you would like to promote?</h4>
            </div>
            <div class="modal-body">
            <form method='post' enctype="multipart/form-data" onsubmit="return checkall()" action="createadmin.php" class="form">
                <input type="input" readonly value="<?php
                showShelter($user);
                ?>" name="shelter">
                </input>
                <input type="input" placeholder="Name" name="name" id="userName" onkeyup="checkname();"><span id="name_status"></span></input>
            </div>
            <div class="modal-footer">
                <input type="submit" name="submit" class="btn btn-default"></input>
            </form>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
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
                <form method='post' name="formCat" enctype="multipart/form-data" action="upload.php" onsubmit="return validateCat()" class="form">
                    <input type="input" readonly placeholder="Cat" value="Cat" name="animal"></input>
                    <input type="input" readonly value="<?php
                    showShelter($user);
                    ?>" name="shelter">
                    </input>
                    <input type="input" placeholder="Name" name="name"></input>
                      <label id="nameErrorNum" style="display:none; color:red">Name must be under 16 characters</label>
                      <label id="nameErrorEmpty" style="display:none; color:red">Name is empty</label>
                    <input type="input" placeholder="Description" name="description"></input>
                      <label id="descriptionErrorNum" style="display:none; color:red">Description must be a 110 characters or less</label>
                      <label id="descriptionErrorEmpty" style="display:none; color:red">Description is empty</label>
                    <input type="input" placeholder="Adoption Fee" name="fee"></input>
                      <label id="feeErrorNum" style="display:none;color:red">Fee must be a number</label>
                      <label id="feeErrorEmpty" style="display:none;color:red">Fee is empty</label>
                    <p>Declawed?</p>
                    <label class="choice">
                    <input type="radio"checked="checked" name="declawed" value="yes" /> Yes
                    </label>
                    <label class="choice">
                    <input type="radio" name="declawed" value="no" /> No
                    </label>
                    <select name="gender">
                        <option selected="selected" disabled="disabled" value="Choose here">Choose here</option>
                        <option value="female">Female</option>
                        <option value="male">Male</option>
                    </select>
                    <label id="genderErrorEmpty" style="display:none;color:red">Please select a gender</label>
                    <input type="input" placeholder="Age" name="age"></input>
                      <label id="ageErrorNum" style="display:none;color:red">Age must be a number</label>
                      <label id="ageErrorEmpty" style="display:none;color:red">Age is empty</label>
                    <input type="file" accept="image/*" name="image">

            </div>
            <div class="modal-footer">
                    <input type="submit" value="submit" name="submit" class="btn btn-default"></input>
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
                    <input type="input" placeholder="Adoption Fee" name="fee"></input>
                    <select name="gender">
                        <option selected="selected" disabled="disabled" value="Choose here">Choose here</option>
                        <option value="female">Female</option>
                        <option value="male">Male</option>
                    </select>
                    <input type="input" placeholder="Age" name="age"></input>
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
<script>
function checkall()
{
 var namehtml=document.getElementById("name_status").innerHTML;

 if((namehtml)=="Username not found" || (namehtml)=="User is already apart of another shelter")
 {
  return false;
 }
 else
 {
  return true;
 }
}
function checkname()
{
 var name=document.getElementById( "userName" ).value;

 if(name)
 {
   var userValidate;
  $.ajax({
  type: 'post',
  url: 'createadmin.php',
  data: {
   user_name:name,
  },
  success: function (response) {
   $( '#name_status' ).html(response);
   if(response=="Username not found")
   {
      return false;
   }
   else
   {
     return true;
   }
  }
  });
 }
}
function validateCat() {
    var name = document.forms["formCat"]["name"].value;
    var description = document.forms["formCat"]["description"].value;
    var fee = document.forms["formCat"]["fee"].value;
    var age = document.forms["formCat"]["age"].value;
    var gender = document.forms["formCat"]["gender"].value;
    var file = document.forms["formCat"]["image"].value;
    var returnView = 0;
    if (name == "" || name.length > 16) {
      if (name.length > 16){

        $("#nameErrorNum").toggle();
        returnView++;
      }
      else if (name == "") {
        $("#nameErrorEmpty").toggle();
        returnView++;
      }
    }
    if (description == "" || description.length > 110) {
      if (description.length > 110){
        $("descriptionErrorNum").toggle();
        returnView++;
      }
      else if (description == "") {
        $("#descriptionErrorEmpty").toggle();
        returnView++;
      }
    }
    if (fee == "" || isNaN(fee)) {
      if (isNaN(fee)){
        $("feeErrorNum").toggle();
        returnView++;
      }
      else if (fee == "") {
        $("#feeErrorEmpty").toggle();
        returnView++;
      }
    }
    if (age == "" || isNaN(age)) {
      if (isNaN(age)){
        $("ageErrorNum").toggle();
        returnView++;
      }
      else if (age == "") {
        $("#ageErrorEmpty").toggle();
        returnView++;
      }
    }
    if (gender == "Choose here") {
        $("#genderErrorEmpty").toggle();
        returnView++;
    }
    if(returnView == 0)
    {
      return true;
    }
    else {
      return false;
    }
}
</script>
