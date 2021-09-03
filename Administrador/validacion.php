<?php 
    include_once 'conexion.php';

$etapa=$_REQUEST['etapa'];
$idseguimiento=$_REQUEST['id_seguimiento'];
$nombreImagen=$_FILES['Imagen']['name'];//obtiene el nombre
$archivo=$_FILES['Imagen']['tmp_name'];//contiene el archivo
$ruta="evidencia3";

$ruta=$ruta."/".$nombreImagen;

move_uploaded_file($archivo, $ruta);

$query=("INSERT INTO evidencias_proyecto('','".$idseguimiento."','".$etapa."') VALUES('','".$idseguimiento."','".$etapa."','".$ruta."')");

if($query){
	echo "Se inserto";
}else{
	echo "No se ha insertado";
}







?>