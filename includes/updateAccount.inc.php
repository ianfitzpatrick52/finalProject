<?php
  session_start(); //starts session


  if (isset($_SESSION['userUid'])) { //check to see if there is a session varibale called userUid

  if (isset($_POST['update-submit'])){  //checks if user submited button.  Stops user from manipulating url to get to this script

    require 'dbh.inc.php'; //connets to db


    $id =$_SESSION['userId']; //creates variables and fetches information entered by user.
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $email =$_POST['mail'];
    $telnum = $_POST['tel'];



    if (empty($firstname) || empty($lastname) ||  empty($email)|| empty($telnum)) { //if any of the fields are empty
      header("Location: ../updateAccount.php?error=emptyfields&uid"); //"?" parameter string
      exit();
    }

    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //validate email
      header("Location: ../updateAccount.php?error=invalidmail&uid");
      exit();
    }

    elseif (!preg_match("/^[a-zA-Z]*$/", $firstname)) { //check to see that variable only contains letters
      header("Location: ../updateAccount.php?error=invalidfirstname");
      exit();
    }
    elseif (!preg_match("/^[a-zA-Z]*$/", $lastname)) { //check to see that variable only contains letters
      header("Location: ../updateAccount.php?error=invalidlastname");
      exit();
    }
    elseif (!preg_match("/^[0-9+]*$/", $telnum)) { //checks to see that varible only contains numbers and "+"
      header("Location: ../updateAccount.php?error=invalidphonenumber");
      exit();
    }

    else {
              $sql ="UPDATE users SET fname = ?, lname = ?,emailUsers = ?, telnumber = ? WHERE idUsers = ?"; //creates sql data
              $stmt = mysqli_stmt_init($conn); //creates statement to be inserted into DB
              if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../updateAccount.php?error=sqlerror"); //error if stmt has not been created
                exit();
              }
              else{
                mysqli_stmt_bind_param($stmt,"ssssi",$firstname,$lastname, $email, $telnum, $id); //binds parameters to stmt
                mysqli_stmt_execute($stmt); //executes stmt

                $_SESSION['userEmail'] = $_POST['mail']; //stores new $_POST data as Session variable
                $_SESSION['userFname'] = $_POST['fname'];
                $_SESSION['userLname'] = $_POST['lname'];
                $_SESSION['userTelnumber'] = $_POST['tel'];

                header("Location: ../account.php?update=success");
                exit();
              }

            }


    mysqli_stmt_close($stmt); //close statments variables
    mysqli_close($conn); //closes connection
}
  else{
    header("Location: ../index.php?error");
    exit();

  }
}

else{
  header("Location: ../index.php?error");
  exit();
}
