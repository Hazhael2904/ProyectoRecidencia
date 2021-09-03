<?php 
    include_once 'conexion.php';

    if(isset($_POST['guardar'])){
    	$nombre=$_POST['nombre'];
    	$descripcion=$_POST['descripcion'];
    	$idusuarios=$_POST['idusuarios'];
    	$idservicio=$_POST['idservicio'];
    	$idpersonal=$_POST['idpersonal'];
    	$fecharegistro=$_POST['fecharegistro'];
    	$estatus=$_POST['estatus'];

    	if(!empty($nombre) && !empty($descripcion) && !empty($idusuarios) && !empty($idservicio) && !empty($idpersonal) && !empty($fecharegistro) && !empty($estatus) ){

    		$consulta_insert=$con->prepare('INSERT INTO proyectoss(nombre,descripcion,idusuarios,idservicio,idpersonal,fecharegistro,estatus) VALUES(:nombre,:descripcion,:idusuarios,:idservicio,:idpersonal,:fecharegistro,:estatus)');

    		$consulta_insert->execute(array(
    			':nombre'=>$nombre,
    			':descripcion'=>$descripcion,
    			':idusuarios'=>$idusuarios,
    			':idservicio'=>$idservicio,
    			':idpersonal'=>$idpersonal,
    			':fecharegistro'=>$fecharegistro,  			
    			':estatus'=>$estatus
    		));
    		header('Location: proyectos.php');
    	}else{
    		echo "<script> alert('Los campos estan vacios');</script>";
    	}
    }
$queryusuarios="SELECT CONCAT(nombre, ' ', apellidos) nombreusuario, idusuarios FROM usuarios";
$usuario=$con->query($queryusuarios);
$queryservicios=("SELECT CONCAT(nombre) nombreservicio, idservicio FROM servicio");
$servicios=$con->query($queryservicios);
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
	<title>Nuevo Proyecto</title>
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
		<h2>Nuevo Proyecto</h2>
		<div class="row text-center col-sn-12 col-nd-12 col-lg-12 py-4">
			<form action="" method="post">
				<div class="form-group">
					<label for="">Nombre del Proyecto</label>
					<input type="text" name="nombre" placeholder="Ingresa Nombre del Proyecto">
				</div>
				<br>
				<div class="form-group">
					<label for="">Descripción del Proyecto</label>
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
                <label>Nombre del Personal Encargado</label>
                <select name="idpersonal">
                    <?php 
                    while ($personal=$personall->fetch(PDO::FETCH_ASSOC)):?>
                        <option value="<?php echo $personal['idpersonal'];?>"><?php echo $personal['nombrepersonal'];?></option>

                        <?php endWhile;?>
                    </select>
                </div>
                <br>
              <div class="form-group">
					<label>Fecha de Registro del Proyecto</label>
					<br>
					<input type="date" name="fecharegistro">
				</div>
                <br>
                <div class="form-group">
                    <label>Estatus de la Solicitud</label>
                <select name="estatus" id="">
                        <option value="Face Inicial">Face Inicial</option>
                        <option value="En Proceso">En Proceso</option>
                        <option value="Terminado">Terminado</option>
                        <option value="Entregado">Entregado</option>
                    </select>
                </div>
                <div class="btn__group">
                	<a href="proyectos.php" class="btn btn__danger">Cancelar</a>
                	<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
                </div>
			</form>
		</div>
	</div>
</body>
</html>