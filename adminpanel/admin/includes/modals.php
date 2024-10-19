<!-- Modal For Add Course -->
<div class="modal fade" id="modalForAddCourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addCourseFrm" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR CURSO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>CURSO</label>
            <input type="" name="course_name" id="course_name" class="form-control" placeholder="Nombre del Curso" required="" autocomplete="off">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
        <button type="submit" class="btn btn-primary">AGREGAR AHORA</button>
      </div>
    </div>
   </form>
  </div>
</div>


<!-- Modal For Update Course -->
<div class="modal fade myModal" id="updateCourse-<?php echo $selCourseRow['cou_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
	<div class="modal-dialog " role="document">
		<form class="refreshFrm" id="addCourseFrm" method="post" >
			<div class="modal-content myModal-content" >
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">ACTUALIZAR (<?php echo $selCourseRow['cou_name'];?>)</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="col-md-12">
						<div class="form-group">
							<label>CURSO</label>
							<input type="" name="Nombre del Curso" id="course_name" class="form-control" value="<?php echo $selCourseRow['cou_name']; ?>">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
					<button type="submit" class="btn btn-primary">ACTUALIZAR</button>
				</div>
			</div>
		</form>
	</div>
</div>


<!-- Modal For Add Exam -->
<div class="modal fade" id="modalForExam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addExamFrm" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR EXAMENES</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>Seleccionar Curso</label>
            <select class="form-control" name="courseSelected">
              <option value="0">Seleccionar Curso</option>
              <?php 
                $selCourse = $conn->query("SELECT * FROM course_tbl ORDER BY cou_id DESC");
                if($selCourse->rowCount() > 0)
                {
                  while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
                     <option value="<?php echo $selCourseRow['cou_id']; ?>"><?php echo $selCourseRow['cou_name']; ?></option>
                  <?php }
                }
                else
                { ?>
                  <option value="0">No hay cursos</option>
                <?php }
               ?>
            </select>
          </div>

          <div class="form-group">
            <label>L&iacute;mite del Tiempo</label>
            <select class="form-control" name="timeLimit" required="">
              <option value="0">Seleccionar tiempo</option>
              <option value="10">10 Minutos</option> 
              <option value="20">20 Minutos</option> 
              <option value="30">30 Minutos</option> 
              <option value="40">40 Minutos</option> 
              <option value="50">50 Minutos</option> 
              <option value="60">60 Minutos</option> 
            </select>
          </div>
			<div class="form-group">
            <label>Tipo de Examen</label>
            <select class="form-control" name="examTipe" required="">
              <option value="0">Seleccionar tipo</option>
              <option value="1">Diagnostico</option> 
              <option value="2">De Actividad</option> 
              <option value="3">Final</option>  
            </select>
          </div>

          <div class="form-group">
            <label>Nombre del Examen</label>
            <input type="" name="examTitle" class="form-control" placeholder="Ingresa el Nombre del Examen" required="">
          </div>

          <div class="form-group">
            <label>Descripci&oacute;n del Examen</label>
            <textarea name="examDesc" class="form-control" rows="4" placeholder="Agrega una descripción del examen" required=""></textarea>
          </div>


        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
        <button type="submit" class="btn btn-primary">AGREGAR AHORA</button>
      </div>
    </div>
   </form>
  </div>
</div>

