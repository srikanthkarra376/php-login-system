<?php 

if(isset($_POST['signup-btn'])) {

  include 'includes/db.config.php';

  $username = mysqli_real_escape_string($connection, $_POST["uid"]);
  $email = mysqli_real_escape_string($connection, $_POST["user-email"]);
  $password = mysqli_real_escape_string($connection,$_POST["pwd"]);
  $password_confirm = mysqli_real_escape_string($connection, $_POST["pwd-confirm"]);

  $errors = array();

  if(empty($username)) {
      $errors["username_err"] = "*Username cant be empty!";

  } 
  
  if(empty($email)) {
    $errors["email_err"] = "*Email cant be empty !";
  } 
  if(empty($password) || empty($password_confirm)){

    $errors["password_err"] = "*Please make sure passwords cant be empty !";
  } 
   if($password !== $password_confirm) {
    
    $errors["passwords_match_err"] = "*Please ensure passwords are matched !";
  } 

  $stmt = "SELECT username, email FROM users";

  if($result = mysqli_query($connection, $stmt)) {
    if(mysqli_num_rows($result) > 0){

      while($row = mysqli_fetch_array($result)){ 

        if($row["username"] === $username  ) {
          $errors["username_taken_err"] = "Username already taken!";
          echo $row["username"];
        }
        if($row["email"] == $email){
          $errors["email_taken_err"] = "Email already exists!";
          echo $row["email"];
        
        
        }

     }

    
  }
}

  if(count($errors)==0){

    $hashedpwd = password_hash($password, PASSWORD_DEFAULT) ;
    $stmt1 = mysqli_prepare($connection, "INSERT INTO users(username,email,password) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt1, 'sss', $username, $email, $hashedpwd);
    mysqli_stmt_execute($stmt1);
    mysqli_stmt_close($stmt1);
    $success = "User created successfully !";
    mysqli_close($connection);
  } 
 
  
  

 
  }

    

  



?>


<div class="container col-md-6">

<?php require './includes/header.php';?>
<h1>Signup </h1>
<p class="text-success" ><?php if(isset($success)) echo $success;?></p>

 
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<div class="form-group">
<input class="form-control" type="text" name="uid" placeholder="Username" value=<?php if(isset($username)) echo $username;?> >
    <small  class="form-text text-danger">
      <?php if(isset( $errors["username_err"])) echo $errors["username_err"];?>
    </small> 
    <small  class="form-text text-warning">
      <?php if(isset( $errors["username_taken_err"])) echo $errors["username_taken_err"];?>
    </small> 
</div>
  <div class="form-group">
  <input class="form-control" type="email" name="user-email" placeholder="Email" value=<?php if(isset($email)) echo $email;?>>
     <small class="form-text text-danger">
        <?php  if(isset( $errors["email_err"])) echo  $errors["email_err"];?>
      </small>
      <small class="form-text text-warning">
        <?php  if(isset( $errors["email_taken_err"])) echo  $errors["email_taken_err"];?>
      </small>
  </div>
  <div class="form-group">
  <input class="form-control" type="password" name="pwd"  placeholder="password">
     <small class="form-text text-danger">
      <?php if(isset($password_err)) echo  $password_err;?>
     </small>
  </div>
  <div class="form-group">
  <input class="form-control" type="password" name="pwd-confirm" placeholder ="Retype password">
    <small class="form-text text-danger">
      <?php if(isset($errors["password_err"])) echo $errors["password_err"];?>
    </small>
    <small class="form-text text-danger">
       <?php if(isset($errors["passwords_match_err"]))  echo $errors["passwords_match_err"];?>
     </small>
  </div>
 
  <p><button class="btn btn-primary" type="submit" name="signup-btn">signup</button></p>

</form>
<?php require './includes/footer.php';?>
</div>




