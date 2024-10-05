
<?php 
  include("../../../conn.php");
  $id = $_GET['id'];
 
  $selTopic = $conn->query("SELECT * FROM topic_cou WHERE idtopic_cou='$id' ")->fetch(PDO::FETCH_ASSOC);

 ?>

<fieldset style="width:543px;" >
	<legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;ACTUALIZAR TEMA</i></legend>
  
  <div class="col-md-12 mt-4">
    <form method="post" id="updateTopicFrm">
      <div class="form-group">
        <legend>Nombre</legend>
		  <input type="hidden" name="topicid" value="<?php echo $id; ?>">
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







