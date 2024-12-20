// Admin Log in
$(document).on("submit","#adminLoginFrm", function(){
   $.post("query/loginExe.php", $(this).serialize(), function(data){
      if(data.res == "invalid")
      {
        Swal.fire(
          'Invalido',
          'Coloque un usuario o contraseña valida porfavor',
          'error'
        )
      }
      else if(data.res == "success")
      {
        $('body').fadeOut();
        window.location.href='home.php';
      }
   },'json');

   return false;
});


// Submit Answer
$(document).on('submit', '#submitCofrn', function() {
    Swal.fire({
        title: '¿Está seguro?',
        text: "¿Desea enviar la evaluación?",
        icon: 'warning',
        showCancelButton: true,
        allowOutsideClick: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, enviar'
    }).then((result) => {
        if (result.value) {

            $.post("query/submitAnsCoExe.php", $(this).serialize(), function(data) {

                if (data.res == "already") {
                    Swal.fire(
                        'Ya Calificado',
                        "Ya Calificaste este examen",
                        'error'
                    )
                } else if (data.res == "success") {
                    Swal.fire({
                        title: 'Exitoso',
                        text: "La evaluación se ha enviado",
                        icon: 'success',
                        allowOutsideClick: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK!'
                    }).then((result) => {
                        if (result.value) {
                            $('#submitCofrn')[0].reset();
                            var exam_id = $('#exam_id').val();
                            window.location.href = 'home.php?page=ranking-exam&exam_id=' + exam_id;
                        }

                    });
                } else if (data.res == "failed") {
                    Swal.fire(
                        'Error',
                        "Algo salio mal",
                        'error'
                    )
                }
            }, 'json');
        }
    });
    return false;
});


// Add Course 
$(document).on("submit","#addCourseFrm" , function(){
	$.post("query/addCourseExe.php", $(this).serialize() , function(data){
		if(data.res == "exist"){
			Swal.fire(
				'Ya existe',
				data.course_name.toUpperCase() + '<br> Se sugiere que revise los cursos nuevamente',
				'error'
			)
		}
		else if(data.res == "success"){
			Swal.fire(
				'Exitoso',
				data.course_name.toUpperCase() + ' Agregado correctamente',
				'success'
			)
			// $('#course_name').val("");
			refreshDiv();
			setTimeout(function(){
				$('#body').load(document.URL);
			}, 2000);
		}
  },'json')
  return false;
});

// Update Course
$(document).on("submit","#updateCourseFrm" , function(){
  $.post("query/updateCourseExe.php", $(this).serialize() , function(data){
     if(data.res == "success")
     {
        Swal.fire(
            'Exitoso',
            'El curso seleccionado ha sido actualizado',
            'success'
          )
          refreshDiv();
     }
  },'json')
  return false;
});


// Delete Course
$(document).on("click", "#deleteCourse", function(e){
    e.preventDefault();
    var id = $(this).data("id");
     $.ajax({
      type : "post",
      url : "query/deleteCourseExe.php",
      dataType : "json",  
      data : {id:id},
      cache : false,
      success : function(data){
        if(data.res == "success")
        {
          Swal.fire(
            'Exitoso',
            'El curso seleccionado ha sido eliminado',
            'success'
          )
          refreshDiv();
        }else if(data.res == "failE"){
			Swal.fire(
            'Error',
            'tienes elementos asignados al curso',
            'Error'
          )
          refreshDiv();
		}
      },
      error : function(xhr, ErrorStatus, error){
        console.log(status.error);
      }

    });
    
   

    return false;
  });


// Delete Exam
$(document).on("click", "#deleteExam", function(e){
    e.preventDefault();
    var id = $(this).data("id");
     $.ajax({
      type : "post",
      url : "query/deleteExamExe.php",
      dataType : "json",  
      data : {id:id},
      cache : false,
      success : function(data){
        if(data.res == "success")
        {
          Swal.fire(
            'Exitoso',
            'El Examen seleccionado ha sido eliminado',
            'success'
          )
          refreshDiv();
        }
      },
      error : function(xhr, ErrorStatus, error){
        console.log(status.error);
      }

    });
    
   

    return false;
  });


