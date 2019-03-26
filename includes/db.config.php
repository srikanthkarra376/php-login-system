<?php 
  $db_servername = "localhost";
  $db_username = "root";
  $db_password = "srikanth";
  $db_name = "login_system";

  $connection = mysqli_connect($db_servername,$db_username,$db_password,$db_name);

  if(!$connection) {
    echo "connection error".mysqli_error();
  } else {
   
  }

