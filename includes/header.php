<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>index page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"  crossorigin="anonymous">
  <style>
  .error {
    color:orange;
  }
  </style>
</head>
<body>
        <header>
            <nav>

            <?php 
              
             if( isset($_SESSION["myname"])) {
              echo "<a href='logout.php'>logout</a>";
              
             } else {
              echo '<a href="login.php">login</a>
              <a href="signup.php">Signup</a>';
             }
            
            
            ?>
             
            </nav>
            
        </header>
        
