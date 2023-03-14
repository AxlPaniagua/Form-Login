<?php //home donde ya estaria logeado
session_start();
    if(isset($_SESSION['id']) && isset($_SESSION['nombreUsuario']) && isset($_SESSION['nombreCompleto']) ){
        $nombreCompleto = $_SESSION['nombreCompleto'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/styles.css">
    <title>Home</title>
</head>
<body>

    <h2>Welcome, <?php echo $nombreCompleto; ?></h2>
    <a href="../Controllers/CerrarSesion.php">Cerrar Sesion</a>
</body>
</html>

<?php } else{
    header('location: ../Views/login.php');
    }?>