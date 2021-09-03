<?php
    include_once 'conexion.php';
    $sentencia_select=$con->prepare('SELECT * FROM eventos ORDER BY id DESC');
    $sentencia_select->execute();
    $resultado=$sentencia_select->fetchAll();


    //metodo buscar
    if(isset($_POST['btn_buscar'])){
    	$buscar_text=$_POST['buscar'];
    	$select_buscar=$con->prepare('
    		SELECT * FROM eventos WHERE title LIKE :campo OR descripcion LIKE :campo;');
    	$select_buscar->execute(array(
    		':campo' =>"%".$buscar_text."%"));
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
    <title>Calendario Eventos</title>
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
    <div class="contenedor">
        <h2>Citas Programadas</h2>
        <div class="barra__buscador">
             <form action="" class="formulario" method="post">
                <input type="text" name="buscar" placeholder="buscar nombre o Tipo" 
                value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
                <input type="submit" class="btn" name="btn_buscar" value="Buscar">
             </form>
        </div>
        <table>
            <tr class="head">
                <td>Titulo</td>
                <td>Descripcion</td>
                <td>Usuario</td>
                <td>Personal</td>
                <td>Servicio</td>
                <td>Fecha y Hora</td>
                <td colspan="2">Acción</td>
            </tr>
            <?php

               $query="SELECT evento.id_eventos, evento.title, evento.descripcion, evento.usuarios, evento.personal, evento.servicio, evento.start FROM eventos evento";
               if(!$consulta = $con->query($query) ){

               }else{
                while($fila=$consulta->fetch(PDO::FETCH_ASSOC))
                {
                    ?>
                    <tr>
                        <td><?php echo $fila['title'];?></td>
                        <td><?php echo $fila['descripcion'];?></td>
                        <td><?php echo $fila['usuarios'];?></td>
                        <td><?php echo $fila['personal'];?></td>
                        <td><?php echo $fila['servicio'];?></td>
                        <td><?php echo $fila['start'];?></td>
                        <td><a href="updatevento.php?id_eventos=<?php echo $fila['id_eventos'];?>" class="btn btn_update">Editar</a></td>
                        <td><a href="deletevento.php?id_eventos=<?php echo $fila['id_eventos'];?>" class="btn btn_delete">Eliminar</a></td>
                    </tr>
                     <?php
                }
               }
               ?>
        </table>
    </div>
</body>
</html>