<!-- Modal For Add ADMIN -->
<div class="modal fade" id="modalForAddAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addAdminFrm" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR ADMINISTRADOR</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>Ingresa Nombre</label>
            <input type="" name="namem" id="namem" class="form-control" placeholder="Ingresa Nombre" autocomplete="off" required="">
          </div>
			<div class="form-group">
            	<label>Ingresa Apellidos</label>
            	<input type="" name="apellidos" id="apellidos" class="form-control" placeholder="Ingresa apellidos" autocomplete="off" required="">
          	</div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="emailA" id="emailA" class="form-control" placeholder="Ingresar Email" autocomplete="off" required="">
          </div>
          <div class="form-group">
            <label>Contrase&ntilde;a</label>
            <input type="password" name="passwordA" id="passwordA" class="form-control" placeholder="Ingresar Password" autocomplete="off" required="">
          </div>
			 <div class="form-group">

            	<label>Seleccionar Rol</label>
            	<select class="form-control" name="role" id="role">

              		<option value="0">Seleccionar</option>
              		<option value="1">Administrador</option>
              		<option value="2">Experto</option>
            	</select>
          	</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
        <button type="submit" class="btn btn-primary">AGREGAR AHORA</button>
      </div>
    </div>
   </form>
  </div>
</div>


<!-- Modal For Add Examinee -->
<div class="modal fade" id="modalForAddExaminee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addExamineeFrm" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR ALUMNOS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>Ingresa Nombre Completo</label>
            <input type="" name="fullname" id="fullname" class="form-control" placeholder="Ingresa Nombre Completo" autocomplete="off" required="">
          </div>
          <div class="form-group">
            <label>Fecha de Ingreso</label>
            <input type="date" name="bdate" id="bdate" class="form-control" placeholder="Ingresa fecha de ingreso" autocomplete="off" >
          </div>
          <div class="form-group">
            <label>Seleccionar Genero</label>
            <select class="form-control" name="gender" id="gender">
              <option value="0">Seleccionar Genero</option>
              <option value="Masculino">Masculino</option>
              <option value="femenino">Femenino</option>
            </select>
          </div>
          <div class="form-group">
            <label>Curso</label>
            <select class="form-control" name="course" id="course">
              <option value="0">Seleccionar Curso</option>
              <?php 
                $selCourse = $conn->query("SELECT * FROM course_tbl ORDER BY cou_id asc");
                while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
                  <option value="<?php echo $selCourseRow['cou_id']; ?>"><?php echo $selCourseRow['cou_name']; ?></option>
                <?php }
               ?>
            </select>
          </div>
          <div class="form-group">
            <label>Seleccionar A&ntilde;o</label>
            <select class="form-control" name="year_level" id="year_level">
              <option value="0">Seleccionar A&ntilde;o</option>
              <option value="Primer Año">Primer A&ntilde;o</option>
              <option value="Segundo Año">Segundo A&ntilde;o</option>
              <option value="Tercer Año">Tercer A&ntilde;o</option>
              <option value="Cuarto Año">Cuarto A&ntilde;o</option>
            </select>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Ingresar Email" autocomplete="off" required="">
          </div>
          <div class="form-group">
            <label>Contrase&ntilde;a</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Ingresar Password" autocomplete="off" required="">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
        <button type="submit" class="btn btn-primary">AGREGAR AHORA</button>
      </div>
    </div>
   </form>
  </div>
</div>


<!-- Modal For Add Question -->
<div class="modal fade" id="modalForAddQuestion1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addQuestion1Frm" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR PREGUNTA <br><?php echo $selExamRow['ex_title']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="refreshFrm" method="post" id="addQuestion1Frm">
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>PREGUNTAS</label>
            <input type="hidden" name="examId" value="<?php echo $exId; ?>">
			  <input type="hidden" name="AnsId" value="1">
            <input type="" name="question" id="course_name" class="form-control" placeholder="Ingresar preguntas" autocomplete="off" required>
          </div>

          <fieldset>
            <legend>Ingresa la opci&oacute;n a elegir</legend>
            <div class="form-group">
                <label>Opci&oacute;n A</label>
                <input type="" name="choice_A" id="choice_A" class="form-control" placeholder="Ingresar opción A" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label>Opci&oacute;n B</label>
                <input type="" name="choice_B" id="choice_B" class="form-control" placeholder="Ingresar opción B" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label>Opci&oacute;n C</label>
                <input type="" name="choice_C" id="choice_C" class="form-control" placeholder="Ingresar opción C" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label>Opci&oacute;n D</label>
                <input type="" name="choice_D" id="choice_D" class="form-control" placeholder="Ingresar opción D" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label>Respuesta Correcta</label>
				<select class="form-control" name="correctAnswer" required>
					<option value="1">A</option>
					<option value="2">B</option>
					<option value="3">C</option>
					<option value="4">D</option>
				</select>
            </div>
          </fieldset>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
        <button type="submit" class="btn btn-primary">AGREGAR AHORA</button>
      </div>
      </form>
    </div>
   </form>
  </div>
