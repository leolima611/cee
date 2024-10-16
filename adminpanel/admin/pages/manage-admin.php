<link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>MANEJO DE ADMINISTRADORES</div>
                    </div>
                </div>
            </div>        
            
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">ADMINISTRADORES
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Contrase&ntilde;a</th>
                                <th>Rol</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $selExmne = $conn->query("SELECT * FROM admin_acc ORDER BY admin_id DESC ");
                                if($selExmne->rowCount() > 0)
                                {
                                    while ($selExmneRow = $selExmne->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                           <td><?php echo $selExmneRow['name']; ?> <?php echo $selExmneRow['apellidos']; ?></td>
                                           <td><?php echo $selExmneRow['admin_user']; ?></td>
                                           <td>***********</td>
                                           <td>
                                            <?php 
                                                 $exmneCourse = $selExmneRow['role_id'];
                                                 $selCourse = $conn->query("SELECT * FROM roles WHERE role_id='$exmneCourse' ")->fetch(PDO::FETCH_ASSOC);
                                                 echo $selCourse['name'];
                                             ?>
                                            </td>
                                           <td>
                                               <a rel="facebox" href="facebox_modal/updateAdmin.php?id=<?php echo $selExmneRow['admin_id']; ?>" class="btn btn-sm btn-primary">Actualizar</a>
											   <button type="button" id="deleteAdmin" data-id='<?php echo $selExmneRow['admin_id']; ?>'  class="btn btn-danger btn-sm">Eliminar</button>

                                           </td>
                                        </tr>
                                    <?php }
                                }
                                else
                                { ?>
                                    <tr>
                                      <td colspan="2">
                                        <h3 class="p-3">No Tiene Administradores</h3>
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
         
