<?php //php to connect to database which is managed through phpMyAdmin

  $servername = "localhost"; //local server name
  $dbUsername = "root"; //username of the DB
  $dbPassword = "test123"; //password of the DB
  $dbName = "project"; //name of DB to connect to

  $conn = mysqli_connect($servername, $dbUsername,$dbPassword, $dbName); //set up a connection variable using the details above

  if(!$conn){ //if not connection made display "Connection Faild: the reason for the connection failure"
    die("Connection Failed: ".mysqli_connect_error());
  }
