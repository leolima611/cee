
<?php 
  include("../../../conn.php");
  $id = $_GET['id'];
 
  $selCourse = $conn->query("SELECT * FROM exam_question_tbl WHERE eqt_id='$id' ")->fetch(PDO::FETCH_ASSOC);

 ?>

<fieldset style="width:543px;" >
	<legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;ACTUALIZAR PREGUNTAS</i></legend>
  
  <div class="col-md-12 mt-4">
    <form method="post" id="updateQuestionFrm">
      <div class="form-group">
        <legend>Pregunta</legend>
        <input type="hidden" name="question_id" value="<?php echo $id; ?>">
        <textarea name="question" class="form-control" rows="2" required=""><?php echo $selCourse['exam_question']; ?></textarea>
      </div>


      <div class="form-group">
        <legend>Opci&oacute;n A</legend>
        <input type="" name="exam_ch1" value="<?php echo $selCourse['exam_ch1']; ?>" class="form-control" required>
      </div>
      <div class="form-group">
        <legend>Opci&oacute;n B</legend>
        <input type="" name="exam_ch2" value="<?php echo $selCourse['exam_ch2']; ?>" class="form-control" required>
      </div>
      <div class="form-group">
        <legend>Opci&oacute;n C</legend>
        <input type="" name="exam_ch3" value="<?php echo $selCourse['exam_ch3']; ?>" class="form-control" required>
      </div>
      <div class="form-group">
        <legend>Opci&oacute;n D</legend>
        <input type="" name="exam_ch4" value="<?php echo $selCourse['exam_ch4']; ?>" class="form-control" required>
      </div>

      <div class="form-group">
        <legend class="text-success">Respuesta Correcta</legend>
        <input type="" name="exam_final" value="<?php echo $selCourse['exam_answer']; ?>" class="form-control" required>
      </div>


      <div class="form-group" align="right">
        <button type="submit" class="btn btn-sm btn-primary">ACTUALIZAR AHORA</button>
      </div>
    </form>
  </div>
</fieldset>







