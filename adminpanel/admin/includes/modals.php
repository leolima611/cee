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
<div class="modal fade myModal" id="updateCourse-<?php echo $selCourseRow['cou_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
     <form class="refreshFrm" id="addCourseFrm" method="post" >
       <div class="modal-content myModal-content" >
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ACTUALIZAR ( <?php echo $selCourseRow['cou_name']; ?> )</h5>
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
            <label>Limite del Tiempo</label>
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
            <label>Limite de Preguntas</label>
            <input type="number" name="examQuestDipLimit" id="" class="form-control" placeholder="Ingresa el limite de preguntas">
          </div>

          <div class="form-group">
            <label>Nombre del Examen</label>
            <input type="" name="examTitle" class="form-control" placeholder="Ingresa el Nombre del Examen" required="">
          </div>

          <div class="form-group">
            <label>Descripción del Examen</label>
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
            <label>Seleccionar Año</label>
            <select class="form-control" name="year_level" id="year_level">
              <option value="0">Seleccionar Año</option>
              <option value="Primer Año">Primer Año</option>
              <option value="Segundo Año">Segundo Año</option>
              <option value="Tercer Año">Tercer Año</option>
              <option value="Cuarto Año">Cuarto Año</option>
            </select>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Ingresar Email" autocomplete="off" required="">
          </div>
          <div class="form-group">
            <label>Password</label>
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
<div class="modal fade" id="modalForAddQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addQuestionFrm" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR PREGUNTAS <br><?php echo $selExamRow['ex_title']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="refreshFrm" method="post" id="addQuestionFrm">
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>PREGUNTAS</label>
            <input type="hidden" name="examId" value="<?php echo $exId; ?>">
            <input type="" name="question" id="course_name" class="form-control" placeholder="Ingresar preguntas" autocomplete="off">
          </div>

          <fieldset>
            <legend>Ingresa la opción a elegir</legend>
            <div class="form-group">
                <label>Opción A</label>
                <input type="" name="choice_A" id="choice_A" class="form-control" placeholder="Ingresar opción A" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Opción B</label>
                <input type="" name="choice_B" id="choice_B" class="form-control" placeholder="Ingresar opción B" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Opción C</label>
                <input type="" name="choice_C" id="choice_C" class="form-control" placeholder="Ingresar opción C" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Opción D</label>
                <input type="" name="choice_D" id="choice_D" class="form-control" placeholder="Ingresar opción D" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Respuesta Correcta</label>
                <input type="" name="correctAnswer" id="" class="form-control" placeholder="Ingresar opción correcta" autocomplete="off">
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