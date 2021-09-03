<?php
    include_once 'conexion.php';
    $sentencia_select=$con->prepare('SELECT *FROM respuesta_solicitud ORDER BY id_respuesta DESC');
    $sentencia_select->execute();
    $resultado=$sentencia_select->fetchAll();

    // metodo buscar
if (isset($_POST['btn_buscar'])) {
	$buscar_text=$_POST['buscar'];
	$select_buscar=$con->prepare('
		SELECT *FROM respuesta_solicitud WHERE idusuarios LIKE :campo OR estatus LIKE :campo;'
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
    <link rel="stylesheet" href="css/personalestilos.css">
	<title>Seguimiento de Solicitud</title>
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
		<h2>Seguimiento de Solicitudes</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="buscar nombre o apellidos" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="actulizacion.php" class="btn btn__nuevo">Actualizacion de Solicitud</a>
			</form>
			<table>
				<tr class="head">
					<td>Solicitud</td>
					<td>Respuesta</td>
					<td>Personal</td>
					<td>Fecha de Actualizacion de Solicitud</td>
					<td>Estatus</td>
					<td colspan="2">Acción</td>
				</tr>
				<?php 
				$query="SELECT respuesta.id_respuesta, respuesta.respuesta, respuesta.fechactualizacion, respuesta.estatus,
				CONCAT(solicitud.id_solicitud,' ', solicitud.nombre, ' ', solicitud.apellidos,' ', solicitud.descripcion) as nombresolicitud,
				CONCAT(usuario.nombre, ' ', usuario.apellidos) as nombreusuario
				FROM respuesta_solicitud respuesta
				INNER JOIN solicitud solicitud ON respuesta.id_solicitud = solicitud.id_solicitud
				INNER JOIN usuarios usuario ON respuesta.idusuarios = usuario.idusuarios";

				if(!$consulta=$con->query($query) ){

				}else{
					while($fila=$consulta->fetch(PDO::FETCH_ASSOC))
					{
						?>
						<tr>
							<td><?php echo $fila['nombresolicitud'];?></td>
							<td><?php echo $fila['respuesta'];?></td>
							<td><?php echo $fila['nombreusuario'];?></td>
							<td><?php echo $fila['fechactualizacion'];?></td>
							<td><?php echo $fila['estatus'];?></td>
							<td><a href="updaterespuesta.php?id_respuesta=<?php echo $fila['id_respuesta'];?>" class="btn btn_update">Actualizar</a></td>
							<td><a href="deleterespuesta.php?id_respuesta=<?php echo $fila['id_respuesta'];?>" class="btn btn_delete">Eliminar</a></td>
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