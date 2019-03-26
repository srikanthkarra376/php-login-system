<?php 
session_start();
require './includes/header.php';
?>


<h2 class= "text-success">Welcome to the IAM SYSTEM <?php if(isset($_SESSION["myname"]))  echo $_SESSION["myname"];?>  </h1>
 
<?php require './includes/footer.php';?>
 