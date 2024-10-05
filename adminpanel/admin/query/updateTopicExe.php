<?php
 include("../../../conn.php");
 extract($_POST);


$updCourse = $conn->query("UPDATE topic_cou SET `name` = '$name', `activity_num` = '$num'  WHERE idtopic_cou = $topicid;");
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