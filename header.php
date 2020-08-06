<?php
  session_start(); //used to start a session which will be used to hold information about a single user
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width+device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css ">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Header</title>
  </head>
  <body>
    <header>
      <nav>
        <?php
      if (isset($_SESSION['userUid'])) {//if isset finds userUid in session variable
        if ($_SESSION['userUid'] =="admin") { //if isset checks to see if userUid==admin
          echo //echos the following navigation bar.  Including admin.php
          '
          <div class="w3-bar w3-light-grey ">

            <a href="index.php" class="w3-bar-item w3-button">Home</a>
            <a href="admin.php" class="w3-bar-item w3-button">Admin Panel</a>
            <a href="about.php" class="w3-bar-item w3-button">About Page</a>
            <form action="includes/logout.inc.php" method="post"> <!--sends data to logout.inc.php file.  Use Post/get method as no sensitive data being         transfered-->
                    <button class="w3-bar-item w3-button w3-green" type="submit" name="logout-submit">Logout</button>
            </form>

          </div>
          ';
        }
        else {
          echo //echos the following navigation bar.  Including account.php
          '
          <div class="w3-bar w3-light-grey">

            <a href="index.php" class="w3-bar-item w3-button">Home</a>
            <a href="account.php" class="w3-bar-item w3-button">My Account</a>
            <a href="about.php" class="w3-bar-item w3-button">About Page</a>
            <form action="includes/logout.inc.php" method="post"> <!--sends data to logout.inc.php file.  Use Post/get method as no sensitive data being         transfered-->
                    <button class="w3-bar-item w3-button w3-green" type="submit" name="logout-submit">Logout</button>
            </form>

          </div>
          ';
        }
      }
      else{
        echo //echos the following navigation bar.  Including sign.php
        '
        <div class="w3-bar w3-light-grey">

          <a href="index.php" class="w3-bar-item w3-button">Home</a>
          <a href="about.php" class="w3-bar-item w3-button">About Page</a>
          <a href="signup.php" class="w3-bar-item w3-button">Signup</a>
          <form action="includes/login.inc.php" method="post">  <!--sends data to login.inc.php file.  Use Post method to secure sensitive data-->
                  <input class="w3-bar-item w3-input w3-border" type="text" name="mailuid" placeholder="Username/Email">
                  <input class="w3-bar-item w3-input w3-border" type="password" name="pwd" placeholder="Password">
                  <button class="w3-bar-item w3-button w3-green" type="submit" name="login-submit">Login</button>
          </form>
        </div>
        ';
      }
      ?>
      </nav>
    </header>
  </body>
</html>
