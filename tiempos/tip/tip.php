<?php
include("../conn_t.php");

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$data = json_decode(file_get_contents('php://input'), true);
$tiempo = $data['tiempo'];
$usuario_id = $data['exmneId'];
$act = $data['act'];

$sql = "INSERT INTO tip (exmne_id, actividad_id, tiempo_total) VALUES ($usuario_id, $act, $tiempo)
        ON DUPLICATE KEY UPDATE tiempo_total = tiempo_total + $tiempo";
if($tiempo > 0){
	if ($conn->query($sql) === TRUE) {
    	echo "Tiempo registrado correctamente";
	} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	
}


$conn->close();
?>
