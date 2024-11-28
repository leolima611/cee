<?php
 session_start(); 
include("../../../conn.php");
 extract($_POST);


$selAnsF = $conn->query("SELECT * FROM `exam_answers` WHERE axmne_id = '$exmneId' AND (tipea != \"si\" AND tipea != \"no\" OR tipea IS NULL);");


if($selAnsF->rowCount() == 0){
	$res = array("res" => "already");
}
else{
	$ban = 0;
	while ($selAnsfRow = $selAnsF->fetch(PDO::FETCH_ASSOC)) {
		$idansrow = $selAnsfRow['exans_id'];
		$correct = $correctAnswer[$idansrow];
		$insCoAns = $conn->query("UPDATE `exam_answers` SET `tipea` = '$correct' WHERE exans_id = '$idansrow';");
		
		if($insCoAns){
			$res = array("res" => "success");
		}else{$ban = 1;}
	}
	if($ban ==1){
		$res = array("res" => "failed");
	}
}

 echo json_encode($res);
 ?>


 