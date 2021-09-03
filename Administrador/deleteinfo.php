<?php
    include_once 'conexion.php';
    if(isset($_GET['id_solicitud'])){
    	$id=(int) $_GET['id_solicitud'];
    	$delete=$con->prepare('DELETE FROM citas WHERE id_solicitud=:id_solicitud');
    	$delete->execute(array(
    		':id_solicitud'=>$id 
    	));
    	header('Location: informacion.php');
    }else{
    	header('Location: informacion.php');
    }
?>