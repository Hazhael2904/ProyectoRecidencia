<?php
    include_once 'conexion.php';
    $sentencia_select=$con->prepare('SELECT *FROM usuarios ORDER BY idusuarios DESC');
    $sentencia_select->execute();
    $resultado=$sentencia_select->fetchAll();

    // metodo buscar
if (isset($_POST['btn_buscar'])) {
	$buscar_text=$_POST['buscar'];
	$select_buscar=$con->prepare('
		SELECT *FROM usuarios WHERE nombre LIKE :campo OR usuario LIKE :campo;'
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
	<link rel="stylesheet" href="css/personalestilos.css">
	<link rel="stylesheet" href="css/estilosmenus.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Usuarios</title>
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
				<li><a href="indexcalend.html">Calendario</a>
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
		<h2>Usurios</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="buscar nombre o usuario" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insertusuario.php" class="btn btn__nuevo">Nueva Usuario</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>Nombre</td>
				<td>Apellidos</td>
				<td>Email</td>
				<td>Usuario</td>
				<td>Password</td>
				<td>Fecha de Registro</td>
				<td>Estatus</td>
				<td>Rol</td>
				<td colspan="2">Acción</td>
			</tr>

			<?php

			   $query="SELECT usuario.idusuarios, usuario.nombre, usuario.apellidos, usuario.email, usuario.usuario, usuario.password, usuario.fecharegistro, usuario.estatus,
			   rol.descripcion as nombrerol
			   FROM usuarios usuario
			   INNER JOIN roles rol ON usuario.id_rol = rol.id_rol";
			    if( !$consulta=$con->query($query) ){

			    }else{
			    	while ($fila=$consulta->fetch(PDO::FETCH_ASSOC))
			    	{

			?>
			<tr>
				
				<td><?php echo $fila['nombre'];?></td>
				<td><?php echo $fila['apellidos'];?></td>
				<td><?php echo $fila['email'];?></td>
				<td><?php echo $fila['usuario'];?></td>
				<td><?php echo $fila['password'];?></td>
				<td><?php echo $fila['fecharegistro'];?></td>
				<td><?php echo $fila['estatus'];?></td>
				<td><?php echo $fila['nombrerol'];?></td>
				<td><a href="updateusuarios.php?idusuarios=<?php
					echo $fila['idusuarios'];?>" class="btn btn_update">Editar</a></td>
				 <td><a href="delete.php?idusuarios=<?php
					echo $fila['idusuarios'];?>" class="btn btn_delete">Eliminar</a></td>
			</tr> 
			<?php   		
			    	}
			    }
			?>
		</table>
	</div>
</body>
</html>