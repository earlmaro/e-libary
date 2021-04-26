<?php 
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "libary";


$con = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);

if (!$con){
    die("connection failed". mysqli_connect_error());

};


