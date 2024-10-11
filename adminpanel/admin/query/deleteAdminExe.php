<?php 
 include("../../../conn.php");


extract($_POST);

$delAdmin = $conn->query("DELETE  FROM admin_acc WHERE admin_id='$id'  ");
if($delAdmin)
{
	$res = array("res" => "success");
}
else
{
	$res = array("res" => "failed");
}


	echo json_encode($res);
 ?>