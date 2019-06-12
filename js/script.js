//var para creacion dinamica de antibioticos
var x = 1;

/*------------------agregar paciente-----------------*/
function agregarPaciente(){
  var datastring = $("#formCrearPaciente").serialize();
  $.ajax({
    type: "post",
    url: "../ajax/agregarRecord.php",
    data: datastring,
    success: function(datastring){//no es ta pasando por success ya que la query arroja error en el codigo mysqli pero no asi en mysql workbench
      $("#myModalNuevoPaciente").modal("hide");

      actualizarTablaActivos();
      document.getElementById("formCrearPaciente").reset();
      $("#antibioticos").empty();
      x = 1;
      //notificación
      alertify.success('Paciente ingresado correctamente.');
    },
    error: function(datastring){
      $("#myModalNuevoPaciente").modal("hide");
      alertify.error('Algo ocurrió y paciente no fue ingresado.');
    }
  });
}

//validar modal crear paciente
function validarFormPaciente(){
  $('#formCrearPaciente').validate({
    rules: {
    nombre: {
      required: true,
      maxlength: 50,
    },
    apellido:{
      required: true,
      maxlength: 50,
    },
    sala_cama: {
      required: true,
      maxlength: 10,
    },
    medico_tratante: {
      required: true,
      maxlength: 30,
    },
    dosis: {
      required: true,
      maxlength: 10,
    }
  },
  messages: {
    nombre:{
      required: 'Debe ingresar nombres',
      maxlength: 'Nombres debe tener una máximo de 50 caracteres',
    },
    apellido:{
      required: 'Debe ingresar apellidos',
      maxlength: 'Apellidos debe tener una máximo de 50 caracteres',
    },
    sala_cama: {
      required: 'Debe ingresar el N° de sala y N° de cama.',
      maxlength: 'Debe tener un maximo de 10 caracteres.',
    },
    medico_tratante: {
      required: 'Debe ingresar médico que suministro el antibiótico.',
      maxlength: 'Debe tener un máximo de 30 caracteres',
    },
    dosis: {
      required: 'Debe ingresar la dosis del antibiótico.',
      
    }
  },    
    submitHandler: function () {
        agregarPaciente();
    }
  });

  $('#rut').rut({
    placeholder: false,
  });

  /*$("[name^=dosis").each(function () {
      $(this).rules("add", {
          required: true,        
          messages:{
            required: 'Debe ingresar la dosis del antibiótico.',
          }
      });
  });*/  

  /*if ($('#antibiotico').val().trim() === '') {
    alert('Debe seleccionar un antibiótico.');
  }*/
}

//agregar mas antibioticos por paciente al hacer ingreso de uno
$(document).ready(function(){
  var max_antibiotico = 3;
  var wrapper = $("#antibioticos");
  var add_antibiotico = $("#addAntibiotico");
  

  $(add_antibiotico).click(function(e){
    e.preventDefault();
    if(x < max_antibiotico){
      x++;
      antibiotico = 
              '<div class="form-group col-sm-12">'+
                  '<label>Antibiótico N°'+x+'</label>'+
                  '<select class="form-control" type="select" id="antibiotico'+x+'" name="antibiotico['+x+']">'+
                  '<option selected>Seleccione antibiótico....</option>'+
                  '<option value="AMIKACINA FA 500 MG">AMIKACINA FA 500 MG</option>'+
                  '<option value="AMPICILINA 1 GR FA">AMPICILINA 1 GR FA</option>'+
                  '<option value="CEFAZOLINA FA 1 GR">CEFAZOLINA FA 1 GR</option>'+
                  '<option value="CEFTAZIDIMA FA 1 GR">CEFTAZIDIMA FA 1 GR</option>'+
                  '<option value="CEFTRIAXONA FA 1GR">CEFTRIAXONA FA 1GR</option>'+
                  '<option value="CLINDAMICINA AM 600 MG/ML">CLINDAMICINA AM 600 MG/ML</option>'+
                  '<option value="CLOXACILINA SODICA FA 500 MG">CLOXACILINA SODICA FA 500 MG</option>'+
                  '<option value="ERTAPENEM FC 1 GRAMO">ERTAPENEM FC 1 GRAMO</option>'+  
                  '<option value="ESTREPTOMICINA FA 1 GR">ESTREPTOMICINA FA 1 GR</option>'+
                  '<option value="GENTAMICINA AM 80 MG/2 ML">GENTAMICINA AM 80 MG/2 ML</option>'+
                  '<option value="IMIPENEM FA 500 MG">IMIPENEM FA 500 MG</option>'+                   
                  '<option value="MEROPENEM FA 1 GR">MEROPENEM FA 1 GR</option>'+
                  '<option value="METRONIDAZOL FA 500MG/100ML">METRONIDAZOL FA 500MG/100ML</option>'+
                  '<option value="PENICILINA BENZATINA FA 1.200.000 UI">PENICILINA BENZATINA FA 1.200.000 UI</option>'+
                  '<option value="PENICILINA G SODICA FA 2.000.000 UI">PENICILINA G SODICA FA 2.000.000 UI</option>'+
                  '<option value="PIPERACILINA/TAZOBACTAM FA 4,5 GR">PIPERACILINA/TAZOBACTAM FA 4,5 GR</option>'+
                  '<option value="SULFAMETOXAZOL/TRIMETOPRIMA 400/80MG AM">SULFAMETOXAZOL/TRIMETOPRIMA 400/80MG AM</option>'+
                  '<option value="VANCOMICINA CLORHIDRATO 1 GR">VANCOMICINA CLORHIDRATO 1 GR</option>'+
                  '</select>'+
              '</div>'+
             
             
              '<div class="form-group col-sm-6">'+
                '<label>Dosis N°'+x+'</label>'+
                '<input type="form-text" class="form-control" id="dosis'+x+'" placeholder="Ingresa dosis n°'+x+'" name="dosis['+x+']">'+
                '<a style="margin-top: 8px;" href="#" class="delete">Eliminar</a></div>'+     
              '</div>';
      $(wrapper).append(antibiotico);
    }else{
      alert("Puede ingresar un máximo de 3 antibióticos.");
    }
  });

  $(wrapper).on("click",".delete", function(e){
    e.preventDefault();
    x--;
    $('#antibioticos div:last').remove(); 
    $('#antibioticos div:last').remove();
    
  })  
});

/*----------------------------------------------------------------------------*/


/*-------------------------------Cambiar contraseña---------------------------------------------*/

/*------------------agregar paciente-----------------*/
function NuevoPassword(){
  var id_usuario = $("#id_usuario_oculto_id_usuario").val();
  var nuevo_password = $("#nuevo_password").val();
  
  
  $.post("../ajax/nuevoPassword.php", {//cambiar por diagnosticarPaciente.php
    id_usuario: id_usuario,
    nuevo_password: nuevo_password, 
  }, function(data, status){
    //cerramos el popup
    $("#myModalNuevoPassword").modal("hide");
    //limpiamos los campos
    document.getElementById("FormNuevoPassword").reset();
    //notificación
    alertify.success('Contraseña modificada correctamente.');
  });
}

