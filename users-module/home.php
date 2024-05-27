<?php include 'lib/dbh.php' ?>
<main>
<div class="px-4 py-5 my-5 text-center">
    <img class="d-block mx-auto mb-4" src="public/img/cm.png" alt="" width="72" height="57">
    <h2 class="display-5 fw-bold">Welcome!<?php echo ucwords($_SESSION['user_firstname'].' '.$_SESSION['user_lastname']) ?></h2>
    <div class="col-lg-6 mx-auto">
      <h5 class="text-danger">Surveys Taken:<?php echo $conn->query("SELECT distinct(survey_id) FROM answers  where user_id = {$_SESSION['user_id']}")->num_rows; ?></h5>
      <h5 class="text-success">Running Surveys:<?php echo $conn->query("SELECT * FROM survey where county ='".$_SESSION['user_county']."' and '".date('Y-m-d')."' between date(start_date) and date(end_date) order by rand()")->num_rows; ?></h5>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <a href="./index.php?page=surveys" type="button" class="btn btn-primary btn-lg px-4 gap-3">SURVEYS</a>
        <a href="./index.php?page=profile" class="btn btn-outline-secondary btn-lg px-4">PROFILE</a>
      </div>
    </div>
  </div>

</main>