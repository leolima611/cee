<?php 
 include("../../../conn.php");


extract($_POST);

$delTopic = $conn->query("DELETE FROM topic_cou WHERE idtopic_cou='$id'  ");
if($delTopic)
{
	$res = array("res" => "success");
}
else
{
	$res = array("res" => "failed");
}


	echo json_encode($res);
 ?>