<?php 

$conn= new mysqli('localhost','root','','')or die("Could not connect to mysql".mysqli_error($con));
if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

