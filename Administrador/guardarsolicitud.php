<?php 
      include_once 'conexion.php';

      if(isset($_POST['guardar'])){
      	$nombre=$_POST['nombre'];
      	$apellidos=$_POST['apellidos'];
      	$idservicio=$_POST['idservicio'];
      	$descripcion=$_POST['descripcion'];
      	$telefono=$_POST['telefono'];
      	$correo=$_POST['correo'];
      	$fecharegistro=$_POST['fecharegistro'];
      	

      	if(!empty($nombre) && !empty($apellidos) && !empty($idservicio) && !empty($descripcion) && !empty($telefono) && !empty($correo) && !empty($fecharegistro)){

      		$consultar_insert=$con->prepare('INSERT INTO solicitud(nombre,apellidos,idservicio,descripcion,telefono,correo,fecharegistro) VALUES(:nombre,:apellidos,:idservicio,:descripcion,:telefono,:correo,:fecharegistro)');
      		$consultar_insert->execute(array(
      			':nombre'=>$nombre,
      			':apellidos'=>$apellidos,
      			':idservicio'=>$idservicio,
      			':descripcion'=>$descripcion,
      			':telefono'=>$telefono,
      			':correo'=>$correo,
      			':fecharegistro'=>$fecharegistro
      		));
      		header('Location: informacion.php');

      	}else{
      		echo "<script> alert('Los campos estan vacios');</script>";
      	}

}
$queryservicios=("SELECT CONCAT(nombre) nombreservicio, idservicio FROM servicio");
$servicios=$con->query($queryservicios);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/estilos.css">
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
				<li><a href="proyecto.php">Proyectos</a>
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
			<form action="" method="POST">
				<div class="form-group">
					<label for="nombre">Nombre del Solicitante</label>
					<input type="text" name="nombre" placeholder="Escriba nombre del Solicitante">
				</div>
				<br>
				<div class="form-group">
					<label for="apellidos">Apellidos del Solicitante</label>
					<input type="text" name="apellidos" placeholder="Escriba los apellidos del Solicitante">
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
					<label for="">Descripción de la Solicitud</label>
					<br>
					<textarea name="descripcion" id="descripcion" cols="130" rows="10"></textarea>
				</div>
				<br>
				 <div class="form-group">
					<label>Telefono del Solicitante</label>
					<br>
					<input type="text" name="telefono" placeholder="Ingrese celular">
				</div>
				<br>
                  <div class="form-group">
					<label>Correo del Solicitante</label>
					<br>
					<input type="email" name="correo" placeholder="Ingrese correo del Solicitante">
				</div>
				<br>
				 <div class="form-group">
					<label>Fecha de Registro de la Solicitud</label>
					<br>
					<input type="date" name="fecharegistro">
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