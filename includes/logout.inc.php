<?php
if (isset($_POST['logout-submit'])){ //isset function checks if logout-submit clicked
  session_start(); 
  session_unset(); //takes session variables and deletes information from them
  session_destroy(); //destroys current session
  header("Location:../index.php"); //redirect user to homepage
}

else{ //error if login-submit is not pressed
  header("Location: ../index.php?error");
  exit();
}