// Delete Admin
$(document).on("click", "#deleteAdmin", function(e){
    e.preventDefault();
    var id = $(this).data("id");
     $.ajax({
      type : "post",
      url : "query/deleteAdminExe.php",
      dataType : "json",  
      data : {id:id},
      cache : false,
      success : function(data){
        if(data.res == "success")
        {
          Swal.fire(
            'Exitoso',
            'La cuenta ha sido eliminada',
            'success'
          )
          refreshDiv();
        }
      },
      error : function(xhr, ErrorStatus, error){
        console.log(status.error);
      }

    });
    
   

    return false;
  });


// Delete file
$(document).on("click", "#deleteFile", function(e){
    e.preventDefault();
    var file = $(this).data("file");
     $.ajax({
      type : "post",
      url : "query/deleteFileExe.php",
      dataType : "json",  
      data : {file:file},
      cache : false,
      success : function(data){
        if(data.res == "success")
        {
          Swal.fire(
            'Exitoso',
            'El archivo ha sido eliminado',
            'success'
          )
          refreshDiv();
        }
      },
      error : function(xhr, ErrorStatus, error){
        console.log(status.error);
      }

    });
	
  return false;
  });


// Delete file AUDIO
$(document).on("click", "#deleteFileA", function(e){
    e.preventDefault();
    var file = $(this).data("file");
     $.ajax({
      type : "post",
      url : "query/deleteFileAExe.php",
      dataType : "json",  
      data : {file:file},
      cache : false,
      success : function(data){
        if(data.res == "success")
        {
          Swal.fire(
            'Exitoso',
            'El archivo ha sido eliminado',
            'success'
          )
          refreshDiv();
        }
      },
      error : function(xhr, ErrorStatus, error){
        console.log(status.error);
      }

    });
	
  return false;
  });


// Add Exam 
$(document).on("submit","#addExamFrm" , function(){
  $.post("query/addExamExe.php", $(this).serialize() , function(data){
    if(data.res == "noSelectedCourse")
   {
      Swal.fire(
          'No seleccionó un curso',
          'Seleccione un curso porfavor',
          'error'
       )
    }
    if(data.res == "noSelectedTime")
   {
      Swal.fire(
          'No seleccionó un limite de tiempo',
          'Seleccione un limite de tiempo porfavor',
          'error'
       )
    }
	  else if(data.res == "noTipe")
    {
      Swal.fire(
        'No seleccionó el tipo de examen',
          'Seleccione un tipo de examen porfavor',
          'error'
      )
    }
     else if(data.res == "exist")
    {
      Swal.fire(
        'Ya existe',
        data.examTitle.toUpperCase() + '<br> Se sugiere que cambie el nombre',
        'error'
      )
    }
    else if(data.res == "success")
    {
      Swal.fire(
        'Agregado',
        data.examTitle.toUpperCase() + '<br>Se añadio correctamente',
        'success'
      )
          $('#addExamFrm')[0].reset();
          $('#course_name').val("");
          refreshDiv();
    }
  },'json')
  return false;
});



// Update Exam 
$(document).on("submit","#updateExamFrm" , function(){
  $.post("query/updateExamExe.php", $(this).serialize() , function(data){
    if(data.res == "success")
    {
      Swal.fire(
          'Actualizado',
          data.msg + ' <br>Se ha actualizado correctamente',
          'success'
       )
          refreshDiv();
    }
    else if(data.res == "failed")
    {
      Swal.fire(
        "Algo salio mal!",
         'Algo salio mal, verifique los datos porfavor',
        'error'
      )
    }
   
  },'json')
  return false;
});


// Update Topic
$(document).on("submit","#updateTopicFrm" , function(){
  $.post("query/updateTopicExe.php", $(this).serialize() , function(data){
     if(data.res == "success")
     {
        Swal.fire(
            'Exitoso',
            'El tema seleccionada se ha actualizado correctamente',
            'success'
          )
          refreshDiv();
     }
  },'json')
  return false;
});