//validar modal crear paciente
function validarFormNuevoPassword(){
  $('#FormNuevoPassword').validate({
    rules: {
      nuevo_password: {
        required: true,
        maxlength: 30,
      },
      nuevo_conf_password: {
        required: true,
        equalTo:"#nuevo_password",
        maxlength: 30,
      }
    },
    messages: {
      nuevo_password: {
        required: 'Debe ingresar una contraseña',
        maxlength: 'La contraseña debe tener un máximo de 30 caracteres',
      },
      nuevo_conf_password: {
        required: 'Debe confirmar la primera contraseña',
        equalTo: 'La contraseña debe coincidir...',
        maxlength: 'La contraseña debe tener un máximo de 30 caracteres',
      }
    },    
    submitHandler: function () {
      NuevoPassword();
    }
  });
}

function abrirModalNuevoPassword(id_usuario){
 
  //agregamos el id del usuario para ocuparlo luego
  $("#id_usuario_oculto_id_usuario").val(id_usuario);

  /*$.post("../ajax/leerIdUsuario.php",{
    id_usuario: id_usuario,
  },
  function (data, status){
    //parse datos json

  }); */
  //mostramos modal
  $('#myModalNuevoPassword').modal({backdrop: 'static', keyboard: false});
  //alert(id_usuario);
}



/*--------------------------------------------------------------------------------------------------------------*/



/*---------------------agregar nueva dosis a antibiotico------------*/


//se realizaran cambios ya no necesitamos las fechas pero si el num frasco y dia de tratamiento 
function obtenerDatosNuevaDiaTratamiento(id, id_tratamiento, id_antibiotico){
  //agregamos el id del usuario para ocuparlo luego
  $("#id_paciente_oculto_id_paciente").val(id);
  $("#id_paciente_oculto_id_tratamiento").val(id_tratamiento);
  $("#id_paciente_oculto_id_antibiotico").val(id_antibiotico);


  var numFrasco = 0;

  $.post("../ajax/leerDetallesPaciente.php",{
    id: id,
    id_tratamiento: id_tratamiento,
    id_antibiotico: id_antibiotico
  },
  function (data, status){
    //parse datos json
    var antibiotico = JSON.parse(data);/*todos los datos obtenidos de la consulta se guardan en la variable antibiotico y luego apuntamos 
    con antibiotico.nombre de la variable*/

    /*   */
    $("#id_paciente_oculto_num_frasco").val(antibiotico.num_frasco);
    //$("#id_paciente_oculto_fecha_inicio").val(antibiotico.fecha_inicio);
    //$("#id_paciente_oculto_fecha_termino").val(antibiotico.fecha_termino);
    $("#id_paciente_oculto_dias_tratamiento").val(antibiotico.dias_tratamiento);


  }); 
  //mostramos modal
  $('#myModalNuevoDiaTratamiento').modal({backdrop: 'static', keyboard: false});
}

function validarFormNuevoDiaTratamiento(){
$('#formNuevoDiaTratamiento').validate({
  rules: {
    num_frasco: {
      required: true,
      maxlength: 10,
    },
    fecha_tratamiento: {
      required: true,
      
    },
    medico_prescripcion: {
      required: true,
      maxlength: 50,
    }
  },
  messages: {
    num_frasco: {
      required: 'Debe ingresar el n° de frascos.',
      maxlength: 'Debe ser un máximo de 10 caracteres.'
    },
    fecha_tratamiento: {
      required: 'Debe seleccionar el día de tratamiento.',
    },
    medico_prescripcion: {
      required: 'Debe ingresar el médico prescriptor.',
      maxlength: 'Debe ser un máximo de 50 caracteres.'
    }
  },    
    submitHandler: function () {
        nuevoDiaTratamiento();
    }
  });  
}

function nuevoDiaTratamiento(){
  //en nuevo día de tratamiento necesitamos tambien necesitamos los 3 id para consultar las fechas y mostrarlas en el 



  // declaramos variables 
    var num_frasco_suma = 0;
    var num_frasco_int = 0;
    var num_frasco2_int = 0;

    var num_dias_tratamiento_suma = 0;
    var num_dias_tratamiento_int = 0;
    var num_dias_tratamiento2_int = 0;

    //obtenemos valor que ingresamos en el formulario
    var num_frasco = $("#num_frasco").val();
    var medico_prescripcion = $("#medico_prescripcion").val();
    //lo parseamos a numero entero
    num_frasco_int = parseInt(num_frasco);
 
    // guardamos en variables los valores de los campos ocultos
    var id = $("#id_paciente_oculto_id_paciente").val();
    var id_tratamiento = $("#id_paciente_oculto_id_tratamiento").val();
    var id_antibiotico = $("#id_paciente_oculto_id_antibiotico").val();

    //valores frasco
    var num_frasco2 = $("#id_paciente_oculto_num_frasco").val();


    //parseamos el valor de num_frasco2 a entero
    num_frasco2_int = parseInt(num_frasco2);

    //realizamos la suma de los frascos
    num_frasco_suma = num_frasco_int + num_frasco2_int;


    /*aca guardamos fecha inicio si viene vacia debemos obtener la fecha actual en formato yyyy-mm-dd y 
    si vienen llenas luego de la consulta guardo los datos en los input*/
    /*var fecha_inicio = $("#id_paciente_oculto_fecha_inicio").val();
    var fecha_termino = $("#id_paciente_oculto_fecha_termino").val();*/
    
    var dias_tratamiento = $("#id_paciente_oculto_dias_tratamiento").val();
    num_dias_tratamiento_int = parseInt(dias_tratamiento);
    
    //siempre que pasamos por aca obtenemos los dias de tratamientos de la base y le sumamos uno
    num_dias_tratamiento_suma = num_dias_tratamiento_int + 1;


    /*metodo getdates multidatepicker*/
    var fecha_string = $('#fecha_tratamiento').multiDatesPicker('getDates');//metodo que retorna la fecha seleccionada en string

    fecha_string = fecha_string.toString();//parseo a string

    var dividirFecha_inicio = fecha_string.split('-');
    if(dividirFecha_inicio.count == 0){
        return null;
    }

    var dia = dividirFecha_inicio[0];
    var mes = dividirFecha_inicio[1];
    var anio = dividirFecha_inicio[2]; 

    var fecha_inicio_parseada = anio + '/' + mes + '/' + dia; //fecha que se ingreso y que se parseo para ponerla en la base
  
    //validar cantidad de dias de tratamiento que lleva el paciente para poder notificar por medio de correo a los usuarios
    /*if(num_dias_tratamiento_suma == 4 || num_dias_tratamiento_suma == 7){
      $.post("../ajax/enviarEmail.php", {
      },
      function (data, status) {
        //en este lugar no hacemos nada por el momento cuando el status sea correcto se enviara por post los datos y hara la funcion en php de mail
      });  
    }*/

     // Update the details by requesting to the server using ajax
    $.post("../ajax/actualizarNuevoDiaTratamiento.php", {
      id: id,
      id_tratamiento: id_tratamiento,
      id_antibiotico: id_antibiotico,
      num_frasco: num_frasco_suma,
      dias_tratamiento: num_dias_tratamiento_suma,
      fecha: fecha_inicio_parseada,
      medico_prescripcion: medico_prescripcion,
    },
    function (data, status) {
      // hide modal popup
      $("#myModalNuevoDiaTratamiento").modal("hide");
      // reload Users by using readRecords();
      actualizarTablaActivos();
      limpiarNuevaDosisTratamiento();
      alertify.success('Nueva dosis de tratamiento ingresado correctamente.');
      
    });

    switch(num_dias_tratamiento_suma){
      case 14:
        //llamado ajax para ir por los datos de los antibioticos
        $.post("../ajax/leerDetallesNuevoDiaTratamiento.php",{
          id: id,
          id_tratamiento: id_tratamiento,
          id_antibiotico: id_antibiotico,
        },
        function (data, status){
          var datos = JSON.parse(data);
          var diasTratamiento4 = 14;
          $.post("../ajax/enviarEmail.php", {//llamado ajax para envio de correo
            nombres: datos.nombres,
            apellidos: datos.apellidos,
            rut: datos.rut,
            sala_cama: datos.sala_cama,
            medico: datos.medico_tratante,
            antibiotico: datos.nombre,
            dias_tratamiento: diasTratamiento4,

          },
          function (data, status) {
            //en este lugar no hacemos nada por el momento cuando el status sea correcto se enviara por post los datos y hara la funcion en php de mail
          });
        });
        break;

      case 7:
        //llamado ajax para ir por los datos de los antibioticos
        $.post("../ajax/leerDetallesNuevoDiaTratamiento.php",{
          id: id,
          id_tratamiento: id_tratamiento,
          id_antibiotico: id_antibiotico,
        },
        function (data, status){
          var datos = JSON.parse(data);
          var diasTratamiento7 = 7;
          $.post("../ajax/enviarEmail.php", {//llamado ajax para envio de correo
            nombres: datos.nombres,
            apellidos: datos.apellidos,
            rut: datos.rut,
            sala_cama: datos.sala_cama,
            medico: datos.medico_tratante,
            antibiotico: datos.nombre,
            dias_tratamiento: diasTratamiento7,

          },
          function (data, status) {
            //en este lugar no hacemos nada por el momento cuando el status sea correcto se enviara por post los datos y hara la funcion en php de mail
          });
        });
        break;
    }
}

