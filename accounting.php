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
    <link rel="stylesheet" href="./CSS/styles.css">
    <title>Accounting</title>
</head>
<body>
    
        <h1>Welcome Accounting <?php echo $nombreCompleto;?></h1>
        
        
        <?php
            //connection to database
            include_once('Config/conexion.php');
            $s=1;//this is a counter that will be used to manage the roles
            
            $sql = "SELECT * FROM usuarios";// usuarios is the table where is all customer or administrative employee
            $result = mysqli_query($conexion, $sql);
            
            
            if(mysqli_num_rows($result) > 0) {// where ir plus than 0 if because are customer, if is less than 0 dont have customer
                
                echo "<table>";
                echo "<tr> <th>ID</th> <th>Nombre Completo</th> <th>Nombre Usuario</th> <th>PhotoUser</th></tr>";//table like the img 
                
                
                while($row = mysqli_fetch_assoc($result)) {//this while have the function that if mysqli_fetch_assoc($result) is more than 0 its work because the table has customer
                    
                    echo "<tr> ";
                    echo "<td> " ."" . $row['id'] . "</td>";//print id of the table
                    echo "<td> " . $row['nombreCompleto'] . " </td>";//print full name
                    echo "<td> " . $row['nombreUsuario'] . " </td>";//print id user
                    
                    if($s==1){//if is the rol 1 admin
                        echo "<td> " ."<img src='/Form Login/ICONS/neymar.png' style='width:50px' " . $row['id'] . "</td>";
                        
                    }else if($s==2){//if is the rol 2 accounting
                        echo "<td> " ."<img src='/Form Login/ICONS/cristiano.png' style='width:50px' " . $row['id'] . "</td>";
                        
                    }else if($s==3){//if is the rol 3 marketing
                        echo "<td> " ."<img src='/Form Login/ICONS/kylian.png' style='width:50px' " . $row['id'] . "</td>";
                    }
                    
                    
                    
                    echo "</tr>";
                    $s++;//the counter increments each thime it enters the while
                }
                echo "</table>";
            } else {
                echo "No se encontraron resultados.";//if is empty 
            }
        ?>

        <a href="login/CerrarSesion.php">Cerrar Sesion</a>
</body>
</html>

<?php } else{
    header('location: ../login.php');
    }?>