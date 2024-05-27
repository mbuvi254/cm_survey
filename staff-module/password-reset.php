<?php
session_start();
include 'lib/meta.php';
include('lib/db.php');
if(isset($_SESSION['staff_id'])){
header('location:index.php?page=home');
}
?>
 <body>
     <div class="container" style="padding-top:2rem;">
<div class="card">
<div class="card-body">
	<p class="text-center"><img src="public/img/cm.png" alt="avatar" class="img-circle center" style="border-radius:50% ;" height="100px;"></p>
<p class="h2 text-center">Cybermaisha Password Reset</p>
 <?php
  $result = "";
  if (isset($_GET["i"]) && isset($_GET["h"])) {
    // (A) CONNECT TO DATABASE
    require "lib/db.php";

    // (B) CHECK IF VALID REQUEST
    $stmt = $pdo->prepare("SELECT * FROM `staff_reset` WHERE `staff_id`=?");
    $stmt->execute([$_GET["i"]]);
    $request = $stmt->fetch();
    if (is_array($request)) {
      if ($request["reset_hash"] != $_GET["h"]) { $result = "Invalid request"; }
    } else { $result = "Invalid request"; }

    // (C) CHECK EXPIRED
    if ($result=="") {
      $now = strtotime("now");
      $expire = strtotime($request["reset_time"]) + $prvalid;
      if ($now >= $expire) { $result = "Request expired"; }
    }

    // (D) PROCEED PASSWORD RESET
    if ($result=="") {
      // RANDOM PASSWORD
      $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-=+?";
      $password = substr(str_shuffle($chars),0 ,8); // 8 characters

      // UPDATE DATABASE
      $stmt = $pdo->prepare("UPDATE `staff` SET `password`=? WHERE `id`=?");
      $stmt->execute([md5($password), $_GET["i"]]);
      $stmt = $pdo->prepare("DELETE FROM `staff_reset` WHERE `staff_id`=?");
      $stmt->execute([$_GET["i"]]);

      // SHOW RESULTS (UPDATED PASSWORD)
      $result = "Password has been updated to<b> $password</b>. Please login and change it.";
    }
  }

  // (E) INVALID REQUEST
  else { $result = "Invalid request"; }

  // (F) OUTPUT RESULTS
  echo "<div>$result</div>";
  ?>
<p><a href="login.php" class="btn btn-success btn-flat btn-block">Login Now</a></p>
</div>
</div>
</div>
 

  
  </body>
</html>
