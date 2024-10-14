<?php
$exmevar = $_GET['exme']; 
$selExmne = $conn->query("SELECT * FROM examinee_tbl WHERE exmne_id = '$exmevar' ")->fetch(PDO::FETCH_ASSOC);

$plataforma = $conn->query("SELECT SUM(tiempo_total) AS total_tiempo FROM tip WHERE exmne_id = '$exmevar' AND tiempo_total = 1;")->fetch(PDO::FETCH_ASSOC);
$actividad = $conn->query("SELECT SUM(tiempo_total) AS total_tiempo FROM tip WHERE exmne_id = '$exmevar' AND tiempo_total = 2;")->fetch(PDO::FETCH_ASSOC);
$examen = $conn->query("SELECT SUM(tiempo_total) AS total_tiempo FROM tip WHERE exmne_id = '$exmevar' AND tiempo_total = 3;")->fetch(PDO::FETCH_ASSOC);

//porcentaje de avance
$Tact = $conn->query("SELECT COUNT(*) AS total FROM topic_cou WHERE cou_id = ".$selExmne['exmne_course'].";")->fetch(PDO::FETCH_ASSOC);
$Tactrel = $conn->query("SELECT COUNT(*) AS total FROM rel_topic WHERE cou_id = ".$selExmne['exmne_course']." AND exmne_id = '$exmevar';")->fetch(PDO::FETCH_ASSOC);

$porce = (100/$Tact['total'])*$Tactrel['total'];

//examenes realizados
$exare = $conn->query("SELECT COUNT(*) AS total FROM exam_attempt WHERE exmne_id = '$exmevar';")->fetch(PDO::FETCH_ASSOC);

