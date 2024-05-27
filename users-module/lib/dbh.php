<?php 

$conn= new mysqli('localhost','','','')or die("Could not connect to mysql".mysqli_error($con));
if(!$conn){
  echo "Error Database!";
}
