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

<?php include("includes/header.php"); ?>      


<?php include("includes/ui-theme.php"); ?>

<div class="app-main">

<?php include("includes/sidebar.php"); ?>



<?php 
   @$page = $_GET['page'];


   if($page != '')
   {
     if($page == "add-course")
     {
     include("pages/add-course.php");
     }
     else if($page == "manage-course")
     {
     	include("pages/manage-course.php");
     }
     else if($page == "manage-exam")
     {
      include("pages/manage-exam.php");
     }
	 else if($page == "manage-admin")
     {
      include("pages/manage-admin.php");
     }
     else if($page == "manage-examinee")
     {
      include("pages/manage-examinee.php");
     }
     else if($page == "ranking-course")
     {
      include("pages/ranking-course.php");
     }
	 else if($page == "ranking-exam")
     {
      include("pages/ranking-exam.php");
     }
     else if($page == "feedbacks")
     {
      include("pages/feedbacks.php");
     }
     else if($page == "examinee-result")
     {
      include("pages/examinee-result.php");
     }
	 else if($page == "ranking-time")
     {
      include("pages/manage-time.php");
     }
	   else if($page == "manage-files")
     {
      include("pages/manage-files.php");
     }
   }
 
   else
   {
     include("pages/home.php"); 
   }


 ?> 


<?php include("includes/footer.php"); ?>

<?php include("includes/modals.php"); ?>
