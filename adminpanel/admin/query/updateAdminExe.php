<?php
include("../../../conn.php");
extract($_POST);

if($exRole == "0"){
	$res = array("res" => "norole");
}else{
	$updadmin = $conn->query("UPDATE admin_acc SET name='$name', apellidos='$apellidos', admin_user='$exEmail', admin_pass='$exPass', role_id='$exRole' WHERE admin_id='$admin_id' ");
	
	if($updadmin){
		$res = array("res" => "success", "name" => $name);
	}else{
		$res = array("res" => "failed");
	}
}

 echo json_encode($res);	
?>