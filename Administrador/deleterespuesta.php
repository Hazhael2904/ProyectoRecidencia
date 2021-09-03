<?php
    include_once 'conexion.php';
    if(isset($_GET['id_respuesta'])){
    	$id=(int) $_GET['id_respuesta'];
    	$delete=$con->prepare('DELETE FROM citas WHERE id_respuesta=:id_respuesta');
    	$delete->execute(array(
    		':id_respuesta'=>$id 
    	));
    	header('Location: respuesta_solicitud.php');
    }else{
    	header('Location: respuesta_solicitud.php');
    }
?>