// Delete Question
$(document).on("click", "#deleteQuestion", function(e){
    e.preventDefault();
    var id = $(this).data("id");
     $.ajax({
      type : "post",
      url : "query/deleteQuestionExe.php",
      dataType : "json",  
      data : {id:id},
      cache : false,
      success : function(data){
        if(data.res == "success")
        {
          Swal.fire(
            'Se eliminó correctamente',
            'La pregunta seleccionada se ha eliminado',
            'success'
          )
          refreshDiv();
        }
      },
      error : function(xhr, ErrorStatus, error){
        console.log(status.error);
      }

    });
    
   

    return false;
  });


// Delete Topic
$(document).on("click", "#deleteTopic", function(e){
    e.preventDefault();
    var id = $(this).data("id");
     $.ajax({
      type : "post",
      url : "query/deleteTopicExe.php",
      dataType : "json",  
      data : {id:id},
      cache : false,
      success : function(data){
        if(data.res == "success")
        {
          Swal.fire(
            'Se eliminó correctamente',
            'El tema seleccionado ha sido eliminado',
            'success'
          )
          refreshDiv();
        }
      },
      error : function(xhr, ErrorStatus, error){
        console.log(status.error);
      }

    });
    
   

    return false;
  });


// Add Question 
$(document).on("submit","#addQuestion1Frm" , function(){
  $.post("query/addQuestionExe.php", $(this).serialize() , function(data){
    if(data.res == "error")
    {
      Swal.fire(
          'Error',
          data.msg + '<br>',
          'error'
       )
    }
    else if(data.res == "success")
    {
      Swal.fire(
        'Exitoso',
         data.msg + '<br>La pregunta se añadio correctamente',
        'success'
      )
        $('#addQuestionFrm')[0].reset();
        refreshDiv();
    }
   
  },'json')
  return false;
});


// Add admin
$(document).on("submit","#addAdminFrm" , function(){
  $.post("query/addAdminExe.php", $(this).serialize() , function(data){
	if(data.res == "noRole")
    {
      Swal.fire(
          'No hay un rol',
          'Porfavor seleccione un rol',
          'error'
       )
    }
    else if(data.res == "fullnameExist")
    {
      Swal.fire(
          'Ese nombre ya existe',
          data.msg + ' ya se encuentra registrado',
          'error'
       )
    }
    else if(data.res == "emailExist")
    {
      Swal.fire(
          'Ese Email ya esixte',
          data.msg + ' Ese Email ya se encuentra registrado',
          'error'
       )
    }
    else if(data.res == "success")
    {
      Swal.fire(
          'Exitoso',
          data.msg + 'Se ha añadido correctamente',
          'success'
       )
        refreshDiv();
        $('#addExamineeFrm')[0].reset();
    }
    else if(data.res == "failed")
    {
      Swal.fire(
          "Algo salio mal",
          ' ',
          'error'
       )
    }


    
  },'json')
  return false;
});


//update admin
$(document).on("submit","#updateAdminFrm" , function(){
	$.post("query/updateAdminExe.php", $(this).serialize() , function(data){
		if(data.res == "success"){
			Swal.fire(    
				'Exitoso'
				,data.exFullname + ' <br>Ha sido actualizado correctamente!',
				'success'
			)
			refreshDiv();
		}
		else if(data.res == "norole")
		{
			Swal.fire(
				'No hay un rol',
				'Seleccione un rol porfavor',
				'error'
			)
		}
  },'json')
  return false;
});


// Add Examinee
$(document).on("submit","#addExamineeFrm" , function(){
  $.post("query/addExamineeExe.php", $(this).serialize() , function(data){
    if(data.res == "noGender")
    {
      Swal.fire(
          'No se seleccionó el genero',
          'Seleccione un genero porfavor',
          'error'
       )
    }
    else if(data.res == "noCourse")
    {
      Swal.fire(
          'No se seleccionó un curso',
          'Seleccione un curso porfavor',
          'error'
       )
    }
    else if(data.res == "noLevel")
    {
      Swal.fire(
          'No se ha seleccionado el año',
          'Seleccione un año porfavor',
          'error'
       )
    }
    else if(data.res == "fullnameExist")
    {
      Swal.fire(
          'El nombre completo ya existente',
          data.msg + ' Ya se encuentra registrado',
          'error'
       )
    }
    else if(data.res == "emailExist")
    {
      Swal.fire(
          'Ese Email ya existe',
          data.msg + ' Ya se encuentra registrado',
          'error'
       )
    }
    else if(data.res == "success")
    {
      Swal.fire(
          'Exitoso',
          data.msg + ' Se ha añadido correctamente',
          'success'
       )
        refreshDiv();
        $('#addExamineeFrm')[0].reset();
    }
    else if(data.res == "failed")
    {
      Swal.fire(
          "Algo salio mal",
          '',
          'error'
       )
    }


    
  },'json')
  return false;
});



