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
<div class="jumbotron">
  <h1 class="display-4">Hello, world!</h1>
  <p class="lead">Hello , new user, welcome to e libary where you can serch for books borrow and admin can also keep track of book, us ethe nav nar to sech for book and navigate through the application, have fun reading!</p>
  <hr class="my-4">
  <div>
  <?php

$book = 'precious';
        $sqlnumberofbooks = "SELECT * FROM books";
        $resultbooks = mysqli_query($con, $sqlnumberofbooks);
        $rowcount=mysqli_num_rows($resultbooks);

        $sqlnumberofbookslended = "SELECT * FROM collects";
        $resultlended = mysqli_query($con, $sqlnumberofbookslended);
        $rowcountlended=mysqli_num_rows($resultlended);

        $sqlnumberofbooksreturned = "SELECT * FROM collects where returned = 'yes'";
        $resultreturned = mysqli_query($con, $sqlnumberofbooksreturned);
        $rowcountreturnd =mysqli_num_rows($resultreturned);

        $sqlnumberofbooksnotreturned = "SELECT * FROM collects where returned = 'yes'";
        $resultnotreturned = mysqli_query($con, $sqlnumberofbooksnotreturned);
        $rowcountnotreturnd =mysqli_num_rows($resultnotreturned);

        $students = "SELECT * FROM users where is_admin = 'student'";
        $students = mysqli_query($con, $students);
        $students =mysqli_num_rows($students);

        $staffs = "SELECT * FROM users where is_admin = 'admin'";
        $staffs = mysqli_query($con, $staffs);
        $staffs =mysqli_num_rows($staffs);
        
    
        
    
        
    
        
    
        
    
    
       echo     "  <table>
  <tr>
    <th>Total Number of Books</th>
    <th>Total number of books lended out</th>
    <th>Total number of books Returned</th>
    <th>Total Number of Book Yet to be Returned</th>
    <th>Number of Students</th>
    <th>Number of Staffs</th>


  </tr><form action = 'collect-book.php' method ='Get'> 
  
 <tr>
    <td>".$rowcount. "</td>
    <td>".$rowcountlended. "</td>
    <td>".$rowcountreturnd."</td>
    <td>".$rowcountnotreturnd."</td>
    <td>".$students."</td>
    <td>".$staffs."</td>



  </tr></form>


</table>";
        


  ?>
  </div>
</div>





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

<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"
></script>
</body>
</html>