/*----------------------------------------------------------------------*/


/*------------------agregar antibiotico a tratamientos creados-----------------*/
function agregarATB(){
  var id = $("#id_paciente_oculto_id_paciente").val();
  var id_tratamiento = $("#id_paciente_oculto_id_tratamiento").val();

  var antibiotico = $("#antibiotico").val();
  var dosis = $("#dosis").val();
  
  $.post("../ajax/agregarATB.php", {//cambiar por nuevoATB.php
    id: id,
    id_tratamiento: id_tratamiento,
    nombre: antibiotico,
    dosis: dosis,  
  }, function(data, status){
    //cerramos el popup
    $("#myModalAgregarATB").modal("hide");
    document.getElementById("formCrearATB").reset();//limpiamos los campos
    alertify.success('Nuevo antibiótico ingresado correctamente al tratamiento existente.');
  });
}

function abrirModalATB(id,id_tratamiento){
 
  //agregamos el id del usuario para ocuparlo luego
  $("#id_paciente_oculto_id_paciente").val(id);
  $("#id_paciente_oculto_id_tratamiento").val(id_tratamiento);

  $.post("../ajax/leerIdATB.php",{
    id: id,
    id_tratamiento: id_tratamiento,
  },
  function (data, status){
    //parse datos json

  }); 
  //mostramos modal
  $('#myModalActualizarPaciente').modal({backdrop: 'static', keyboard: false});
}

//validar modal agregar antibiotico
function validarFormAgregarATB(){
  $('#formCrearATB').validate({
    rules: {
      dosis: {
        required: true,
        maxlength: 15,
      }
    },
    messages: {
      dosis: {
        required: 'Debe ingresar la dosis del antibiótico.',
        maxlength: 'Debe ser un máximo de 15 caracteres.'
      }
    },    
      submitHandler: function () {
          agregarATB()
      }
    });      
}
/*-----------------------------------------------------------------------------*/


/*-----------------cambio estado de antibioticos-------------------------------*/
function cambioEstadoATB(){
  // get values
    var estado_antibiotico = $("#cambiar_estado_antibiotico").val();
 
    // get hidden field value
    var id_antibiotico = $("#id_paciente_oculto_id_antibiotico").val();
 
    // Update the details by requesting to the server using ajax
    $.post("../ajax/actualizarEstadoATB.php", {

            id_antibiotico: id_antibiotico,
            estado_antibiotico: estado_antibiotico
        },
        function (data, status) {
            // hide modal popup
            $("#myModalCambioEstadoATB").modal("hide");
            // reload Users by using readRecords();
            actualizarTablaActivos();
            alertify.success('Estado de antibiótico cambiado correctamente.');
        }
    );
}

//obtenemos los datos para hacer cambio de estado
function obtenerDatosAntibioticos(id_antibiotico){
  $("#id_paciente_oculto_id_antibiotico").val(id_antibiotico);

  $.post("../ajax/leerDetallesAntibiotico.php",{
    id_antibiotico: id_antibiotico
  },
  function (data, status){
    //parse datos json
    var antibiotico = JSON.parse(data);
    //recuperamos datos del usuario y ponemos en modal
    $("#cambiar_estado_antibiotico").val(antibiotico.estado_antibiotico);

  }); 
  //mostramos modal
  
  $('#myModalCambioEstadoATB').modal({backdrop: 'static', keyboard: false});
}
/*-----------------------------------------------------------------------------*/



/*-------------------------Diagnosticar pacientes----------------------------*/
function diagnosticarPaciente(){
  var id = $("#id_paciente_oculto_id_paciente").val();
  var id_tratamiento = $("#id_paciente_oculto_id_tratamiento").val();

  var diagnostico_paciente = $("#diagnostico_paciente").val();
  
  
  $.post("../ajax/diagnosticarPaciente.php", {//cambiar por diagnosticarPaciente.php
    id: id,
    id_tratamiento: id_tratamiento,
    diagnostico: diagnostico_paciente,  
  }, function(data, status){
    //cerramos el popup
    $("#myModalDiagnosticarPaciente").modal("hide");
    actualizarTablaActivos();
    document.getElementById("formDiagnosticarPaciente").reset();
    //limpiamos los campos
    alertify.success('Diagnóstico del paciente ingresado correctamente.');
  });
}

