<?php 
// session_start();
require 'db.php';
session_start();
$_POST = $_SESSION;
$email = trim($_POST['email']) ;
// $password = trim($_POST['password']) ;



$sql = "SELECT * FROM users where email = '$email'";
    
$result = mysqli_query($con,$sql);

$row = mysqli_fetch_array($result);
$role = $row['is_admin'];

      $_SESSION['role'] = $role;
      session_write_close();


// require 'session.php';



if ($_SERVER["REQUEST_METHOD"]== "POST"){
    if (isset($_POST['search'])){
        $book = ($_POST['book']);
        
        // $sql = "SELECT name, author, location, edition, quantity FROM books where name = '$book'";
        
        // $result = mysqli_query($con, $sql);
        // $result = mysqli_fetch_array($result);
        
        // while($r = mysqli_fetch_array($result))
        // {
            
            $_SESSION['book'] = $book;
            // var_dump($_SESSION['book']);

          $_SESSION['signed_in'] = "tobiprecious13@gmail.com";

          header("Location:book.php");

// }
        
        // $result = mysqli_fetch_assoc($result);
        // $row = mysqli_fetch_array($result);
        // $count = mysqli_num_rows($row);

        
    // $row = mysqli_fetch_array($result);

    // $count = mysqli_num_rows($result);
    //     if ($count > 0) {

    //       $_SESSION['book'] = $result;
    //       $_SESSION['signed_in'] = '';


          
        //   header("Location:book.php");
        // }
        // else
        // {
        //   echo  "Invalid login details";
        // }
    }
  }

?>



<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Navbar brand -->
    <a class="navbar-brand" href="#">e-Libary</a>

    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li> -->
        <?php 
if($_SESSION['role'] == "admin"){
?>
    <li class="nav-item">
      <a class="nav-link" href="add-staff.php">Add New User</a>
    </li>
<?php
}
?>
        <!-- Navbar dropdown -->
        <li class="nav-item dropdown">
          <a
            class="nav-link dropdown-toggle"
            href="#"
            id="navbarDropdown"
            role="button"
            data-mdb-toggle="dropdown"
            aria-expanded="false"
          >
            Books
          </a>
          <!-- Dropdown menu -->
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="books.php">View All Books</a></li>
            <li><a class="dropdown-item" href="add-book.php">Add book</a></li>
            <?php 
if($_SESSION['role'] == "admin"){
?>
    <li><a class="dropdown-item" href="find-book-to-return.php">Return book</a></li>
<?php
}
?>

            <li><hr class="dropdown-divider" /></li>
            <li>
              <!-- <a class="dropdown-item" href="#">Sign Out</a> -->
              <!-- <a class="dropdown-item" href="#">Sign In</a> -->

            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="logout.php" tabindex="-1" aria-disabled="true"
            >Sign Out</a
          >
        </li>
        <li>

          <a class="nav-link " href="index.php" tabindex="-2" aria-disabled="true"
            ></a
          >
        </li>
        <li>

<a class="nav-link " href="Sign-up.php" tabindex="-2" aria-disabled="true"
  ></a
>
</li>

      </ul>
      <!-- Left links -->

      <!-- Search form -->
      <form class="d-flex input-group w-auto" action="book.php" method="GET">
        <input
          type="search"
          class="form-control"
          placeholder="Type query"
          aria-label="Search"
          name ="book"
        />
        <button
          class="btn btn-outline-primary"
          type="submit"
          name ="search"
          data-mdb-ripple-color="dark"
        >
          Search
        </button>
      </form>
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>