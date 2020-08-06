<?php

if (isset($_POST['login-submit'])){ //if login-submit button clicked.  Else return the user to the index.html (stops manipulation of url)

  require 'dbh.inc.php'; //create a connection to the DB

  $mailuid = $_POST['mailuid']; //create variable $mailuid and store mailuid
  $password = $_POST['pwd']; //create variable $password and store pwd

  if (empty($mailuid)||empty($password)) { //check to see if either mailuid or password are empty
    header("Location: ../index.php?loginerror=emptyfields"); //if so divert to index.php page
    exit(); //exit terminates current script
  }
  else{
    $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;"; // if both mailuid and password are entered select statement "?" used for security
    $stmt =mysqli_stmt_init($conn); //mysqli_stmt_init initializes a statement and returns an object for use w/ mysqli_stmt_prepare
    if (!mysqli_stmt_prepare($stmt, $sql)) { //if no initializing takes place
      header("Location: ../index.php?loginerror=sqlerror");
      exit();
    }
    else{
      mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid); //binds parameters to the statement
      mysqli_stmt_execute($stmt); //execute the query
      $result = mysqli_stmt_get_result($stmt); //gets the result set from the prepared statment $stmt
      if ($row = mysqli_fetch_assoc($result)) { //fetches a result row as an associative array / checks if something is inside the variable
        $salted = "sdfw9w8r398hf".$password."0w0dfjsoj3043049";
        $pwdCheck = password_verify($salted, $row['pwdUsers']); //creates variable $pwdCheck and uses password_verify to check the password entered with the row[pwdUsers]
        if ($pwdCheck == false) {
          header("Location: ../index.php?loginerror=wrongpwd_username"); //if password is incorrect redirect to homepage
          exit();
        }
        else if($pwdCheck=true){ //if password is correct
          session_start(); //start session
          $_SESSION['rowUserId'] = $row['idUsers']; //creates global variable called rowUserId from idUsers column from db
          $_SESSION['rowFname'] = $row['fname'];
          $_SESSION['rowLname'] = $row['lname'];
          $_SESSION['rowUserUid'] = $row['uidUsers'];
          $_SESSION['rowUserEmail'] = $row['emailUsers'];
          $_SESSION['rowTelnumber'] = $row['telnumber'];
          header("Location: ../otp.php?login=success"); //redirect user to otp.php to continue log in process
        }
        else{ //error if wrong pwd
          header("Location: ../index.php?loginerror=wrongpwd_username");
          exit();
        }
      }
      else{ //error if no user found
        header("Location: ../index.php?loginerror=wrongpwd_username");
        exit();
      }
    }
  }
}
else{ //error if login-submit is not pressed
  header("Location: ../index.php?error");
  exit();
}
