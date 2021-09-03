<?php
    include_once 'conexion.php';

  if(isset($_POST['guardar'])){
	$nombre=$_POST['nombre'];
    $apeliidos=$_POST['apellidos'];
	$idservicio=$_POST['idservicio'];
	$fecharegistro=$_POST['fecharegistro'];
	$telefono=$_POST['telefono'];
	$correo=$_POST['correo'];
	$estatus=$_POST['estatus'];


	if(!empty($nombre) && !empty($apellidos) && !empty($idservicio) && !empty($fecharegistro) && !empty($telefono) && !empty($correo) && !empty($estatus)){

		if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
			echo"<script> alert('Correo no valido');</script>";

		}else{
			$consulta_insert=$con->prepare('INSERT INTO solicitud_info(nombre,apellidos,idservicio,fecharegistro,telefono,correo,estatus) VALUES(:nombre,:apellidos,:idservicio,:fecharegistro,:telefono,:correo,:estatus)');
			$consulta_insert->execute(array(
				':nombre'=>$nombre,
                ':apellidos'=>$apellidos,
				':idservicio'=>$idservicio,
				':fecharegistro'=>$fecharegistro,
				':telefono'=>$telefono,
				':correo'=>$correo,
				':estatus'=>$estatus
			));
			header('Location: informacion.php');
		 }
	  }
 }
 $queryusuarios=("SELECT CONCAT(nombre, ' ', apellidos) nombreusuario, idusuarios FROM usuarios");
 $usuario=$con->query($queryusuarios);
 $queryservicios=("SELECT CONCAT(nombre) nombreservicio, idservicio FROM servicio");
 $servicios=$con->query($queryservicios);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilosmenus.css">
    <link rel="stylesheet" href="css/solicitud.css">
    	<title>Solicitud de Información</title>
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
                <li><a href="indexcalend.php">Calendario</a>
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
    <div class="container">
        <h2>Nueva Solicitud</h2>
        <div class="row text-center col-sn-12 col-nd-12 col-lg-12 py-4">
        <form action="" method="post">
            <div class="form-group">
                <label>Nombre del Solicitante</label>
                <input type="text" name="nombre" placeholder="Ingresa Nobre del Solicitante">
            </div>
                <br>
            <div class="form-group">
                <label>Apellidos del Solicitante</label>
                <input type="text" name="apellidos" placeholder="Ingresa Apellidos del Solicitante">
            </div>
                <br>
            <div class="form-group">
                    <label>Lista de Servicios:</label>
                    <select name="idservicio" id="">

                        <?php
                        while ($servicio=$servicios->fetch(PDO::FETCH_ASSOC)): ?>
                          <option value="<?php echo $servicio['idservicio'];?>"><?php echo $servicio['nombreservicio'];?></option>

                          <?php endWhile;?>
                      </select>
            </div>
                  <br>
            <div class="form-group">
                <label>Descripcion de la Solicitud</label>
                <br>
                <textarea name="descripcion" id="descripcion" cols="140" rows="10"></textarea>
            </div>
            <br>
             <div class="from-group">
                    <label >Telefono del Solicitante</label>
                    <br>
                    <input type="tel" name="telefono" placeholder="Telefono del Solicitante">
            </div>
                <br>
                <div class="from-group">
                    <label> Correo del Solicitante</label>
                    <br>
                    <input type="text" name="correo" placeholder="Correo del Solicitante">
                </div>
                <br>
            <br>
            <div class="form-group">
                    <label>Fecha de Registro de la Solicitud</label>
                    <br><br>
                    <input type="date" name="fecharegistro" class="input_text">
            </div>
                <br>
                <div class="form-group">
                    <label>Estatus de la Solicitud</label>
                <select name="estatus" id="">
                        <option value="En_Proceso">En Proceso</option>
                        <option value="Contestando">Contestado</option>
                        <option value="Rechazada">Rechazada</option>
                        <option value="Terminado">Terminado</option>
                    </select>
                </div>
                <br>
                <div class="btn__group">
                <a href="informacion.php" class="btn btn__danger">Cancelar</a>
                <input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
                </div>
              </form>
          </div>
          </div>
</body>
</html>
