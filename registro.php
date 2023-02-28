<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/styles.css">
    <title>Registro</title>
</head>
<body>
    <div class="contenedor">
        <h1><ins>Registrarse</ins></h1>
        <br>
        <form action="Login/Registrarse.php" method="POST">

            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']?></p>
            <?php }?>
            <br>
            <?php if (isset($_GET['success'])) { ?>
                <p class="error"><?php echo $_GET['success']?></p>
            <?php }?>
            <br>
            <label for="">
                <img width="25px" src="/Form Login/ICONS/user.svg" alt="">
                Usuario
            </label>
            <input type="text" placeholder="Ingrese su usuario" name="nombreUsuario">
            
            <label for="">
                <img width="25px" src="/Form Login/ICONS/user.svg" alt="">
                Nombre Completo
            </label>
            <input type="text" placeholder="Ingrese su nombre completo" name="nombreCompleto">


            <label for="">
                <img width="25px" src="/Form Login/ICONS/lock.svg" alt="">
                Contraseña
            </label>
            <input type="password" placeholder="Ingrese su contraseña" name="contra">
            
            <label for="">
                <img width="25px" src="/Form Login/ICONS/lock.svg" alt="">
                Confirme su Contraseña
            </label>
            <input type="password" placeholder="Ingrese su contraseña" name="Rcontra">

            <input type="submit" class="button" value="Registrarse">
            <a href="login.php" class="button_login">
                Login
            </a>
        </form>
    </div>
</body>
</html>