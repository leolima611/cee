<link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>MANEJO DE ARCHIVOS</div>
                    </div>
                </div>
            </div>        
            
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">ARCHIVOS
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Tipo de archivo</th>
                                <th>Estatus</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php 
								$dir = '../../audio';
								$files = scandir($dir);
								$files = array_diff($files, array('.', '..')); // Excluye . y ..
								
								if (empty($files)) {
									?>
                                    <tr>
                                      <td colspan="2">
                                        <h3 class="p-3">No Tiene Administradores</h3>
                                      </td>
                                    </tr>
                                	<?php 
								} else {
									foreach ($files as $file) {
										$selExmne = $conn->query("SELECT * FROM topic_cou WHERE acti_tipes = 5 AND
										valor = '$file'");
                                		if($selExmne->rowCount() > 0){
											$estatus="registrado";}else{$estatus="no registrado";}
										?>
										<tr>
                                           <td><?=$file?></td>
                                           <td>MP3</td>
                                           <td><?=$estatus?></td>
                                           <td>
											   <?php
												if($estatus == "no registrado"){
											   ?>
											   <a type="button" id="deleteFileA" data-file="<?php echo $file ?>"  class="btn btn-danger btn-sm">Eliminar</a>
											   <?php
												}
											   ?>
                                           </td>
                                        </tr>
										<?php
									}
								}
                               ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
      
        
</div>
         
