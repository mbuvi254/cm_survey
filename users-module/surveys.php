<?php include 'lib/dbh.php' ?>
<?php 
$answers = $conn->query("SELECT distinct(survey_id) from answers where user_id ={$_SESSION['user_id']}");
$ans = array();
while($row=$answers->fetch_assoc()){
  $ans[$row['survey_id']] = 1;
}
?>

<div class="container py-5">
  <div class="row">
  <div class="col-lg-12">
  <div class="d-flex w-100 justify-content-center align-items-center mb-2">
    <div class="input-group input-group-sm col-sm-5">
          <input type="text" class="form-control" id="filter" placeholder="Search Surveys.........">
          <span class="input-group-append">
            <button type="button" class="btn btn-success btn-flat" id="search">Search</button>
          </span>
        </div>
  </div>
  <div class=" w-100" id='ns' style="display: none"><center><b>No Result.</b></center></div>
  <?php 
    $survey = $conn->query("SELECT survey.id,survey.title,survey.description,survey.start_date,survey.end_date,county.countyName FROM survey inner join county on survey.county=county.id where '".date('Y-m-d')."' between date(survey.start_date) and date(survey.end_date) order by rand() and county={$_SESSION['user_county']}");
    while($row=$survey->fetch_assoc()):
    ?>
<div class="col-lg-12  survey-item py-2">
 <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-lg-4">
          <img src="./public/img/cm.png" height="20rem;" class="img-responsive img-fluid">
        </div>
        <div class="col-lg-8">
        <h3 class="lead py-2"><?php echo ucwords($row['title']) ?></h3>
      <h5 class="text-success" >Start Date:<b><?php echo $row['start_date'] ?></b></h5>
      <h5 class="text-danger">End Date:<b><?php echo $row['end_date'] ?></b></h5>
      <h5 class="lead "><?php echo $row['countyName'] ?></h5>
      <hr>
       <p class="lead italic"><?php echo $row['description'] ?></p>
    </div>
    </div>
    </div>
    <?php if(!isset($ans[$row['id']])): ?>
    <a href="index.php?page=answer&id=<?php echo $row['id'] ?>" class="btn btn-lg btn-flat btn-success"><i class="fa fa-pen-square"></i> Take Survey</a>
    <?php else: ?>
    <a href="" class="btn btn-lg btn-flat btn-danger"><i class="fa fa-pen-square"></i> Survey Completed</a>
    <?php endif; ?>
 </div>
</div>
  <?php endwhile; ?>
</div>
</div>


<script>
  function find_survey(){
    start_load()
    var filter = $('#filter').val()
      filter = filter.toLowerCase()
      console.log(filter)
    $('.survey-item').each(function(){
      var txt = $(this).text()
      if((txt.toLowerCase()).includes(filter) == true){
        $(this).toggle(true)
      }else{
        $(this).toggle(false)
      }
      if($('.survey-item:visible').length <= 0){
        $('#ns').show()
      }else{
        $('#ns').hide()
      }
    })
    end_load()
  }
  $('#search').click(function(){
    find_survey()
  })
  $('#filter').keypress(function(e){
    if(e.which == 13){
    find_survey()
    return false;
    }
  })
</script>