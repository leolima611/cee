<?php 
 include("../../../conn.php");

extract($_POST);

$ban = 0;
$selAns = $conn->query("SELECT * FROM question_answers WHERE eqt_id='$id' ORDER BY id_qAns DESC ");

while ($selAnsRow = $selAns->fetch(PDO::FETCH_ASSOC)) {
	$idsa = $selAnsRow['id_qAns'];
	$delAns = $conn->query("DELETE  FROM question_answers WHERE id_qAns = '$idsa'");
	if($delAns){}else{$ban = 1;}
}

$delQues = $conn->query("DELETE  FROM exam_question_tbl WHERE eqt_id='$id'  ");
if($delQues && $ban == 0)
{
	$res = array("res" => "success");
}
else
{
	$res = array("res" => "failed");
}


echo json_encode($res);
 ?>