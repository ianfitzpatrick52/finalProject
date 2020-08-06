<?php
  require 'header.php';
?>
<?php
  include_once 'includes/dbh.inc.php'; //db connection
  $query ="SELECT idUsers, uidUsers, emailUsers FROM users WHERE idUsers !=1"; //sql statement that fetches user details apart from idUsers =1 which is the admin user.  This prevents that user from being deleted
  $result = mysqli_query($conn, $query); //variable called result
?>
<?php
  if (isset($_SESSION['userUid'])) {//if isset finds session variable called userUid
    if ($_SESSION['userUid'] =="admin") {//if isset finds userUid == admin it echoes this list
        echo '
        <div class="w3-container w3-centre">
        <p class =w3-large w3-center>Welcome to the Admin Panel</p>

        </div>';
        }
    else{
      header("Location:index.php?");
      exit();
    }
  }
  else{
    header("Location:index.php?");
    exit();
  }
?>
<?php
if(isset($_GET['success'])){

$deleteCheck = $_GET['success']; //creates varibale called $deleteCheck

if ($deleteCheck == "userDeleted") {
  echo "<p>User has successfully been deleted!</p>"; //if $deleteCheck = userDeleted then echo this
}
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> <!--link to stylesheet-->
    <title>Admin Panel</title>
  </head>
  <body>

    <div class="w3-container w3-centre">
      <table class="w3-table-all w3-centered"> <!--creates table with all the user details-->
        <tr>
          <td>User Id</td>
          <td>Username</td>
          <td>Email</td>
        </tr>

        <?php
        while ($row= mysqli_fetch_assoc($result)) {
          $uid =$row['idUsers'];
          $username=$row['uidUsers'];
          $mail =$row['emailUsers'];
        ?>
        <tr>
          <td><?php echo "$uid"; ?></td>
          <td><?php echo "$username"; ?></td>
          <td><?php echo "$mail"; ?></td>
          <td><a href="includes/delete.inc.php?del=<?php echo $uid?>" class="w3-button w3-red">Delete</a></td>

        </tr>
        <?php
        }
         ?>
      </table>
    </div>
  </body>
</html>
