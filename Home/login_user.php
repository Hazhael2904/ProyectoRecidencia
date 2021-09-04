<?php
    
    session_start();

    include 'conexion2.php';

    $email=$_POST['email'];
    $password=$_POST['password'];
    $password= hash('sha512', $password);

    $query = mysqli_query($conexion, "SELECT * FROM usuarios WHERE email='$email' and password='$password' ");
    $user_data = mysqli_fetch_array ($query);
    if (mysqli_num_rows($query) > 0) {
    $_SESSION['usuario'] = $email;
    $rol = (int)$user_data['id_rol'];
    $_SESSION['rol_type'] = $rol === 1 ? 'admin' : 'cliente';
    if ($rol === 1) { //1 => admnistrador
      header("location:../Administrador/index.php");
    } else {
      header("location:../Cliente/index.php");
  }
  exit;
} else {
  echo ' <script> 
      alert("Usuario no existe");
        window.location = "login_usuario.php";

        </script>
        ';
  exit;
}
?>