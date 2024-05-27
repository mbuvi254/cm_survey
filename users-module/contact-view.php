<div class="col-12 py-2">
<div class="card card-success">
<div class="card-header">
<h3 class="card-title">Compose New Message</h3>
</div>
<div class="card-body">
<?php
    if (! empty($message)) { ?>
        <div class="alert alert-success">
    <p class='<?php echo $type; ?>Message'><?php echo $message; ?></p>
</div>
      <?php } ?>
    
<form name="frmContact" id="" frmContact"" method="post"
            action="" enctype="multipart/form-data"
            onsubmit="return validateContactForm()">
<div class="input-row">
<label style="padding-top: 20px;">Name</label>
<span id="userName-info" class="info"></span><br /> 
<input type="text" class="form-control" name="userName" id="userName"  value="<?php echo $_SESSION['user_firstname']  .$_SESSION['staff_lastname'] ?>" />
</div>
<div class="input-row">
<label>Email</label>
<span id="userEmail-info" class="info"></span><br />
<input type="text" class="form-control" name="userEmail" id="userEmail" value="<?php echo $_SESSION['user_email'] ?>" />
</div>
<div class="input-row">
<label>Subject</label>
<span id="subject-info" class="info"></span><br />
<input type="text" class="form-control" name="subject" id="subject" />
</div>
<div class="input-row">
<label>Message</label>
<span id="userMessage-info" class="info"></span><br />
<textarea name="content" id="content" class="form-control" cols="60" rows="6"></textarea>
</div>
<div>
<hr>
<input type="submit" name="send" class="btn btn-primary btn-block btn-flat" value="Send" />
</div>
</form>
</div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
        function validateContactForm() {
            var valid = true;

            $(".info").html("");
            $(".input-field").css('border', '#e0dfdf 1px solid');
            var userName = $("#userName").val();
            var userEmail = $("#userEmail").val();
            var subject = $("#subject").val();
            var content = $("#content").val();
            
            if (userName == "") {
                $("#userName-info").html("Required.");
                $("#userName").css('border', '#e66262 1px solid');
                valid = false;
            }
            if (userEmail == "") {
                $("#userEmail-info").html("Required.");
                $("#userEmail").css('border', '#e66262 1px solid');
                valid = false;
            }
            if (!userEmail.match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/))
            {
                $("#userEmail-info").html("Invalid Email Address.");
                $("#userEmail").css('border', '#e66262 1px solid');
                valid = false;
            }

            if (subject == "") {
                $("#subject-info").html("Required.");
                $("#subject").css('border', '#e66262 1px solid');
                valid = false;
            }
            if (content == "") {
                $("#userMessage-info").html("Required.");
                $("#content").css('border', '#e66262 1px solid');
                valid = false;
            }
            return valid;
        }
</script>
</div>
</div>
