<?php 
 include("../../../conn.php");
 
 extract($_POST);


 $updExam = $conn->query("UPDATE exam_tbl SET cou_id='$courseId', ex_title='$examTitle', ex_time_limit='$examLimit', ex_description='$examDesc', id_tipe='$tipeExam' WHERE  ex_id='$examId' ");

 if($updExam)
 {
   $res = array("res" => "success", "msg" => $examTitle);
 }
 else
 {
   $res = array("res" => "failed");
 }

 echo json_encode($res);
 ?>