function abrirModalDiagnosticarPaciente(id,id_tratamiento){
  //agregamos el id del usuario para ocuparlo luego
  $("#id_paciente_oculto_id_paciente").val(id);
  $("#id_paciente_oculto_id_tratamiento").val(id_tratamiento);

  $.post("../ajax/leerDatosDiagnosticarPacientes.php",{
    id: id,
    id_tratamiento: id_tratamiento,
  },
  function (data, status){
    //parse datos json

  }); 
  //mostramos modal
  
  $('#myModalDiagnosticarPaciente').modal({backdrop: 'static', keyboard: false});
}

function validarFormDiagnoticarPaciente(){
  $('#formDiagnosticarPaciente').validate({
  rules: {
    diagnostico_paciente: {
      required: true,
      maxlength: 50,
    }
  },
  messages: {
    diagnostico_paciente: {
      required: 'Debe ingresar el diagnóstico del paciente.',
      maxlength: 'Debe ser un máximo de 50 carácteres.'
    }
  },    
    submitHandler: function () {
        diagnosticarPaciente();

    }
  });     
}
/*----------------------------------------------------------------------------*/


/*-------------------------Ver Observaciones en modal------------------------*/


//abrimos el modal y al mismo tiempo realizamos consulta para traernos los datos de los id
function abrirModalVerObservaciones(id,id_tratamiento,id_antibiotico){
  //agregamos el id del usuario para ocuparlo luego
  $("#id_paciente_oculto_id_paciente").val(id);
  $("#id_paciente_oculto_id_tratamiento").val(id_tratamiento);
  $("#id_paciente_oculto_id_antibiotico").val(id_antibiotico);


  $.post("../ajax/leerDetallesVerObservaciones.php",{
    id: id,
    id_tratamiento: id_tratamiento,
    id_antibiotico: id_antibiotico,
  },
  function (data, status){
    //parse datos json
    var observaciones = JSON.parse(data);
    

    //probando validacion para que no muestre datos 
    if (observaciones.status == 200) {
      $('#tablaDescripciones tbody').append('<tr><td colspan="4" style="text-align: center;">¡No se encontraron datos!</td></tr>');
    }else{
      var count = Object.keys(observaciones).length;

      for (var i = 0; i < count; i++) {
  
      //transformar datetime a formato chileno  
      var datetime = observaciones[i].fecha_observacion;//acedemos a la fecha
      var fecha = datetime.split(" ");//separamos por espacios fecha en [0] y horas en [1]
      var date = fecha[0];
      var hora = fecha[1];
      var fechaYYYYMMDD = date.split('-');
      var fecha_chilena = fechaYYYYMMDD[2] + "-" + fechaYYYYMMDD[1] + "-" + fechaYYYYMMDD[0];
      //concatenamos con la hora al final
      var datetimeChileno = fecha_chilena + " " + hora;
  
      num = i+1;
      $('#tablaDescripciones tbody').append('<tr><td>'+ num + '</td><td>'
                                            + observaciones[i].observacion + '</td><td>' 
                                            + observaciones[i].medico_observacion + '</td><td>'
                                            + datetimeChileno + '</td></tr>');
  
      }
    }


      
    //$('#tablaDescripciones tbody').append('<tr><td colspan="4">¡No se encontraron datos!</td></tr>');
    

    
    
  }); 
  //mostramos modal
  
  $('#myModalMostrarObservaciones').modal({backdrop: 'static', keyboard: false});
  //actualizarTablaActivos();//aca deberia ser actualizar tabla observaciones 
}

/*-----------------------------------------------------------------------------*/
function abrirModalVerRecetas(id,id_tratamiento,id_antibiotico){
  //agregamos el id del usuario para ocuparlo luego
  $("#id_paciente_oculto_id_paciente").val(id);
  $("#id_paciente_oculto_id_tratamiento").val(id_tratamiento);
  $("#id_paciente_oculto_id_antibiotico").val(id_antibiotico);


  $.post("../ajax/leerDetallesVerRecetas.php",{
    id: id,
    id_tratamiento: id_tratamiento,
    id_antibiotico: id_antibiotico,
  },
  function (data, status){
    //parse datos json
    var recetas = JSON.parse(data);
    

    //probando validacion para que no muestre datos 
    if (recetas.status == 200) {
      $('#tablaRecetas tbody').append('<tr><td colspan="3" style="text-align: center;">¡No se encontraron datos!</td></tr>');
    }

    var count = Object.keys(recetas).length;

    for (var i = 0; i < count; i++) {
    
      //transformar datetime a formato chileno  
      var date = recetas[i].fecha;//acedemos a la fecha
      var fecha = date.split("-");//separamos por espacios fecha en [0] y horas en [1]
      var dia = fecha[2];
      var mes = fecha[1];
      var anio = fecha[0];
      var fecha_chilena = dia + "-" + mes + "-" + anio;
      
      

      num = i+1;
      $('#tablaRecetas tbody').append('<tr><td>'+ num + '</td><td>'
                                            + recetas[i].medico_prescripcion + '</td><td>' 
                                            + fecha_chilena + '</td><td>');

    }
      
    //$('#tablaDescripciones tbody').append('<tr><td colspan="4">¡No se encontraron datos!</td></tr>');
    

    
    
  }); 
  //mostramos modal
  
  $('#myModalVerRecetas').modal({backdrop: 'static', keyboard: false});
  //actualizarTablaActivos();//aca deberia ser actualizar tabla observaciones 
}
/*---------------------Ver Recetas---------------------------------*/

/*------------------------------------------------------------------*/


/*---------------listar archivos pdf por cada tratamiento----------------------*/
function abrirModalVerPdf(id,id_tratamiento){
  //agregamos el id del usuario para ocuparlo luego
  $("#id_paciente_oculto_id_paciente").val(id);
  $("#id_paciente_oculto_id_tratamiento").val(id_tratamiento);
  


  $.post("../ajax/leerDetallesVerPdf.php",{
    id: id,
    id_tratamiento: id_tratamiento,  
  },
  function (data, status){
    //parse datos json
    var pdf = JSON.parse(data);

    //probando validacion para que no muestre datos 
    if (pdf.status == 200) {
      $('#tablaPdf tbody').append('<tr><td colspan="5" style="text-align: center;">¡No se encontraron datos!</td></tr>');
    }



    var count = Object.keys(pdf).length;
    
    for (var i = 0; i < count; i++) {

      var datetime = pdf[i].fecha_pdf;//acedemos a la fecha
      var fecha = datetime.split(" ");//separamos por espacios fecha en [0] y horas en [1]
      //var hora = datetime.slice(10,19);
      var date = fecha[0];
      var hora = fecha[1];
      var fechaYYYYMMDD = date.split('-');
      var fecha_chilena = fechaYYYYMMDD[2] + "-" + fechaYYYYMMDD[1] + "-" + fechaYYYYMMDD[0];
      //concatenamos con la hora al final
      var datetimeChileno = fecha_chilena + " " + hora;
      
      num = i+1;
      $('#tablaPdf tbody').append('<tr><td>'+ num + '</td><td>'
                                            + pdf[i].descripcion + '</td><td>' 
                                            + datetimeChileno + '</td><td>'
                                            + '<a href="../pdf/'+ pdf[i].nombre_archivo +'" target="_blank">'+ pdf[i].nombre_archivo +'</a></td><td>'
                                            + '<i class="fas fa-check-circle"></i></td></tr>');

    }
      
      //$('#tablaDescripciones tbody').append('<tr><td colspan="4">¡No se encontraron datos!</td></tr>');
    
  }); 
  //mostramos modal
  $('#myModalMostrarPdf').modal({backdrop: 'static', keyboard: false});
  //actualizarTablaActivos();//aca deberia ser actualizar tabla observaciones 
}
/*------------------------------------------------------------------------------*/


