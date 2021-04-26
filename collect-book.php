<?php
 require 'db.php';
// require 'session.php';



$book = $_GET["book"];
$book = trim($book);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$sql = "SELECT name, author, location, edition, quantity,isbn, status FROM books where name = '$book'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

  $available = "SELECT * FROM collects where name = '$book' and returned = 'no'";
        $available = mysqli_query($con, $available);
        $available =mysqli_num_rows($available);

    $name = $_POST['name'];
    $issue = $_POST['issue-date'];
    $isbn = $_POST['isbn'];
    $expire = ($_POST['expire-date']);
    $email = ($_POST['student-email']);
    $returned ='no';
    
    
    // $phonenumber = $_POST['phone'];
    if($available < $row['quantity']){
      if($row['status'] == "Available"){
        
        // var_dump($row['status']);
    if (isset($_POST['submit'])) {
        $sql = "INSERT INTO collects (name, issue_date, expire_date, student_email, isbn, returned) VALUES ('$name', '$issue', '$expire', '$email','$isbn','$returned')";
  
        if (mysqli_query($con, $sql)) {
      header("Location:dashboard.php");
      ?>
<?php } else {
            echo "beans" . mysqli_error($con);
        }
    }
}else{
  echo "This book is currently unavailable";
}
  }else{
    echo "No Available copy at the moment";
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




<?php
$book = $_GET["book"];
$book = trim($book);
$sql = "SELECT name, author, location, edition, quantity,isbn, status FROM books where name = '$book'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$name =$row['name'];



$count = mysqli_num_rows($result);
// var_dump($sql);
$location =$row['name'];
$issueDate =date("Y-m-d");
$isbn =$row['isbn'];
$d = strtotime("+1 month");
$expireDate =  date("Y-m-d", $d);




if ($count > 0) {
    
  //   echo  "<p>" . $row['name'] . "</p> <br>";
echo     "  
<div class='jumbotron'>"."

<form action = '' method ='POST'>
 <div class='form-group'>
    <label for=''>Book</label>
    <input type='text' name ='name' value = '$name' class='form-control'  placeholder='Enter  Name'>
  </div>
  <div class='form-group'>
    <label for='exampleInputEmail1'>Issue Date</label>
    <input type='date' name ='issue-date' value ='$issueDate' class='form-control'  placeholder='' readonly>
  </div>
 
  <div class='orm-group'
    <label for=''>ISBN</label>
    <input type='text' name ='isbn' value = '$isbn' class='form-control'  placeholder='Enter  ISBN'>
  </div>
  <div class='form-group'>
    <label for=''>Expire Date</label>
    <input type='date' name ='expire-date' value = '$expireDate' class='form-control'  placeholder=''>
  </div>
  <div class='form-group'>
    <label for='exampleInputEmail1'>Student Email</label>
    <input type='email' name ='student-email' value = '' class='form-control'   placeholder='Enter email' required>
  </div>
  
 
  <button type='submit' name='submit' class='btn btn-primary'>Submit</button>

</form>
</div>";

}









?>


<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"
></script>
</body>
</html>