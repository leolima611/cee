<?php 
 include("../../../conn.php");


extract($_POST);

$archivo = "../../../pdf/".$file; // Reemplaza con la ruta de tu archivo PDF

if (file_exists($archivo)) {
    if (unlink($archivo)) {
		$res = array("res" => "success");
    } else {
        $res = array("res" => "failed");
    }
} else {
    $res = array("res" => "failed" , "msg" => "$archivo");
}


echo json_encode($res);
 ?>