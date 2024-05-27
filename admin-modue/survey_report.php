<?php include './lib/dbh.php' ?>
<div class="col-lg-12">
	<div class="d-flex w-100 justify-content-center align-items-center mb-2">
		<label for="" class="control-label">Find Survey</label>
		<div class="input-group input-group-sm col-sm-5">
          <input type="text" class="form-control" id="filter" placeholder="Enter keyword...">
          <span class="input-group-append">
            <button type="button" class="btn btn-primary btn-flat" id="search">Searh</button>
          </span>
        </div>
	</div>
	<div class=" w-100" id='ns' style="display: none"><center><b>No Result.</b></center></div>
	<div class="row">
		<?php 
		$survey = $conn->query("SELECT survey.id,survey.title,survey.description,survey.start_date,survey.end_date,county.countyName FROM survey inner join county on survey.county=county.id order by rand() ");
		while($row=$survey->fetch_assoc()):
		?>
		<div class="col-md-10 py-1 px-1 survey-item">
			<div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title"><?php echo ucwords($row['title']) ?></h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body" style="display: block;">
             <h5 class="text-warning">County:<?php echo ucwords($row['countyName']) ?></h5>
              <h5 class="text-success">Start Date:<?php echo $row['start_date']?></h5>
               <h5 class="text-danger">End Date:<?php echo $row['end_date']?></h5>
              <h5 class="text-secondary">Taken Online:<?php echo $conn->query("SELECT distinct(user_id) FROM answers  where survey_id = {$row['id']}")->num_rows; ?></h5>
              <h5 class="text-secondary">Taken Field:<?php echo $conn->query("SELECT distinct(user_id) FROM field_answers  where survey_id = {$row['id']}")->num_rows; ?></h5>
               <?php echo $row['description'] ?>
               <div class="row">
               	<hr class="border-primary">
               	<div class="d-flex justify-content-center w-100 text-center">
               		<a href="index.php?page=view_survey_report&id=<?php echo $row['id'] ?>" class="btn btn-block btn-flat btn-success"><i class="fa fa-poll"></i>Online Survey Report</a>
               			<br>
               		<a href="index.php?page=view_field_survey_report&id=<?php echo $row['id'] ?>" class="btn btn-block btn-primary btn-flat"><i class="fa fa-poll"></i>Field Survey Report</a>
               	</div>
               </div>
              </div>
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