<?php
session_start();
include 'lib/meta.php';
include('lib/dbh.php');
?>
<div class="container" style="padding-top:1rem;">
<div class="card">
	<div id="signup_form" class="login-card-body">
		 <p class="text-center"><img src="public/img/cm.png" alt="avatar" class="img-circle center" style="border-radius:50% ;" height="100px;"></p>
		<h2><center><span class="glyphicon glyphicon-user"></span>Register Staff</center></h2>

		<?php
			if(isset($_SESSION['sign_msg'])){
				?>
				<div style="height: 40px;"></div>
				<div class="alert alert-danger">
					<span><center>
					<?php echo $_SESSION['sign_msg'];
						unset($_SESSION['sign_msg']); 
					?>
					</center></span>
				</div>
				<?php
			}
		?>
		<hr>
		<form method="POST" action="register.php">
		Firstname: <input type="text" name="firstname" class="form-control" required>
		Middlename: <input type="text" name="middlename" class="form-control" required>
		Lastname: <input type="text" name="lastname" class="form-control" required>
		<label class="control-label">Gender</label>
		<select class="form-control" id="gender" name="gender">
		<option value="">Selcet your Gender</option>
		<option value="Female">Female</option>
		<option value="Male">Male</option>
		<option value="Trans-Gender">Trans Gender</option>
		</select>
		Contact: <input type="text" name="contact" class="form-control" required>
		<label class="control-label">County</label>
	            <select name="county" id="county" class="form-control" required>
					<option value="<?php echo isset($county) ? $county : '' ?>">County:<?php echo isset($county) ? $countyName : '' ?></option>
					<?php $qry = $conn->query("SELECT * FROM county");
                     while($row= $qry->fetch_assoc()):?>
                     	<option value="<?php echo $row['id'] ?>"><?php echo $row['countyName'] ?></option>
                          <?php endwhile?>
                      </select>
		Email: <input type="text" name="email" class="form-control" required>
		<div style="height: 10px;"></div>		
		Password: <input type="password" name="password" class="form-control" required> 
		<div style="height: 10px;"></div>
		<button type="submit" class="btn btn-primary btn-block btn-flat"><span class="glyphicon glyphicon-save"></span>Register</button> 
		<a href="login.php" class="btn btn-flat btn-block btn-success">Login</a>
		</form>	
	</div>
</div>
</div>
<p class="text-center"><a href="https://www.cybermaisha.co.ke">Cybermaisha© 2010-<?php echo date("Y");?></a></p>
</body>
</html>