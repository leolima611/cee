
<?php 
  include("../../../conn.php");
  $id = $_GET['id'];
 
  $selCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id='$id' ")->fetch(PDO::FETCH_ASSOC);

 ?>

<fieldset style="width:543px;" >
	<legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;ACTUALIZAR NOMBRE DEL CURSO ( <?php echo strtoupper($selCourse['cou_name']); ?> )</i></legend>
  <div class="col-md-12 mt-4">
<form method="post" id="updateCourseFrm">
     <div class="form-group">
      <legend>NOMBRE DEL CURSO</legend>
    <input type="hidden" name="course_id" value="<?php echo $id; ?>">
    <input type="" name="newCourseName" class="form-control" required="" value="<?php echo $selCourse['cou_name']; ?>" >
  </div>
  <div class="form-group" align="right">
    <button type="submit" class="btn btn-sm btn-primary">ACTUALIZAR AHORA</button>
  </div>
</form>
  </div>
</fieldset>







