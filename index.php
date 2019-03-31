<?php 

session_start();
//check for the session then redirect the user to index page the user logged in
if(isset($_SESSION["myname"])) {

  echo "<p><a class='nav-link' href='logout.php'>Logout</a>
       <p>welcome ".$_SESSION['myname']."</p>";
       
} else {
   header("Location:login.php?redirect=you need to be login first");
}

?>

<?php require './includes/footer.php';?>
 
