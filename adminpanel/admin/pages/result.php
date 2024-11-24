 <?php 
$examId = $_GET['ide'];
$selExam = $conn->query("SELECT * FROM exam_tbl WHERE ex_id='$examId' ")->fetch(PDO::FETCH_ASSOC);
$exmneId = $_GET['ida'];
 ?>

<div class="app-main__outer">
<div class="app-main__inner">
    <div id="refreshData">
            
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
            </div>
        </div>  
        <div class="row col-md-12">
        	<h1 class="text-primary">RESPUESTAS</h1>
        </div>

        <div class="row col-md-12 float-left">
        	<div class="main-card mb-3 card">
                <div class="card-body">
                	<h5 class="card-title">TUS RESPUESTAS</h5>
        			<table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                    <?php 
						$selQuest = $conn->query("SELECT * FROM `exam_question_tbl` WHERE exam_id='$examId'");
                    	//$selQuest = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id WHERE eqt.exam_id='$examId' AND ea.axmne_id='$exmneId' AND ea.exans_status='new' ");
                    	$i = 1;
                    	while ($selQuestRow = $selQuest->fetch(PDO::FETCH_ASSOC)) { 
							if($selQuestRow['id_tipeq'] == 2 || $selQuestRow['id_tipeq'] == 3){
								$selAnsl = $conn->query("SELECT * FROM `exam_answers` where quest_id =".$selQuestRow['eqt_id']." AND exam_id='$examId' AND axmne_id='$exmneId' AND exans_status='new'");
								while ($selAnslRow = $selAnsl->fetch(PDO::FETCH_ASSOC)) {	
							?>
								<tr>
									<td>
										<b><p><?php echo $i++; ?> .) <?php echo $selQuestRow['exam_question']; ?></p></b>
										<label class="pl-4 ">
											Respuesta : 
													<span ><?php echo $selAnslRow['exans_answer']; ?></span>
										</label>
									</td>
								</tr>
							<?php 	
								}
							}
							else{
								$selAnsl = $conn->query("SELECT * FROM `exam_answers` where quest_id =".$selQuestRow['eqt_id']." AND exam_id='$examId' AND axmne_id='$exmneId' AND exans_status='new'");
								while ($selAnslRow = $selAnsl->fetch(PDO::FETCH_ASSOC)) { 
									$selAnsq = $conn->query("SELECT * FROM `question_answers` WHERE eqt_id =".$selQuestRow['eqt_id']." AND id_qAns = ".$selAnslRow['exans_answer']." ");
									while ($selAnsqRow = $selAnsq->fetch(PDO::FETCH_ASSOC)) {
										$classrl = "pl-4 text-danger";
										if($selAnsqRow['tipe'] == "si"){
											$classrl = "pl-4 text-success";
										}
							?>
								<tr>
									<td>
										<b><p><?php echo $i++; ?> .) <?php echo $selQuestRow['exam_question']; ?></p></b>
										<label class="<?=$classrl?>">
											Respuesta : 
													<span ><?php echo $selAnsqRow['answer']; ?></span>
										</label>
									</td>
								</tr>
					<?php 			}
								}
							}
						}
                     ?>
	                 </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
