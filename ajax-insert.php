<?php

$first_name = $_POST["firstname"];
$last_name = $_POST["lastname"];

$conn = mysqli_connect("localhost","root","","test") or die("Connection Failed");

$sql = "INSERT INTO student(firstname, lastname) VALUES ('{$first_name}','{$last_name}')";

if(mysqli_query($conn, $sql)){
  echo 1;
}else{
  echo 0;
}
?>
