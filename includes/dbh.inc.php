<?php //php to connect to database which is managed through phpMyAdmin

  $servername = "mysql5.gear.host"; //local server name
  $dbUsername = "ianproject"; //username of the DB
  $dbPassword = "Jx5CQ?d?GmAY"; //password of the DB
  $dbName = "ianproject"; //name of DB to connect to



  $conn = mysqli_connect($servername, $dbUsername,$dbPassword, $dbName); //set up a connection variable using the details above

  if(!$conn){ //if not connection made display "Connection Faild: the reason for the connection failure"
    die("Connection Failed: ".mysqli_connect_error());
  }
