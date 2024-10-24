<?php 
session_start();
include("../conn.php");
$exmneId = $_SESSION['examineeSession']['exmne_id'];
 

extract($_POST);

 $selTopiAttmpt = $conn->query("SELECT * FROM topic_cou WHERE cou_id='$thisCou' AND activity_num<'$thisAct' ORDER by activity_num DESC LIMIT 1;");

 if($selTopiAttmpt->rowCount() > 0)
 {
	 while ($selTopicRow = $selTopiAttmpt->fetch(PDO::FETCH_ASSOC)) {
		 $revTopic = $selTopicRow['idtopic_cou'];
		 $selTopicRev = $conn->query("SELECT * FROM rel_topic WHERE exmne_id='$exmneId' AND idtopic='$revTopic' ");
		 if($selTopicRev->rowCount() > 0){
			 $res = array("res" => "takeNow");
		 }else{
			 $res = array("res" => "noList", "msg" => $thisId);
		 }
	 }
 }
 else
 {
 	$res = array("res" => "takeNow");
 }


 echo json_encode($res);
 ?>