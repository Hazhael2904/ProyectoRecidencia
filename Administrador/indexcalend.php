
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilosmenus.css">
	<title>Calendario</title>
	<script src="js/jquery.min.js"></script>
	<script src="js/moment.min.js"></script>
	<!-- Calendario -->
	<link rel="stylesheet" href="css/fullcalendar.min.css">
	<script src="js/fullcalendar.min.js"></script>
	<script src="js/es.js"></script>

  <script src="js/bootstrap-clockpicker.js"></script>
  <link rel="stylesheet" href="css/bootstrap-clockpicker.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>	

  <style>
    
    .fc th{
      padding: 10px 0px;
      vertical-align: middle;
      background: #F2F2F2;
    }


  </style>




</head>
<body>
	<header>
    <div class="logo">
        <a href="index.php"><img src="img/logo.png" width="150" alt=""></a>
        <a href="#">C-PRO ASOCIADOS</a>
                
      </div>
    <nav class="navegacion">
      <ul class="menu">
        <li><a href="index.php">Inicio</a>
        </li>
        <li><a href="informacion.php">Solicitudes</a>
        </li>
        <li><a href="servicios.html">Servicios</a></li>
        <li><a href="proyectos.php">Proyectos</a>
        </li>
        <li><a href="indexcalend.phpl">Calendario</a>
          <ul class="submenu">
            <li><a href="calendariocitas.php">Citas</a></li>
          </ul>
        </li>
        <li><a href="usuarios.php">Usuarios</a>
        </li>
        <li><a href="login_usuario.php">Iniciar Sesión</a>
                    <ul class="submenu">
                      <li><a href="../Home/cerrar_sesion.php">Cerrar Sesión</a></li>
                    </ul>
        </li>
      </ul>
    </nav>
  </header>
<br>
<br>
<div class="container">
 <div class="row">
   <div class="col"></div>
   <div class="col-7"><br><div id="CalendarioWeb"></div> </div>
   <div class="col"></div>
 </div>
</div>
<script>
 $(document).ready(function(){
  $('#CalendarioWeb').fullCalendar({
    header:{
      left:'today,prev,next',
      center:'title',
      right:'month,basicWeek,basicDay,agendaWeek,agendaDay'
    },
    dayClick:function(date,jsEvent,view){


      $('#btnAgregar').prop("disabled",false);
      $('#btnModificar').prop("disabled",true);
      $('#btnEliminar').prop("disabled",true);




      $('#txtFecha').val(date.format());
      $("#ModalEventos").modal();
    },
    events:'http://localhost/ProyectoRecidencia/Administrador/eventos.php',

    eventClick:function(calEvent,jsEvent,view){
     
     $('#btnAgregar').prop("disabled",true);
     $('#btnModificar').prop("disabled",false);
     $('#btnEliminar').prop("disabled",false);
         //H5
         $('#tituloEvento').html(calEvent.title);

          //Mostrar la informacion del evento en los inputs
          $('#txtDescripcion').val(calEvent.descripcion);
          $('#txtUsuario').val(calEvent.usuarios);
          $('#txtPersonal').val(calEvent.personal);
          $('#txtServicio').val(calEvent.servicio);
          $('#txtID').val(calEvent.id);
          $('#txtTitulo').val(calEvent.title);
          $('#txtColor').val(calEvent.color);
          


          FechaHora= calEvent.start._i.split(" ");
          $('#txtFecha').val(FechaHora[0]);
          $('#txtHora').val(FechaHora[1]);
          


          $("#ModalEventos").modal();
        }

        
      });

});
</script>

<!-- Modal(Agregar,Modificar y eeliminar) -->
<div class="modal fade" id="ModalEventos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloEvento"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="txtID" name="txtID">
        <div class="form-row">
          <div class="form-group col-md-8">
            <label>Titulo:</label>
            <input type="text" id="txtTitulo" class="form-control" placeholder="Titulo del Evento">
          </div>
          <div class="form-gruop col-md-4">
            <label >Hora del Evento:</label>

            <div class="input-gruop clockpicker" data-autoclose="true">
             <input type="text" id="txtHora" value="12:30" class="form-control"> 
           </div>
         </div>
       </div>
       <div class="form-group">
        <label>Fecha:</label>
        <input type="text" id="txtFecha" name="txtFecha" class="form-control">
      </div>
      <div class="form-group">
        <label>Descripción:</label>
        <textarea id="txtDescripcion" rows="3" class="form-control"></textarea>
      </div>
      <div class="form-group">
        <label>Cliente:</label>
        <input type="text" id="txtUsuario" class="form-control">
      </div>
     
      <div class="form-group">
        <label>Personal:</label>
        <input type="text" id="txtPersonal" class="form-control">
      </div>
      <div class="form-group">
        <label>Servicio:</label>
        <input type="text" id="txtServicio" class="form-control">
      </div>
       <div class="form-group">
        <label>Color:</label>  
        <input type="color" value="#ff0000" id="txtColor" class="form-control" style="height: 36px" />

      </div>
    </div>
    <div class="modal-footer">
      <button type="button" id="btnAgregar" class="btn btn-success">Agregar</button>
      <button type="button" id="btnModificar" class="btn btn-success">Modificar</button>
      <button type="button" id="btnEliminar" class="btn btn-danger">Borrar</button>
      <button type="button" class="btn btn-default">Cancelar</button>
    </div>
  </div>
</div>
</div>

<script>
 var NuevoEvento;

 $('#btnAgregar').click(function(){
   RecolectarDatosGUI();
   EnviarInformacion('agregar',NuevoEvento);

 });
 $('#btnEliminar').click(function(){
  RecolectarDatosGUI();
  EnviarInformacion('eliminar',NuevoEvento);

});

 

 $('#btnModificar').click(function(){
   RecolectarDatosGUI();
   EnviarInformacion('modificar',NuevoEvento);

 });
 

 function RecolectarDatosGUI(){
   NuevoEvento={
    id:$('#txtID').val(),
    title:$('#txtTitulo').val(),
    start:$('#txtFecha').val()+" "+$('#txtHora').val(),
    color:$('#txtColor').val(),
    descripcion:$('#txtDescripcion').val(),
    usuarios:$('#txtUsuario').val(),
    personal:$('#txtPersonal').val(),
    servicio:$('#txtServicio').val(),
    textColor:"#FFFFFF",
    end:$('#txtFecha').val()+" "+$('#txtHora').val()
  };
}

function EnviarInformacion(accion,objEvento,modal){
  $.ajax({
   type:'POST',
   url:'eventos.php?accion='+accion,
   data:objEvento,
   success:function(msg){
     if(msg){
      $('#CalendarioWeb').fullCalendar('refetchEvents');
      $("#ModalEventos").modal('toggle');
    }
  },
  error:function(){
    alert("Hay un error...");
  }
});
}

$('.clockpicker').clockpicker();

</script>

</body>
</html>