<?php 
 session_start();
 include("../conn.php");
$exmneId = $_SESSION['examineeSession']['exmne_id'];
 
extract($_POST);

$selExamAttmpt = $conn->query("SELECT * FROM exam_attempt WHERE exmne_id='$exmneId' AND exam_id='$thisId' ");
$selExam = $conn->query("SELECT * FROM exam_tbl WHERE ex_id='$thisId' ")->fetch(PDO::FETCH_ASSOC);
$selExamTopic = $conn->query("SELECT * FROM topic_cou WHERE cou_id=".$selExam['cou_id']." AND acti_tipes = 8 AND valor ='$thisId'");

if($selExamAttmpt->rowCount() > 0){
	$res = array("res" => "alreadyExam", "msg" => $thisId);
}
elseif($selExamTopic->rowCount() <= 0){
	$res = array("res" => "error", "msg" => "Este examen no ha sido activado");
}
elseif($selExamTopic->rowCount() > 0){
	$ExamTopic = $selExamTopic->fetch(PDO::FETCH_ASSOC);
	$selTopiAttmpt = $conn->query("SELECT * FROM topic_cou WHERE cou_id=".$selExam['cou_id']." AND activity_num<".$ExamTopic['activity_num']." ORDER by activity_num DESC LIMIT 1;");

	 if($selTopiAttmpt->rowCount() > 0){
		 while ($selTopicRow = $selTopiAttmpt->fetch(PDO::FETCH_ASSOC)) {
			 $revTopic = $selTopicRow['idtopic_cou'];
			 $selTopicRev = $conn->query("SELECT * FROM rel_topic WHERE exmne_id='$exmneId' AND idtopic='$revTopic' ");
			 if($selTopicRev->rowCount() > 0){
				 $res = array("res" => "takeNow");
			 }else{
				 $res = array("res" => "error", "msg" => "Aun tienes actividades por realizar");
			 }
		 }
	 }
	 else
	 {
		$res = array("res" => "takeNow");
	 }
}
else{
	$res = array("res" => "takeNow");
}


 echo json_encode($res);
 ?>