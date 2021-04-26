
<?php require 'db.php';
// require 'session.php';


if ($_SERVER["REQUEST_METHOD"]== "POST"){

    $password = md5($_POST['password']);

    $email = mysqli_real_escape_string($con, $_POST['email']);

    $password = mysqli_real_escape_string($con, $password);
    
    $sql = "SELECT * FROM users where email = '$email' and password = '$password'";
    
    $result = mysqli_query($con,$sql);

    $row = mysqli_fetch_array($result);

    $count = mysqli_num_rows($result);
    
    

    if ($count == 1) {

      $_SESSION['signed_in'] = $email;
      session_start();
      $_SESSION = $_POST;
      session_write_close();
      
      header("Location:dashboard.php?user=$email");
    }
    else
    {
      echo  "Invalid login details";
    }
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="step1.css">
  <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css"
  rel="stylesheet"
/>
</head>
<body>
<!-- As a link -->
<!-- Navbar -->
<?php
// require_once('nav.php');
?>
<!-- Navbar -->

  

<div class="">

<div class="" style="max-width:30%; margin:auto; margin-top:100px ">
<h2 class="text-center">Sign in</h2>
            <form action="" method = "POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name ="email" value = "" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp"  class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" value = "" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
  <a  class="text-center ml-3" href="Sign-up.php"  
  >Sign Up</a
>
</form>
            </div>
</div>






<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"
></script>
</body>
</html>