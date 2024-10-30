
$(document).on("click","#startQuiz", function(){
	  var thisId = $(this).data('id');
	  Swal.fire({
      title: '¿Está seguro?',
      text: 'Desea tomar este examen ahora, el tiempo iniciará automaticamente',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, iniciar ahora'
 }).then((result) => {
  if (result.value) {
         $.ajax({
          type : "post",
          url : "query/selExamAttemptExe.php",
          dataType : "json",  
          data : {thisId:thisId},
          cache : false,
          success : function(data){
            if(data.res == "alreadyExam")
            {
              Swal.fire(
                'Ya lo ha tomado',
                data.msg + ' <br> Ya se ha tomado',
                'error'
              )
            }
            else if(data.res == "takeNow")
            {
              window.location.href="home.php?page=exam&id="+thisId;
              return false;
            }
			else if(data.res == "error")
            {
              Swal.fire(
                'Error',
                data.msg + ' <br>',
                'error'
              )
            }
          },
          error : function(xhr, ErrorStatus, error){
            console.log(status.error);
          }

        });




  }
 });
	return false;
})


$(document).on("click","#startTopic", function(){
	  var thisId = $(this).data('id');
	  var thisCou = $(this).data('cou');
	  var thisAct = $(this).data('ac');
	  Swal.fire({
      title: '¿Está seguro?',
      text: 'Desea tomar este tema ahora, el tiempo iniciará automaticamente',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, iniciar ahora'
 }).then((result) => {
  if (result.value) {
         $.ajax({
          type : "post",
          url : "query/selTopicAttemptExe.php",
          dataType : "json",  
          data : {thisId:thisId, thisCou:thisCou, thisAct:thisAct},
          cache : false,
          success : function(data){
            if(data.res == "noList")
            {
              Swal.fire(
                'Tema no listo ',
                'Aun te faltan temas por tomar',
                'error'
              )
            }
            else if(data.res == "takeNow")
            {
              window.location.href="home.php?page=Topic&id="+thisId;
              return false;
            }
          },
          error : function(xhr, ErrorStatus, error){
            console.log(status.error);
          }

        });
  }
 });
	return false;
})


$(document).on("click", "#actComplete", function() {
    var thisIdt = $(this).data('idt');
    var thisIde = $(this).data('ide');
    var thisIdc = $(this).data('idc');
    Swal.fire({
        title: '¿Está seguro?',
        text: 'Desea marcar este tema como completado?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, marcar como completado'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "post",
                url: "query/selCompleteTopic.php",
                dataType: "json",
                data: {
                    thisIdt: thisIdt,
                    thisIde: thisIde,
                    thisIdc: thisIdc
                },
                cache: false,
                success: function(data) {
                    if (data.res == "error") {
                        Swal.fire(
                            'Error ',
                            'no se pudo registrar tu avance',
                            'error'
                        )
                    } else if (data.res == "registrado") {
                        if (data.topico == "a") {
                            Swal.fire(
                                'Felicidades ',
                                'has concluido el curso'
                            )
                        } else if (data.topico == "b") {
							Swal.fire(
                                'Examen Proximo ',
                                'Tu siguiente actividad examen:'+data.name
                            )
							window.location.href = "home.php";
                        } else {
                            window.location.href = "home.php?page=Topic&id=" + data.topico;
                            return false;
                        }
                    }
                },
                error: function(xhr, ErrorStatus, error) {
                    console.log(status.error);
                }

            });
        }
    });
    return false;
})


// Reset Exam Form
$(document).on("click","#resetExamFrm", function(){
      $('#submitAnswerFrm')[0].reset();
      return false;
});





// Select Time Limit
var mins
var secs;

function cd() {
  var timeExamLimit = $('#timeExamLimit').val();
  mins = 1 * m("" + timeExamLimit); // change minutes here
  secs = 0 + s(":01"); 
  redo();
}

function m(obj) {
  for(var i = 0; i < obj.length; i++) {
      if(obj.substring(i, i + 1) == ":")
      break;
  }
  return(obj.substring(0, i));
}

function s(obj) {
  for(var i = 0; i < obj.length; i++) {
      if(obj.substring(i, i + 1) == ":")
      break;
  }
  return(obj.substring(i + 1, obj.length));
}

function dis(mins,secs) {
  var disp;
  if(mins <= 9) {
      disp = " 0";
  } else {
      disp = " ";
  }
  disp += mins + ":";
  if(secs <= 9) {
      disp += "0" + secs;
  } else {
      disp += secs;
  }
  return(disp);
}

function redo() {
  secs--;
  if(secs == -1) {
      secs = 59;
      mins--;
  }
  document.cd.disp.value = dis(mins,secs); 
  if((mins == 0) && (secs == 0)) {
    $('#examAction').val("autoSubmit");
     $('#submitAnswerFrm').submit();
  } else {
    cd = setTimeout("redo()",1000);
  }
}

function init() {
  cd();
}
window.onload = init;
