<?php 
 include("../../../conn.php");

extract($_POST);
$numtemp = $num -1;

$topicnum = $conn->query("SELECT * FROM topic_cou WHERE activity_num='$num' AND cou_id='$couId' ");
$topicname = $conn->query("SELECT * FROM topic_cou WHERE name='$name' AND cou_id='$couId' ");
$niveltopic = $conn->query("SELECT * FROM `topic_cou` WHERE cou_id = '$couId' AND activity_num = $numtemp;");

if($topicnum->rowCount() > 0)
{
  $res = array("res" => "nivelexist", "msg" => $num);
}
elseif($topicname->rowCount() > 0)
{
	$res = array("res" => "topicexist", "msg" => $name);
}
elseif($num < 1)
{
	$res = array("res" => "nivelce", "msg" => $num);
}
elseif($topicname->rowCount() == 0 && $num >1)
{
	$res = array("res" => "nivelno", "msg" => $num);
}
else
{
	$insQuest = $conn->query("INSERT INTO `topic_cou` (`idtopic_cou`, `cou_id`, `name`, `activity_num`, `valor`, `config`, `acti_tipes`) VALUES (NULL, '$couId', '$name', '$num', NULL, NULL, '$tipeAc')");

	if($insQuest)
	{
       $res = array("res" => "success", "msg" => $name);
	}
	else
	{
       $res = array("res" => "failed");
	}
}



echo json_encode($res);
 ?>