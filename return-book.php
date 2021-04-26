<?php
 require 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $namee = trim($_GET["name"]);
$emaill = trim($_GET["email"]);

    $name = $_POST['name'];
    $issueDate = $_POST['issue-date'];
    $returnDate = $_POST['return-date'];
    $studentId = $_POST['student-email'];
    $expireDate = $_POST['expire-date'];
    $id = $_POST['id'];
    $id = (int)$id;

    if (isset($_POST['return'])) {
      $sql = "INSERT INTO returns (book_name, issue_date, return_date,expire_date ,student_email,book_id) VALUES ('$name', '$issueDate', '$returnDate', '$expireDate','$studentId','$id')";
      if (mysqli_query($con, $sql)) {
        $sql = "UPDATE collects SET returned = 'yes' where student_email = '$emaill' and name = '$namee'" ;}

        if (mysqli_query($con, $sql)) {

          header("Location:dashboard.php");
        }else {
          echo "beans" . mysqli_error($con);
      }
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

$name = trim($_GET["name"]);
$email = trim($_GET["email"]);
// $email = mysqli_real_escape_string($co $email);

    
    $sql = "SELECT * FROM collects where name = '$name' and student_email ='$email'";
    
    $result = mysqli_query($con,$sql);

    $row = mysqli_fetch_array($result);

    $count = mysqli_num_rows($result);
    $name = $row['name'];
    var_dump($row['id']);
    $issueDate =$row['issue_date'];
    $isbn =$row['isbn'];
    $expireDate = $row['expire_date'];
    $returnDate =date("Y-m-d");

$id = $row['id'];


    // if ($count > 0) {
    
      //   echo  "<p>" . $row['name'] . "</p> <br>";
    echo     "  
    <div class='jumbotron'>"."
    
    <form action = '' method ='POST'>
     <div class='form-group'>
        <label for=''>Book</label>
        <input type='text' name ='name' value ='$name' class='form-control'  placeholder='Enter  Name' readonly>
      </div>
      <div class='form-group'>
        <label for='exampleInputEmail1'>Issue Date</label>
        <input type='date' name ='issue-date' value ='$issueDate' class='form-control'  placeholder='' readonly>
      </div>
     
      <div class='orm-group'
        <label for=''>ISBN</label>
        <input type='text' name ='isbn' value = '$isbn' class='form-control'  placeholder='Enter  ISBN' readonly>
      </div>
      <div class='form-group'>
        <label for=''>Expire Date</label>
        <input type='date' name ='expire-date' value = '$expireDate' class='form-control'  placeholder='' readonly>
      </div>
      <div class='form-group'>
        <label for='exampleInputEmail1'>Student Email</label>
        <input type='email' name ='student-email' value = '$email' class='form-control'   placeholder='Enter email' required readonly>
      </div>

      <div class='form-group'>
      <label for='exampleInputEmail1'>Return Date</label>
      <input type='date' name ='return-date' value = '$returnDate' class='form-control'   placeholder='Enter email' required readonly>
    </div>
    <div class='form-group' style='display:none'>
    <label for='exampleInputEmail1'>Return Date</label>
    <input type='date' name ='id' value = '$id' class='form-control'   placeholder='Enter email' required readonly>
  </div>
      
     
      <button type='submit' name='return' class='btn btn-primary'>Submit</button>
    
    </form>
    </div>";
    
    // }
    
    
    
?>
<!-- Navbar -->

  



<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"
></script>
</body>
</html>