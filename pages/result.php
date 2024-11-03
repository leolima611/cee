 <?php 
    $examId = $_GET['id'];
    $selExam = $conn->query("SELECT * FROM exam_tbl WHERE ex_id='$examId' ")->fetch(PDO::FETCH_ASSOC);

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
        	<h1 class="text-primary">RESULTADOS</h1>
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
										
							?>
								<tr>
									<td>
										<b><p><?php echo $i++; ?> .) <?php echo $selQuestRow['exam_question']; ?></p></b>
										<label class="pl-4 ">
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

        <!-- aun no eliminar en depuracion
		<div class="col-md-6 float-left">
        	<div class="col-md-6 float-left">
        	<div class="card mb-3 widget-content bg-night-fade">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading"><h5>Puntaje</h5></div>
                        <div class="widget-subheading" style="color: transparent;">/</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white">
                            <?php 
                                $selScore = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id AND eqt.exam_answer = ea.exans_answer  WHERE ea.axmne_id='$exmneId' AND ea.exam_id='$examId' AND ea.exans_status='new' ");
                            ?>
                            <span>
                                <?php echo $selScore->rowCount(); ?>
                                <?php 
                                    $over  = $selExam['ex_questlimit_display'];
                                 ?>
                            </span> / <?php echo $over; ?>
                        </div>
                    </div>
                </div>
            </div>
        	</div>

            <div class="col-md-6 float-left">
            <div class="card mb-3 widget-content bg-happy-green">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading"><h5>Porcentaje</h5></div>
                        <div class="widget-subheading" style="color: transparent;">/</div>
                        </div>
                        <div class="widget-content-right">
                        <div class="widget-numbers text-white">
                            <?php 
                                $selScore = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id AND eqt.exam_answer = ea.exans_answer  WHERE ea.axmne_id='$exmneId' AND ea.exam_id='$examId' AND ea.exans_status='new' ");
                            ?>
                            <span>
                                <?php 
                                    $score = $selScore->rowCount();
                                    $ans = $score / $over * 100;
                                    echo number_format($ans,2);
                                    echo "%";
                                    
                                 ?>
                            </span> 
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>-->
    </div>


    </div>
</div>
