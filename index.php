<?php

session_start();
<<<<<<< HEAD

if (isset($_SESSION["myName"]) && isset($_SESSION["myEmail"]) ) {
=======
//check for the session then redirect the user to index page the user logged in
if(isset($_SESSION["myname"])) {
>>>>>>> d39bd2d99c5fe71e23f272581f246345d9adaa77

   echo "<p><a class='nav-link' href='logout.php'>Logout</a>
       <p>welcome ! your Name is: " . $_SESSION['myName'] ." <br/> Your Email :".$_SESSION['myEmail'] . "</p>";
       
} else {
   header("Location:login.php?redirect=you need to be login first");
}
?>

<<<<<<< HEAD
<?php require './includes/footer.php'; ?> 
=======
<?php require './includes/footer.php';?>
 
>>>>>>> d39bd2d99c5fe71e23f272581f246345d9adaa77