// Update Examinee
$(document).on("submit","#updateExamineeFrm" , function(){
  $.post("query/updateExamineeExe.php", $(this).serialize() , function(data){
     if(data.res == "success")
     {
        Swal.fire(
            'Exitoso',
            data.exFullname + ' <br>Ha sido actualizado correctamente',
            'success'
          )
          refreshDiv();
     }
  },'json')
  return false;
});


// Add Topic 
$(document).on("submit","#addTopicFrm" , function(){
  $.post("query/addTopicExe.php", $(this).serialize() , function(data){
    if(data.res == "nivelexist")
    {
      Swal.fire(
          'Ya existe',
          data.msg + '<br>Este nivel de tema ya existe',
          'error'
       )
    }
    else if(data.res == "nivelno")
    {
      Swal.fire(
        'Error de nivel',
         data.msg + '<br>Los niveles de temas deben ser sucesivos',
        'error'
      )
    }
	else if(data.res == "nivelce")
    {
      Swal.fire(
        'Error de nivel',
         data.msg + '<br>El nivel no puede ser 0',
        'error'
      )
    }
	 else if(data.res == "topicexist")
    {
      Swal.fire(
          'Error de nombre',
         data.msg + '<br>El tema ya existe en este curso',
        'error'
       )
    }
	  else if(data.res == "success")
    {
      Swal.fire(
        'Exitoso',
         data.msg + '<br>El tema fue agregado exitosamente',
        'success'
      )
        $('#addQuestionFrm')[0].reset();
        refreshDiv();
    }
   
  },'json')
  return false;
});


// Add PDF 
$(document).on("submit", "#addPDFFrm", function (e) {
    e.preventDefault();  // Evita el envío por defecto del formulario
    var formData = new FormData(this);
    $.ajax({
        url: "query/addTopicExe.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (data) {
            if (data.res == "nivelexist") {
                Swal.fire(
                    'Ya existe',
                    data.msg + '<br>Este nivel de tema ya existe',
                    'error'
                )
            } else if (data.res == "nivelno") {
                Swal.fire(
                    'Error de nivel',
                    data.msg + '<br>Los niveles de temas deben ser sucesivos',
                    'error'
                )
            } else if (data.res == "nivelce") {
                Swal.fire(
                    'Error de nivel',
                    data.msg + '<br>El nivel no puede ser 0',
                    'error'
                )
            }  else if (data.res == "error") {
                Swal.fire(
                    'error',
                    data.msg + '',
                    'error'
                )
            } else if (data.res == "success") {
                Swal.fire(
                    'Exitoso',
                    data.msg + '<br>El nivel fue agregado exitosamente',
                    'success'
                )
                $('#addPDFFrm')[0].reset();
                refreshDiv();
            }
        }
    });
    return false;
});


// Add Audio 
$(document).on("submit", "#addAudFrm", function (e) {
    e.preventDefault();  // Evita el envío por defecto del formulario
    var formData = new FormData(this);
    $.ajax({
        url: "query/addTopicExe.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (data) {
            if (data.res == "nivelexist") {
                Swal.fire(
                    'Ya existe',
                    data.msg + '<br>Este nivel de tema ya existe',
                    'error'
                )
            } else if (data.res == "nivelno") {
                Swal.fire(
                    'Error de nivel',
                    data.msg + '<br>Los niveles de temas deben ser sucesivos',
                    'error'
                )
            } else if (data.res == "nivelce") {
                Swal.fire(
                    'Error de nivel',
                    data.msg + '<br>El nivel no puede ser 0',
                    'error'
                )
            }  else if (data.res == "error") {
                Swal.fire(
                    'error',
                    data.msg + '',
                    'error'
                )
            } else if (data.res == "success") {
                Swal.fire(
                    'Exitoso',
                    data.msg + '<br>El nivel fue agregado exitosamente',
                    'success'
                )
                $('#addAudFrm')[0].reset();
                refreshDiv();
            }
        }
    });
    return false;
});



