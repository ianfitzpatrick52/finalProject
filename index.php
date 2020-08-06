<?php
  require 'header.php'; //Takes all the text/code/markup that exists in header.php and copies into this file
  ?>
  <!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title>Homepage</title>
    </head>
    <body>
      <main>
        <div class="wrapper-main">
          <section class="section-default">
            <?php //This php code is used to display different messages depending on wether or not a session has been created.
              if (isset($_SESSION['userId'])) { // if user userId is found this message will be displayed
                echo '
                <div class="w3-container w3-center">
                  <h1 class="w3-margin w3-Jumbo">Welcome to the Secure Application </h1>
                  <p class="w3-large">Currently you are logged in as '.$_SESSION['userFname'].' '.$_SESSION['userLname'].'.</p>
                  <p class="w3-large">Our goal here at the Secure Application is to provide the user with an application that focuses on security.</p>
                  <p class="w3-large">We always do our best to make sure our website is as secure and reliable as possible however, sometimes issues may arise. If you happen to come across anything that isn’t working please contact one of our admins by <a href="about.php">email.</a>.</p>
                </div>
                ';
              }
              else{ //else this message will be displayed
                echo '
                <div class="w3-container w3-center">
                  <h1 class="w3-margin w3-Jumbo">Welcome to the Secure Application</h1>

                  <p class="w3-large">Our goal here at the Secure Application is to provide the user with an application that focuses on security.</p>
                  <p class="w3-large">We always do our best to make sure our website is as secure and reliable as possible however, sometimes issues may arise. If you happen to come across anything that isn’t working please contact one of our admins by <a href="about.php">email.</a>.</p>



                  <p class="w3-large">Currently you are not logged in.  Please log in or signup <a href="signup.php">here.</a></p>
                </div>
                ';
              }
             ?>
          </section>
        </div>
      </main>

    </body>
  </html>
