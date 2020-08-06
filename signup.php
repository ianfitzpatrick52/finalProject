<?php
  require 'header.php';
  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <main>
      <div class="wrapper-main">
        <section class="section-default">
          <h1>Signup</h1>
          <?php
            if (isset($_GET['error'])) { // isset() function checks whether a variable is set, which means it has be to be declared
              if ($_GET['error'] =="emptyfields") { //if isset finds error and it equals emptyfields
                echo '<p>Fill in all fields!</p>'; //display this message
              }
            }
            else if (isset($_GET['signup'])){ //checks to see if url contains signup
              if ($_GET['signup'] =="success") { //checks to see if signup == success
                echo '<p>Signup Successful!</p>';
              }
            }
           ?>

           <form class="w3-container" action="includes/signup.inc.php" method="post">

             <label class="w3-text-teal"><b>Enter in First Name</b></label> <!--input for data-->
             <input class="w3-input w3-border" type="text" name="fname" placeholder="First Name eg. Joe"> <!--button to input data-->

             <label class="w3-text-teal"><b>Enter in Last Name</b></label>
             <input class="w3-input w3-border" type="text" name="lname" placeholder="Last Name eg. Bloggs">

             <label class="w3-text-teal"><b>Enter in Username</b></label>
             <input class="w3-input w3-border" type="text" name="uid" placeholder="Username eg. JBloggs123">

             <label class="w3-text-teal"><b>Enter in Email Address</b></label>
             <input class="w3-input w3-border" type="text" name="mail" placeholder="E-mail eg. jbloggs@email.com">

             <label class="w3-text-teal"><b>Enter in Phone Number</b></label>
             <input class="w3-input w3-border" type="tel" name="tel" placeholder="Phone Number eg. +353871234567">

             <label class="w3-text-teal"><b>Enter in Password</b></label>
             <input class="w3-input w3-border" type="password" name="pwd" placeholder="Password eg. This is a secure password">

             <label class="w3-text-teal"><b>Re-enter Password</b></label>
             <input class="w3-input w3-border" type="password" name="pwd-repeat" placeholder="Repeat Password">
             <p>Here at the Secure Application we take password security very seriously.</p>
             <p>To help you create the strongest password possible we have a number of tips.</p>
             <ul class="w3-ul">
              <li>1. Instead of a word, make your password a sentence.</li>
              <li>2. We encourage the use of 'spaces' in your password</li>
              <li>3. Make your password long (We allow up to 70 characters).</li>
              <li>4. Dont overcomplicate your password.  Make it easy for you to rememeber it.</li>
            </ul>
            <br>
            <button type="submit" name="signup-submit">Signup</button> <!--signup-submit in includes/signup.inc.php-->
           </form>
           <?php

           if(!isset($_GET['error'])){ //if error in URL exit
             exit();
           }

           else{

           $signupCheck = $_GET['error']; //create variable called $signupCheck

           if ($signupCheck == "emptyfields") { //if $signupCheck == emptyfields then show this error message
             echo "<p>You did not fill in all the fields!</p>";
           }

           else if ($signupCheck == "invalidmailuid") {
             echo "<p>Username and Email are invalid!</p>";
           }

           else if ($signupCheck == "invalidemail") {
             echo "<p>Email is invalid!  Please enter in an email such as example@example.com</p>";
           }

           else if ($signupCheck == "invaliduid") {
             echo "<p>Username is invalid!  Please ensure the username contains only letters and numbers.</p>";
           }

           else if ($signupCheck == "invalidfirstname") {
             echo "<p>First name is invalid!  Please ensure the first name only includes letters and no spaces.</p>";
           }

           else if ($signupCheck == "invalidlastname") {
             echo "<p>Last name is invalid!  Please ensure the last name only includes letters and no spaces.</p>";
           }

           else if ($signupCheck == "invalidphonenumber") {
             echo "<p>Phone number is invalid!  Please ensure phone number contains numbers and +.</p>";
           }

           else if ($signupCheck == "passwordlength") {
             echo "<p>Password is not long enough!  The password must be between 8 and 70 characters</p>";
           }

           else if ($signupCheck == "passwordcheck") {
             echo "<p>Passwords do not match!  Please ensure both passwords match</p>";
           }

           else if ($signupCheck == "usertaken") {
             echo "<p>This username has already been taken!</p>";
           }

           else if ($signupCheck == "error") {
             echo "<p>Unidentified error.  Please try again!</p>";
           }

           }
            ?>

        </section>
      </div>
    </main>
  </body>
</html>
