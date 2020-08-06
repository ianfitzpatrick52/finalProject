<?php
  session_start(); //starts session
  if (isset($_SESSION['rowUserId'])) { //issest checks if session variable 'rosUserId' is present

    $secret='123456'; //predefined secret.  This will be randomly generated in live system
    $code=$_POST['otpCode']; //PHP $_POST is a PHP super global variable which is used to collect form data after submitting an HTML form with method="post". $_POST is also widely used to pass variables. 'otpCode' is stored in $code

    if(!strcmp($secret,$code)){ //The strcmp() is an inbuilt function in PHP which is used to compare two strings

      $_SESSION['userId']=$_SESSION['rowUserId']; //creates global variable called userId from the Session variable rowUserId.
      $_SESSION['userFname']=$_SESSION['rowFname'];
      $_SESSION['userLname']=$_SESSION['rowLname'];
      $_SESSION['userUid']=$_SESSION['rowUserUid'];
      $_SESSION['userEmail']=$_SESSION['rowUserEmail'];
      $_SESSION['userTelnumber']=$_SESSION['rowTelnumber'];
      unset($_SESSION['rowUserId']); //unset() function resets a variable
      unset($_SESSION['rowFname']);
      unset($_SESSION['rowLname']);
      unset($_SESSION['rowUserUid']);
      unset($_SESSION['rowUserEmail']);
      unset($_SESSION['rowTelnumber']);

      header("Location: ../index.php?login=success"); //user is redirected to account page and log in is complete
    }

    else{ //error if $secret and $code dont match
      header("Location: ../index.php?error=otp");
      exit();
    }
  }
  
  else{ //error if otp-submit dont match
    header("Location: ../index.php?error");
    exit();
  }
