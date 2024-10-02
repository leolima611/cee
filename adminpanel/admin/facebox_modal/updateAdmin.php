<?php 
  include("../../../conn.php");
  $id = $_GET['id'];
 
  $selExmne = $conn->query("SELECT * FROM admin_acc WHERE admin_id='$id' ")->fetch(PDO::FETCH_ASSOC);

 ?>

<fieldset style="width:543px;" >
	<legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;ACTUALIZAR INFORMACI&Oacute;N <b>( <?php echo strtoupper($selExmne['name']); ?> <?php echo strtoupper($selExmne['apellidos']); ?>)</b></i></legend>
  <div class="col-md-12 mt-4">
<form method="post" id="updateAdminFrm">
     <div class="form-group">
        <legend>Nombre</legend>
        <input type="hidden" name="admin_id" value="<?php echo $id; ?>">
        <input type="" name="name" class="form-control" required="" value="<?php echo $selExmne['name']; ?>" >
     </div>
	
	<div class="form-group">
        <legend>Apellidos</legend>
        <input type="" name="apellidos" class="form-control" required="" value="<?php echo $selExmne['apellidos']; ?>" >
     </div>

     <div class="form-group">
        <legend>Email</legend>
        <input type="" name="exEmail" class="form-control" required="" value="<?php echo $selExmne['admin_user']; ?>" >
     </div>

     <div class="form-group">
        <legend>Contrase&ntilde;a</legend>
        <input type="password" name="exPass" class="form-control" required="" value="************" >
     </div>

     <div class="form-group">
        <legend>Role</legend>
        <select class="form-control" name="exRole">
          <option value="0">Seleccionar</option>
          <option value="1">Administrador</option>
          <option value="2">Experto</option>
        </select>
     </div>
  <div class="form-group" align="right">
    <button type="submit" class="btn btn-sm btn-primary">ACtUALIZAR AHORA</button>
  </div>
</form>
  </div>
</fieldset>







