<?php 
 include("../../../conn.php");

 extract($_POST);

 $selCourse = $conn->query("SELECT * FROM exam_tbl WHERE ex_title='$examTitle' ");

 if($courseSelected == "0")
 {
 	$res = array("res" => "noSelectedCourse");
 }
 else if($timeLimit == "0")
 {
 	$res = array("res" => "noSelectedTime");
 }
 else if($examTipe == "0")
 {
 	$res = array("res" => "noTipe");
 }
 else if($selCourse->rowCount() > 0)
 {
	$res = array("res" => "exist", "examTitle" => $examTitle);
 }
 else
 {
    
	$insExam = $conn->query("INSERT INTO exam_tbl(cou_id,ex_title,ex_time_limit,ex_description,id_tipe)VALUES('$courseSelected','$examTitle','$timeLimit','$examDesc','$examTipe') ");
	if($insExam)
	{
		$res = array("res" => "success", "examTitle" => $examTitle);
	}
	else
	{
		$res = array("res" => "failed", "examTitle" => $examTitle);
	}


 }




 echo json_encode($res);
 ?>