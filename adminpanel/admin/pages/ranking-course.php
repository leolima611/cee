<div class="app-main__outer">
        <div class="app-main__inner">
            <?php 
                @$course_id = $_GET['course_id'];

                if($course_id != ""){
					$selExcon = $conn->query("SELECT * FROM exam_tbl WHERE cou_id='$course_id' ");
					$selEx = $selExcon->fetch(PDO::FETCH_ASSOC);
					if($selExcon->rowCount() > 0){
						$exam_course = $selEx['cou_id'];
						$selExmne = $conn->query("SELECT * FROM examinee_tbl et  WHERE exmne_course='$exam_course'  ");
					}
			?>
			<div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div><b>Calificaciones</b></div>
                    </div>
                </div>
			</div> 
			<div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">EXAMENES
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                                <th class="text-left pl-4">Examen</th>
                                <th class="text-left ">Status</th>
                                <th class="text-left ">Curso</th>
                                <th class="text-left ">Descripci&oacute;n</th>
                                <th class="text-center" width="8%">Opci&oacute;n</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $selExam = $conn->query("SELECT * FROM exam_tbl WHERE cou_id='$course_id' ORDER BY ex_id DESC ");
                                if($selExam->rowCount() > 0)
                                {
                                    while ($selExamRow = $selExam->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                            <td class="pl-4"><?php echo $selExamRow['ex_title']; ?></td>
											<?php
											$examid = $selExamRow['ex_id'];
											$selActE = $conn->query("SELECT * FROM topic_cou WHERE cou_id='$course_id' AND acti_tipes = 8 AND valor='$examid'");
											$selActERow = $selActE->fetch(PDO::FETCH_ASSOC);
											if($selActE->rowCount() > 0){
												$stratus = "Examen enlazado";$style = "background-color: green;color:white";}
											else{$stratus = "Examen no enlazado";$style = "background-color: yellow;";}
											?>
											<td class="pl-4" style="<?=$style?>">
												<?=$stratus?>
											</td>
                                            <td>
                                                <?php 
                                                    $courseId =  $selExamRow['cou_id']; 
                                                    $selCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id='$courseId' ");
                                                    while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) {
                                                        echo $selCourseRow['cou_name'];
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo $selExamRow['ex_description']; ?></td>
                                            <td class="text-center">
                                             <a href="?page=ranking-exam&exam_id=<?php echo $selExamRow['ex_id']; ?>"  class="btn btn-success btn-sm">Ver</a>
                                            </td>
                                        </tr>

                                    <?php }
                                }
                                else
                                { ?>
                                    <tr>
                                      <td colspan="5">
                                        <h3 class="p-3">No hay examenes</h3>
                                      </td>
                                    </tr>
                                <?php }
                               ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                   <?php
                }
                else{ 
				?>
                <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div><b>Calificaciones</b></div>
                    </div>
                </div>
                </div> 

                 <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Cursos
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                                <th class="text-left ">Curso</th>
                                <th class="text-center" width="8%">Opci&oacute;n</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $selExam = $conn->query("SELECT * FROM course_tbl ");
                                if($selExam->rowCount() > 0)
                                {
                                    while ($selExamRow = $selExam->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                            <td class="pl-4"><?php echo $selExamRow['cou_name']; ?></td>
                                            <td class="text-center">
                                             <a href="?page=ranking-course&course_id=<?php echo $selExamRow['cou_id']; ?>"  class="btn btn-success btn-sm">Ver</a>
                                            </td>
                                        </tr>

                                    <?php }
                                }
                                else
                                { ?>
                                    <tr>
                                      <td colspan="5">
                                        <h3 class="p-3">No hay examenes</h3>
                                      </td>
                                    </tr>
                                <?php }
                               ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>   
                    
                <?php }

             ?>      
            
            
      
        
</div>
         


















