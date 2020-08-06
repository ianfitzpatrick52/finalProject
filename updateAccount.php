  <?php
  require 'header.php';
  ?>
  <?php
    if (isset($_SESSION['userUid'])) {//if isset finds session variable called userUid
    }
    else{
      header("Location:index.php?");
      exit();
    }
  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Update Account</title>
  </head>
  <body>
    <div class="w3-container w3-teal">
      <h2>Update Details</h2>
        </div>
          <form class="w3-container" action="includes/updateAccount.inc.php" method="post">

            <label class="w3-text-teal"><b>Firstname</b></label>
            <input class="w3-input w3-border" type="text" value ="<?php echo $_SESSION['userFname'] ?>"name="fname" placeholder="Username">

            <label class="w3-text-teal"><b>Lastname</b></label>
            <input class="w3-input w3-border" type="text" value ="<?php echo $_SESSION['userLname'] ?>"name="lname" placeholder="Username">

            <label class="w3-text-teal"><b>Email</b></label>
            <input class="w3-input w3-border" type="text" value="<?php echo $_SESSION['userEmail'] ?>" name="mail" placeholder="E-mail">

            <label class="w3-text-teal"><b>Phone Number</b></label>
            <input class="w3-input w3-border" type="text" value ="<?php echo $_SESSION['userTelnumber'] ?>"name="tel" placeholder="Username">
            <br>
            <button class="w3-btn w3-blue-grey" type="submit" name="update-submit">Update</button>

          </form>
    </body>
</html>
