<?php 
 include("../../../conn.php");

extract($_POST);

if($AnsId == 1){
	$insQuest = $conn->query("INSERT INTO exam_question_tbl(exam_id,exam_question,id_tipeq) VALUES('$examId','$question',1); ");
	if($insQuest){
		$eqt_idr = $conn->lastInsertId(); 
		$var1 = "no";
		$var2 = "no";
		$var3 = "no";
		$var4 = "no";
		if($correctAnswer == 1){
			$var1 = "si";
		}elseif($correctAnswer == 2){
			$var2 = "si";
		}elseif($correctAnswer == 3){
			$var3 = "si";
		}elseif($correctAnswer == 4){
			$var4 = "si";
		}
		$insAns1 = $conn->query("INSERT INTO `question_answers` (`id_qAns`, `answer`, `tipe`, `eqt_id`) VALUES (NULL, '$choice_A', '$var1', '$eqt_idr');
		INSERT INTO `question_answers` (`id_qAns`, `answer`, `tipe`, `eqt_id`) VALUES (NULL, '$choice_B', '$var2', '$eqt_idr');
		INSERT INTO `question_answers` (`id_qAns`, `answer`, `tipe`, `eqt_id`) VALUES (NULL, '$choice_C', '$var3', '$eqt_idr');
		INSERT INTO `question_answers` (`id_qAns`, `answer`, `tipe`, `eqt_id`) VALUES (NULL, '$choice_D', '$var4', '$eqt_idr');");
		
		if($insAns1){
			$res = array("res" => "success", "msg" => $question);
		}
		else{
		   $res = array("res" => "error", "msg" => "error en la carga de respuestas, edite o elimine la pregunta");
		}
	}
	else{
       $res = array("res" => "error", "msg" => "error en ingreso de la pregunta");
	}
}
elseif($AnsId == 2){
	$insQuest = $conn->query("INSERT INTO exam_question_tbl(exam_id,exam_question,id_tipeq) VALUES('$examId','$question',2); ");
	if($insQuest){
		$eqt_idr = $conn->lastInsertId(); 
		$var1 = "si";
		$insAns1 = $conn->query("INSERT INTO `question_answers` (`id_qAns`, `answer`, `tipe`, `eqt_id`) VALUES (NULL, '$choice_A', '$var1', '$eqt_idr');");
		
		if($insAns1){
			$res = array("res" => "success", "msg" => $question);
		}
		else{
		   $res = array("res" => "error", "msg" => "error en la carga de respuestas, edite o elimine la pregunta");
		}
	}
	else{
       $res = array("res" => "error", "msg" => "error en ingreso de la pregunta");
	}
}
elseif($AnsId == 3){
	$insQuest = $conn->query("INSERT INTO exam_question_tbl(exam_id,exam_question,id_tipeq) VALUES('$examId','$question',3); ");
	if($insQuest){
		$eqt_idr = $conn->lastInsertId(); 
		$var1 = "si";
		$insAns1 = $conn->query("INSERT INTO `question_answers` (`id_qAns`, `answer`, `tipe`, `eqt_id`) VALUES (NULL, '$choice_A', '$var1', '$eqt_idr');");
		
		if($insAns1){
			$res = array("res" => "success", "msg" => $question);
		}
		else{
		   $res = array("res" => "error", "msg" => "error en la carga de respuestas, edite o elimine la pregunta");
		}
	}
	else{
       $res = array("res" => "error", "msg" => "error en ingreso de la pregunta");
	}
}
elseif($AnsId == 4){
	$insQuest = $conn->query("INSERT INTO exam_question_tbl(exam_id,exam_question,id_tipeq) VALUES('$examId','$question',4); ");
	if($insQuest){
		$eqt_idr = $conn->lastInsertId(); 
		$var1 = "no";
		$var2 = "no";
		$var3 = "no";
		$var4 = "no";
		if($correctAnswer == 1){
			$var1 = "si";
		}elseif($correctAnswer == 2){
			$var2 = "si";
		}elseif($correctAnswer == 3){
			$var3 = "si";
		}elseif($correctAnswer == 4){
			$var4 = "si";
		}
		$insAns1 = $conn->query("INSERT INTO `question_answers` (`id_qAns`, `answer`, `tipe`, `eqt_id`) VALUES (NULL, '$choice_A', '$var1', '$eqt_idr');
		INSERT INTO `question_answers` (`id_qAns`, `answer`, `tipe`, `eqt_id`) VALUES (NULL, '$choice_B', '$var2', '$eqt_idr');
		INSERT INTO `question_answers` (`id_qAns`, `answer`, `tipe`, `eqt_id`) VALUES (NULL, '$choice_C', '$var3', '$eqt_idr');
		INSERT INTO `question_answers` (`id_qAns`, `answer`, `tipe`, `eqt_id`) VALUES (NULL, '$choice_D', '$var4', '$eqt_idr');");
		
		if($insAns1){
			$res = array("res" => "success", "msg" => $question);
		}
		else{
		   $res = array("res" => "error", "msg" => "error en la carga de respuestas, edite o elimine la pregunta");
		}
	}
	else{
       $res = array("res" => "error", "msg" => "error en ingreso de la pregunta");
	}
}
elseif($AnsId == 5){
	$insQuest = $conn->query("INSERT INTO exam_question_tbl(exam_id,exam_question,id_tipeq) VALUES('$examId','$question',5); ");
	if($insQuest){
		$eqt_idr = $conn->lastInsertId(); 
		$var1 = "no";
		$var2 = "no";
		$var3 = "no";
		$var4 = "no";
		$var5 = "no";
		$var6 = "no";
		if(isset($status_A) && $status_A == "on"){
			$var1 = "si";
		}if(isset($status_B) &&$status_B == "on"){
			$var2 = "si";
		}if(isset($status_C) &&$status_C == "on"){
			$var3 = "si";
		}if(isset($status_D) && $status_D == "on"){
			$var4 = "si";
		}if(isset($status_E) && $status_E == "on"){
			$var5 = "si";
		}if(isset($status_F) && $status_F == "on"){
			$var6 = "si";
		}
		
		$insAns1 = $conn->query("INSERT INTO `question_answers` (`id_qAns`, `answer`, `tipe`, `eqt_id`) VALUES (NULL, '$choice_A', '$var1', '$eqt_idr');
		INSERT INTO `question_answers` (`id_qAns`, `answer`, `tipe`, `eqt_id`) VALUES (NULL, '$choice_B', '$var2', '$eqt_idr');
		INSERT INTO `question_answers` (`id_qAns`, `answer`, `tipe`, `eqt_id`) VALUES (NULL, '$choice_C', '$var3', '$eqt_idr');
		INSERT INTO `question_answers` (`id_qAns`, `answer`, `tipe`, `eqt_id`) VALUES (NULL, '$choice_D', '$var4', '$eqt_idr');
		INSERT INTO `question_answers` (`id_qAns`, `answer`, `tipe`, `eqt_id`) VALUES (NULL, '$choice_E', '$var5', '$eqt_idr');
		INSERT INTO `question_answers` (`id_qAns`, `answer`, `tipe`, `eqt_id`) VALUES (NULL, '$choice_F', '$var6', '$eqt_idr');");
		
		if($insAns1){
			$res = array("res" => "success", "msg" => $question);
		}
		else{
		   $res = array("res" => "error", "msg" => "error en la carga de respuestas, edite o elimine la pregunta");
		}
	}
	else{
       $res = array("res" => "error", "msg" => "error en ingreso de la pregunta");
	}
}


echo json_encode($res);
 ?>