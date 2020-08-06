<?php
  require 'header.php';
  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="css/style.css"> <!--link to external stylesheet-->
    <title>My Account</title>
  </head>
  <body>
    <div class="">
      <?php
        if (isset($_SESSION['userUid'])) {//if isset finds session variable called userUid
          echo '  <div class="w3-container w3-teal">
          <h1 class="w3-margin w3-Jumbo">Welcome to your Account Page '.$_SESSION['userFname'].' </h1> <!--personalised welcome message-->
          </div>
            <ul class="w3-ul w3-border">
              <li><h3>User Details</h3></li>
              <li>First Name: '.$_SESSION['userFname'].'</li> <!--Creates a list of each user detail-->
              <li>Last Name: '.$_SESSION['userLname'].'</li>
              <li>Username: '.$_SESSION['userUid'].'</li>
              <li>Email: '.$_SESSION['userEmail'].'</li>
              <li>Phone Number: '.$_SESSION['userTelnumber'].'</li>
            </ul>
            </br>

            <div class="w3-container w3-center">
            <a href="updateAccount.php" class=" w3-button w3-blue">Update Details</a>
            </div>
            '; //echo the following list with details about the logged in user.
          }
        else{
            header("Location:index.php?"); //if no userUid then the user is directed to index.php
            exit();
          }
      ?>
    </div>
  </body>
</html>
