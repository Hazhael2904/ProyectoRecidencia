<?php
    include_once 'conexion.php';
    $sentencia_select=$con->prepare('SELECT *FROM solicitud ORDER BY id_solicitud DESC');
    $sentencia_select->execute();
    $resultado=$sentencia_select->fetchAll();

    // metodo buscar
if (isset($_POST['btn_buscar'])) {
	$buscar_text=$_POST['buscar'];
	$select_buscar=$con->prepare('
		SELECT *FROM solicitud WHERE nombre LIKE :campo OR idservicio LIKE :campo;'
	);

	$select_buscar->execute(array(
		':campo' =>"%".$buscar_text."%"
	));

	$resultado=$select_buscar->fetchAll();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="css/info.css">
		<link rel="stylesheet" href="css/estilosmodal.css">
	<title>Solicitudes de Información</title>
</head>
<body>
	<header>
		<div class="logo">
				<a href="#"><img src="img/logo.png" width="150" alt=""></a>
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
	<div class="contenedor">
		<h2>Tabla de Solicitudes de Información</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="buscar nombre o apellidos" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="guardarsolicitud.php" class="btn btn__nuevo">Nueva Solicitud</a>
				<a href="respuesta_solicitud.php" class="btn btn__nuevo">Contestaciones</a>
			</form>
			<table>
				<tr class="head">
					<td>Nombre</td>
					<td>Apellidos</td>
					<td>Servicio</td>
					<td>Descripcion</td>
					<td>Telefono</td>
					<td>Correo</td>
					<td>Fecha de Registro</td>
					<td colspan="1">Acción</td>
				</tr>
				<?php
				// $query="SELECT info.id_solicitud, info.nombre, info.apellidos, info.descripcion, info.telefono, info.correo, info.fecharegistro,
    //                     servicio.nombre as nombreservicio
    //                     FROM solicitud info 
    //                     INNER JOIN servicio servicio ON info.idservicio = servicio.idservicio";

				$query="SELECT solicitud.id_solicitud, solicitud.nombre, solicitud.apellidos, solicitud.descripcion, solicitud.telefono, solicitud.correo, solicitud.fecharegistro, 
				    servicio.nombre as nombreservicio
				    FROM solicitud solicitud
				    INNER JOIN servicio servicio ON solicitud.idservicio = servicio.idservicio
				     WHERE not EXISTS (SELECT * FROM `respuesta_solicitud` WHERE respuesta_solicitud.id_solicitud = solicitud.id_solicitud)";

				if(!$consulta=$con->query($query) ){

				}else{
					while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)) {
						?>
						<tr>
							<td><?php echo $fila['nombre'];?></td>
							<td><?php echo $fila['apellidos'];?></td>
							<td><?php echo $fila['nombreservicio'];?></td>
							<td><?php echo $fila['descripcion'];?></td>
							<td><?php echo $fila['telefono'];?></td>
							<td><?php echo $fila['correo'];?></td>
							<td><?php echo $fila['fecharegistro'];?></td>
							
							<td><a href="deleteinfo.php?id_solicitud=<?php echo $fila['id_solicitud'];?>" class="btn btn_delete">Eliminar</a></td>
						</tr>
						<?php
					}
				}
            ?>
			</table>
		</div>
	</div>
</body>
</html>