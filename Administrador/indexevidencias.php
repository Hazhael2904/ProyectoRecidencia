<?php
include_once 'conexion.php';


$queryseguimientos=("SELECT CONCAT(id_seguimiento) nombreseguimineto, id_seguimiento FROM seguimiento_proyecto");
$segimiento=$con->query($queryseguimientos);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/estilos.css">
	<title>Evidencias</title>
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
	<center>
		<form action="validacion.php" method="post" enctype="multipart/form-data">
			<table>
				<tr>
					<td>
						<label for="Etapa">Etapa:</label>
						<input type="text" name="etapa" placeholder="Colocar Etapa de la Imagen">
					</td>
					<br>
					<td>
						<label for="Imagen">Imagen:</label>
					</td>
					<br>
					<td>
						<input type="file" name="Imagen" size="20">
					</td>
					<br>
					<td>
					<label>ID DE SEGUIMIENTO:</label>
                    <select name="id_seguimiento" id="">

                        <?php
                        while ($seguimiento_proyecto=$segimiento->fetch(PDO::FETCH_ASSOC)): ?>
                          <option value="<?php echo $seguimiento_proyecto['id_seguimiento'];?>"><?php echo $seguimiento_proyecto['nombreseguimineto'];?></option>

                          <?php endWhile;?>
                      </select>
					</td>
				</tr>
				<tr>
					<td colspan="2" style="text-align: center;"><input type="submit" value="Enviar Imagen" class="boton"></td>
				</tr>
			</table>
			
		</form>
	</center>
</body>
</html>