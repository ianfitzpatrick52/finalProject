<?php
  session_start(); //starts the to get the Session Variables
  require 'dbh.inc.php'; //require/include statement includes and evaluates the specified file

  if (isset($_SESSION['userUid'])) { // isset — Determine if a variable is declared.  Checks to see if there is a session variable called userUid
    if ($_SESSION['userUid'] =="admin") { // if to check if the userUid is equal to "Admin" this is a security feature to stop non admin deleting records
      if (isset($_GET['del'])) { //$_GET collects data sent in the URL.  Isset checks if url contains 'del'
        $uid = $_GET['del']; //uid is included in the url to identify the record to be deleted
        $sql = "DELETE FROM users WHERE idUsers =?"; //query to run in database.
        $stmt = mysqli_stmt_init($conn); //stmt variable is created
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../updateAccount.php?error=sqlerror"); //error if stmt has not been created
          exit();
        }
        else{
          mysqli_stmt_bind_param($stmt,"i", $uid); //binds parameters to stmt
          mysqli_stmt_execute($stmt); //executes stmt
          header("Location: ../admin.php?update=success"); //return URL
          exit();
        }


        if(!$result){ //if no result redirect user to admin.php with error message.
          header("Location: ../admin.php?error=sqlerror");
        }

        else{ //if no error found delete record and alert user.
          header("Location: ../admin.php?success=userDeleted");
        }
      }
      else{//redirect user to admin.php with error message.
        header("Location: ../admin.php?error=sqlerror");
      }

    }
    else{//redirect user to admin.php with error message.
      header("Location: ../admin.php?error=notadmin");
    }
}

else{//redirect user to admin.php with error message.
  header("Location: ../admin.php?error=notloggedin");
}
