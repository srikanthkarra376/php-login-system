<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>index page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"  crossorigin="anonymous">
  <style>
  
  </style>
</head>
<body class="bg-muted">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="nav-link">Login System <span class="sr-only">(current)</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
    <?php if( isset($_SESSION["myname"])) { ?>
      <li  class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    <?php } else {?>
      <li >
        <a class="nav-link" href="index.php">My Account</a>
      </li>
       
      <li >
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li >
        <a class="nav-link" href="signup.php">Signup</a>
      </li>
      
    </ul>
   
  </div>
</nav>

    <?php } ?>
      
             
           
            
        </header>
        
