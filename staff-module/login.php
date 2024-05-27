<?php
session_start();
include 'lib/meta.php';
include('lib/dbh.php');
if(isset($_SESSION['staff_id'])){
header('location:index.php?page=home');
}
?>

<div class="container" style="padding-top:5rem;">
	<div class="card">
	<div id="login_form" class="card-body login-card-body">
		<p class="text-center"><img src="public/img/cm.png" alt="avatar" class="img-circle center" style="border-radius:50% ;" height="100px;"></p>
		<h2><center><span class="glyphicon glyphicon-lock"></span>Cybermaisha Staff Login</center></h2>
		<div style="height: 15px;"></div>
		<?php
			if(isset($_SESSION['log_msg'])){
				?>
				<div style="height: 30px;"></div>
				<div class="alert alert-danger">
					<span><center>
					<?php echo $_SESSION['log_msg'];
						unset($_SESSION['log_msg']);
					?>
					</center></span>
				</div>
				<?php
			}
		?>
		<hr>
		<form method="POST" action="log.php">
		Email: <input type="text" name="email" class="form-control" required>
		<div style="height: 10px;"></div>		
		Password: <input type="password" name="password" class="form-control" required> 
		<div style="height: 10px;"></div>
		<button type="submit" class="btn btn-primary btn-block btn-flat"><span class="glyphicon glyphicon-log-in"></span> Login</button> 
		<a href="signup.php" class="btn btn-success btn-flat btn-block">Sign up</a>
		<a href="forgot-password.php"><b class="h5">Forgot Password</b></a>
		</form>
	</div>
</div>
</div>
<p class="text-center"><a href="https://www.cybermaisha.co.ke">Cybermaisha© 2010-<?php echo date("Y");?></a></p>
</body>
</html>