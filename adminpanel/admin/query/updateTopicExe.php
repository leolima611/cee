<?php
include("../../../conn.php");
extract($_POST);


if($tipeAc == 1){
	$updCourse = $conn->query("UPDATE topic_cou SET `name` = '$name', `activity_num` = '$num'  WHERE idtopic_cou = $topicid;");
}
elseif($tipeAc == 2){
	$updCourse = $conn->query("UPDATE topic_cou SET `name` = '$name', `activity_num` = '$num'  WHERE idtopic_cou = $topicid;");
}
elseif($tipeAc == 3){
	$updCourse = $conn->query("UPDATE topic_cou SET `name` = '$name', `activity_num` = '$num', `valor` = '$link'  WHERE idtopic_cou = $topicid;");
}
elseif($tipeAc == 4){
	$updCourse = $conn->query("UPDATE topic_cou SET `name` = '$name', `activity_num` = '$num', `valor` = '$link'  WHERE idtopic_cou = $topicid;");
}
elseif($tipeAc == 7){
	$updCourse = $conn->query("UPDATE topic_cou SET `name` = '$name', `activity_num` = '$num', `valor` = '$link', `config` = '$config'  WHERE idtopic_cou = $topicid;");
}


if($updCourse)
{
	   $res = array("res" => "success");
}
else
{
	   $res = array("res" => "failed");
}



 echo json_encode($res);	
?>