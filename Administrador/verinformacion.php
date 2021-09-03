<?php
include_once 'conexion.php';
$queryservicios=("SELECT CONCAT(nombre) nombreservicio, idservicio FROM servicio");
$servicios=$con->query($queryservicios);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>VER INFORMACIÓN</title>
</head>
<body>
 
</body>
</html>