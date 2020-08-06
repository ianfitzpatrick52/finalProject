  <?php
  require 'header.php';
  ?>
  <?php
    if (isset($_SESSION['rowUserId'])) {//if isset finds session variable called userUid
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
    <style media="screen">
    .device-verification{
      position: center;
      width: 50%;
      margin-left: auto;
      margin-right: auto;
    }
    .input-verification{
      position: center;
      width: 30%;
      margin-left: auto;
      margin-right: auto;
    }
    </style>
    <title>One Time Password</title>
  </head>
  <body>
    <div class="w3-container w3-large">
      <div class="w3-center">
        <h1>Two-Factor Authentication</h1>
      </div>

    </div>
    <div class="device-verification w3-center w3-border" >
      <form action="includes/otp.inc.php" method="post">  <!--sends data to includes/otp.inc.php file.  Use Post method to secure sensitive data-->
          <div class="  w3-center w3-container" >
            <h2>Device Verification Code</h2>
          </div>
          <div class="input-verification">
            <input class="w3-bar-item w3-input w3-border w3-center" type="text" name="otpCode" placeholder="OTP"> <!--input bar for otp pin-->
          </div>
           <br>
          <div class="w3-container w3-center">
            <button class=" w3-button w3-green w3-center" type="submit" name="otp-submit">Verify</button> <!--button to send data to includes/otp.inc.php-->
          </div>
            <br>
      </form>
    </div>
    <div class="device-verification w3-container w3-center"> <!--div container for code-->
      <p>We have send a 6 digit code via email to <?php echo $_SESSION['rowUserEmail'] ?>.  Please enter this code in the box above and click "Verify".</p>
    </div>
  </body>
</html>
