<?php include 'lib/dbh.php' ?>
<?php 
$qry = $conn->query("SELECT * FROM survey where id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
    if($k == 'title')
        $k = 'stitle';
    $$k = $v;
}

?>
<div class="container-fluid py-2">
<div class="col-lg-12">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-success">
                <div class="card-header"><h3 class="card-title"><b>Survey Details</b></h3></div>
                <div class="card-body p-0 py-2">
                    <div class="container-fluid">
                        <h4>Title: <b><?php echo $stitle ?></b></h4>
                        <h5 class="text-success">Start: <b><?php echo date("M d, Y",strtotime($start_date)) ?></b></h5>
                        <h5 class="text-danger">End: <b><?php echo date("M d, Y",strtotime($end_date)) ?></b></h5>
                        <h6 class="mb-0">Description:</h6>
                        <small><?php echo $description; ?></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row py-2">
        <div class="col-md-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title text-center"><b>Survey Questionaire</b></h3>
                </div>
                <div class="card-body">
                <form action="" id="manage-survey">
                    <input type="hidden" name="user_id" value="<?php echo $uid ?>">
                    <input type="hidden" name="survey_id" value="<?php echo $id ?>">
                <div class="card-body ui-sortable">
                    <?php 
                    $i = 1;
                    $question = $conn->query("SELECT * FROM questions where survey_id = $id order by abs(order_by) asc,abs(id) asc");
                    while($row=$question->fetch_assoc()):   
                    ?>
                    <div class="callout callout-info">
                        <h5><?php echo $i++ ?>.<?php echo $row['question'] ?></h5>  
                        <div class="col-md-12">
                        <input type="hidden" name="qid[<?php echo $row['id'] ?>]" value="<?php echo $row['id'] ?>"> 
                        <input type="hidden" name="type[<?php echo $row['id'] ?>]" value="<?php echo $row['type'] ?>">  
                            <?php
                                if($row['type'] == 'radio_opt'):
                                    foreach(json_decode($row['frm_option']) as $k => $v):
                            ?>
                            <div class="icheck-primary">
                                <input type="radio" id="option_<?php echo $k ?>" name="answer[<?php echo $row['id'] ?>]" value="<?php echo $k ?>">
                                <label for="option_<?php echo $k ?>"><?php echo $v ?></label>
                             </div>
                                <?php endforeach; ?>
                        <?php elseif($row['type'] == 'check_opt'): 
                                    foreach(json_decode($row['frm_option']) as $k => $v):
                            ?>
                            <div class="icheck-primary">
                                <input type="checkbox" id="option_<?php echo $k ?>" name="answer[<?php echo $row['id'] ?>][]" value="<?php echo $k ?>" >
                                <label for="option_<?php echo $k ?>"><?php echo $v ?></label>
                             </div>
                                <?php endforeach; ?>
                        <?php else: ?>
                            <div class="form-group">
                                <textarea name="answer[<?php echo $row['id'] ?>]" id="" cols="30" rows="4" class="form-control" placeholder="Write Something Here..." ></textarea>
                            </div>
                        <?php endif; ?>
                        </div>  
                    </div>
                    <?php endwhile; ?>
                </div>
                </form>
            </div>
                <div class="card-footer">
                    <div class="d-flex w-100 justify-content-center">
                        <button class="btn btn-block btn-flat btn-success" form="manage-survey">Submit Response</button>
                        <button class="btn btn-sm btn-flat bg-gradient-secondary mx-1" type="button" onclick="location.href = 'index.php?page=surveys'">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    $('#manage-survey').submit(function(e){
        e.preventDefault()
        start_load()
        $.ajax({
            url:'ajax.php?action=save_answer',
            method:'POST',
            data:$(this).serialize(),
            success:function(resp){
                if(resp == 1){
                    alert_toast("Thank You.Response Saved",'success')
                    setTimeout(function(){
                        location.href = 'index.php?page=surveys'
                    },2000)
                }
            }
        })
    })
</script>
                    