</div>


<!-- Modal For Add Question2 -->
<div class="modal fade" id="modalForAddQuestion2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addQuestion1Frm" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR PREGUNTA RESPUESTA CORTA<br><?php echo $selExamRow['ex_title']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="refreshFrm" method="post" id="addQuestion1Frm">
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>PREGUNTA</label>
            <input type="hidden" name="examId" value="<?php echo $exId; ?>">
			  <input type="hidden" name="AnsId" value="2">
            <input type="" name="question" id="course_name" class="form-control" placeholder="Ingresar preguntas" autocomplete="off" required>
          </div>

          <fieldset>
            <legend>Ingresa la opci&oacute;n a elegir</legend>
            <div class="form-group">
                <label>Respuesta</label>
                <input type="" name="choice_A" id="choice_A" class="form-control" placeholder="Ingresar Respuesta" autocomplete="off" required>
            </div>
          </fieldset>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
        <button type="submit" class="btn btn-primary">AGREGAR AHORA</button>
      </div>
      </form>
    </div>
   </form>
  </div>
</div>


<!-- Modal For Add Question3 -->
<div class="modal fade" id="modalForAddQuestion3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addQuestion1Frm" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR PREGUNTA RESPUESTA LARGA<br><?php echo $selExamRow['ex_title']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="refreshFrm" method="post" id="addQuestion1Frm">
      <div class="modal-body">
        <div class="col-md-12">
			<label>Este tipo de preguntas requieren revision manual</label>
          <div class="form-group">
            <label>PREGUNTA</label>
            <input type="hidden" name="examId" value="<?php echo $exId; ?>">
			  <input type="hidden" name="AnsId" value="3">
            <input type="" name="question" id="course_name" class="form-control" placeholder="Ingresar pregunta" autocomplete="off" required>
          </div>

          <fieldset>
            <legend>Ingresa la opci&oacute;n a elegir</legend>
            <div class="form-group">
                <label>Respuesta</label>
				<textarea name="choice_A" id="choice_A" class="form-control" placeholder="Ingresar Respuesta" autocomplete="off" style="resize: both;" required></textarea>
            </div>
          </fieldset>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
        <button type="submit" class="btn btn-primary">AGREGAR AHORA</button>
      </div>
      </form>
    </div>
   </form>
  </div>
</div>


<!-- Modal For Add Question4 -->
<div class="modal fade" id="modalForAddQuestion4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addQuestion1Frm" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR PREGUNTA LISTA DESPLEGABLE<br><?php echo $selExamRow['ex_title']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="refreshFrm" method="post" id="addQuestion1Frm">
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>PREGUNTA</label>
            <input type="hidden" name="examId" value="<?php echo $exId; ?>">
			  <input type="hidden" name="AnsId" value="4">
            <input type="" name="question" id="course_name" class="form-control" placeholder="Ingresar pregunta" autocomplete="off" required>
          </div>

          <fieldset>
            <legend>Ingresa la opci&oacute;n a elegir</legend>
            <div class="form-group">
                <label>Opci&oacute;n 1</label>
                <input type="" name="choice_A" id="choice_A" class="form-control" placeholder="Ingresar opción 1" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label>Opci&oacute;n 2</label>
                <input type="" name="choice_B" id="choice_B" class="form-control" placeholder="Ingresar opción 2" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label>Opci&oacute;n 3</label>
                <input type="" name="choice_C" id="choice_C" class="form-control" placeholder="Ingresar opción 3" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label>Opci&oacute;n 4</label>
                <input type="" name="choice_D" id="choice_D" class="form-control" placeholder="Ingresar opción 4" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label>Respuesta Correcta</label>
				<select class="form-control" name="correctAnswer" required>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
				</select>
            </div>
          </fieldset>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
        <button type="submit" class="btn btn-primary">AGREGAR AHORA</button>
      </div>
      </form>
    </div>
   </form>
  </div>
