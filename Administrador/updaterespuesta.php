<?php 
include_once 'conexion.php';

if(isset($_GET['id_respuesta'])) {
	$id=(int) $_GET['id_respuesta'];

	$buscar_id=$con->prepare('SELECT * FROM respuesta_solicitud WHERE id_respuesta=:id_respuesta LIMIT 1');
	$buscar_id->execute(array(
		'id_respuesta' =>$id 
	));
}else{
	header('Location: respuesta_solicitud.php');
}

if(isset($_POST['guardar'])){
	      $id_solicitud=$_POST['id_solicitud'];
          $respuesta=$_POST['respuesta'];
          $fechactualizacion=$_POST['fechactualizacion'];
          $idusuarios=$_POST['idusuarios'];
          $estatus=$_POST['estatus'];
          $id_respuesta=(int) $_GET['id_respuesta'];

if(!empty($id_solicitud) && !empty($respuesta) && !empty($fechactualizacion) && !empty($idusuarios) && !empty($estatus) ){
        
        $consulta_update=$con->prepare('UPDATE respuesta_solicitud SET 
        	id_solicitud=:id_solicitud,
        	respuesta=:respuesta,
        	fechactualizacion=:fechactualizacion,
        	idusuarios=:idusuarios,
        	estatus=:estatus
        	WHERE id_respuesta=:id_respuesta;
        	');
        $consulta_update->execute(array(
                ':id_solicitud'=>$id_solicitud,
          		':respuesta'=>$respuesta,
          		':fechactualizacion'=>$fechactualizacion,
          		':idusuarios'=>$idusuarios,
          		':estatus'=>$estatus,
          		':id_respuesta'=>$id_respuesta
          	));
        header('Location: respuesta_solicitud.php');
  }else{
  	echo "<script> alert('Los campos estan vacios');</script>";
  }
}





$querysolicitudes="SELECT CONCAT(descripcion) nombresolicitud, id_solicitud FROM solicitud";
$solicitudes=$con->query($querysolicitudes);
$queryusuarios="SELECT CONCAT(nombre, ' ', apellidos) nombreusuario, idusuarios FROM usuarios";
$usuario=$con->query($queryusuarios);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="css/solicitud.css">
	<title>Actualización de Solicitud</title>
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
		<h2>Actualizacion de Solicitud</h2>
		<div class="row text-center col-sn-12 col-nd-12 col-lg-12 py-4">
			<form action="" method="post">
				<div class="form-group">
					<label>Descripcion de la Solicitud</label>
					<select name="id_solicitud" id="">
						<?php
						while ($solicitud=$solicitudes->fetch(PDO::FETCH_ASSOC)):?>
							<option value="<?php echo $solicitud['id_solicitud'];?>"><?php echo $solicitud['nombresolicitud'];?></option>
							<?php endWhile;?>
					</select>
				</div>
				<br>
				<div class="form-group">
					<label for="">Nombre del Personal encargado de Responder</label>
					<select name="idusuarios" id="">
						 <?php 
                    while ($usuarios=$usuario->fetch(PDO::FETCH_ASSOC)):?>
                        <option value="<?php echo $usuarios['idusuarios'];?>"><?php echo $usuarios['nombreusuario'];?></option>

                        <?php endWhile;?>
					</select>			
				</div>
				<br>
				<div class="form-group">
					<label for="">Respuesta del Personal de la Constructora</label>
					<br>
					<textarea name="respuesta" id="respuesta" cols="130" rows="10"></textarea>
				</div>
				<br>
				
				<br>
				 <div class="form-group">
					<label>Fecha de Actualización de Solicitud</label>
					<br>
					<input type="date" name="fechactualizacion">
				</div>
				<br>
				 <div class="form-group">
                    <label>Estatus de la Solicitud</label>
                <select name="estatus" id="">
                        <option value="Procesando">Procesando</option>
                        <option value="Contestado">Contestado</option>
                        <option value="Terminado">Terminado</option>
                        <option value="Rechazada">Rechazada</option>
                    </select>
                </div>
                <div class="btn__group">
                	<a href="respuesta_solicitud.php" class="btn btn__danger">Cancelar</a>
                	<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
                </div>
			</form>
		</div>
	</div>
</body>
</html>