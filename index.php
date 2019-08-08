<?php

session_start();

if (isset($_SESSION["myName"]) && isset($_SESSION["myEmail"]) ) {

   echo "<p><a class='nav-link' href='logout.php'>Logout</a>
       <p>welcome ! your Name is: " . $_SESSION['myName'] ." <br/> Your Email :".$_SESSION['myEmail'] . "</p>";
       
} else {
   header("Location:login.php?redirect=you need to be login first");
}
?>

<?php require './includes/footer.php'; ?> 