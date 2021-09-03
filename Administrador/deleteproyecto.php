<?php
    include_once 'conexion.php';
    if(isset($_GET['id_proyectos'])){
    	$id=(int) $_GET['id_proyectos'];
    	$delete=$con->prepare('DELETE FROM proyectoss WHERE id_proyectos=:id_proyectos');
    	$delete->execute(array(
    		':id_proyectos'=>$id 
    	));
    	header('Location: proyectos.php');
    }else{
    	header('Location: proyectos.php');
    }
?>