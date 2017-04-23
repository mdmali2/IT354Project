<?php

  require_once 'header.php';
  if (!$loggedin)   { die("<script type='text/javascript'>window.top.location='index.php';</script>");}
 ?>
-<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>

  </head>
  <body>

    <?php if ($_GET['type'] == 'dog' ) : ?>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title"><?php  echo $_GET['name'];  ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">

                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" width="300px" height="300px" src="images/<?php  echo $_GET['image'];  ?>" class="img-circle img-responsive"> </div>

                <div class=" col-md-9 col-lg-9 ">
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Name: </td>
                        <td><?php  echo $_GET['name'];  ?></td>
                      </tr>
                      <tr>
                        <td>Breed:</td>
                        <td><?php  echo $_GET['breed'];  ?></td>
                      </tr>
                      <tr>
                        <td>Shelter:</td>
                        <td><?php  echo $_GET['shelter'];  ?></td>
                      </tr>
                      <tr>
                        <td>Decription</td>
                        <td><?php  echo $_GET['description'];  ?></td>
                      </tr>
                      <tr>
                        <td>Fee</td>
                        <td><?php  echo $_GET['fee'];  ?></td>
                      </tr>
                      <tr>
                         <td>Gender</td>
                         <td><?php  echo $_GET['gender'];  ?></td>
                      </tr>
                         <tr>
                           <tr>
                              <td>Age</td>
                              <td><?php  echo $_GET['age'];  ?></td>
                           </tr>
                        <tr>
                        <tr>
                        <td>Location</td>
                        <td>Kathmandu,Nepal</td>
                      </tr>
                      <tr>
                        <td>Email Shelter</td>
                        <td><a href="mailto:info@support.com">info@support.com</a></td>
                      </tr>
                        <td>Phone Number</td>
                        <td>123-4567-890(Landline)<br><br>555-4567-890(Mobile)
                        </td>

                      </tr>

                    </tbody>
                  </table>



                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                          <?php if ($loggedin and $admin==0 ) : ?>
                              <a href="favorite.php?type='dog'" style="min-width:100%;" class="btn btn-main">Favorite</a>
                          <?php elseif ($loggedin and $admin==1 ): ?>
                              <a href="administrator.php" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <?php endif; ?>
                        </span>
                    </div>

          </div>
          <?php elseif ($_GET['type'] == 'cat' ): ?>
            <div class="container">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
                  <div class="panel">
                    <div class="panel-heading">
                      <h3 class="panel-title"><?php  echo $_GET['name'];  ?></h3>
                    </div>
                    <div class="panel-body">
                      <div class="row">

                        <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" width="300px" height="300px" src="images/<?php  echo $_GET['image'];  ?>" class="img-circle img-responsive"> </div>

                        <div class=" col-md-9 col-lg-9 ">
                          <table class="table table-user-information">
                            <tbody>
                              <tr>
                                <td>Name: </td>
                                <td><?php  echo $_GET['name'];  ?></td>
                              </tr>
                              <tr>
                                <td>Declawed:</td>
                                <td><?php  echo $_GET['declawed'];  ?></td>
                              </tr>
                              <tr>
                                <td>Shelter:</td>
                                <td><?php  echo $_GET['shelter'];  ?></td>
                              </tr>
                              <tr>
                                <td>Decription</td>
                                <td><?php  echo $_GET['description'];  ?></td>
                              </tr>

                                 <tr>
                                   <tr>
                                      <td>Gender</td>
                                      <td><?php  echo $_GET['gender'];  ?></td>
                                   </tr>
                                <tr>
                                  <tr>
                                     <td>Age</td>
                                     <td><?php  echo $_GET['age'];  ?></td>
                                  </tr>
                               <tr>
                                <td>Location</td>
                                <td>Kathmandu,Nepal</td>
                              </tr>
                              <tr>
                                <td>Email Shelter</td>
                                <td><a href="mailto:info@support.com">info@support.com</a></td>
                              </tr>
                                <td>Phone Number</td>
                                <td>123-4567-890(Landline)<br><br>555-4567-890(Mobile)
                                </td>

                              </tr>

                            </tbody>
                          </table>



                        </div>
                      </div>
                    </div>
                         <div class="panel-footer">
                                <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                                <span class="pull-right">
                                  <?php if ($loggedin and $admin==0 ) : ?>
                                    <?php $id = $_GET['id']; ?>
                                  <?php  echo "<a href='favorite.php?user=" . $user . "&petID=" . $id . "&type=cat'  style='min-width:100%;' class='btn btn-main'>Favorite</a>" ?>
                                <?php elseif ($loggedin and $admin==1 ): ?>
                                      <a href="administrator.php" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                                    <?php endif; ?>
                                </span>
                            </div>

                  </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </body>
</html>
<style>
.user-row {
    margin-bottom: 14px;
}

.user-row:last-child {
    margin-bottom: 0;
}

.dropdown-user {
    margin: 13px 0;
    padding: 5px;
    height: 100%;
}

.dropdown-user:hover {
    cursor: pointer;
}

.table-user-information > tbody > tr {
    border-top: 1px solid rgb(221, 221, 221);
}

.table-user-information > tbody > tr:first-child {
    border-top: 0;
}


.table-user-information > tbody > tr > td {
    border-top: 0;
}
.toppad
{margin-top:20px;
}
</style>
