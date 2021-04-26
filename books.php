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
require_once('nav.php');
?>
<!-- Navbar -->

  

<div class="jumbotron">
<?php
$sql = "SELECT * from books";
$result = mysqli_query($con,$sql);

// $row = mysqli_fetch_array($result);

// $count = mysqli_num_rows($result);
if (mysqli_query($con, $sql)) { 
    
    // if (mysqli_fetch_array($result, MYSQLI_NUM) > 0) {
    
     while ($row = mysqli_fetch_array($result)) {
        // var_dump($row);
    
        echo  "<p>" . $row['name'] . "</p> <br>";
       
      }
    // }
}
  ?>
</div>




<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"
></script>
</body>
</html>