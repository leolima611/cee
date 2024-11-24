<div class="app-main__outer">
    <div id="refreshData">
    	<div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-portfolio icon-gradient bg-mean-fruit">
                            </i>
                        </div>
                        <div><?=$selCou['cou_name']?>
                            <div class="page-title-subheading">
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
			<?php
			$selExamAct = $conn->query("SELECT * FROM topic_cou tc INNER JOIN rel_topic rt ON tc.idtopic_cou = rt.idtopic WHERE tc.cou_id='$exmneCourse' AND rt.exmne_id='$exmneId' ORDER BY `tc`.`activity_num` DESC LIMIT 1");
			if($selExamAct->rowCount()>0){
				$selExAct = $selExamAct->fetch(PDO::FETCH_ASSOC);
				$selTopicsig = $conn->query("SELECT * FROM `topic_cou` WHERE cou_id = '$exmneCourse' AND activity_num>".$selExAct['activity_num']." ORDER BY activity_num LIMIT 1;");
				if($selTopicsig->rowCount()>0){
					$selTcsig = $selTopicsig->fetch(PDO::FETCH_ASSOC);
					
					$selRelex = $conn->query("SELECT * FROM `exam_attempt` WHERE exam_id = ".$selTcsig['valor']." and exmne_id = '$exmneId';");
					
					if($selTcsig['acti_tipes'] == 8 && $selRelex->rowCount()<1){
						$selExSig = $conn->query("SELECT * FROM exam_tbl WHERE ex_id=".$selTcsig['valor'].";")->fetch(PDO::FETCH_ASSOC);
			?>
			<div class="row">
				<div class="col-md-6 col-xl-12">
					<a href="#" id="startQuiz" data-id="<?php echo $selExSig['ex_id']; ?>">
						<div class="card mb-3 widget-content">
							<div class="widget-content-outer">
								<div class="widget-content-wrapper">
									<div class="widget-content-left">
										<div class="widget-heading text-success">Examen Disponible</div>
										<div class="widget-subheading">Tu siguiente actividad: Realiza el examen</div>
									</div>
									<div class="widget-content-right">
										<div class="widget-numbers text-success"><?php echo $selExSig['ex_title'] ?></div>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
            </div>
			<?php
					}
				}
			}
			?>
			<div class="row">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Actividades</div>
                                    <div class="widget-subheading">Total de actividades</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-success"><?php echo $selTopic->rowCount() ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Examenes</div>
                                    <div class="widget-subheading">Examenes Activos</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-success"><?php echo $selExamAct->rowCount() ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Actividades Realizadas</div>
                                    <div class="widget-subheading">.</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-warning"><?php echo $selReltop['total'] ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--<?php include("includes/grafic.php"); ?>-->
        </div>
    </div>