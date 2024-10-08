<?php 
 include("../../../conn.php");

extract($_POST);

if($tipeAc == 1){
	$numtemp = $num -1;
	$topicnum = $conn->query("SELECT * FROM topic_cou WHERE activity_num='$num' AND cou_id='$couId' ");
	$topicname = $conn->query("SELECT * FROM topic_cou WHERE name='$name' AND cou_id='$couId' ");
	$niveltopic = $conn->query("SELECT * FROM `topic_cou` WHERE cou_id = '$couId' AND activity_num = $numtemp;");
	
	if($topicnum->rowCount() > 0){
		$res = array("res" => "nivelexist", "msg" => $num);
	}elseif($topicname->rowCount() > 0){
		$res = array("res" => "topicexist", "msg" => $name);
	}elseif($num < 1){
		$res = array("res" => "nivelce", "msg" => $num);
	}elseif($num > 1){
		if($niveltopic->rowCount() > 0){
			$insQuest = $conn->query("INSERT INTO `topic_cou` (`idtopic_cou`, `cou_id`, `name`, `activity_num`, `valor`, `config`, `acti_tipes`) VALUES (NULL, '$couId', '$name', '$num', NULL, NULL, '$tipeAc')");

			if($insQuest){
       			$res = array("res" => "success", "msg" => $name);
			}else{
       			$res = array("res" => "failed");
			}
		}else{		
			$res = array("res" => "nivelno", "msg" => $num);
		}
	}else{
		$insQuest = $conn->query("INSERT INTO `topic_cou` (`idtopic_cou`, `cou_id`, `name`, `activity_num`, `valor`, `config`, `acti_tipes`) VALUES (NULL, '$couId', '$name', '$num', NULL, NULL, '$tipeAc')");

		if($insQuest){
			$res = array("res" => "success", "msg" => $name);
		}else{
			$res = array("res" => "failed");
		}
	}
	echo json_encode($res);
}
elseif($tipeAc == 2){
	$target_dir = "../../../pdf/";  // Carpeta donde se guardará el archivo
	$target_file = $target_dir . basename($_FILES["pdf_file"]["name"]);
	$uploadOk = 1;
	$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	
	// Check if file is a actual PDF or fake PDF
	$check = mime_content_type($_FILES["pdf_file"]["tmp_name"]);
	if ($check == "application/pdf") {
    	$uploadOk = 1;
	} else {
    	$uploadOk = 0;    	echo json_encode(['res' => 'error', 'msg' => 'El archivo no es un PDF.']);
    	exit;
	}

	// Check if file already exists
	if (file_exists($target_file)) {
    	echo json_encode(['res' => 'error', 'msg' => 'Lo siento, el archivo ya existe.']);
    	$uploadOk = 0;
    	exit;
	}

	// Check file size
	if ($_FILES["pdf_file"]["size"] > 500000) {  // 500KB máximo
    	echo json_encode(['res' => 'error', 'msg' => 'Lo siento, tu archivo es demasiado grande.']);
    	$uploadOk = 0;
    	exit;
	}

	// Allow certain file formats
	if ($fileType != "pdf") {
    	echo json_encode(['res' => 'error', 'msg' => 'Solo archivos PDF son permitidos.']);
    	$uploadOk = 0;
    	exit;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
    	echo json_encode(['res' => 'error', 'msg' => 'Tu archivo no fue subido.']);
    	exit;
		// if everything is ok, try to upload file
	} else {
    	if (move_uploaded_file($_FILES["pdf_file"]["tmp_name"], $target_file)) {
        	// Guardar el nombre del archivo en la base de datos
        	$pdf_name = $_FILES["pdf_file"]["name"];
			
			$numtemp = $num -1;
			$topicnum = $conn->query("SELECT * FROM topic_cou WHERE activity_num='$num' AND cou_id='$couId' ");
			$niveltopic = $conn->query("SELECT * FROM `topic_cou` WHERE cou_id = '$couId' AND activity_num = $numtemp;");
	
			if($topicnum->rowCount() > 0){
				echo json_encode(['res' => 'nivelexist', 'msg' => $num]);
			}elseif($num < 1){
				echo json_encode(['res' => 'nivelce', 'msg' => $num]);
			}elseif($num > 1){
				if($niveltopic->rowCount() > 0){
					$insQuest = $conn->query("INSERT INTO `topic_cou` (`idtopic_cou`, `cou_id`, `name`, `activity_num`, `valor`, `config`, `acti_tipes`) VALUES (NULL, '$couId', '$name', '$num', '$pdf_name', NULL, '$tipeAc')");

					if($insQuest){
       					echo json_encode(['res' => 'success', 'msg' => 'El archivo ha sido subido exitosamente.']);
					}else{
						echo json_encode(['res' => 'error', 'msg' => 'error al almacenar los datos']);
					}
				}else{
					echo json_encode(['res' => 'nivelno', 'msg' => $num]);
				}
			}else{
				$insQuest = $conn->query("INSERT INTO `topic_cou` (`idtopic_cou`, `cou_id`, `name`, `activity_num`, `valor`, `config`, `acti_tipes`) VALUES (NULL, '$couId', '$name', '$num', $pdf_name, NULL, '$tipeAc')");

				if($insQuest){
					echo json_encode(['res' => 'success', 'msg' => 'El archivo ha sido subido exitosamente.']);
				}else{
					echo json_encode(['res' => 'error', 'msg' => 'error al almacenar los datos']);
				}
			}
    	} else {
        	echo json_encode(['res' => 'error', 'msg' => 'Lo siento, hubo un error al subir tu archivo.']);
    	}
	}
}
elseif($tipeAc == 3){
	$numtemp = $num -1;
	$topicnum = $conn->query("SELECT * FROM topic_cou WHERE activity_num='$num' AND cou_id='$couId' ");
	$niveltopic = $conn->query("SELECT * FROM `topic_cou` WHERE cou_id = '$couId' AND activity_num = $numtemp;");
	
	if($topicnum->rowCount() > 0){
		$res = array("res" => "nivelexist", "msg" => $num);
	}elseif($num < 1){
		$res = array("res" => "nivelce", "msg" => $num);
	}elseif($num > 1){
		if($niveltopic->rowCount() > 0){
			$insQuest = $conn->query("INSERT INTO `topic_cou` (`idtopic_cou`, `cou_id`, `name`, `activity_num`, `valor`, `config`, `acti_tipes`) VALUES (NULL, '$couId', '$name', '$num', '$link', NULL, '$tipeAc')");

			if($insQuest){
       			$res = array("res" => "success", "msg" => $name);
			}else{
       			$res = array("res" => "failed");
			}
		}else{		
			$res = array("res" => "nivelno", "msg" => $num);
		}
	}else{
		$insQuest = $conn->query("INSERT INTO `topic_cou` (`idtopic_cou`, `cou_id`, `name`, `activity_num`, `valor`, `config`, `acti_tipes`) VALUES (NULL, '$couId', '$name', '$num', '$link', NULL, '$tipeAc')");

		if($insQuest){
			$res = array("res" => "success", "msg" => $name);
		}else{
			$res = array("res" => "failed");
		}
	}
	echo json_encode($res);
}
elseif($tipeAc == 4){
	$numtemp = $num -1;
	$topicnum = $conn->query("SELECT * FROM topic_cou WHERE activity_num='$num' AND cou_id='$couId' ");
	$niveltopic = $conn->query("SELECT * FROM `topic_cou` WHERE cou_id = '$couId' AND activity_num = $numtemp;");
	
	if($topicnum->rowCount() > 0){
		$res = array("res" => "nivelexist", "msg" => $num);
	}elseif($num < 1){
		$res = array("res" => "nivelce", "msg" => $num);
	}elseif($num > 1){
		if($niveltopic->rowCount() > 0){
			$insQuest = $conn->query("INSERT INTO `topic_cou` (`idtopic_cou`, `cou_id`, `name`, `activity_num`, `valor`, `config`, `acti_tipes`) VALUES (NULL, '$couId', '$name', '$num', '$link', NULL, '$tipeAc')");

			if($insQuest){
       			$res = array("res" => "success", "msg" => $name);
			}else{
       			$res = array("res" => "failed");
			}
		}else{		
			$res = array("res" => "nivelno", "msg" => $num);
		}
	}else{
		$insQuest = $conn->query("INSERT INTO `topic_cou` (`idtopic_cou`, `cou_id`, `name`, `activity_num`, `valor`, `config`, `acti_tipes`) VALUES (NULL, '$couId', '$name', '$num', '$link', NULL, '$tipeAc')");

		if($insQuest){
			$res = array("res" => "success", "msg" => $name);
		}else{
			$res = array("res" => "failed");
		}
	}
	echo json_encode($res);
}
elseif($tipeAc == 7){
	$numtemp = $num -1;
	$topicnum = $conn->query("SELECT * FROM topic_cou WHERE activity_num='$num' AND cou_id='$couId' ");
	$niveltopic = $conn->query("SELECT * FROM `topic_cou` WHERE cou_id = '$couId' AND activity_num = $numtemp;");
	
	if($topicnum->rowCount() > 0){
		$res = array("res" => "nivelexist", "msg" => $num);
	}elseif($num < 1){
		$res = array("res" => "nivelce", "msg" => $num);
	}elseif($num > 1){
		if($niveltopic->rowCount() > 0){
			$insQuest = $conn->query("INSERT INTO `topic_cou` (`idtopic_cou`, `cou_id`, `name`, `activity_num`, `valor`, `config`, `acti_tipes`) VALUES (NULL, '$couId', '$name', '$num', '$link', '$conf', '$tipeAc')");

			if($insQuest){
       			$res = array("res" => "success", "msg" => $name);
			}else{
       			$res = array("res" => "failed");
			}
		}else{		
			$res = array("res" => "nivelno", "msg" => $num);
		}
	}else{
		$insQuest = $conn->query("INSERT INTO `topic_cou` (`idtopic_cou`, `cou_id`, `name`, `activity_num`, `valor`, `config`, `acti_tipes`) VALUES (NULL, '$couId', '$name', '$num', '$link', '$conf', '$tipeAc')");

		if($insQuest){
			$res = array("res" => "success", "msg" => $name);
		}else{
			$res = array("res" => "failed");
		}
	}
	echo json_encode($res);
}
elseif($tipeAc == 8){
	$numtemp = $num -1;
	$topicnum = $conn->query("SELECT * FROM topic_cou WHERE activity_num='$num' AND cou_id='$couId' ");
	$niveltopic = $conn->query("SELECT * FROM `topic_cou` WHERE cou_id = '$couId' AND activity_num = $numtemp;");
	
	if($topicnum->rowCount() > 0){
		$res = array("res" => "nivelexist", "msg" => $num);
	}elseif($num < 1){
		$res = array("res" => "nivelce", "msg" => $num);
	}elseif($num > 1){
		if($niveltopic->rowCount() > 0){
			$insQuest = $conn->query("INSERT INTO `topic_cou` (`idtopic_cou`, `cou_id`, `name`, `activity_num`, `valor`, `config`, `acti_tipes`) VALUES (NULL, '$couId', '$name', '$num', '$link', '$conf', '$tipeAc')");

			if($insQuest){
       			$res = array("res" => "success", "msg" => $name);
			}else{
       			$res = array("res" => "failed");
			}
		}else{		
			$res = array("res" => "nivelno", "msg" => $num);
		}
	}else{
		$insQuest = $conn->query("INSERT INTO `topic_cou` (`idtopic_cou`, `cou_id`, `name`, `activity_num`, `valor`, `config`, `acti_tipes`) VALUES (NULL, '$couId', '$name', '$num', '$link', '$conf', '$tipeAc')");

		if($insQuest){
			$res = array("res" => "success", "msg" => $name);
		}else{
			$res = array("res" => "failed");
		}
	}
	echo json_encode($res);
}
?>