</div>


<!-- Modal For Add Question5 -->
<div class="modal fade" id="modalForAddQuestion5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="refreshFrm" id="addQuestion1Frm" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">AGREGAR PREGUNTA (VARIAS OPCIONES)<br><?php echo $selExamRow['ex_title']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="refreshFrm" method="post" id="addQuestion1Frm">
                    <div class="modal-body">
                        <div class="col-md-12">
                            <label>Marque las check box de las respuestas correctas</label>
                            <div class="form-group">
                                <label>PREGUNTA</label>
                                <input type="hidden" name="examId" value="<?php echo $exId; ?>">
                                <input type="hidden" name="AnsId" value="5">
                                <input type="" name="question" id="course_name" class="form-control" placeholder="Ingresar pregunta" autocomplete="off" required>
                            </div>

                            <fieldset>
                                <legend>Ingresa la opci&oacute;n a elegir</legend>
                                <div class="form-group">
                                    <label>Opci&oacute;n 1</label>
                                    <input type="checkbox" name="status_A" id="exampleCheckbox">
                                    <input type="" name="choice_A" id="choice_A" class="form-control" placeholder="Ingresar opción 1" autocomplete="off" required>
                                </div>

                                <div class="form-group">
                                    <label>Opci&oacute;n 2</label>
                                    <input type="checkbox" name="status_B" id="exampleCheckbox2">
                                    <input type="" name="choice_B" id="choice_B" class="form-control" placeholder="Ingresar opción 2" autocomplete="off" required>
                                </div>

                                <div class="form-group">
                                    <label>Opci&oacute;n 3</label>
                                    <input type="checkbox" name="status_C" id="exampleCheckbox">
                                    <input type="" name="choice_C" id="choice_C" class="form-control" placeholder="Ingresar opción 3" autocomplete="off" required>
                                </div>

                                <div class="form-group">
                                    <label>Opci&oacute;n 4</label>
                                    <input type="checkbox" name="status_D" id="exampleCheckbox">
                                    <input type="" name="choice_D" id="choice_D" class="form-control" placeholder="Ingresar opción 4" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label>Opci&oacute;n 4</label>
                                    <input type="checkbox" name="status_E" id="exampleCheckbox">
                                    <input type="" name="choice_E" id="choice_E" class="form-control" placeholder="Ingresar opción 5" autocomplete="off" required>
                                </div>
								<div class="form-group">
                                    <label>Opci&oacute;n 4</label>
                                    <input type="checkbox" name="status_F" id="exampleCheckbox">
                                    <input type="" name="choice_F" id="choice_F" class="form-control" placeholder="Ingresar opción 6" autocomplete="off" required>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                        <button type="submit" class="btn btn-primary">AGREGAR AHORA</button>
                    </div>
                </form>
            </div>
        </form>
    </div>
</div>


