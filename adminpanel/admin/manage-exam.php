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
<!-- HEADER -->
<?php include("includes/header.php"); ?>      

<!-- UI THEME  -->
<?php include("includes/ui-theme.php"); ?>

<div class="app-main">
<!-- sidebar   -->
<?php include("includes/sidebar.php"); ?>


<?php 
   $exId = $_GET['id'];

   $selExam = $conn->query("SELECT * FROM exam_tbl WHERE ex_id='$exId' ");
   $selExamRow = $selExam->fetch(PDO::FETCH_ASSOC);

   $courseId = $selExamRow['cou_id'];
   $selCourse = $conn->query("SELECT cou_name as courseName FROM course_tbl WHERE cou_id='$courseId' ")->fetch(PDO::FETCH_ASSOC);
 ?>


<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                     <div class="page-title-heading">
                        <div> MANEJO DE EXMANES
                            <div class="page-title-subheading">
                              Agregar Preguntas  al Examen <?php echo $selExamRow['ex_title']; ?>
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
                            <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Informaci&oacute;n del Examen
                          </div>
                          <div class="card-body">
                           <form method="post" id="updateExamFrm">
                               <div class="form-group">
                                <label>Curso</label>
                                <select class="form-control" name="courseId" required="">
                                  <option value="<?php echo $selExamRow['cou_id']; ?>"><?php echo $selCourse['courseName']; ?></option>
                                  <?php 
                                    $selAllCourse = $conn->query("SELECT * FROM course_tbl ORDER BY cou_id DESC");
                                    while ($selAllCourseRow = $selAllCourse->fetch(PDO::FETCH_ASSOC)) { ?>
                                      <option value="<?php echo $selAllCourseRow['cou_id']; ?>"><?php echo $selAllCourseRow['cou_name']; ?></option>
                                    <?php }
                                   ?>
                                </select>
                              </div>

                              <div class="form-group">
                                <label>Examen</label>
                                <input type="hidden" name="examId" value="<?php echo $selExamRow['ex_id']; ?>">
                                <input type="" name="examTitle" class="form-control" required="" value="<?php echo $selExamRow['ex_title']; ?>">
                              </div>  

                              <div class="form-group">
                                <label>Descripci&oacute;n del Examen</label>
                                <input type="" name="examDesc" class="form-control" required="" value="<?php echo $selExamRow['ex_description']; ?>">
                              </div>  

                              <div class="form-group">
                                <label>Tiempo L&iacute;mite</label>
                                <select class="form-control" name="examLimit" required="">
                                  <option value="<?php echo $selExamRow['ex_time_limit']; ?>"><?php echo $selExamRow['ex_time_limit']; ?> Minutos</option>
                                  <option value="10">10 Minutos</option> 
                                  <option value="20">20 Minutos</option> 
                                  <option value="30">30 Minutos</option> 
                                  <option value="40">40 Minutos</option> 
                                  <option value="50">50 Minutos</option> 
                                  <option value="60">60 Minutos</option> 
                                </select>
                              </div>

							  <div class="form-group">
                                <label>Tipo de Examen</label>
                                <select class="form-control" name="tipeExam" required="">
									<?php 
									$tipeId =  $selExamRow['id_tipe']; 
                                    $selCourse = $conn->query("SELECT * FROM exam_tipe WHERE id_tipe='$tipeId' ");
                                    while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) {?>
                                    	<option value="<?php echo $selCourseRow['id_tipe']; ?>"><?php echo $selCourseRow['tipo']; ?></option>
									<?php
									}
                                    ?>
                                  <?php 
                                    $selAllCourse = $conn->query("SELECT * FROM exam_tipe ORDER BY id_tipe DESC");
                                    while ($selAllCourseRow = $selAllCourse->fetch(PDO::FETCH_ASSOC)) { ?>
                                      <option value="<?php echo $selAllCourseRow['id_tipe']; ?>"><?php echo $selAllCourseRow['tipo']; ?></option>
                                    <?php 
									}
                                   ?>
								</select>
                              </div>
								  
                              <div class="form-group" align="right">
                                <button type="submit" class="btn btn-primary btn-lg">Actualizar</button>
                              </div> 
                           </form>                           
                          </div>
                      </div>
                   
                  </div>
                  <div class="col-md-6">
                    <?php 
                        $selQuest = $conn->query("SELECT * FROM exam_question_tbl WHERE exam_id='$exId' ORDER BY eqt_id desc");
                    ?>
                     <div class="main-card mb-3 card">
                          <div class="card-header"><i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>PREGUNTAS DE EXAMEN
                            <span class="badge badge-pill badge-primary ml-2">
                              <?php echo $selQuest->rowCount(); ?>
                            </span>
                             <div class="btn-actions-pane-right">
                                <button class="btn btn-sm btn-primary " data-toggle="modal" data-target="#modalForAddQuestion">Agregar</button>
                              </div>
                          </div>
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
                                            <th class="text-left pl-1">Preguntas</th>
                                            <th class="text-center" width="20%">Opciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                            
                                            if($selQuest->rowCount() > 0)
                                            {
                                               $i = 1;
                                               while ($selQuestionRow = $selQuest->fetch(PDO::FETCH_ASSOC)) { ?>
                                                <tr>
                                                        <td >
                                                            <b><?php echo $i++ ; ?> .) <?php echo $selQuestionRow['exam_question']; ?></b><br>
                                                            <?php 
                                                              // Choice A
                                                              if($selQuestionRow['exam_ch1'] == $selQuestionRow['exam_answer'])
                                                              { ?>
                                                                <span class="pl-4 text-success">A - <?php echo  $selQuestionRow['exam_ch1']; ?></span><br>
                                                              <?php }
                                                              else
                                                              { ?>
                                                                <span class="pl-4">A - <?php echo $selQuestionRow['exam_ch1']; ?></span><br>
                                                              <?php }

                                                              // Choice B
                                                              if($selQuestionRow['exam_ch2'] == $selQuestionRow['exam_answer'])
                                                              { ?>
                                                                <span class="pl-4 text-success">B - <?php echo $selQuestionRow['exam_ch2']; ?></span><br>
                                                              <?php }
                                                              else
                                                              { ?>
                                                                <span class="pl-4">B - <?php echo $selQuestionRow['exam_ch2']; ?></span><br>
                                                              <?php }

                                                              // Choice C
                                                              if($selQuestionRow['exam_ch3'] == $selQuestionRow['exam_answer'])
                                                              { ?>
                                                                <span class="pl-4 text-success">C - <?php echo $selQuestionRow['exam_ch3']; ?></span><br>
                                                              <?php }
                                                              else
                                                              { ?>
                                                                <span class="pl-4">C - <?php echo $selQuestionRow['exam_ch3']; ?></span><br>
                                                              <?php }

                                                              // Choice D
                                                              if($selQuestionRow['exam_ch4'] == $selQuestionRow['exam_answer'])
                                                              { ?>
                                                                <span class="pl-4 text-success">D - <?php echo $selQuestionRow['exam_ch4']; ?></span><br>
                                                              <?php }
                                                              else
                                                              { ?>
                                                                <span class="pl-4">D - <?php echo $selQuestionRow['exam_ch4']; ?></span><br>
                                                              <?php }

                                                             ?>
                                                            
                                                        </td>
                                                        <td class="text-center">
                                                         <a rel="facebox" href="facebox_modal/updateQuestion.php?id=<?php echo $selQuestionRow['eqt_id']; ?>" class="btn btn-sm btn-primary">Actualizar</a>
                                                         <button type="button" id="deleteQuestion" data-id='<?php echo $selQuestionRow['eqt_id']; ?>'  class="btn btn-danger btn-sm">Eliminar</button>
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
                                  <h4 class="text-primary">NO HAY PREGUNTAS</h4>
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
      
        

<!-- MAO NI IYA FOOTER -->
<?php include("includes/footer.php"); ?>

<?php include("includes/modals.php"); ?>
