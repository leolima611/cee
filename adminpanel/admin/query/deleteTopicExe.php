<?php 
 include("../../../conn.php");

extract($_POST);
$ban = 0;

$delTopic = $conn->query("DELETE FROM topic_cou WHERE idtopic_cou='$id'  ");
if($delTopic)
{
	$delrelTopic = $conn->query("DELETE FROM rel_topic WHERE idtopic='$id'  ");
	if($delrelTopic)
	{
		$res = array("res" => "success");
	}
	else
	{
		$res = array("res" => "failed");
	}
}
else
{
	$res = array("res" => "failed");
}


	echo json_encode($res);
 ?>