// Add Link 
$(document).on("submit","#addLinkFrm" , function(){
  $.post("query/addTopicExe.php", $(this).serialize() , function(data){
    if(data.res == "nivelexist")
    {
      Swal.fire(
          'Ya existe',
          data.msg + '<br>Este nivel de tema ya existe',
          'error'
       )
    }
    else if(data.res == "nivelno")
    {
      Swal.fire(
        'Error de nivel',
         data.msg + '<br>Los niveles de temas deben ser sucesivos',
        'error'
      )
    }
	else if(data.res == "nivelce")
    {
      Swal.fire(
        'Error de nivel',
         data.msg + '<br>El nivel no puede ser 0',
        'error'
      )
    }
	 else if(data.res == "error")
    {
      Swal.fire(
          'error',
         data.msg + '',
        'error'
       )
    }
	  else if(data.res == "success")
    {
      Swal.fire(
        'Exitoso',
         data.msg + '<br>El tema fue agregado exitosamente',
        'success'
      )
        $('#addQuestionFrm')[0].reset();
        refreshDiv();
    }
   
  },'json')
  return false;
});


// Add Link 
$(document).on("submit","#addEmbedFrm" , function(){
  $.post("query/addTopicExe.php", $(this).serialize() , function(data){
    if(data.res == "nivelexist")
    {
      Swal.fire(
          'Ya existe',
          data.msg + '<br>este nivel de tema ya existe',
          'error'
       )
    }
    else if(data.res == "nivelno")
    {
      Swal.fire(
        'error de nivel',
         data.msg + '<br>los niveles de temas deven ser sucesivos',
        'error'
      )
    }
	else if(data.res == "nivelce")
    {
      Swal.fire(
        'error de nivel',
         data.msg + '<br>el nivel no puede ser 0',
        'error'
      )
    }
	 else if(data.res == "error")
    {
      Swal.fire(
          'error',
         data.msg + '',
        'error'
       )
    }
	  else if(data.res == "success")
    {
      Swal.fire(
        'Exitoso',
         data.msg + '<br>El tema fue agregado exitosamente',
        'success'
      )
        $('#addQuestionFrm')[0].reset();
        refreshDiv();
    }
   
  },'json')
  return false;
});


// Add Exam of activiti 
$(document).on("submit","#addExamAFrm" , function(){
  $.post("query/addTopicExe.php", $(this).serialize() , function(data){
    if(data.res == "nivelexist")
    {
      Swal.fire(
          'Ya existe',
          data.msg + '<br>este nivel de tema ya existe',
          'error'
       )
    }
    else if(data.res == "nivelno")
    {
      Swal.fire(
        'error de nivel',
         data.msg + '<br>los niveles de temas deven ser sucesivos',
        'error'
      )
    }
	else if(data.res == "nivelce")
    {
      Swal.fire(
        'error de nivel',
         data.msg + '<br>el nivel no puede ser 0',
        'error'
      )
    }
	 else if(data.res == "error")
    {
      Swal.fire(
          'error',
         data.msg + '',
        'error'
       )
    }
	  else if(data.res == "success")
    {
      Swal.fire(
        'Exitoso',
         data.msg + '<br>El examen fue agregado exitosamente',
        'success'
      )
        $('#addQuestionFrm')[0].reset();
        refreshDiv();
    }
   
  },'json')
  return false;
});


// Update Question
$(document).on("submit","#updateQuestionFrm" , function(){
  $.post("query/updateQuestionExe.php", $(this).serialize() , function(data){
     if(data.res == "success")
     {
        Swal.fire(
            'Exitoso',
            'La pregunta seleccionada se ha actualizado correctamente',
            'success'
          )
          refreshDiv();
     }
  },'json')
  return false;
});


function refreshDiv()
{
  $('#tableList').load(document.URL +  ' #tableList');
  $('#refreshData').load(document.URL +  ' #refreshData');

}


