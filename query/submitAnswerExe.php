<?php
 session_start(); 
 include("../conn.php");
 extract($_POST);

 $exmne_id = $_SESSION['examineeSession']['exmne_id'];

$selExAttempt = $conn->query("SELECT * FROM exam_attempt WHERE exmne_id='$exmne_id' AND exam_id='$exam_id'  ");
$selAns = $conn->query("SELECT * FROM exam_answers WHERE axmne_id='$exmne_id' AND exam_id='$exam_id' ");


if($selExAttempt->rowCount() > 0){
	$res = array("res" => "alreadyTaken");
}
/*else if($selAns->rowCount() > 0){
	$updLastAns = $conn->query("UPDATE exam_answers SET exans_status='old' WHERE axmne_id='$exmne_id' AND exam_id='$exam_id'  ");
	if($updLastAns)
	{
		foreach ($_REQUEST['answer'] as $key => $value) {
			 $value = $value['correct'];
		  	 $insAns = $conn->query("INSERT INTO exam_answers(axmne_id,exam_id,quest_id,exans_answer) VALUES('$exmne_id','$exam_id','$key','$value')");
		}
		if($insAns)
		{
			 $insAttempt = $conn->query("INSERT INTO exam_attempt(exmne_id,exam_id)  VALUES('$exmne_id','$exam_id') ");
			 if($insAttempt)
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
	}
}*/
else{
	foreach ($_REQUEST['answer'] as $key => $value) {
		if (is_array($value['correct'])) {
			// Si 'correct' es un array, iterar a través de cada respuesta
			foreach ($value['correct'] as $correctAns) {
				$insAns = $conn->query("
				INSERT INTO `exam_answers` (`exans_id`, `axmne_id`, `exam_id`, `quest_id`, `exans_answer`, `exans_status`, `exans_created`) 
				VALUES (NULL, '$exmne_id', '$exam_id', '$key', '$correctAns', 'new', current_timestamp());
				");
				if (!$insAns) {
					$res = array("res" => "failed");
					break 2; // Romper ambos bucles en caso de error
				}
			}
		} else {
			// Si 'correct' no es un array, insertar directamente
			$correctAns = $value['correct'];
			$insAns = $conn->query("
			INSERT INTO `exam_answers` (`exans_id`, `axmne_id`, `exam_id`, `quest_id`, `exans_answer`, `exans_status`, `exans_created`) 
			VALUES (NULL, '$exmne_id', '$exam_id', '$key', '$correctAns', 'new', current_timestamp());
			");
			if (!$insAns) {
				$res = array("res" => "failed");
				break; // Romper bucle en caso de error
			}
		}
	}

	if (isset($insAns) && $insAns) {
		$insAttempt = $conn->query("INSERT INTO exam_attempt (exmne_id, exam_id) VALUES ('$exmne_id', '$exam_id')");
		if ($insAttempt) {
			$res = array("res" => "success");
		} else {
			$res = array("res" => "failed");
		}
	} else {
		$res = array("res" => "failed");
	}

}


 echo json_encode($res);
 ?>


 