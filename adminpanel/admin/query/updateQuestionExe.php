<?php
 include("../../../conn.php");
 extract($_POST);

$ban = 0;
$selCourse = $conn->query("SELECT * FROM exam_question_tbl WHERE eqt_id='$question_id' ")->fetch(PDO::FETCH_ASSOC);
$selAns = $conn->query("SELECT * FROM question_answers WHERE eqt_id='$question_id' ORDER BY id_qAns DESC ");

if($AnsId == 1){
	while ($selAnsRow = $selAns->fetch(PDO::FETCH_ASSOC)) {
		$vares="no";
		$idsa = $selAnsRow['id_qAns'];
		$id_qAns = "v".$selAnsRow['id_qAns'];
		$valIn = $$id_qAns;
		
		if($selAnsRow['id_qAns'] == $correctAnswer){$vares="si";}
		
		$updAns = $conn->query("UPDATE `question_answers` SET `answer` = '$valIn', `tipe` = '$vares' WHERE id_qAns = '$idsa' ;");
		if($updAns){}else{$ban = 1;}
	}
	$updQuen = $conn->query("UPDATE `exam_question_tbl` SET `exam_question` = '$question' WHERE eqt_id = $question_id;");
	
	if($updQuen && $ban == 0){
		$res = array("res" => "success");
	}
	else{
		$res = array("res" => "failed");
	}
}
elseif($AnsId == 2){
	while ($selAnsRow = $selAns->fetch(PDO::FETCH_ASSOC)) {
		$idsa = $selAnsRow['id_qAns'];
		$id_qAns = "v".$selAnsRow['id_qAns'];
		$valIn = $$id_qAns;
		
		
		$updAns = $conn->query("UPDATE `question_answers` SET `answer` = '$valIn' WHERE id_qAns = '$idsa' ;");
		if($updAns){}else{$ban = 1;}
	}
	$updQuen = $conn->query("UPDATE `exam_question_tbl` SET `exam_question` = '$question' WHERE eqt_id = $question_id;");
	
	if($updQuen && $ban == 0){
		$res = array("res" => "success");
	}
	else{
		$res = array("res" => "failed");
	}
}
elseif($AnsId == 3){
	while ($selAnsRow = $selAns->fetch(PDO::FETCH_ASSOC)) {
		$idsa = $selAnsRow['id_qAns'];
		$id_qAns = "v".$selAnsRow['id_qAns'];
		$valIn = $$id_qAns;
		
		
		$updAns = $conn->query("UPDATE `question_answers` SET `answer` = '$valIn' WHERE id_qAns = '$idsa' ;");
		if($updAns){}else{$ban = 1;}
	}
	$updQuen = $conn->query("UPDATE `exam_question_tbl` SET `exam_question` = '$question' WHERE eqt_id = $question_id;");
	
	if($updQuen && $ban == 0){
		$res = array("res" => "success");
	}
	else{
		$res = array("res" => "failed");
	}
}
elseif($AnsId == 4){
	while ($selAnsRow = $selAns->fetch(PDO::FETCH_ASSOC)) {
		$vares="no";
		$idsa = $selAnsRow['id_qAns'];
		$id_qAns = "v".$selAnsRow['id_qAns'];
		$valIn = $$id_qAns;
		
		if($selAnsRow['id_qAns'] == $correctAnswer){$vares="si";}
		
		$updAns = $conn->query("UPDATE `question_answers` SET `answer` = '$valIn', `tipe` = '$vares' WHERE id_qAns = '$idsa' ;");
		if($updAns){}else{$ban = 1;}
	}
	$updQuen = $conn->query("UPDATE `exam_question_tbl` SET `exam_question` = '$question' WHERE eqt_id = $question_id;");
	
	if($updQuen && $ban == 0){
		$res = array("res" => "success");
	}
	else{
		$res = array("res" => "failed");
	}
}
elseif($AnsId == 5){
	while ($selAnsRow = $selAns->fetch(PDO::FETCH_ASSOC)) {
		$idsa = $selAnsRow['id_qAns'];
		$id_qAns = "v".$selAnsRow['id_qAns'];
		$valIn = $$id_qAns;
		$intipe = "s".$selAnsRow['id_qAns'];
		
		if (isset($$intipe) && $$intipe == "on"){
			$tipe = "si";
		}else{$tipe = "no";}
		
		$updAns = $conn->query("UPDATE `question_answers` SET `answer` = '$valIn', `tipe` = '$tipe' WHERE id_qAns = '$idsa' ;");
		if($updAns){}else{$ban = 1;}
	}
	$updQuen = $conn->query("UPDATE `exam_question_tbl` SET `exam_question` = '$question' WHERE eqt_id = $question_id;");
	
	if($updQuen && $ban == 0){
		$res = array("res" => "success");
	}
	else{
		$res = array("res" => "failed");
	}
}

 echo json_encode($res);	
?>