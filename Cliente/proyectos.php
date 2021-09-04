<?php
    include_once 'conexion.php';
    $sentencia_select=$con->prepare('SELECT *FROM proyectoss ORDER BY id_proyectos DESC');
    $sentencia_select->execute();
    $resultado=$sentencia_select->fetchAll();

    // metodo buscar
if (isset($_POST['btn_buscar'])) {
	$buscar_text=$_POST['buscar'];
	$select_buscar=$con->prepare('
		SELECT *FROM proyectoss WHERE nombre LIKE :campo OR idservicio LIKE :campo;'
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
	<link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/personalestilos.css">
	<title>Proyectos</title>
</head>
<body>
	<header>
		<div class="logo">
				<a href="index.php"><img src="img/logo2020.png" width="150" alt=""></a>
				<a href="#">C-PRO ASOCIADOS</a>
                
			</div>
		<nav class="navegacion">
			<ul class="menu">
				<li><a href="index.php">Inicio</a>
				</li>
				<li><a href="#">Solicitudes</a>
				</li>
				<li><a href="servicios.html">Servicios</a></li>
				<li><a href="proyectos.php">Proyectos</a>
				</li>
				<li><a href="../Home/cerrar_sesion.php">Cerrar Sesión</a></li>
			</ul>
		</nav>
	</header>
	<div class="contenedor">
		<h2>Tabla de Informacion de Proyectos</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="buscar nombre o apellidos" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
			</form>
			<table>
				<tr class="head">
					<td>Nombre</td>
					<td>Descripción del Proyecto</td>
					<td>Cliente</td>
					<td>Servicio</td>
					<td>Personal</td>
					<td>Fecha de Registro</td>
					<td>Estatus</td>
					<td colspan="1">Acciones</td>
				</tr>

				<?php

				$query="SELECT proyecto.id_proyectos, proyecto.nombre, proyecto.descripcion, proyecto.fecharegistro, proyecto.estatus,
				CONCAT(usuario.nombre, ' ', usuario.apellidos) as nombreusuario,
				servicio.nombre as nombreservicio,
				CONCAT(personal.nombre, ' ', personal.apellidopat, ' ', personal.apellidomat) as nombrepersonal
				FROM proyectoss proyecto
				INNER JOIN usuarios usuario ON proyecto.idusuarios = usuario.idusuarios
				INNER JOIN servicio servicio ON proyecto.idservicio = servicio.idservicio
				INNER JOIN personal personal ON proyecto.idpersonal = personal.idpersonal";
				if( !$consulta=$con->query($query) ){

				}else{
					while ($fila=$consulta->fetch(PDO::FETCH_ASSOC) )
					{
						?>
						<tr>
							<td><?php echo $fila['nombre'];?></td>
							<td><?php echo $fila['descripcion'];?></td>
							<td><?php echo $fila['nombreusuario'];?></td>
							<td><?php echo $fila['nombreservicio'];?></td>
							<td><?php echo $fila['nombrepersonal'];?></td>
							<td><?php echo $fila['fecharegistro'];?></td>
							<td><?php echo $fila['estatus'];?></td>
							<td><a href="seguimientoproyecto.php">Seguimiento</a></td>
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