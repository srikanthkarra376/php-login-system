<?php 
session_start();
if(isset($_POST["login-btn"])){

  include 'includes/db.config.php';
  //get the form values 
  $login_uname = $_POST["login-uname"];
  $login_pwd = $_POST["login-pwd"];
  //create an array to store errors !
  $login_errors = array();

  if(empty($login_uname)) {
    $login_errors["login_uname_err"] = "Invalid User name !";
  
  }

  if(empty($login_pwd)) {
    $login_errors["login_pwd_err"] = "Invalid password !";
    
  }

  if(count($login_errors)==0) {
    
    //query database to check for existing users 
  $stmt = "SELECT * FROM users WHERE username='$login_uname'";

  if($result = mysqli_query($connection, $stmt)) {

    if(mysqli_num_rows($result) == 1){
      while($row = mysqli_fetch_array($result)){ 
        $_SESSION["myname"] = $row["username"];

        $passwordVerify= password_verify($row["password"]);
        if($login_pwd == $passwordVerify) {
         
          header("Location:index.php");
        }

      }
      header("Location:index.php");
      }
    
    }

  }

}


?>
<div class="container col-md-6">

<?php require './includes/header.php';?>
<h1>login </h1>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  <div class="form-group">
    <input type="text" class="form-control" name="login-uname" placeholder="Username" value="<?php if(isset($login_uname)) echo $login_uname ;?>">
    <p><?php if(isset( $login_errors["login_uname_err"])) echo  $login_errors["login_uname_err"]; ?></p>
  </div>
  
   
   <input type="password" name="login-pwd" placeholder="password" >
   <?php if(isset( $login_errors["login_pwd_err"])) echo $login_errors["login_pwd_err"]; ?>
   <button type="submit" name="login-btn">login</button>

</form>

<?php require './includes/footer.php';?>