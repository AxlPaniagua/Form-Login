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
    <title>Admin</title>
</head>
<body>

    <h1>Welcome Admin <?php echo $nombreCompleto;?></h1>

    <div class="containerAdmin">
        

        <?php
            //connection to database
            include_once('../Config/conexion.php');
            
            
            $sql = "SELECT * FROM usuarios";// usuarios is the table where is all customer or administrative employee
            $result = mysqli_query($conexion, $sql);//conecction
            
            
            if(mysqli_num_rows($result) > 0) {// where if plus than 0 if because are customer, if is less than 0 dont have customer
                
                echo "<table>";
                echo "<tr> <th>ID</th> <th>Nombre Completo</th> <th>Nombre Usuario</th> <th> ID_authorization</th> </tr>";//table like the img 
                
                $sqlb = "SELECT * FROM authorizations";//create other select to the database from authorizations to use the description
                $resultb = mysqli_query($conexion, $sqlb);//connecction
                
                while($row = mysqli_fetch_assoc($result)) {//this while have the function that if mysqli_fetch_assoc($result) is more than 0 its work because the table has customer
                    
                    echo "<tr> ";
                    echo "<td> " . $row['id'] . "</td>";//print id of the table
                        
                    echo "<td> " . $row['nombreCompleto'] . " </td>";//print the full name
                    echo "<td> " . $row['nombreUsuario'] . " </td>";//print the user name

                    if($rowb = mysqli_fetch_assoc($resultb)){//this works because are employee
                        echo "<td> " . $rowb['description'] ."</td>";//print the rol
                    }

                    echo "</tr>";
                    
                }
                echo "</table>";
            } else {
                echo "No se encontraron resultados.";//if is empty 
            }
        ?>


        <a href="../Controllers/CerrarSesion.php">Cerrar Sesion</a>
    </div>
        

</body>
</html>

<?php } else{
    header('location: ../Views/login.php');
    }?>