<!-- Modal For Add Topic -->
<div class="modal fade" id="modalForAddTopic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="refreshFrm" id="addTopicFrm" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">AGREGAR TEMA AL CURSO <br><?php echo $selExamRow['cou_name']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="refreshFrm" method="post" id="addTopicFrm">
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>NOMBRE DEL TEMA</label>
                                <input type="hidden" name="couId" value="<?php echo $exId; ?>">
								<input type="hidden" name="tipeAc" value="1">
                                <input type="" name="name" id="course_name" class="form-control" placeholder="Ingresar Tema" autocomplete="off" required>
                            </div>
							<div class="form-group">
                                <label>NIVEL DE ACTIVIDAD</label>
                                <input type="number" name="num" id="num" class="form-control" placeholder="Ingresar nivel de tema" autocomplete="off" required>
                            </div>
							<div class="form-group">
								<label>Texto Tema</label>
								 <textarea name="text" class="form-control" rows="2" required=""></textarea>
							</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                        <button type="submit" class="btn btn-primary">AGREGAR AHORA</button>
                    </div>
                </form>
            </div>
        </form>
    </div>
</div>


<!-- Modal For Add PDF -->
<div class="modal fade" id="modalForAddpdf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="refreshFrm" id="addPDFFrm" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">AGREGAR PDF AL CURSO <br><?php echo $selExamRow['cou_name']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="refreshFrm" method="post" id="addPDFFrm">
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>NOMBRE DEL TEMA</label>
                                <input type="hidden" name="couId" value="<?php echo $exId; ?>">
								<input type="hidden" name="tipeAc" value="2">
                                <input type="" name="name" id="course_name" class="form-control" placeholder="Ingresa Titulo de PDF" autocomplete="off" required>
                            </div>
							<div class="form-group">
                                <label>NIVEL DE ACTIVIDAD</label>
                                <input type="number" name="num" id="num" class="form-control" placeholder="Ingresar nivel de tema" autocomplete="off" required>
                            </div>
							<div class="form-group">
                				<label>SUBIR ARCHIVO PDF</label>
                				<input type="file" name="pdf_file" id="pdf_file" class="form-control" accept="application/pdf" required>
							</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                        <button type="submit" class="btn btn-primary">AGREGAR AHORA</button>
                    </div>
                </form>
            </div>
        </form>
    </div>
</div>


<!-- Modal For Add Link -->
<div class="modal fade" id="modalForAddLink" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="refreshFrm" id="addLinkFrm" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">AGREGAR UN LINK<br><?php echo $selExamRow['cou_name']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="refreshFrm" method="post" id="addLinkFrm">
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>NOMBRA EL URL</label>
                                <input type="hidden" name="couId" value="<?php echo $exId; ?>">
								<input type="hidden" name="tipeAc" value="3">
                                <input type="" name="name" id="course_name" class="form-control" placeholder="Ingresar nombre" autocomplete="off" required>
                            </div>
							<div class="form-group">
                                <label>NIVEL DE ACTIVIDAD</label>
                                <input type="number" name="num" id="num" class="form-control" placeholder="Ingresar nivel de tema" autocomplete="off" required>
                            </div>
							<div class="form-group">
                                <label>LINK</label>
                                <input type="url" name="link" id="num" class="form-control" placeholder="Ingresar Link" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                        <button type="submit" class="btn btn-primary">AGREGAR AHORA</button>
                    </div>
                </form>
            </div>
        </form>
    </div>
</div>


<!-- Modal For Add Youtube -->
<div class="modal fade" id="modalForAddYoutube" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="refreshFrm" id="addLinkFrm" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">AGREGAR UN LINK DE YOUTUBE<br><?php echo $selExamRow['cou_name']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="refreshFrm" method="post" id="addLinkFrm">
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>NOMBRA EL VIDEO DE YOUTUBE</label>
                                <input type="hidden" name="couId" value="<?php echo $exId; ?>">
								<input type="hidden" name="tipeAc" value="4">
                                <input type="" name="name" id="course_name" class="form-control" placeholder="Ingresar nombre" autocomplete="off" required>
                            </div>
							<div class="form-group">
                                <label>NIVEL DE ACTIVIDAD</label>
                                <input type="number" name="num" id="num" class="form-control" placeholder="Ingresar nivel de tema" autocomplete="off" required>
                            </div>
							<div class="form-group">
                                <label>LINK</label>
                                <input type="url" name="link" id="num" class="form-control" placeholder="Ingresar Link" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                        <button type="submit" class="btn btn-primary">AGREGAR AHORA</button>
                    </div>
                </form>
            </div>
        </form>
    </div>
