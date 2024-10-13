<div class="row">
	<?php
	include("includes/graficjs.php");
	?>
	<!--Grafica 2-->
	<div class="col-md-12 col-lg-6">
        <div class="mb-3 card">
            <div class="card-header-tab card-header-tab-animation card-header">
                <div class="card-header-title">
                    <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                    tiempo en plataforma
                </div>
                <ul class="nav">
                    <!--<li class="nav-item"><a href="javascript:void(0);" class="active nav-link">&Uacute;ltimo</a></li>
                    <li class="nav-item"><a href="javascript:void(0);" class="nav-link second-tab-toggle">Actual</a></li>-->
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tabs-eg-77">
                        <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                            <div class="widget-chat-wrapper-outer">
                                <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
									<div id="chartdiv2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!--Grafica 1-->
    <div class="col-md-12 col-lg-6">
        <div class="mb-3 card">
            <div class="card-header-tab card-header-tab-animation card-header">
                <div class="card-header-title">
                    <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                    Alumnos por curso
                </div>
                <ul class="nav">
                    <!--<li class="nav-item"><a href="javascript:void(0);" class="active nav-link">&Uacute;ltimo</a></li>
                    <li class="nav-item"><a href="javascript:void(0);" class="nav-link second-tab-toggle">Actual</a></li>-->
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tabs-eg-77">
                        <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                            <div class="widget-chat-wrapper-outer">
                                <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
									<div id="chartdiv1"></div>
                                </div>
                            </div>
                        </div>
						<!--
                        <h6 class="text-muted text-uppercase font-size-md opacity-5 font-weight-normal">Actividades por curso</h6>
                        <div class="scroll-area-sm">
                            <div class="scrollbar-container">
                                <ul class="rm-list-borders rm-list-borders-scroll list-group list-group-flush">
									<?php 
									$selGlist1 = $conn->query("SELECT * FROM course_tbl ");
    								if($selGlist1->rowCount() > 0){
        								while ($selGlist1row = $selGlist1->fetch(PDO::FETCH_ASSOC)) {
										$selsumali1 = $conn->query("SELECT COUNT(*) AS total FROM topic_cou WHERE cou_id = ".$selGlist1row['cou_id'].";")->fetch(PDO::FETCH_ASSOC);
										?>
									<li class="list-group-item">
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
													<i class="pe-7s-notebook"></i>
                                                </div>
                                                <div class="widget-content-left">
                                                    <div class="widget-heading"><?=$selGlist1row['cou_name']?></div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="font-size-xlg text-muted">
                                                        <small class="opacity-5 pr-1">Actividades: </small>
                                                        <span><?=$selsumali1['total']?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
									<?php
										}
									} 
									?>
                                </ul>
                            </div>
                        </div>	
						-->
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!--Grafica 3-->
	<div class="col-md-12 col-lg-6">
        <div class="mb-3 card">
            <div class="card-header-tab card-header-tab-animation card-header">
                <div class="card-header-title">
                    <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                    Actividades por curso
                </div>
                <ul class="nav">
                    <!--<li class="nav-item"><a href="javascript:void(0);" class="active nav-link">&Uacute;ltimo</a></li>
                    <li class="nav-item"><a href="javascript:void(0);" class="nav-link second-tab-toggle">Actual</a></li>-->
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tabs-eg-77">
                        <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                            <div class="widget-chat-wrapper-outer">
                                <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
									<div id="chartdiv3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!--Grafica 3-->
	<div class="col-md-12 col-lg-6">
        <div class="mb-3 card">
            <div class="card-header-tab card-header-tab-animation card-header">
                <div class="card-header-title">
                    <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                    Comentarios
                </div>
                <ul class="nav">
                    <!--<li class="nav-item"><a href="javascript:void(0);" class="active nav-link">&Uacute;ltimo</a></li>
                    <li class="nav-item"><a href="javascript:void(0);" class="nav-link second-tab-toggle">Actual</a></li>-->
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tabs-eg-77">
                        <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                            <div class="widget-chat-wrapper-outer">
                                <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
									 <div class="table-responsive">
										 <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            				<thead>
                            					<tr>
                                					<th class="text-left pl-4">Usuario</th>
                                					<th class="text-center" width="20%" height="60%">Comentario</th>
													<th class="text-left pl-4">fecha</th>
                            					</tr>
                            				</thead>
                            				<tbody>
                              				<?php 
												$selFeedback = $conn->query("SELECT * FROM `feedbacks_tbl` ORDER BY `feedbacks_tbl`.`fb_date` DESC");
												if($selFeedback->rowCount() > 0){
													while ($selFeedRow = $selFeedback->fetch(PDO::FETCH_ASSOC)) { 
											?>
                                        		<tr>
                                            		<td class="pl-4">
                                                	<?php echo $selFeedRow['fb_exmne_as']; ?>
                                            		</td>
                                            		<td class="text-center">
													<?=$selFeedRow['fb_feedbacks']?>
													</td>
													<td class="text-center">
													<?=$selFeedRow['fb_date']?>
													</td>
                                        		</tr>

                                    		<?php 
													}
												}else{ 
											?>
                                    			<tr>
                                      				<td colspan="2">
                                        				<h3 class="p-3">No hay Comentarios</h3>
                                      				</td>
                                    			</tr>
                                			<?php 
												}
											?>
                            				</tbody>
                        				</table>
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