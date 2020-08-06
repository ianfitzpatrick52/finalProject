<?php

  if (isset($_POST['signup-submit'])){  //checks if user submited button. Stops user from manipulating url to get to this script

    require 'dbh.inc.php'; //connets to db

    $firstname=$_POST['fname'];//creates variables and fetches information entered by user.
    $lastname=$_POST['lname'];
    $username =$_POST['uid'];
    $email =$_POST['mail'];
    $telnum =$_POST['tel'];
    $password =$_POST['pwd'];
    $passwordRepeat =$_POST['pwd-repeat'];


    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)|| empty($firstname)|| empty($lastname)|| empty($telnum)) { //if any of the fields are empty
      header("Location: ../signup.php?error=emptyfields"); //"?" parameter string
      exit();
    }

    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) { //preg_match returns whether a match was found in a string
      header("Location: ../signup.php?error=invalidmailuid");
      exit();
    }

    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //The FILTER_VALIDATE_EMAIL filter validates an e-mail address.
      header("Location: ../signup.php?error=invalidemail");
      exit();
    }

    elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) { //checks to see if input entered by user contains only letters and numbers
      header("Location: ../signup.php?error=invaliduid");
      exit();
    }
    elseif (!preg_match("/^[a-zA-Z]*$/", $firstname)) {
      header("Location: ../signup.php?error=invalidfirstname");
      exit();
    }
    elseif (!preg_match("/^[a-zA-Z]*$/", $lastname)) {
      header("Location: ../signup.php?error=invalidlastname");
      exit();
    }
    elseif (!preg_match("/^[0-9+]*$/", $telnum)) {
      header("Location: ../signup.php?error=invalidphonenumber");
      exit();
    }

    elseif (strlen($password)<8 || strtr($password)>70) { //checks to see if password is the right length
      header("Location: ../signup.php?error=passwordlength");
      exit();
    }

    elseif ($password !== $passwordRepeat) { //checks to see if two passwords entered match
      header("Location: ../signup.php?error=passwordcheck");
      exit();
    }

    else {
      $sql ="SELECT uidUsers FROM users WHERE uidUsers=?"; //sql statement that you want to write in db
      $stmt = mysqli_stmt_init($conn); //creation of stmt variable
      if (!mysqli_stmt_prepare($stmt, $sql)) { //checks if you can create the statment
        header("Location: ../signup.php?error=error");
        exit();
      }

      else{
        mysqli_stmt_bind_param($stmt,"s",$username); //binds parameters from user to $stmt
        mysqli_stmt_execute($stmt); //execute statment into db
        mysqli_stmt_store_result($stmt); //takes result and stores it in stmt
        $resultCheck = mysqli_stmt_num_rows($stmt); //how many rows do we have returned form the db
        if($resultCheck>0){
          header("Location: ../signup.php?error=usertaken");
          exit();
        }
        else {
          $sql ="INSERT INTO users (fname, lname, uidUsers , emailUsers, telnumber ,pwdUsers) VALUES (?, ?, ?, ?, ?, ?)"; //sql statment to be run in  db
          $stmt = mysqli_stmt_init($conn); //connection creation
          if (!mysqli_stmt_prepare($stmt, $sql)) { //error if no connection created
            header("Location: ../signup.php?error=error");
            exit();
          }
          else{
            $salted = "sdfw9w8r398hf".$password."0w0dfjsoj3043049";
            $hashedPwd = password_hash($salted, PASSWORD_DEFAULT); //creates hashed pwd

            mysqli_stmt_bind_param($stmt,"ssssss", $firstname, $lastname, $username, $email, $telnum, $hashedPwd); //binds parameters to stmt
            mysqli_stmt_execute($stmt); //executes stmt
            header("Location: ../index.php?signup=success");
            echo "Please Sign into account";
            exit();
          }
        }
      }
    }
    mysqli_stmt_close($stmt); //close statments variables
    mysqli_close($conn); //closes connection

  }

  else{
    header("Location: ../index.php?");
    exit();

  }
