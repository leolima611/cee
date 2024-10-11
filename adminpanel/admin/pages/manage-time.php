<?php
$exmevar = $_GET['exme']; 
$selExmne = $conn->query("SELECT * FROM examinee_tbl WHERE exmne_id = '$exmevar'")->fetch(PDO::FETCH_ASSOC);

$plataforma = $conn->query("SELECT SUM(tiempo_total) AS total_tiempo FROM tip WHERE exmne_id = '$exmevar' AND tiempo_total = 1;")->fetch(PDO::FETCH_ASSOC);
$actividad = $conn->query("SELECT SUM(tiempo_total) AS total_tiempo FROM tip WHERE exmne_id = '$exmevar' AND tiempo_total = 2;")->fetch(PDO::FETCH_ASSOC);
$examen = $conn->query("SELECT SUM(tiempo_total) AS total_tiempo FROM tip WHERE exmne_id = '$exmevar' AND tiempo_total = 3;")->fetch(PDO::FETCH_ASSOC);
?>
<link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>TIEMPO EN PLATAFORMA</div>
                    </div>
                </div>
            </div>        
            
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">ALUMNO
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
							<tr>
                                <th>Tiempo en Plataforma: <?=$plataforma['total_tiempo']?> minutos</th>
                                <th>Tiempo en Actividad: <?=$actividad['total_tiempo']?> minutos</th>
                                <th>Tiempo en Examen: <?=$examen['total_tiempo']?> minutos</th>
                                <th></th>
                            </tr>
                            <tr>
                                <th>Nombre</th>
                                <th>Fecha</th>
                                <th>Tiempo en minutos</th>
                                <th>Actividad Realizada</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $selExmneT = $conn->query("SELECT * FROM tip WHERE exmne_id = '$exmevar' ORDER BY ultima_entrada DESC	 ");
                                if($selExmneT->rowCount() > 0)
                                {
                                    while ($selExmneRow = $selExmneT->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                           <td><?php echo $selExmne['exmne_fullname']; ?></td>
                                           <td><?php echo $selExmneRow['ultima_entrada']; ?></td>
                                           <td><?php echo $selExmneRow['tiempo_total']; ?></td>
                                           <td>
                                            <?php
												if($selExmneRow['actividad_id']==1){
													echo "Tiempo en plataforma";
												}elseif($selExmneRow['actividad_id']==2){
													echo "Tiempo en Actividad";
												}elseif($selExmneRow['actividad_id']==3){
													echo "Tiempo en examen";
												}
                                             ?>
                                            </td>
                                        </tr>
                                    <?php }
                                }
                                else
                                { ?>
                                    <tr>
                                      <td colspan="2">
                                        <h3 class="p-3">No tiene tiempos registrados</h3>
                                      </td>
                                    </tr>
                                <?php }
                               ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
      
        
</div>
         