/*--------Observaciones por cada antibiotico funcion para médicos-------------*/
function observacionMedico(){
  var id = $("#id_paciente_oculto_id_paciente").val();
  var id_tratamiento = $("#id_paciente_oculto_id_tratamiento").val();
  var id_antibiotico = $("#id_paciente_oculto_id_antibiotico").val();

  var observacion_medico = $("#observacion_medico").val();

  
  
  
  $.post("../ajax/observacionMedico.php", {
    id: id,
    id_tratamiento: id_tratamiento,
    id_antibiotico: id_antibiotico,
    observacion_medico: observacion_medico,  
  }, function(data, status){
    //cerramos el popup
    $("#myModalObservacionMedico").modal("hide");
    actualizarTablaActivos();
    document.getElementById("formObservacionMedico").reset();
    //limpiamos los campos
    alertify.success('Observación del paciente ingresada correctamente.');
  });
}

function abrirModalObservacionMedico(id,id_tratamiento,id_antibiotico){
  //agregamos el id del usuario para ocuparlo luego
  $("#id_paciente_oculto_id_paciente").val(id);
  $("#id_paciente_oculto_id_tratamiento").val(id_tratamiento);
  $("#id_paciente_oculto_id_antibiotico").val(id_antibiotico);


  $.post("../ajax/leerDatosDiagnosticarPacientes.php",{
    id: id,
    id_tratamiento: id_tratamiento,
    id_antibiotico: id_antibiotico,
  },
  function (data, status){
    //parse datos json

  }); 
  //mostramos modal
  $('#myModalObservacionMedico').modal({backdrop: 'static', keyboard: false});
}

function validarFormObservacionMedico(){
  $('#formObservacionMedico').validate({
  rules: {
    observacion_medico: {
      required: true,
      maxlength: 100,
    }
  },
  messages: {
    observacion_medico: {
      required: 'Debe ingresar la observación.',
      maxlength: 'Debe ser un máximo de 100 caracteres.'
    }
  },    
    submitHandler: function () {
        observacionMedico();
    }
  });     
}

/*-----------------------------------------------------------------------------*/




/*------------------actualizar datos-----------------*/

//obtenemos datos de los usuarios para luego modificarlos (Update)


function obtenerDatosPacientes(id,id_tratamiento,id_antibiotico){
  //agregamos el id del usuario para ocuparlo luego
  $("#id_paciente_oculto_id_paciente").val(id);
  $("#id_paciente_oculto_id_tratamiento").val(id_tratamiento);
  $("#id_paciente_oculto_id_antibiotico").val(id_antibiotico);

  $.post("../ajax/leerDetallesPaciente.php",{
    id: id,
    id_tratamiento: id_tratamiento,
    id_antibiotico: id_antibiotico
  },
  function (data, status){
    //parse datos json
    var paciente = JSON.parse(data);
    //recuperamos datos del usuario y ponemos en modal
    $("#actualizar_nombres").val(paciente.nombres);
    $("#actualizar_apellidos").val(paciente.apellidos);
    $("#actualizar_rut").val(paciente.rut);
    $("#actualizar_sala_cama").val(paciente.sala_cama);
    $("#actualizar_dosis").val(paciente.dosis);
    $("#actualizar_antibiotico").val(paciente.nombre);

  }); 
  //mostramos modal
  $("#myModalActualizarPaciente").modal("show");
}

//funcion para update pacientes
function actualizarPaciente() {
    // get values
    var nombres = $("#actualizar_nombres").val();
    var apellidos = $("#actualizar_apellidos").val();
    var rut = $("#actualizar_rut").val();
    var sala_cama = $("#actualizar_sala_cama").val();
    var dosis = $("#actualizar_dosis").val();
    var antibiotico = $("#actualizar_antibiotico").val();
 
    // get hidden field value
    var id = $("#id_paciente_oculto_id_paciente").val();
    var id_tratamiento = $("#id_paciente_oculto_id_tratamiento").val();
    var id_antibiotico = $("#id_paciente_oculto_id_antibiotico").val();
 
    // Update the details by requesting to the server using ajax
    $.post("../ajax/actualizarDetallesPaciente.php", {
            id: id,
            id_tratamiento: id_tratamiento,
            id_antibiotico: id_antibiotico,
            nombres: nombres,
            apellidos: apellidos,
            rut: rut,
            sala_cama: sala_cama,
            dosis: dosis,
            nombre: antibiotico
        },
        function (data, status) {
            // hide modal popup
            $("#myModalActualizarPaciente").modal("hide");
            // reload Users by using readRecords();
            actualizarTablaActivos();
            alertify.success('Datos del paciente actualizados correctamente.');
        }
    );
}

/*-------------------------Actualizar datos de usuarios ---------------------------------*/

function obtenerDatosUsuario(id){
  //agregamos el id del usuario para ocuparlo luego
  $("#id_paciente_oculto_id_usuario").val(id);
  

  $.post("../ajax/leerDetallesUsuario.php",{
    id: id,
  },
  function (data, status){
    //parse datos json
    var usuario = JSON.parse(data);
    //recuperamos datos del usuario y ponemos en modal
    $("#actualizar_nombre").val(usuario.nombre);
    $("#actualizar_apellido").val(usuario.apellido);
    $("#actualizar_usuario_rut").val(usuario.rut);
    $("#actualizar_selectUsuario").val(usuario.tipo_usuario);
    $("#actualizar_email").val(usuario.email);
    $("#actualizar_selectUnidad").val(usuario.areas_id_area);

  }); 
  //mostramos modal
  $('#myModalActualizarUsuario').modal({backdrop: 'static', keyboard: false});
}

