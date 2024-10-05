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
                                <label>Fecha de creacion:</label>
								<b><?php echo $selExamRow['cou_created']; ?></b>
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
                        $selQuest = $conn->query("SELECT * FROM topic_cou WHERE cou_id='$exId' ORDER BY activity_num asc");
                    ?>
                     <div class="main-card mb-3 card">
                          <div class="card-header"><i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Temas y Actividades
                            <span class="badge badge-pill badge-primary ml-2">
                              <?php echo $selQuest->rowCount(); ?>
                            </span>
                          </div>
						 <div class="card-header">
                             <div class="btn-actions-pane-left">
                                <button class="btn btn-sm btn-primary " data-toggle="modal" data-target="#modalForAddTopic">Agregar Tema</button>
                              </div>
							 <div class="btn-actions-pane-left">
                                <button class="btn btn-sm btn-primary " data-toggle="modal" data-target="#modalForAddpdf">Agregar PDF</button>
                              </div>
							 <div class="btn-actions-pane-left">
                                <button class="btn btn-sm btn-primary " data-toggle="modal" data-target="#modalForAddLink">Agregar Link</button>
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
                                            <th class="text-left pl-1">historia del curso</th>
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
      
        

<!-- MAO NI IYA FOOTER -->
<?php include("includes/footer.php"); ?>

<?php include("includes/modals.php"); ?>