</div>


<!-- Modal For Add Embed -->
<div class="modal fade" id="modalForAddEmbed" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="refreshFrm" id="addEmbedFrm" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">AGREGAR UN EMBED<br><?php echo $selExamRow['cou_name']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="refreshFrm" method="post" id="addEmbedFrm">
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>NOMBRA EL EMBED</label>
                                <input type="hidden" name="couId" value="<?php echo $exId; ?>">
								<input type="hidden" name="tipeAc" value="7">
                                <input type="" name="name" id="course_name" class="form-control" placeholder="Ingresar nombre" autocomplete="off" required>
                            </div>
							<div class="form-group">
                                <label>NIVEL DE ACTIVIDAD</label>
                                <input type="number" name="num" id="num" class="form-control" placeholder="Ingresar nivel de tema" autocomplete="off" required>
                            </div>
							<div class="form-group">
                                <label>LINK</label>
                                <input type="url" name="link" id="num" class="form-control" placeholder="Ingresar Link" autocomplete="off" required>
                            </div>
							<div class="form-group">
                                <label>CONFIGURACIONES EXTRAS</label><br>
								<spam>agrega configuraciones para el EMBED como por ejemplo: width="600" height="400" type="application/pdf"</spam>
                                <input type="text" name="conf" id="conf" class="form-control" placeholder="Ingresar Configuracion" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                        <button type="submit" class="btn btn-primary">AGREGAR AHORA</button>
                    </div>
                </form>
            </div>
        </form>
    </div>
</div>


<!-- Modal For Add ExamTopic -->
<div class="modal fade" id="modalForAddExamA" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="refreshFrm" id="addExamAFrm" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">AGREGAR UN EXAMEN<br><?php echo $selExamRow['cou_name']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="refreshFrm" method="post" id="addExamAFrm">
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>NOMBRA EL EXAMEN</label>
                                <input type="hidden" name="couId" value="<?php echo $exId; ?>">
								<input type="hidden" name="tipeAc" value="8">
                                <input type="" name="name" id="course_name" class="form-control" placeholder="Ingresar nombre" autocomplete="off" required>
                            </div>
							<div class="form-group">
                                <label>NIVEL DE ACTIVIDAD</label>
                                <input type="number" name="num" id="num" class="form-control" placeholder="Ingresar nivel de Actividad" autocomplete="off" required>
                            </div>
							<div class="form-group">
                                <label>SELECCIONA EXAMEN</label>
								<select class="form-control" name="selectExam">
									<option value="0">Seleccionar Examen</option>
									<?php 
									$selExamA = $conn->query("SELECT * FROM exam_tbl WHERE cou_id='$exId' ORDER BY ex_id DESC");
									if($selExamA->rowCount() > 0){
										while ($selExamARow = $selExamA->fetch(PDO::FETCH_ASSOC)) { 
											if($selExamARow['id_tipe'] == 1){
												$tipoE = "Diagnostico";
											}elseif($selExamARow['id_tipe'] == 2){
												$tipoE = "Actividad";
											}elseif($selExamARow['id_tipe'] == 3){
												$tipoE = "Final";
											}
									?>
									<option value="<?php echo $selExamARow['ex_id']; ?>"><?=$tipoE;?> : <?php echo $selExamARow['ex_title']; ?></option>
									<?php 
										}
									}
									else{ 
									?>
									<option value="0">No hay Examenes</option>
									<?php 
									}
									?>
								</select>
                            </div>
							<div class="form-group">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                        <button type="submit" class="btn btn-primary">AGREGAR AHORA</button>
                    </div>
                </form>
            </div>
        </form>
    </div>
</div>