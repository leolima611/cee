<div class="app-main__outer">
    <div id="refreshData">
    	<div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-portfolio icon-gradient bg-mean-fruit">
                            </i>
                        </div>
                        <div>DASHBOARD
                            <div class="page-title-subheading">
                            </div>
                        </div>
                    </div>
                 </div>
            </div>            
			<div class="row">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content bg-midnight-bloom">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Total Cursos</div>
                                <div class="widget-subheading" style="color:transparent;">.</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white">
                                    <span><?php echo $totalCourse = $selCourse['totCourse']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content bg-arielle-smile">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Total Examenes</div>
                                <div class="widget-subheading" style="color:transparent;">.</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white">
                                    <span><?php echo $totalCourse = $selExam['totExam']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content bg-grow-early">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Total Examenes Realizados</div>
                                <div class="widget-subheading" style="color:transparent;">.</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white">
									<span><?=$selExto['totTom'];?></span>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<div class="row">
				<div class="col-md-6 col-xl-4">
					<div class="card mb-3 widget-content bg-vicious-stance">
        	        	<div class="widget-content-wrapper text-white">
            	        	<div class="widget-content-left">
                	        	<div class="widget-heading">Total Alumnos</div>
								<div class="widget-subheading" style="color:transparent;">.</div>
							</div>
	                        <div class="widget-content-right">
    	                    	<div class="widget-numbers text-white">
									<span><?php echo $totalexamine = $selExaneS['totExane']; ?></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-xl-4">
					<div class="card mb-3 widget-content bg-night-sky">
        	        	<div class="widget-content-wrapper text-white">
            	        	<div class="widget-content-left">
                	        	<div class="widget-heading">Total Actividades</div>
								<div class="widget-subheading" style="color:transparent;">.</div>
							</div>
	                        <div class="widget-content-right">
    	                    	<div class="widget-numbers text-white">
									<span><?php echo $totalActS = $selActT['totAct']; ?></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
            <?php include("includes/grafic.php"); ?>
        </div>
    </div>