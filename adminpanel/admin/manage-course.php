<?php 
include("../../conn.php");
session_start();

if(!isset($_SESSION['admin']['adminnakalogin']) == true) header("location:index.php");


$admin_idn =  $_SESSION['admin']['admin_id'];

//recoleccion de datos del admin
$selAcc = $conn->query("SELECT * FROM admin_acc WHERE admin_id=$admin_idn;  ");
$selAccRow = $selAcc->fetch(PDO::FETCH_ASSOC);


if($selAcc->rowCount() > 0){
	switch ($selAccRow['role_id'])	{
		case 1:
			$role = "Administrador";
			break;
		case 2:
			$role = "Experto";
			break;
	}
  $datosAd = array(
  	 'admin_id' => $admin_idn,
  	 'name' => $selAccRow['name'],
	 'lastn' => $selAccRow['apellidos'],
	 'role' => $selAccRow['role_id'],
	  'rolename' => $role
  );
  $res = array("res" => "success");

}

 ?>
<?php include("../../conn.php"); ?>
<!-- MAO NI ANG HEADER -->
<?php include("includes/header.php"); ?>      

<!-- UI THEME DIRI -->
<?php include("includes/ui-theme.php"); ?>

<div class="app-main">
<!-- sidebar diri  -->
<?php include("includes/sidebar.php"); ?>


<?php 
   $exId = $_GET['id'];

   $selExam = $conn->query("SELECT * FROM course_tbl WHERE cou_id='$exId' ");
   $selExamRow = $selExam->fetch(PDO::FETCH_ASSOC);

   /*$courseId = $selExamRow['cou_id'];
   $selCourse = $conn->query("SELECT cou_name as courseName FROM course_tbl WHERE cou_id='$courseId' ")->fetch(PDO::FETCH_ASSOC);*/
 ?>

<style>
#chartdona {
  width: 100%;
  height: 300px;
}
</style>

<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>	
	
