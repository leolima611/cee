
<?php 

//te quedaste aqui  borra esto
  include("../../../conn.php");
  $id = $_GET['id'];
 
  $selExmne = $conn->query("SELECT * FROM examinee_tbl WHERE exmne_id='$id' ")->fetch(PDO::FETCH_ASSOC);

 ?>

<fieldset style="width:543px;" >
	<legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;ACTUALIZAR INFORMACI&Oacute;N <b>( <?php echo strtoupper($selExmne['exmne_fullname']); ?> )</b></i></legend>
  <div class="col-md-12 mt-4">
<form method="post" id="updateExamineeFrm">
     <div class="form-group">
        <legend>Nombre Completo</legend>
        <input type="hidden" name="exmne_id" value="<?php echo $id; ?>">
        <input type="" name="exFullname" class="form-control" required="" value="<?php echo $selExmne['exmne_fullname']; ?>" >
     </div>

     <div class="form-group">
        <legend>Genero</legend>
        <select class="form-control" name="exGender">
          <option value="<?php echo $selExmne['exmne_gender']; ?>"><?php echo $selExmne['exmne_gender']; ?></option>
          <option value="male">Masculino</option>
          <option value="female">Femenino</option>
        </select>
     </div>

     <div class="form-group">
        <legend>Fecha de Ingreso</legend>
        <input type="date" name="exBdate" class="form-control" required="" value="<?php echo date('Y-m-d',strtotime($selExmne["exmne_birthdate"])) ?>"/>
     </div>

     <div class="form-group">
        <legend>Curso</legend>
        <?php 
            $exmneCourse = $selExmne['exmne_course'];
            $selCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id='$exmneCourse' ")->fetch(PDO::FETCH_ASSOC);
         ?>
         <select class="form-control" name="exCourse">
           <option value="<?php echo $exmneCourse; ?>"><?php echo $selCourse['cou_name']; ?></option>
           <?php 
             $selCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id!='$exmneCourse' ");
             while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
              <option value="<?php echo $selCourseRow['cou_id']; ?>"><?php echo $selCourseRow['cou_name']; ?></option>
            <?php  }
            ?>
         </select>
     </div>

     <div class="form-group">
        <legend>Actualizar a&ntilde;o</legend>
        <input type="" name="exYrlvl" class="form-control" required="" value="<?php echo $selExmne['exmne_year_level']; ?>" >
     </div>

     <div class="form-group">
        <legend>Email</legend>
        <input type="" name="exEmail" class="form-control" required="" value="<?php echo $selExmne['exmne_email']; ?>" >
     </div>

     <div class="form-group">
        <legend>Contrase&ntilde;a</legend>
        <input type="" name="exPass" class="form-control" required="" value="<?php echo $selExmne['exmne_password']; ?>" >
     </div>

     <div class="form-group">
        <legend>Estado</legend>
        <input type="hidden" name="course_id" value="<?php echo $id; ?>">
        <input type="" name="newCourseName" class="form-control" required="" value="<?php echo $selExmne['exmne_status']; ?>" >
     </div>
  <div class="form-group" align="right">
    <button type="submit" class="btn btn-sm btn-primary">ACtUALIZAR AHORA</button>
  </div>
</form>
  </div>
</fieldset>







