<?php require 'db.php';
// require 'session.php';
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
            <form action="" method = "POST">
            <div class="alert alert-success text-white alert-dismissible fade show d-none" id="success" role="alert">
            <strong>Congratulations!</strong> You have successfully registered.
            <p class="text-muted">You'll be redirected in 5 seconds!</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <div class="form-group">
    <label for="exampleInputEmail1">Full Name</label>
    <input type="text" name ="name" value = "" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter Full Name">
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name ="email" value = "" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" value = "" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Role</label>
                <select class="form-control" name="role" required >
                    <option value="" disabled selected>Select one</option>
                    <option value="student" >Student</option>
                    <option value="admin" disabled >Staff</option>
                </select>
            </div>
 
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  <a  class="text-center ml-3" href="index.php"  
  >Sign In</a
>
</form>
            </div>
</div>



<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $role = $_POST['role'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
  
    // $phonenumber = $_POST['phone'];

    if (isset($_POST['submit'])) {
        $sql = "INSERT INTO users (name, is_admin, email, password) VALUES ('$name', '$role', '$email', '$password')";

        if (mysqli_query($con, $sql)) { ?>

            <script type="text/javascript">
                var success = document.getElementById("success");
                success.classList.remove("d-none");

                window.setTimeout(function(){
                    window.location.href = "index.php";
                }, 5000);

            </script>

<?php } else {
            echo "beans" . mysqli_error($con);
        }
    }
}

?>






<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"
></script>
</body>
</html>