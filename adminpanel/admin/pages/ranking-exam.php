<div class="app-main__outer">
        <div class="app-main__inner">
             

            <?php 
                @$exam_id = $_GET['exam_id'];


                if($exam_id != "")
                {
                   $selEx = $conn->query("SELECT * FROM exam_tbl WHERE ex_id='$exam_id' ")->fetch(PDO::FETCH_ASSOC);
                   $exam_course = $selEx['cou_id'];

                   

                   $selExmne = $conn->query("SELECT * FROM examinee_tbl et  WHERE exmne_course='$exam_course'  ");


                   ?>
                   <div class="app-page-title">
                    <div class="page-title-wrapper">
                        <div class="page-title-heading">
                            <div><b class="text-primary">EVALUACIONES</b><br>
                               <?php echo $selEx['ex_title']; ?><br><br>
                               <span class="border" style="padding:10px;color:black;background-color: yellow;">Excelente</span>
                               <span class="border" style="padding:10px;color:white;background-color: green;">Muy Bien</span>
                               <span class="border" style="padding:10px;color:white;background-color: blue;">Bien</span>
                               <span class="border" style="padding:10px;color:white;background-color: red;">Mal</span>
                               <span class="border" style="padding:10px;color:black;background-color: #E9ECEE;">No Respond&iacute;o</span>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                          <tbody>
                            <thead>
                                <tr>
                                    <th width="25%">Nombre</th>
									<th>Avance en curso</th>
                                    <th>Status</th>
                                    <th>Calificacion</th>
									<th>Administrar</th>
                                </tr>
                            </thead>
                            <?php 
                                while ($selExmneRow = $selExmne->fetch(PDO::FETCH_ASSOC)) {
									$exmneId = $selExmneRow['exmne_id'];
									
                                    $selAttempt = $conn->query("SELECT * FROM exam_attempt WHERE exmne_id='$exmneId' AND exam_id='$exam_id' ");
									
									if($selAttempt->rowCount() > 0){
										
										$totalans = $conn->query("SELECT COUNT(*) AS total FROM exam_answers WHERE axmne_id = '$exmneId' and exam_id = '$exam_id';")->fetch(PDO::FETCH_ASSOC);
										$Cortotalans = $conn->query("SELECT COUNT(*) AS total FROM exam_answers WHERE axmne_id = '$exmneId' and exam_id = '$exam_id' and tipea = \"si\";")->fetch(PDO::FETCH_ASSOC);
										$inctotalans = $conn->query("SELECT COUNT(*) AS total FROM exam_answers WHERE axmne_id = '$exmneId' and exam_id = '$exam_id' and tipea = \"no\";")->fetch(PDO::FETCH_ASSOC);
										
										if(($inctotalans['total']+$Cortotalans['total']) == $totalans['total']){
											$ans = (100/$totalans['total'])*$Cortotalans['total'];
										}else{
											$ans = "pre";
										}
									}
									
							  ?>
                                       <tr style="<?php 
                                             if($selAttempt->rowCount() == 0)
                                             {
                                                echo "background-color: #E9ECEE;color:black";
                                             }
											 else if($ans == "pre"){
                                                echo "background-color: orange;color:white";
                                             }
                                             else if($ans >= 90)
                                             {
                                                echo "background-color: yellow;";
                                             } 
                                             else if($ans >= 80){
                                                echo "background-color: green;color:white";
                                             }
                                             else if($ans >= 75){
                                                echo "background-color: blue;color:white";
                                             }
                                             else
                                             {
                                                echo "background-color: red;color:white";
                                             }
                                             ?>"
                                        >
                                        <td>

                                          <?php echo $selExmneRow['exmne_fullname']; ?>
										   </td>
										   <td>

                                          <?php
											$Tact = $conn->query("SELECT COUNT(*) AS total FROM topic_cou WHERE cou_id = '$exam_course';")->fetch(PDO::FETCH_ASSOC);
											$Tactrel = $conn->query("SELECT COUNT(*) AS total FROM rel_topic WHERE cou_id = '$exam_course' AND exmne_id = '$exmneId';")->fetch(PDO::FETCH_ASSOC);

											$porce = (100/$Tact['total'])*$Tactrel['total'];
											?>
                                          <?=$porce;?>%
										   </td>
                                        
                                        <td >
											
										
                                        <?php 
                                          if($selAttempt->rowCount() == 0)
                                          {
                                            echo "No respond&iacute;o";
                                          }
                                          else
                                          {
											  if(($inctotalans['total']+$Cortotalans['total']) == $totalans['total']){
												  echo "calificado";
											  }else{
												  echo "no calificado";
											  }
                                          }

                                            
                                            

                                         ?>
                                        </td>
                                        <td>
                                          <?php 
                                                if($selAttempt->rowCount() == 0)
                                                {
                                                  echo "Sin calificacion";
                                                }
                                                else
                                                {
													if(($inctotalans['total']+$Cortotalans['total']) == $totalans['total']){
														$ans = (100/$totalans['total'])*$Cortotalans['total'];
														echo $ans;
													}else{
														$ans = (100/$totalans['total'])*$Cortotalans['total'];
														echo "preliminar: ".$ans;
													}
                                                }
                                          ?>
											
                                        </td>
										<td>
											<?php 
                                                if($selAttempt->rowCount()>0)
                                                {
                                          	?>
											<a href="home.php?page=result&ide=<?=$exam_id?>&ida=<?=$exmneId?>" type="button" class="btn btn-primary btn-sm">Administrar</a>
											<?php 
                                                }
                                           
                                          ?>
                                        </td>
                                    </tr>
                                <?php }
                             ?>                              
                          </tbody>
                        </table>
                    </div>



                   <?php
                }
             ?>         
</div>
         


















