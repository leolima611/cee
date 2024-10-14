<?php 

// Count All Course
$selCourse = $conn->query("SELECT COUNT(cou_id) as totCourse FROM course_tbl ")->fetch(PDO::FETCH_ASSOC);


// Count All Exam
$selExam = $conn->query("SELECT COUNT(ex_id) as totExam FROM exam_tbl ")->fetch(PDO::FETCH_ASSOC);


// Count All Examine
$selExaneS = $conn->query("SELECT COUNT(exmne_id) as totExane FROM examinee_tbl;")->fetch(PDO::FETCH_ASSOC);

// Count All Activitis
$selActT = $conn->query("SELECT COUNT(idtopic_cou) as totAct FROM topic_cou;")->fetch(PDO::FETCH_ASSOC);

// Count All Activitis
$selExto = $conn->query("SELECT COUNT(examat_id) as totTom FROM exam_attempt;")->fetch(PDO::FETCH_ASSOC);

 ?>