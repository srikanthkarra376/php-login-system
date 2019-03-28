<?php 
//start the session in all pages 
session_start();
//check if the form is submited


if(isset($_POST["login-btn"])){
  //include the db credentials 
  include 'includes/db.config.php';
  //get the form values 
  $login_uname = $_POST["login-uname"];
  $login_pwd = $_POST["login-pwd"];
  //create an array to store errors !
  $login_errors = array();
  //check empty username
  if(empty($login_uname)) {
    $login_errors["login_uname_err"] = "Invalid User name !";
  }
   //check the empty passord
  if(empty($login_pwd)) {
    $login_errors["login_pwd_err"] = "Invalid password !";

 }
 //check for the erreors in the array 
  if(count($login_errors)==0) {
    
    //query database to check for existing users 
  $stmt = "SELECT * FROM users WHERE username='$login_uname'";
   //prepare the mysql query 
  if($result = mysqli_query($connection, $stmt)) {
    //condition to check for the returned results is true or not 
    if(mysqli_num_rows($result)==1){
     // convert the result variables in to array loop through the array fetch the values from the array
      while($row = mysqli_fetch_array($result)){ 
      
        //comapre the passowrd of user entered and db password against hasshed password
        $passwordVerify= password_verify($login_pwd,$row["password"]);
       
        if($passwordVerify) {
            //if password verifies then set the username in to session
          $_SESSION["myname"] = $row["username"];
          // redirect the user to   the index page 
          header("Location:index.php");

        } else {
          $db_check_password_err = "wrong password!";
        }
      }
    
      } else {
        $db_check_username_err = "Username does not exit !";
      }
  
    }

  }

}
?>
<div class="container col-md-4 bg-light">

<?php require './includes/header.php';?>
<hr>
<small  class="text-warning">
<?php if(isset($_GET["redirect"])) echo '*'.$_GET["redirect"] ?>
</small> 
<h1 class="text-center text-muted">login </h1>



<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  <div class="form-group">
    <input type="text" class="form-control" name="login-uname" placeholder="Username" value="<?php if(isset($login_uname)) echo $login_uname ;?>">

    <small  class="form-text text-danger">
       <?php if(isset( $login_errors["login_uname_err"])) echo  $login_errors["login_uname_err"]; ?> 
    </small> 
      <small class="form-text text-warning">
       <?php if(isset( $db_check_username_err)) echo  $db_check_username_err; ?> 
    </small>
  </div>
  
   <div class="form-group">
   <input type="password"  class= "form-control" name="login-pwd" placeholder="password" >  
   <small  class="form-text text-danger">
   <?php if(isset($login_errors["login_pwd_err"])) echo $login_errors["login_pwd_err"]; ?> 
    </small> 
    <small  class="form-text text-warning">
       <?php if(isset($db_check_password_err)) echo   $db_check_password_err; ?> 
    </small> 
  
   </div>
   <div class="text-center">
     <button class="btn btn-success btn-lg btn-block" type="submit" name="login-btn">login</button>
  </div>

</form>

<?php require './includes/footer.php';?>