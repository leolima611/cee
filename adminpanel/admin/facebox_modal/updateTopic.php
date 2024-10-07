<?php 
include("../../../conn.php");
$id = $_GET['id'];
$act = $_GET['ac'];

$selTopic = $conn->query("SELECT * FROM topic_cou WHERE idtopic_cou='$id' ")->fetch(PDO::FETCH_ASSOC);

if($act == 1){
?>
<fieldset style="width:543px;" >
	<legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;ACTUALIZAR TEMA</i></legend>
  
  <div class="col-md-12 mt-4">
    <form method="post" id="updateTopicFrm">
      <div class="form-group">
        <legend>Nombre</legend>
		  <input type="hidden" name="topicid" value="<?php echo $id; ?>">
		  <input type="hidden" name="tipeAc" value="2">
        <input type="" name="name" class="form-control" placeholder="Ingresar Tema" autocomplete="off" value="<?=$selTopic['name']; ?>" required>
      </div>
		<div class="form-group">
            <input type="hidden" name="num" id="num" class="form-control" placeholder="Ingresar nivel de tema" autocomplete="off" value="<?=$selTopic['activity_num']; ?>" required>
		</div>
      <div class="form-group" align="right">
        <button type="submit" class="btn btn-sm btn-primary">ACTUALIZAR AHORA</button>
      </div>
    </form>
  </div>
</fieldset>
<?php
}
elseif($act == 2){
?>
<fieldset style="width:543px;" >
	<legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;ACTUALIZAR PDF</i></legend>
	
	<div class="col-md-12 mt-4">
		<form method="post" id="updateTopicFrm">
			<div class="form-group">
				<legend>Nombre</legend>
				<input type="hidden" name="topicid" value="<?php echo $id; ?>">
				<input type="hidden" name="tipeAc" value="2">
				<input type="" name="name" class="form-control" placeholder="Ingresar Tema" autocomplete="off" value="<?=$selTopic['name']; ?>" required>
			</div>
			<div class="form-group">
				<input type="hidden" name="num" id="num" class="form-control" placeholder="Ingresar nivel de tema" autocomplete="off" value="<?=$selTopic['activity_num']; ?>" required>
			</div>
			<div class="form-group" align="right">
				<button type="submit" class="btn btn-sm btn-primary">ACTUALIZAR AHORA</button>
			</div>
		</form>
	</div>
</fieldset>
<?php
}
elseif($act == 3){
?>
<fieldset style="width:543px;" >
	<legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;ACTUALIZAR lINK</i></legend>
	
	<div class="col-md-12 mt-4">
		<form method="post" id="updateTopicFrm">
			<div class="form-group">
				<legend>Nombre</legend>
				<input type="hidden" name="topicid" value="<?php echo $id; ?>">
				<input type="hidden" name="tipeAc" value="3">
				<input type="" name="name" class="form-control" placeholder="Ingresar Tema" autocomplete="off" value="<?=$selTopic['name']; ?>" required>
			</div>
			<div class="form-group">
				<input type="hidden" name="num" id="num" class="form-control" placeholder="Ingresar nivel de tema" autocomplete="off" value="<?=$selTopic['activity_num']; ?>" required>
			</div>
			<div class="form-group">
				<legend>URL</legend>
				<input type="url" name="link" id="link" class="form-control" placeholder="Ingresar url" autocomplete="off" value="<?=$selTopic['valor']; ?>" required>
			</div>
			<div class="form-group" align="right">
				<button type="submit" class="btn btn-sm btn-primary">ACTUALIZAR AHORA</button>
			</div>
		</form>
	</div>
</fieldset>
<?php
}
elseif($act == 4){
?>
<fieldset style="width:543px;" >
	<legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;ACTUALIZAR YOUTUBE LINK</i></legend>
	
	<div class="col-md-12 mt-4">
		<form method="post" id="updateTopicFrm">
			<div class="form-group">
				<legend>Nombre</legend>
				<input type="hidden" name="topicid" value="<?php echo $id; ?>">
				<input type="hidden" name="tipeAc" value="4">
				<input type="" name="name" class="form-control" placeholder="Ingresar Tema" autocomplete="off" value="<?=$selTopic['name']; ?>" required>
			</div>
			<div class="form-group">
				<input type="hidden" name="num" id="num" class="form-control" placeholder="Ingresar nivel de tema" autocomplete="off" value="<?=$selTopic['activity_num']; ?>" required>
			</div>
			<div class="form-group">
				<legend>URL</legend>
				<input type="url" name="link" id="link" class="form-control" placeholder="Ingresar url" autocomplete="off" value="<?=$selTopic['valor']; ?>" required>
			</div>
			<div class="form-group" align="right">
				<button type="submit" class="btn btn-sm btn-primary">ACTUALIZAR AHORA</button>
			</div>
		</form>
	</div>
</fieldset>
<?php
}elseif($act == 7){
?>
<fieldset style="width:543px;" >
	<legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;ACTUALIZAR TEMA</i></legend>
	
	<div class="col-md-12 mt-4">
		<form method="post" id="updateTopicFrm">
			<div class="form-group">
				<legend>Nombre</legend>
				<input type="hidden" name="topicid" value="<?php echo $id; ?>">
				<input type="hidden" name="tipeAc" value="7">
				<input type="" name="name" class="form-control" placeholder="Ingresar Tema" autocomplete="off" value="<?=$selTopic['name']; ?>" required>
			</div>
			<div class="form-group">
				<input type="hidden" name="num" id="num" class="form-control" placeholder="Ingresar nivel de tema" autocomplete="off" value="<?=$selTopic['activity_num']; ?>" required>
			</div>
			<div class="form-group">
				<legend>URL</legend>
				<input type="url" name="link" id="link" class="form-control" placeholder="Ingresar url" autocomplete="off" value="<?=$selTopic['valor']; ?>" required>
			</div>
			<div class="form-group">
				<legend>CONFIGURACION</legend>
				<input type="text" name="config" id="config" class="form-control" placeholder="Ingresar url" autocomplete="off" value="<?php echo htmlspecialchars($selTopic['config'], ENT_QUOTES, 'UTF-8'); ?>" required>
			</div>
			<div class="form-group" align="right">
				<button type="submit" class="btn btn-sm btn-primary">ACTUALIZAR AHORA</button>
			</div>
		</form>
	</div>
</fieldset>
<?php
}
?>





