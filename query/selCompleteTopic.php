<?php 
 session_start();
 include("../conn.php");
$exmneId = $_SESSION['examineeSession']['exmne_id'];
 

extract($_POST);

$selTopiComplete = $conn->query("INSERT INTO `rel_topic` (`idrel_topic`, `idtopic`, `exmne_id`, `cou_id`, `fecha`) VALUES (NULL, '$thisIdt', '$thisIde', '$thisIdc', current_timestamp())");

if($selTopiComplete){
	$infotopic = $conn->query("SELECT * FROM topic_cou WHERE idtopic_cou='$thisIdt' ")->fetch(PDO::FETCH_ASSOC);
	$selTopics = $conn->query("SELECT * FROM `topic_cou` WHERE activity_num > ".$infotopic['activity_num']." AND cou_id = '$thisIdc' limit 1;");

	if($selTopics->rowCount() > 0){
		$infoselt = $selTopics->fetch(PDO::FETCH_ASSOC);
		$topicSig = $infoselt['idtopic_cou'];
		$res = array("res" => "registrado", "topico" => "$topicSig");
	}else{
		$res = array("res" => "registrado", "topico" => "a");
	}
}
else{
 	$res = array("res" => "error");
 }


 echo json_encode($res);
 ?>