function actualizarUsuario() {
  // get values
  var nombre = $("#actualizar_nombre").val();
  var apellido = $("#actualizar_apellido").val();
  var rut = $("#actualizar_usuario_rut").val();
  var email = $("#actualizar_email").val();
  var areas_id_area = $("#actualizar_selectUnidad").val();
  var tipo_usuario = $("#actualizar_selectUsuario").val();
  
  // get hidden field value
  var id = $("#id_paciente_oculto_id_usuario").val();

  // Update the details by requesting to the server using ajax
  $.post("../ajax/ActualizarUsuario.php", {
          id: id,
          nombre: nombre,
          apellido: apellido,
          rut: rut,
          email: email,
          areas_id_area: areas_id_area,
          tipo_usuario: tipo_usuario,
          
      },
      function (data, status) {
          // hide modal popup
          $("#myModalActualizarUsuario").modal("hide");
          // reload Users by using readRecords();
          actualizarTablaUsuarios();
          alertify.success('Datos del usuario actualizados correctamente.');
      }
  );
}


/*-------------------------------------------------------------------------------------------*/


/*------------------crear usuarios-------------------*/
function crearUsuario(){
var datastring = $("#FormCrearUsuario").serialize();

  $.ajax({
    type: "post",
    url: "../ajax/crearUsuario.php",
    data: datastring,
    success: function(datastring){//no es ta pasando por success ya que la query arroja error en el codigo mysqli pero no asi en mysql workbench
      $("#myModalCrearUsuario").modal("hide");
      document.getElementById("FormCrearUsuario").reset();

      //notificacion de que se ingreso bien el paciente
      alertify.success('Usuario creado correctamente.');
      actualizarTablaUsuarios();
    },
    error: function(datastring){
      $("#myModalCrearUsuario").modal("hide");
      alertify.error('Algo ocurrió y el usuario no se pudo crear.');
    }  
      
  });
}

//validar formulario crear usuarios
function validarCrearUsuario(){
  //validador para formulario crear usuario en vista administrador
    $('#FormCrearUsuario').validate({
    rules: {
    nombre: {
      required: true,
      maxlength: 50,
    },
    apellido:{
      required: true,
      maxlength: 50,
    },
  usuario_rut: {
      /*required: true,
      minlength: 8,
      maxlength: 9,*/
    },
    email: {
      required: true,
      email: true,
      maxlength: 50,
    },
    password: {
      required: true,
      maxlength: 30,
    },
    conf_password: {
      required: true,
      equalTo:"#password",
      maxlength: 30,
    }
  },
  messages: {
    nombre:{
      required: 'Debe ingresar el nombre',
      maxlength: 'El nombre debe tener una máximo de 50 caracteres',
    },
    apellido:{
      required: 'Debe ingresar el apellido.',
      maxlength: 'El apellido debe tener una máximo de 50 caracteres',
    },
    usuario_rut: {
      /*required: 'Debe ingresar un rut válido',
      maxlength: 'El rut debe tener un máximo de 9 caracteres'*/
    },
    email: {
      required: 'Debe ingresar un email',
      email: 'El formato debe ser ejemplo@dominio.cl',
      maxlength: 'El email debe tener un máximo de 50 caracteres',
    },
    password: {
      required: 'Debe ingresar una contraseña',
      maxlength: 'La contraseña debe tener un máximo de 30 caracteres',
    },
    conf_password: {
      required: 'Debe confirmar la primera contraseña',
      equalTo: 'La contraseña debe coincidir...',
      maxlength: 'La contraseña debe tener un máximo de 30 caracteres',
    }
  },
      
        submitHandler: function () {
            crearUsuario();
        }
    });

    $('#usuario_rut').rut({
      placeholder: false,
    });
}
//-------------------------------------------------------------------


/*------------ validar caracteres en inputs---------------------------*/

/*Limita input a solo caracteres validando que solo se ingresen caracters con tildes ñ y demas letras*/
function soloLetras(e){
  key = e.keyCode || e.which;
  tecla = String.fromCharCode(key).toLowerCase();
  letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
  especiales = "8-37-39-46";

  tecla_especial = false
  for(var i in especiales){
    if(key == especiales[i]){
      tecla_especial = true;
      break;
    }
  }

  if(letras.indexOf(tecla)==-1 && !tecla_especial){
    return false;
  }
}

/*funcion sin uso aun*/
function validacionCaracteresCirujano(e){
  key = e.keyCode || e.which;
  tecla = String.fromCharCode(key).toLowerCase();
  letras = " áéíóúabcdefghijklmnñopqrstuvwxyz.";
  especiales = "8-37-39-46";

  tecla_especial = false
  for(var i in especiales){
    if(key == especiales[i]){
      tecla_especial = true;
      break;
    }
  }

  if(letras.indexOf(tecla)==-1 && !tecla_especial){
    return false;
  }
}

/*validamos input de rut limitando solo a numero de 0-9 y k-K*/
function validacionCaracteresRut(e){
  key = e.keyCode || e.which;
  tecla = String.fromCharCode(key).toLowerCase();
  letras = "-.0123456789kK";
  especiales = "8-37-39-46";

  tecla_especial = false
  for(var i in especiales){
    if(key == especiales[i]){
      tecla_especial = true;
      break;
    }
  }

  if(letras.indexOf(tecla)==-1 && !tecla_especial){
    return false;
  }
}

/*-----------------------------------------------------------------------*/

/*-------------------------Eliminar Antibiótico-------------------------*/
function eliminarPaciente(id, id_tratamiento){
  var conf = confirm("¿Está seguro que desea eliminar el antibiótico seleccionado?");
  if(conf == true){
    $.post("../ajax/eliminarAntibiotico.php",{
        id: id,
        id_tratamiento: id_tratamiento
      },
      function (data,status){
        actualizarTablaActivos();
        alertify.success('Antibiótico del paciente eliminado correctamente.');
      }
    );  
  }
}

/*-----------------------------------------------------------------------*/

/*-------------reestablecer contraseña de usuario desde gestion de usuarios------------*/

function reestablecerPassword(id){
  var conf = confirm("¿Está seguro que desea reestablecer la contraseña del usuario seleccionado?");
  if(conf == true){
    $.post("../ajax/reestablecerPassword.php",{
        id: id
      },
      function (data,status){
        alertify.success('Contraseña de usuario reestablecida correctamente.');
      }
    );  
  }
}



/*-------------------------------------------------------------------------------------*/

/*eliminar usuarios*/
function eliminarUsuario(id){
  var conf = confirm("¿Está seguro que desea eliminar el usuario seleccionado?");
  if(conf == true){
    $.post("../ajax/eliminarUsuario.php",{
        id: id
      },
      function (data,status){
        actualizarTablaUsuarios();
        alertify.success('Usuario eliminado correctamente.');
      }
    );  
  }
}



/*data tables configuracion para tablas VER TABLAS PACIENTES CON ID #muestraPacientes 
si id esta repetido se produce un warning que no afecta el funcionamiento pero que arroja un alert*/
/*$(document).ready(function() {
    var table = $('#muestraPacientes').DataTable( {

      responsive: {
            details: {
                type: 'column',
                target: 'tr'
              }
          },
          columnDefs: [ {
              className: 'details-control',
              orderable: false,
              targets:   4,
          } ],
          order: [ 1, 'asc' ],
          "aoColumnDefs": [
          { 'bSortable': false, 'aTargets': [ 0,1,2,3,4,5,6,7,8 ] }
         ],
         ordering: false,
        stateSave: true,
        "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons:[
              'excel',
              {
                extend: 'pdfHtml5',
                  orientation: 'landscape',
                  pageSize: 'LEGAL',

              }
            ]
    });
});*/

