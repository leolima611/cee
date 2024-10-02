<?php 
 include("../../../conn.php");


extract($_POST);

$selExamineeFullname = $conn->query("SELECT * FROM admin_acc WHERE name='$namem' and apellidos='$apellidos'");
$selExamineeEmail = $conn->query("SELECT * FROM admin_acc WHERE admin_user='$emailA' ");



if($selExamineeFullname->rowCount() > 0)
{
	$res = array("res" => "fullnameExist", "msg" => $namem);
}
else if($selExamineeEmail->rowCount() > 0)
{
	$res = array("res" => "emailExist", "msg" => $emailA);
}
else if($role == "0")
{
	$res = array("res" => "norole");
}
else
{
	$insData = $conn->query("INSERT INTO admin_acc(name,apellidos,admin_user,admin_pass,role_id) VALUES('$namem','$apellidos','$emailA','$passwordA','$role')  ");
	if($insData)
	{
		$res = array("res" => "success", "msg" => $emailA);
	}
	else
	{
		$res = array("res" => "failed");
	}
}


echo json_encode($res);
 ?>