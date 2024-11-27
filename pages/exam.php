<script type="text/javascript" >
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script>
<?php 
$examId = $_GET['id'];
$selExam = $conn->query("SELECT * FROM exam_tbl WHERE ex_id='$examId' ")->fetch(PDO::FETCH_ASSOC);
$selExamTimeLimit = $selExam['ex_time_limit'];
//$exDisplayLimit = $selExam['ex_questlimit_display'];
?>

<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="col-md-12">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>
                            <?php echo $selExam['ex_title']; ?>
                            <div class="page-title-subheading">
                                <?php echo $selExam['ex_description']; ?>
                            </div>
                        </div>
                    </div>
                    <div class="page-title-actions mr-5" style="font-size: 20px;">
                        <form name="cd">
                            <input type="hidden" name="" id="timeExamLimit" value="<?php echo $selExamTimeLimit; ?>">
                            <label>Tiempo restante : </label>
                            <input style="border:none;background-color: transparent;color:blue;font-size: 25px;" name="disp" type="text" class="clock" id="txt" value="00:00" size="5" readonly="true" />
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 p-0 mb-4">
            <form method="post" id="submitAnswerFrm">
                <input type="hidden" name="exam_id" id="exam_id" value="<?php echo $examId; ?>">
				<input type="hidden" name="course_id" id="exam_id" value="<?php echo $exmneCourse; ?>">
                <input type="hidden" name="examAction" id="examAction">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                    <?php
					include("quetiontipe.php");
					?>
        		</table>
        	</form>
    	</div>
	</div>