/*------------------obtener datos para fechas y mostrar rango de fechas------------------*/

function obtenerDatosRangoFechas(id, id_tratamiento, id_antibiotico){
  //agregamos el id del usuario para ocuparlo luego
  $("#id_paciente_oculto_id_paciente").val(id);
  $("#id_paciente_oculto_id_tratamiento").val(id_tratamiento);
  $("#id_paciente_oculto_id_antibiotico").val(id_antibiotico);

  

  $.post("../ajax/leerDetallesPacienteFechas.php",{
    id: id,
    id_tratamiento: id_tratamiento,
    id_antibiotico: id_antibiotico
  },
  function (data, status){
    //parse datos json
    var antibiotico = JSON.parse(data);/*todos los datos obtenidos de la consulta se guardan en la variable antibiotico y luego apuntamos 
    con antibiotico.nombre de la variable*/


    var count = Object.keys(antibiotico).length;



    //debemos recorrer el arreglo para obtener las fechas disponibles y guardarlas en una variable

    for (var i = 0; i < count; i++) {
      var fecha = [];
      fecha[i] = antibiotico[i].fecha;
    }


    for (var i = 0; i < count; i++) {
      $('#daterange').multiDatesPicker('addDates', (antibiotico[i].fecha));
    }
  });
  //mostramos modal
  
  $('#myModalVerFechaTratamiento').modal({backdrop: 'static', keyboard: false});
}  


/*----------------------------------------------------------------------------------------*/

/*------------------------subir archivos pdf---------------------------------*/
function abrirModalSubirPdf(id,id_tratamiento){
  //agregamos el id del usuario para ocuparlo luego
  $("#id_paciente_oculto_id_paciente").val(id);
  $("#id_paciente_oculto_id_tratamiento").val(id_tratamiento);

  $.post("../ajax/leerDetallesAntibiotico.php",{
    id: id,
    id_tratamiento: id_tratamiento,
  },
  function (data, status){
    //parse datos json

  }); 
  //mostramos modal
  $('#myModalSubirPdf').modal({backdrop: 'static', keyboard: false});
}


function SubirPdf(){

  var id = $("#id_paciente_oculto_id_paciente").val();
  var id_tratamiento = $("#id_paciente_oculto_id_tratamiento").val();

  var descripcion = $("#descripcion_pdf").val();
  //var fichero = $("#fichero").val();

  var parametros = new FormData($("#formSubirPdf")[0]);
  parametros.append('id',id);
  parametros.append( 'id_tratamiento', id_tratamiento);

  $.ajax({
   data: parametros,
   url: "../ajax/SubirPdf.php",
   type: "POST",
   contentType: false,
   processData: false,
   success: function(data){
    $("#myModalSubirPdf").modal("hide");
    actualizarTablaTratamientos();
    document.getElementById("formSubirPdf").reset();
    alertify.success('PDF subido correctamente.');
  },
  error: function(data){
    alertify.error('Algo ocurrió y el PDF no logró ser subido.');
  }
});

  /*var data = new FormData();
  data.append( 'fichero', $('#fichero')[0].files[0] ); //photo is the name and id of the <input type="file">
  data.append( 'action', action);
  data.append( 'title', title);    
  
  
  $.ajax({
   type: "POST",                
   url: "../ajax/SubirPdf.php",
   processData: false,
   contentType: false,
   cache:false,
   data: data,
   success: function(data){
    $("#myModalSubirPdf").modal("hide");
    actualizarTablaTratamientos();
    document.getElementById("formSubirPdf").reset();
    }
});*/

  /*var archivo = document.getElementById ("fichero");
  fichero = archivo.value;
  alert(fichero);
  
  $.post("../ajax/SubirPdf.php", {//cambiar por nuevoATB.php
    id: id,
    id_tratamiento: id_tratamiento,
    fichero: fichero,
    descripcion_pdf: descripcion,  
  }, function(data, status){
    $("#myModalSubirPdf").modal("hide");
    actualizarTablaTratamientos();
    document.getElementById("formSubirPdf").reset();
  });*/




  /*var datastring = $("#formSubirPdf").serialize();

  $.ajax({
    type: "post",
    url: "../ajax/subirPdf.php",
    data: datastring,
    success: function(datastring){//no es ta pasando por success ya que la query arroja error en el codigo mysqli pero no asi en mysql workbench
      $("#myModalSubirPdf").modal("hide");
      actualizarTablaTratamientos();
      document.getElementById("formSubirPdf").reset();
    }
  }); */ 
}

function validarFormPdf(){
  $('#formSubirPdf').validate({
  rules: {
    descripcion_pdf: {
      required: true,
      maxlength: 50,
    }
  },
  messages: {
    descripcion_pdf: {
      required: 'Debe ingresar la descripción del archivo.',
      maxlength: 'Debe ser un máximo de 50 caracteres.'
    }
  },    
    submitHandler: function () {
        SubirPdf(); //se habilita cuando tengamos todo listo
        //alert('intentando subir archivo.');
    }
  });  
}
    

//-----------tooltip para funciones de fotones----------

$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});



//actualizar tabla de activos (cuando iniciamos pantalla en farmacia, medicina y laboratorio)

function actualizarTablaActivos(){
  $.get("../ajax/actualizarTablaActivos.php", {}, function(data, status){
    $(".display").html(data);//leer datos ya lo tenemos con php
    var table = $('#tablaPacientes').DataTable( {
         ordering: false,
        stateSave: true,
        "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons:[
              'excel',
              {
                extend: 'pdfHtml5',
                  orientation: 'landscape',
                  pageSize: 'LEGAL',

              }
            ]
    });   
  });
}

function actualizarTablaTratamientos(){
  $.get("../ajax/actualizarTablaTratamientos.php", {}, function(data, status){
    $(".display").html(data);//leer datos ya lo tenemos con php
    var table = $('#tablaPacientes').DataTable( {
         ordering: false,
        stateSave: true,
        "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons:[
              'excel',
              {
                extend: 'pdfHtml5',
                  orientation: 'landscape',
                  pageSize: 'LEGAL',

              }
            ]
    });   
  });
}

function actualizarTablaEgresados(){
  $.get("../ajax/actualizarTablaEgresados.php", {}, function(data, status){
    $(".display").html(data);//leer datos ya lo tenemos con php
    var table = $('#tablaPacientes').DataTable( {
         ordering: false,
        stateSave: true,
        "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons:[
              'excel',
              {
                extend: 'pdfHtml5',
                  orientation: 'landscape',
                  pageSize: 'LEGAL',

              }
            ]
    });   
  });
}