<div class="app-main__outer">
	<div class="app-main__inner">
		<div class="app-page-title">
        	<div class="page-title-wrapper">
            	<div class="page-title-heading">
                	<div> MANEJO DE CURSO
                    	<div class="page-title-subheading">
                        	Administra el curso <?php echo $selExamRow['cou_name']; ?>
						</div>
					</div>
				</div>
			</div>
		</div>        
            
		<div class="col-md-12">
            <div id="refreshData">
            	<div class="row">
                  <div class="col-md-6">
                      <div class="main-card mb-3 card">
                          <div class="card-header">
							  <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Informaci&oacute;n del Curso
                          </div>
                          <div class="card-body">
							  <form method="post" id="updateCourseFrm">
								  <div class="form-group">
									  <label>Curso</label>
									  <input type="hidden" name="course_id" value="<?php echo $selExamRow['cou_id']; ?>">
									  <input type="" name="newCourseName" class="form-control" required="" value="<?php echo $selExamRow['cou_name']; ?>">
								  </div>  
								  <div class="form-group">
									  <label>Fecha de creaci&oacute;n:</label>
									  <b><?php echo $selExamRow['cou_created']; ?></b>
								  </div>
								  <div class="form-group" align="right">
									  <button type="submit" class="btn btn-primary btn-lg">Actualizar</button>
								  </div> 
							  </form>                           
						  </div>
						  <div class="card-body">
							  <script>
								am5.ready(function() {

								// Create root element
								// https://www.amcharts.com/docs/v5/getting-started/#Root_element
								var root = am5.Root.new("chartdona");

								// Set themes
								// https://www.amcharts.com/docs/v5/concepts/themes/
								root.setThemes([
								  am5themes_Animated.new(root)
								]);

								// Create chart
								// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
								var chart = root.container.children.push(am5percent.PieChart.new(root, {
								  radius: am5.percent(90),
								  innerRadius: am5.percent(50),
								  layout: root.horizontalLayout
								}));

								// Create series
								// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
								var series = chart.series.push(am5percent.PieSeries.new(root, {
								  name: "Series",
								  valueField: "totala",
								  categoryField: "tipo"
								}));

								// Set data
								// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
								series.data.setAll([
									<?php 
									$selGrafic3 = $conn->query("SELECT * FROM acti_tipes ");
									if($selGrafic3->rowCount() > 0){
										while ($selGrafic3row = $selGrafic3->fetch(PDO::FETCH_ASSOC)) {
											$selGrafic = $conn->query("SELECT COUNT(*) AS total FROM topic_cou WHERE cou_id = '$exId' AND acti_tipes = ".$selGrafic3row['idacti_tipes']." ;")->fetch(PDO::FETCH_ASSOC);
											
											$valueg3 = "{tipo: \"".$selGrafic3row['tipo']."\", totala: ".$selGrafic['total']."},";
											echo ($valueg3);

										}
									} 
									?>
									]);

								// Disabling labels and ticks
								series.labels.template.set("visible", false);
								series.ticks.template.set("visible", false);

								// Adding gradients
								series.slices.template.set("strokeOpacity", 0);
								series.slices.template.set("fillGradient", am5.RadialGradient.new(root, {
								  stops: [{
									brighten: -0.8
								  }, {
									brighten: -0.8
								  }, {
									brighten: -0.5
								  }, {
									brighten: 0
								  }, {
									brighten: -0.5
								  }]
								}));

								// Create legend
								// https://www.amcharts.com/docs/v5/charts/percent-charts/legend-percent-series/
								var legend = chart.children.push(am5.Legend.new(root, {
								  centerY: am5.percent(50),
								  y: am5.percent(50),
								  layout: root.verticalLayout
								}));
								// set value labels align to right
								legend.valueLabels.template.setAll({ textAlign: "right" })
								// set width and max width of labels
								legend.labels.template.setAll({ 
								  maxWidth: 140,
								  width: 140,
								  oversizedBehavior: "wrap"
								});

								legend.data.setAll(series.dataItems);


								// Play initial series animation
								// https://www.amcharts.com/docs/v5/concepts/animations/#Animation_of_series
								series.appear(1000, 100);

								}); // end am5.ready()
								</script>
							  <div class="tab-content">
								  <div class="tab-pane fade show active" id="tabs-eg-77">
									  <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
										  <div class="widget-chat-wrapper-outer">
											  <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
												  Actividades en el curso
												  <div id="chartdona"></div>
											  </div>
										  </div>
									  </div>
								  </div>
							  </div>
							  <div class="row">
								  
								  <div class="col-md-6 col-xl-4">
									  <div class="card mb-3 widget-content bg-midnight-bloom">
										  <div class="widget-content-wrapper text-white">
											  <div class="widget-content-left">
												  <div class="widget-heading">Total alumnos</div>
												  <div class="widget-subheading" style="color:transparent;">.</div>
											  </div>
											  <div class="widget-content-right">
												  <div class="widget-numbers text-white">
													  <span>
														  <?php
														  $totalum = $conn->query("SELECT COUNT(*) AS total FROM examinee_tbl WHERE exmne_course = '$exId';")->fetch(PDO::FETCH_ASSOC);
														  echo $totalum['total']; 
														  ?>
													  </span>
												  </div>
											  </div>
										  </div>
									  </div>
								  </div>
								  <div class="col-md-6 col-xl-4">
									  <div class="card mb-3 widget-content bg-malibu-beach">
										  <div class="widget-content-wrapper text-white">
											  <div class="widget-content-left">
												  <div class="widget-heading ">Examenes</div>
												  <div class="widget-subheading" style="color:transparent;">.</div>
											  </div>
											  <div class="widget-content-right">
												  <div class="widget-numbers text-white">
													  <span>
														  <?php
														  $totaexa = $conn->query("SELECT COUNT(*) AS total FROM exam_tbl WHERE cou_id = '$exId';")->fetch(PDO::FETCH_ASSOC);
														  echo $totaexa['total']; 
														  ?>
													  </span>
												  </div>
											  </div>
										  </div>
									  </div>
								  </div>
								  <div class="col-md-6 col-xl-4">
									  <div class="card mb-3 widget-content bg-tempting-azure">
										  <div class="widget-content-wrapper text-white">
											  <div class="widget-content-left">
												  <div class="widget-heading text-black-50">Total Actividades</div>
												  <div class="widget-subheading" style="color:transparent;">.</div>
											  </div>
											  <div class="widget-content-right">
												  <div class="widget-numbers text-black-50">
													  <span>
														  <?php
														  $totaact = $conn->query("SELECT COUNT(*) AS total FROM topic_cou WHERE cou_id = '$exId';")->fetch(PDO::FETCH_ASSOC);
														  echo $totaact['total']; 
														  ?>
													  </span>
												  </div>
											  </div>
										  </div>
									  </div>
								  </div>
							  </div>
						  </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                    <?php 
                        $selQuest = $conn->query("SELECT * FROM topic_cou WHERE cou_id='$exId' ORDER BY activity_num asc");
                    ?>
                     <div class="main-card mb-3 card">
                          <div class="card-header"><i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Temas y Actividades
                            <span class="badge badge-pill badge-primary ml-2">
                              <?php echo $selQuest->rowCount(); ?>
                            </span>
                          </div>
						<?php
						 $couid = $selExamRow['cou_id'];
						 $comp = $conn->query("SELECT * FROM `topic_cou` WHERE cou_id = '$couid' ORDER BY activity_num DESC LIMIT 1")->fetch(PDO::FETCH_ASSOC);
						 $bane = 0;	
						 if(isset($comp['acti_tipes']) && $comp['acti_tipes'] == 8){
							 $infoEa = $conn->query("SELECT * FROM `exam_tbl` WHERE ex_id = ".$comp['valor']." ")->fetch(PDO::FETCH_ASSOC);
						 	if($infoEa['id_tipe'] != 3){
								$bane = 1;
							}
						 }else{$bane = 1;}
						 
						 if($bane == 1){
						 ?>
						 <div class="card-header">
                             <div class="btn-actions-pane-left">
                                <button class="btn btn-sm btn-primary " data-toggle="modal" data-target="#modalForAddTopic">Agregar Tema</button>
								 <br>
                              </div>
							 <br>
							 <div class="btn-actions-pane-left">
                                <button class="btn btn-sm btn-primary " data-toggle="modal" data-target="#modalForAddpdf">Agregar PDF</button>
                              </div>
							 <br>
							 <div class="btn-actions-pane-left">
                                <button class="btn btn-sm btn-primary " data-toggle="modal" data-target="#modalForAddLink">Agregar Link</button>
                              </div>
							 <br>
							 <div class="btn-actions-pane-left">
                                <button class="btn btn-sm btn-primary " data-toggle="modal" data-target="#modalForAddYoutube">Agregar Link YouTube</button>
                             </div>
							 <br>
                          </div>
						 <div class="card-header">
							 <div class="btn-actions-pane-left">
                                <button class="btn btn-sm btn-primary " data-toggle="modal" data-target="#modalForAddAud">Agregar audio</button>
                              </div>
							 <br>
                             <div class="btn-actions-pane-left">
                                <button class="btn btn-sm btn-primary " data-toggle="modal" data-target="#modalForAddEmbed">Agregar Embed</button>
								 <br>
                              </div>
							 <br>
							 <div class="btn-actions-pane-left">
                                <button class="btn btn-sm btn-primary " data-toggle="modal" data-target="#modalForAddExamA">Agregar Examen</button>
								 <br>
                              </div>
							 <br>
                          </div>
						 <?php
						 }else{
						 ?>
						 <div class="card-header">
							 Has agregado un el examen final no puedes agreegar mas actividades
						 </div>
						 <?php
						 }
						 ?>
                          <div class="card-body" >
                            <div class="scroll-area-sm" style="min-height: 400px;">
                               <div class="scrollbar-container">

                            <?php 
                               
                               if($selQuest->rowCount() > 0)
                               {  ?>
                                 <div class="table-responsive">
                                    <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                                        <thead>
                                        <tr>
                                            <th class="text-left pl-1">Historia del curso</th>
                                            <th class="text-center" width="20%">Opciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                            
                                            if($selQuest->rowCount() > 0)
                                            {
                                               $i = 1;
                                               while ($selQuestionRow = $selQuest->fetch(PDO::FETCH_ASSOC)) { 
												   switch($selQuestionRow['acti_tipes']){
													   case 1:
														   $hrefac = "facebox_modal/updateTopic.php?ac=1&id=";
														   ?>
													<tr>
                                                        <td >
                                                            <b><?php echo $i++ ; ?> .- <?php echo $selQuestionRow['name']; ?></b>
															<br>
                                                        </td>
															<?php
														   break;
													   case 2:
														   $hrefac = "facebox_modal/updateTopic.php?ac=2&id=";
														   ?>
													<tr>
                                                        <td >
															
                                                            <b><?php echo $i++ ; ?> .- <?php echo $selQuestionRow['name']; ?> PDF</b>
															<br>
                                                                <span class="pl-4"> <?php echo $selQuestionRow['valor']; ?></span>
															<br>
                                                        </td>
															<?php
														   break;
													   case 3:
														   $hrefac = "facebox_modal/updateTopic.php?ac=3&id=";
														   ?>
													<tr>
                                                        <td >
															
                                                            <b><?php echo $i++ ; ?> .- <?php echo $selQuestionRow['name']; ?> LINK</b>
															<br>
                                                                <span class="pl-4"> <?php echo $selQuestionRow['valor']; ?></span>
															<br>
                                                        </td>
															<?php
														   break;
														case 4:
														   $hrefac = "facebox_modal/updateTopic.php?ac=4&id=";
														   ?>
													<tr>
                                                        <td >
															
                                                            <b><?php echo $i++ ; ?> .- <?php echo $selQuestionRow['name']; ?> YOUTUBE LINK</b>
															<br>
                                                                <span class="pl-4"> <?php echo $selQuestionRow['valor']; ?></span>
															<br>
                                                        </td>
															<?php
														   break;
													   case 5:
														   $hrefac = "facebox_modal/updateTopic.php?ac=5&id=";
														   ?>
													<tr>
                                                        <td >
															
                                                            <b><?php echo $i++ ; ?> .- <?php echo $selQuestionRow['name']; ?> AUDIO</b>
															<br>
                                                                <span class="pl-4"> <?php echo $selQuestionRow['valor']; ?></span>
															<br>
                                                        </td>
															<?php
														   break;
														case 7:
														   $hrefac = "facebox_modal/updateTopic.php?ac=7&id=";
														   ?>
													<tr>
                                                        <td >
															
                                                            <b><?php echo $i++ ; ?> .- <?php echo $selQuestionRow['name']; ?> EMBED</b>
															<br>
                                                                <span class="pl-4"> <?php echo $selQuestionRow['valor']; ?></span>
															<br>
															<br>
                                                                <span class="pl-4">Config: <?php echo $selQuestionRow['config']; ?></span>
															<br>
                                                        </td>
															<?php
														   break;
														case 8:
														    $hrefac = "facebox_modal/updateTopic.php?ac=8&id=";
														   ?>
													<tr>
                                                        <td >
															
                                                            <b><?php echo $i++ ; ?> .- <?php echo $selQuestionRow['name']; ?> EXAMEN</b>
															<br>
                                                                <span class="pl-4"> <?php echo $selQuestionRow['valor']; ?></span>
															<br>
                                                        </td>
															<?php
														   break;
												   }
											?>
													<td class="text-center">
                                                         <a rel="facebox" href="<?php echo $hrefac ?><?php echo $selQuestionRow['idtopic_cou']; ?>" class="btn btn-sm btn-primary">Actualizar</a>
                                                         <button type="button" id="deleteTopic" data-id='<?php echo $selQuestionRow['idtopic_cou']; ?>'  class="btn btn-danger btn-sm">Eliminar</button>
                                                     </td>
                                                    </tr>
                                               <?php }
                                            }
                                            else
                                            { ?>
                                                <tr>
                                                  <td colspan="2">
                                                    <h3 class="p-3">No Hay Cursos</h3>
                                                  </td>
                                                </tr>
                                            <?php }
                                           ?>
                                        </tbody>
                                    </table>
                                </div>
                               <?php }
                               else
                               { ?>
                                  <h4 class="text-primary">NO HAY TEMAS NI ACTIVIDADES</h4>
                                 <?php
                               }
                             ?>
                               </div>
                            </div>


                          </div>
                        
                      </div>
                  </div>
              </div>  
            </div> 
		</div>           
	</div>
</div>      
        

<!-- MAO NI IYA FOOTER -->
<?php include("includes/footer.php"); ?>

<?php include("includes/modals.php"); ?>
