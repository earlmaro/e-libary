<?php require 'db.php';
// require 'session.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $location = $_POST['location'];
        $author = $_POST['author'];
        $isbn = $_POST['isbn'];
        $status = $_POST['status'];
        $quantity = $_POST['quantity'];
        $edition = $_POST['edition'];
        $sql = "INSERT INTO books (name, location, author, isbn, status, quantity,edition) VALUES ('$name', '$location', '$author', '$isbn','$status','$quantity','$edition')";
// var_dump($sql);
        if (mysqli_query($con, $sql)) { ?>

            <script type="text/javascript">
                var success = document.getElementById("success");
                success.classList.remove("d-none");

                window.setTimeout(function(){
                    window.location.href = "dashboard.php";
                }, 5000);

            </script>

<?php } else {
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
?>
<!-- Navbar -->

  

<div class="jumbotron">
<div class="" style="max-width:50%; margin:auto; margin-top:15px ">
            <form action="" method = "POST">
            <div class="alert alert-success text-white alert-dismissible fade show d-none" id="success" role="alert">
            <strong>Congratulations!</strong> You have successfully registered.
            <p class="text-muted">You'll be redirected in 5 seconds!</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name ="name" value = "" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter Book's Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Location</label>
    <input type="text" name ="location" value = "" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter Book's Location">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Author</label>
    <input type="text" name ="author" value = "" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter Book's Author">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">ISBN</label>
    <input type="text" name ="isbn" value = "" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter Book's ISBN">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Edition</label>
    <input type="text" name ="edition" value = "" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter Book's ISBN">
  </div>
 
  <div class="form-group">
    <label for="exampleInputPassword1">Status</label>
                <select class="form-control" name="status" required >
                    <option value="" disabled selected>Select one</option>
                    <option value="Available" >Available</option>
                    <option value="Unavailable" >Unavailable</option>
                </select>
            </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Quantity</label>
    <input type="text" name ="quantity" value = "" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter Book's Quantity">
  </div>
  
 
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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