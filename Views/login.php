<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/styles.css">
    <title>Login</title>
</head>
<body>
    <div class="contenedor">
        
        <h1><ins>Iniciar Sesion</ins></h1> 
        <br>
        <form action="../Controllers/LoginAuth.php" method="POST">

            <?php if(isset($_GET['error'])){?>
                <p><?php echo $_GET['error']?></p>
            <?php }?>


            <label for="">
                <img width="25px" src="/Form Login/ICONS/user.svg" alt="">
                Usuario
            </label>

            <input type="text" placeholder="Ingrese su usuario" name="nombreUsuario">

            <label for="">
                <img width="25px" src="/Form Login/ICONS/lock.svg" alt="">
                Contraseña
            </label>

            <input type="password" placeholder="Ingrese su contraseña" name="contra">

            <button class="button">
                Login
            </button>
            <a href="../Views/registro.php" class="button">
                Registrarse
            </a>

        </form>
    </div>
</body>
</html>