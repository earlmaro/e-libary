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

  

<div class="jumbotron" style='margin-top:90px; margin-left:60px;margin-right:60px;'>
<?php

$book = $_GET["book"];
        $sql = "SELECT name, author, location, edition, quantity, status FROM books where name = '$book'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);

        $count = mysqli_num_rows($result);
        $abstract =$row['name'];

        $available = "SELECT * FROM collects where name = '$book' and returned = 'no'";
        $available = mysqli_query($con, $available);
        $available =mysqli_num_rows($available);
        // var_dump($sql);
        
        
    
        if ($count > 0) {
    
            //   echo  "<p>" . $row['name'] . "</p> <br>";
       echo     "  <table >
  <tr>
    <th>Name</th>
    <th>Location</th>
    <th>Author</th>
    <th>Edition</th>
    <th>Status</th>
    <th>Quantity</th>
    <th>Copies lended</th>

    <th></th>


  </tr><form action = 'collect-book.php' method ='Get'> <input type='text' name='book' style='display:none' value= ' $abstract'
  
 <tr>
    <td>".$row['name']. "</td>
    <td>".$row['location']. "</td>
    <td>".$row['author']."</td>
    <td>".$row['edition']."</td>
    <td>".$row['status']."</td>
    <td>".$row['quantity']."</td>
    <td>".$available."</td>
    <td>"."<button type='submit' class='btn btn-secondary'> Lend this book</button></td>



  </tr></form>


</table>";
        
        }


  ?>


</div>




<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"
></script>

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</body>
</html>