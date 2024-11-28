<?php 
include("../../../conn.php");
extract($_POST);

$examines = $conn->query("SELECT * FROM `examinee_tbl` WHERE exmne_course = '$id';");
$exams = $conn->query("SELECT * FROM `exam_tbl` WHERE cou_id = '$id';");
$topics = $conn->query("SELECT * FROM `topic_cou` WHERE cou_id = '$id';");


if($examines->rowCount() == 0 || $exams->rowCount() == 0 || $topics->rowCount() == 0){
	$delCourse = $conn->query("DELETE  FROM course_tbl WHERE cou_id='$id'  ");
	if($delCourse)
	{
		$res = array("res" => "success");
	}
	else
	{
		$res = array("res" => "failed");
	}
}else{
	$res = array("res" => "failE");
}





	echo json_encode($res);
 ?>