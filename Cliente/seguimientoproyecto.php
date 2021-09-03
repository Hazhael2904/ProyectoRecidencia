<?php
    include_once 'conexion.php';
    $sentencia_select=$con->prepare('SELECT *FROM seguimiento_proyecto ORDER BY id_seguimiento DESC');
    $sentencia_select->execute();
    $resultado=$sentencia_select->fetchAll();

    // metodo buscar
if (isset($_POST['btn_buscar'])) {
	$buscar_text=$_POST['buscar'];
	$select_buscar=$con->prepare('
		SELECT *FROM seguimiento_proyecto WHERE id_proyectos LIKE :campo OR idusuarios LIKE :campo;'
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
	<title>Seguimientos de los Proyectos</title>
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
				<li><a href="#">Solicitudes</a>
				</li>
				<li><a href="servicios.html">Servicios</a></li>
				<li><a href="proyectos.php">Proyectos</a>
				</li>
				<li><a href="#">Calendario</a>
					<ul class="submenu">
						<li><a href="#">Citas</a></li>
					</ul>
				</li>
				<li><a href="#">Usuarios</a>
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
		<h2>Tabla de seguimientos de Proyectos</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="buscar nombre o apellidos" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				
			</form>
			<table>
				<tr class="head">
					<td>ID</td>
					<td>Proyecto</td>
					<td>Descripción</td>
					<td>Cliente</td>
					<td>Personal Encargado</td>
					<td>Fecha de Actualizacion de Avance</td>
					<td colspan="2">Acciones</td>
				</tr>
				<?php 
				$query="SELECT seguimiento.id_seguimiento, seguimiento.descripcion, seguimiento.fechactualizacion,
				proyecto.nombre as nombreproyecto,
				CONCAT(usuario.nombre, ' ', usuario.apellidos) as nombreusuario,
				CONCAT(personal.nombre, ' ',personal.apellidopat, ' ', personal.apellidomat) as nombrepersonal
				FROM seguimiento_proyecto seguimiento
				INNER JOIN proyectoss proyecto ON seguimiento.id_proyectos  = proyecto.id_proyectos
				INNER JOIN usuarios usuario ON seguimiento.idusuarios = usuario.idusuarios
				INNER JOIN personal personal ON seguimiento.idpersonal = personal.idpersonal";
				if( !$consulta=$con->query($query) ){

				}else{
					while($fila=$consulta->fetch(PDO::FETCH_ASSOC))
					{
                      ?>
                      <tr>
                      	<td><?php echo $fila['id_seguimiento'];?></td>
                      	<td><?php echo $fila['nombreproyecto'];?></td>
                      	<td><?php echo $fila['descripcion'];?></td>
                      	<td><?php echo $fila['nombreusuario'];?></td>
                      	<td><?php echo $fila['nombrepersonal'];?></td>
                      	<td><?php echo $fila['fechactualizacion'];?></td>
                      	
                      	<td><a href="delete.php?id_seguimiento=<?php echo $fila['id_seguimiento'];?>" class="btn btn_delete">Eliminar</a></td>
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