function actualizarTablaTodos(){
  $.get("../ajax/actualizarTablaTodos.php", {}, function(data, status){
    $(".display").html(data);//leer datos ya lo tenemos con php
    var table = $('#tablaPacientes').DataTable( {
         ordering: false,
        stateSave: true,
        "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons:[
              'excel',
              {
                extend: 'pdfHtml5',
                  orientation: 'landscape',
                  pageSize: 'LEGAL',

              }
            ]
    });   
  });
}

function actualizarTablaSuspendidos(){
    $.get("../ajax/actualizarTablaSuspendidos.php", {}, function(data, status){
    $(".display").html(data);//leer datos ya lo tenemos con php
    var table = $('#tablaPacientes').DataTable( {
         ordering: false,
        stateSave: true,
        "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons:[
              'excel',
              {
                extend: 'pdfHtml5',
                  orientation: 'landscape',
                  pageSize: 'LEGAL',

              }
            ]
    });   
  });
}

function actualizarTablaUsuarios() {
  $.get("../ajax/actualizarTablaUsuarios.php", {}, function(data, status){
    $(".display").html(data);//leer datos ya lo tenemos con php
    var table = $('#tablaUsuarios').DataTable( {
         ordering: false,
        stateSave: true,
        "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons:[
              'excel',
              {
                extend: 'pdfHtml5',
                  orientation: 'landscape',
                  pageSize: 'LEGAL',

              }
            ]
    });   
  });
}

/*----------------Limpiar modals-------------------------------------------*/

function limpiarNuevoPassword(){
  document.getElementById("FormNuevoPassword").reset();//removemos los inputs extras de muestras
  $( "label.error" ).remove();//eliminamos los labels de error que quedan al cancelar el formulario 
}

function limpiarSubirPdf(){
  document.getElementById("formSubirPdf").reset();
  $( "label.error" ).remove();
  limpiarAntibioticos();
}

//limpiar antibioticos extras al crear pacientes
function limpiarAntibioticos(){
  document.getElementById("formCrearPaciente").reset();
  $("#antibioticos").empty();
  x = 1;
}

function limpiarNuevoPaciente(){
  document.getElementById("formCrearPaciente").reset();
  $( "label.error" ).remove();
  limpiarAntibioticos();
}


function limpiarCrearUsuario(){
  document.getElementById("FormCrearUsuario").reset();//removemos los inputs extras de muestras
  $( "label.error" ).remove();//eliminamos los labels de error que quedan al cancelar el formulario 
}

function limpiarAgregarATB(){
  document.getElementById("formCrearATB").reset();//removemos los inputs extras de muestras
  $( "label.error" ).remove();//eliminamos los labels de error que quedan al cancelar el formulario 
}

//limpiar nuevo dia tratamiento
function limpiarNuevaDosisTratamiento(){
  document.getElementById("formNuevoDiaTratamiento").reset();//removemos los inputs extras de muestras
  $( "label.error" ).remove();//eliminamos los labels de error que quedan al cancelar el formulario 
  $('#fecha_tratamiento').multiDatesPicker('destroy');//destruimos el div que contiene el multidatespicker
  $('#fecha_tratamiento').multiDatesPicker({//y volvemos a crear de 0
  //metodos
    maxPicks: 1,
  });
}

function limpiarNuevaDosisVerDiasTratamiento(){
  document.getElementById("formDateMultiPicker").reset();//removemos los inputs extras de muestras
  $('#daterange').multiDatesPicker('destroy');//destruimos el div que contiene el multidatespicker
  $('#daterange').multiDatesPicker({
  //metodos
  dateFormat: "yy-mm-dd",
  });
}

//limpiar formulario observacion de medico
function limpiarObservacionMedico(){
  document.getElementById("formObservacionMedico").reset();//removemos los inputs extras de muestras
  $( "label.error" ).remove();//eliminamos los labels de error que quedan al cancelar el formulario 
}

//limpiar tabla de mostrar observaciones de antibioticos
function limpiarTablaObservaciones(){
  $("#tablaDescripciones tr td").remove();
}

function limpiarTablaPdf(){
  $("#tablaPdf tr td").remove();
}

/*------------------------------------------------------------------------*/

function limpiarTablaRecetas(){
  $("#tablaRecetas tr td").remove();
}


/*----------------------- Multi range picker para seleccionar dia en nueva dosis -----------------------------*/
$('#fecha_tratamiento').multiDatesPicker({
  //metodos
  maxPicks: 1,
});

$(document).ready(function() {
  $(function() {
    $('#fecha_tratamiento').datepicker({
      dateFormat: 'dd/mm/yy',
      showButtonPanel: false,
      changeMonth: false,
      changeYear: false,
      /*showOn: "button",
      buttonImage: "images/calendar.gif",
      buttonImageOnly: true,
      minDate: '+1D',
      maxDate: '+3M',*/
      inline: true
    });
  });
  $.datepicker.regional['es'] = {
    closeText: 'Cerrar',
    prevText: '<Ant',
    nextText: 'Sig>',
    currentText: 'Hoy',
    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
    dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
    dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
    weekHeader: 'Sm',
    dateFormat: 'dd-mm-yy',
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ''
  };
  $.datepicker.setDefaults($.datepicker.regional['es']);
});



/*-----------------------------------------------------------------------*/



/*----------------------- Multi range picker para seleccionar dia en nueva dosis -----------------------------*/
//traduccion para multidatespicker daterange rango de fechas
$('#daterange').multiDatesPicker({
  //metodos
  dateFormat: "yy-mm-dd",
});

$(document).ready(function() {
  $(function() {
    $('#daterange').datepicker({
      dateFormat: 'dd/mm/yy',
      showButtonPanel: false,
      changeMonth: false,
      changeYear: false,
      /*showOn: "button",
      buttonImage: "images/calendar.gif",
      buttonImageOnly: true,
      minDate: '+1D',
      maxDate: '+3M',*/
      inline: true
    });
  });
  $.datepicker.regional['es'] = {
    closeText: 'Cerrar',
    prevText: '<Ant',
    nextText: 'Sig>',
    currentText: 'Hoy',
    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
    dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
    dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
    weekHeader: 'Sm',
    dateFormat: 'dd-mm-yy',
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ''
  };
  $.datepicker.setDefaults($.datepicker.regional['es']);
});

/*----------------------------------------------------------------------------------------*/

/**/

// Add the following code if you want the name of the file appear on select
$(".fichero").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

/**/


  let dropdown = $('#select_cei10');

  dropdown.empty();

  dropdown.append('<option selected="true" disabled>Choose State/Province</option>');
  dropdown.prop('selectedIndex', 0);

  const url = 'https://raw.githubusercontent.com/cayasso/cie10/master/cie10-array.json';

  // Populate dropdown with list of provinces
  $.getJSON(url, function (data) {
    $.each(data, function (key, entry) {
      dropdown.append($('<option></option>').attr('value', entry.d).text(entry.c));
    })
  });




