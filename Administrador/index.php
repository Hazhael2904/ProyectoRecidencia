
 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="css/slider.css">
	<link rel="stylesheet" href="css/fonts.css">
	<title>C-PRO ASOCIADOS</title>
</head>
<body> 
	<header>
		<div class="logo">
				<a href="index.php"><img src="img/logo2020.png" width="150" alt=""></a>
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
	<div class="main">
		<div class="slides">
				<img src="slider/Bar.jpg" alt="">
				<img src="slider/Billar.jpg" alt="">
                <img src="slider/Cine.jpg" alt="">
                <img src="slider/Comedor.jpg" alt="">
                <img src="slider/Esc3.jpg" alt="">
                <img src="slider/ExtR1a.jpg" alt="">
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="js/jquery.slides.js"></script>
	<script>
	$(function(){
        $(".slides").slidesjs({
    play: {
      active: true,
        // [boolean] Generate the play and stop buttons.
        // You cannot use your own buttons. Sorry.
      effect: "slide",
        // [string] Can be either "slide" or "fade".
      interval: 3000,
        // [number] Time spent on each slide in milliseconds.
      auto: true,
        // [boolean] Start playing the slideshow on load.
      swap: true,
        // [boolean] show/hide stop and play buttons
      pauseOnHover: false,
        // [boolean] pause a playing slideshow on hover
      restartDelay: 2500
        // [number] restart delay on inactive slideshow
    }
  });
});
	</script>
</body>
</html>
