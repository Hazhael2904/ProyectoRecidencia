<?php
    include_once 'conexion.php';

    if(isset($_POST['guardar'])){
    	$nombre=$_POST['nombre'];
    	$apellidos=$_POST['apellidos'];
    	$email=$_POST['email'];
    	$usuario=$_POST['usuario'];
    	$password=$_POST['password'];
    	$fecharegistro=$_POST['fecharegistro'];
    	$estatus=$_POST['estatus'];
    	$idrol=$_POST['idrol'];

    	$password= hash('sha512', $password);

    	if(!empty($nombre) && !empty($apellidos) && !empty($email) && !empty($usuario) && !empty($password) && !empty($fecharegistro) && !empty($estatus) && !empty($idrol) ){

    		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    			echo"<script> alert('Correo no valido');</script>";
    		}else{
    			$consulta_insertar=$con->prepare('INSERT INTO usuarios(nombre,apellidos,email,usuario,password,fecharegistro,estatus,idrol) VALUES(:nombre,:apellidos,:email,:usuario,:password,:fecharegistro,:estatus,:idrol)');
    			$consulta_insertar->execute(array(
    				':nombre'=>$nombre,
    				':apellidos'=>$apellidos,
    				':email'=>$email,
    				':usuario'=>$usuario,
    				':password'=>$password,
    				':fecharegistro'=>$fecharegistro,
    				':estatus'=>$estatus,
    				':idrol'=>$idrol
    			));
    			header('Location: usuarios.php');
    		}
    	}else{
    		echo "<script> alert('Los campos estan vacios');</script>";
    	}
    }
    $queryroles=("SELECT CONCAT (descripcion) nombrerol, id_rol FROM roles");
    $rol=$con->query($queryroles);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/estilos.css">
		<link rel="stylesheet" href="css/solicitud.css">
	<title>Nuevo Usuario</title>
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
		<h2>Nuevo Usuario</h2>
		<div class="row text-center col-sn-12 col-nd-12 col-lg-12 py-4">
			<form action="" method="post">
				<div class="form-group">
					<label>Nombre del Usuario</label>
					<input type="text" name="nombre" placeholder="Coloque el nombre del Usuario" required>
				</div>
				<br>
				<div class="form-group">
					<label>Apellidos del Usuario</label>
					<input type="text" name="apellidos" placeholder="Coloque los apellidos del Usuario" required>
				</div>
				<br>
				<div class="form-group">
					<label>Nombre de Usuario</label>
					<input type="text" name="usuario" placeholder="Coloque el Usuario" required>
				</div>
				<br>
				<div class="form-group">
					<label>Correo del Usuario</label>
					<br>
					<input type="email" name="email" placeholder="Coloque el Correo" required>
				</div>
				<br>
				<div class="form-group">
					<label>Contraseña del Usuario</label>
					<br>
					<input type="password" name="password" placeholder="Coloque la contraseña" required>
				</div>
				<br>
				<div class="form-group">
					<label>Fecha de Registro del Usuario</label>
					<br>
					<input type="date" name="fecharegistro">
				</div>
				<br>
				<div class="form-group">
					<label>Estado del Usuario</label>
					<select name="estatus" id="">
						<option value="Activo">Activo</option>
						<option value="No Activo">No Activo</option>
					</select>
				</div>
				<div class="form-group">
					<label>Lista de Roles:</label>
					<select name="id_rol" id="">
						
							<?php
	                    while ($roles=$rol->fetch(PDO::FETCH_ASSOC)): ?>
                          <option value="<?php echo $roles['id_rol'];?>"><?php echo $roles['nombrerol'];?></option>
                 
                             <?php endWhile;?>

                           </select>
				</div>
				<div class="btn__group">
                <a href="usuarios.php" class="btn btn__danger">Cancelar</a>
                <input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
            </div>
			</form>
		</div>
	</div>
</body>
</html>