?>
<link rel="stylesheet" type="text/css" href="css/mycss.css">
<!-- Styles-->
<style>
#chartpastel {
  width: 100%;
  height: 300px;
}
#chartpor {
  width: 100%;
  height: 250px;
}
</style>
<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>

	<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>TIEMPO EN PLATAFORMA</div>
                    </div>
                </div>
            </div>        
            <div class="row">			
				<div class="col-md-12 col-lg-6">
					<div class="main-card mb-3 card">
						<div class="card-header">ALUMNO
						</div>
						<div class="table-responsive">
							<table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
								<thead>
								<tr>
									<th>Tiempo en Plataforma: <?=$plataforma['total_tiempo']?> min.</th>
									<th>Tiempo en Actividad: <?=$actividad['total_tiempo']?> min.</th>
									<th>Tiempo en Examen: <?=$examen['total_tiempo']?> min.</th>
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
									$selExmneT = $conn->query("SELECT * FROM tip WHERE exmne_id = '$exmevar' ORDER BY ultima_entrada DESC limit 50 ");
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

				<!--Graficas-->
				<div class="col-md-12 col-lg-6">
					<div class="mb-3 card">
						<div class="card-header-tab card-header-tab-animation card-header">
							<div class="card-header-title">
								<i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
								graficos
							</div>
							<ul class="nav">
								<!--<li class="nav-item"><a href="javascript:void(0);" class="active nav-link">&Uacute;ltimo</a></li>
								<li class="nav-item"><a href="javascript:void(0);" class="nav-link second-tab-toggle">Actual</a></li>-->
							</ul>
						</div>
						<div class="row d-flex justify-content-center">
							<div class="col-md-3 col-xl-5">
								<div class="card mb-3 widget-content bg-midnight-bloom">
									<div class="widget-content-wrapper text-white">
										<div class="widget-content-left">
											<div class="widget-heading">Actividades Realizadas</div>
											<div class="widget-subheading" style="color:transparent;">.</div>
										</div>
										<div class="widget-content-right">
											<div class="widget-numbers text-white">
												<span><?php echo $Tactrel['total']; ?></span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3 col-xl-5">
								<div class="card mb-3 widget-content bg-midnight-bloom">
									<div class="widget-content-wrapper text-white">
										<div class="widget-content-left">
											<div class="widget-heading">Examenes realizados</div>
											<div class="widget-subheading" style="color:transparent;">.</div>
										</div>
										<div class="widget-content-right">
											<div class="widget-numbers text-white">
												<span><?php echo $exare['total']; ?></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--Grafica porcentaje-->
						<div class="card-body">
							<script>
								am5.ready(function() {
									// Create root element
									var root = am5.Root.new("chartpor");

									// Set themes
									root.setThemes([
										am5themes_Animated.new(root)
									]);

									// Create chart
									var chart = root.container.children.push(
										am5radar.RadarChart.new(root, {
											panX: false,
											panY: false,
											startAngle: 180,
											endAngle: 360
										})
									);

									// Create axis and its renderer
									var axisRenderer = am5radar.AxisRendererCircular.new(root, {
										innerRadius: -10,
										strokeOpacity: 1,
										strokeWidth: 15,
										strokeGradient: am5.LinearGradient.new(root, {
											rotation: 0,
											stops: [
												{ color: am5.color(0xfb7116) },
												{ color: am5.color(0xf6d32b) },
												{ color: am5.color(0xf4fb16) },
												{ color: am5.color(0x19d228) }
											]
										})
									});

									var xAxis = chart.xAxes.push(
										am5xy.ValueAxis.new(root, {
											maxDeviation: 0,
											min: 0,
											max: 100,
											strictMinMax: true,
											renderer: axisRenderer
										})
									);

									// Add clock hand
									var axisDataItem = xAxis.makeDataItem({});
									axisDataItem.set("value", <?=$porce;?>); // Set the fixed value to 80%
									var bullet = axisDataItem.set("bullet", am5xy.AxisBullet.new(root, {
										sprite: am5radar.ClockHand.new(root, {
											radius: am5.percent(99)
										})
									}));
									xAxis.createAxisRange(axisDataItem);
									axisDataItem.get("grid").set("visible", false);

									// Make stuff animate on load
									chart.appear(1000, 100);
								}); // end am5.ready()
							</script>

							<div class="tab-content">
								<div class="tab-pane fade show active" id="tabs-eg-77">
									<div class="card mb-3 widget-chart widget-chart2 text-left w-100">
										<div class="widget-chat-wrapper-outer">
											<div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
												<div class="card-header-title">
														Porcentaje de avance
												</div>
												<div id="chartpor"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--Grafica pastel-->
						<div class="card-body">
							<!-- Chart code grafica 2 -->
							<script>
							am5.ready(function() {

							// Create root element
							// https://www.amcharts.com/docs/v5/getting-started/#Root_element
							var root = am5.Root.new("chartpastel");

							// Set themes
							// https://www.amcharts.com/docs/v5/concepts/themes/
							root.setThemes([
							  am5themes_Animated.new(root)
							]);

							// Create chart
							// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
							var chart = root.container.children.push(
							  am5percent.PieChart.new(root, {
								endAngle: 270
							  })
							);

							// Create series
							// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
							var series = chart.series.push(
							  am5percent.PieSeries.new(root, {
								valueField: "value",
								categoryField: "category",
								endAngle: 270
							  })
							);

							series.states.create("hidden", {
							  endAngle: -90
							});

							// Set data
							// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
							series.data.setAll([
								<?php 
								$selGrafic2 = $conn->query("SELECT * FROM actividad ");
								if($selGrafic2->rowCount() > 0){
									while ($selGrafic2row = $selGrafic2->fetch(PDO::FETCH_ASSOC)) {
										$selsumalu2 = $conn->query("SELECT SUM(tiempo_total) AS tiempo FROM tip WHERE actividad_id = ".$selGrafic2row['id']." AND exmne_id = '$exmevar';")->fetch(PDO::FETCH_ASSOC);
										$valueg2 = "{category: \"".$selGrafic2row['nombre']."\",
										value: 0".$selsumalu2['tiempo']."
										},";
										echo ($valueg2);
									}
								} 
								?>
								]);

							series.appear(1000, 100);

							}); // end am5.ready()
							</script>
							<div class="tab-content">
								<div class="tab-pane fade show active" id="tabs-eg-77">
									<div class="card mb-3 widget-chart widget-chart2 text-left w-100">
										<div class="widget-chat-wrapper-outer">
											<div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
												<div class="card-header-title">
														Tiempo del Alumno
												</div>
												<div id="chartpastel"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>  
		</div>
	</div>
         
