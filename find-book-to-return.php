<?php 
 require 'db.php';

if ($_SERVER["REQUEST_METHOD"]== "POST"){

    $name = $_POST['name'];
    $email = mysqli_real_escape_string($con, $_POST['email']);

    
    $sql = "SELECT * FROM collects where name = '$name' and email='$emal'";
    
    $result = mysqli_query($con,$sql);

    $row = mysqli_fetch_array($result);

    $count = mysqli_num_rows($result);
    
    

    if ($count == 1) {

      $_SESSION['book'] = $row;
      
      header("Location:book.php");
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
require_once('nav.php');
?>
<!-- Navbar -->

  

<div class="jumbotron">
<div class="" style="max-width:50%; margin:auto; margin-top:15px ">
            <form action="return-book.php" method = "GET">
  <div class="form-group">
    <label for="exampleInputEmail1">Book</label>
    <input type="text" name ="name" value = "" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter Book's Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Student email</label>
    <input type="email" name ="email" value = "" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter Student's email">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
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