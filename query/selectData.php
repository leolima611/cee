<?php 
$exmneId = $_SESSION['examineeSession']['exmne_id'];

// Select Data sa nilogin nga examinee
$selExmneeData = $conn->query("SELECT * FROM examinee_tbl WHERE exmne_id='$exmneId' ")->fetch(PDO::FETCH_ASSOC);
$exmneCourse =  $selExmneeData['exmne_course'];

        
// Select and tanang exam depende sa course nga ni login 
$selExam = $conn->query("SELECT * FROM exam_tbl WHERE cou_id='$exmneCourse' ORDER BY ex_id DESC ");


// Info course
$selCou = $conn->query("SELECT * FROM course_tbl WHERE cou_id='$exmneCourse' ")->fetch(PDO::FETCH_ASSOC);


// info actividades 
$selTopic = $conn->query("SELECT * FROM topic_cou WHERE cou_id='$exmneCourse' ORDER BY activity_num asc ");


 ?>