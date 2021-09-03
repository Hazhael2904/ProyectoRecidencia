<?php 
    include_once 'conexion.php';

    if(isset($_POST['guardar'])){
    	$id_proyectos=$_POST['id_proyectos'];
    	$descripcion=$_POST['descripcion'];
    	$idusuarios=$_POST['idusuarios'];
    	$idpersonal=$_POST['idpersonal'];
    	$fechactualizacion=$_POST['fechactualizacion'];

    	if(!empty($id_proyectos) && !empty($descripcion) && !empty($idusuarios) && !empty($idpersonal) && !empty($fechactualizacion) ){

    		$consulta_insert=$con->prepare('INSERT INTO seguimiento_proyecto(id_proyectos,descripcion,idusuarios,idpersonal,fechactualizacion) VALUES(:id_proyectos,:descripcion,:idusuarios,:idpersonal,:fechactualizacion)');
    		$consulta_insert->execute(array(
    			':id_proyectos'=>$id_proyectos,
    			':descripcion'=>$descripcion,
    			':idusuarios'=>$idusuarios,
    			':idpersonal'=>$idpersonal,
    			':fechactualizacion'=>$fechactualizacion
    			
    		));
            header('location: seguimientoproyecto.php');
    	}else{
    		echo "<script> alert('Los campos estan vacios');</script>";
    	}
    }
$queryproyecto="SELECT CONCAT(nombre) nombreproyecto, id_proyectos FROM proyectoss";
$proyectos=$con->query($queryproyecto);
$queryusuarios="SELECT CONCAT(nombre, ' ', apellidos) nombreusuario, idusuarios FROM usuarios";
$usuario=$con->query($queryusuarios);
$querypersonall="SELECT CONCAT(nombre, ' ', apellidopat, ' ', apellidomat) nombrepersonal, idpersonal FROM personal";
$personall=$con->query($querypersonall);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="css/solicitud.css">
	<title>Avance de Proyecto</title>
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
		<h2>Avance de Proyecto</h2>
		<div class="row text-center col-sn-12 col-nd-12 col-lg-12 py-4">
			<form action="" method="post">
				<div class="form-group">
					<label for="">Nombre del Proyecto</label>
					<select name="id_proyectos" id="">
						 <?php 
                    while ($proyectoss=$proyectos->fetch(PDO::FETCH_ASSOC)):?>
                        <option value="<?php echo $proyectoss['id_proyectos'];?>"><?php echo $proyectoss['nombreproyecto'];?></option>

                        <?php endWhile;?>
					</select>			
				</div>
				 <br>
				 <div class="form-group">
					<label for="">Descripción del Avance</label>
					<br>
					<textarea name="descripcion" id="descripcion" cols="130" rows="10"></textarea>
				</div>
				<br>
				<div class="form-group">
					<label for="">Nombre del Cliente</label>
					<select name="idusuarios" id="">
						 <?php 
                    while ($usuarios=$usuario->fetch(PDO::FETCH_ASSOC)):?>
                        <option value="<?php echo $usuarios['idusuarios'];?>"><?php echo $usuarios['nombreusuario'];?></option>

                        <?php endWhile;?>
					</select>			
				</div>
				 <br>
				<div class="form-group">
                <label>Nombre del Personal Encargado</label>
                <select name="idpersonal">
                    <?php 
                    while ($personal=$personall->fetch(PDO::FETCH_ASSOC)):?>
                        <option value="<?php echo $personal['idpersonal'];?>"><?php echo $personal['nombrepersonal'];?></option>

                        <?php endWhile;?>
                    </select>
                </div>
                <div class="form-group">
					<label>Fecha de Actualización del Avance</label>
					<br>
					<input type="date" name="fechactualizacion">
				</div>
                <br>
                <div class="btn__group">
                	<a href="seguimientoproyecto.php" class="btn btn__danger">Cancelar</a>
                	<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
                </div>
			</form>
		</div>
	</div>
</body>
</html>