<?php
    //donde recibe los datos para el registro
    session_start();

    include_once('../Config/conexion.php');

    if(isset($_POST['nombreUsuario']) && isset($_POST['nombreCompleto']) && isset($_POST['contra']) && isset($_POST['Rcontra'])){
        function validar($data){
            $data= trim($data);
            $data= stripslashes($data);
            $data= htmlspecialchars($data);


            return $data;
        }


        $usuario= validar($_POST['nombreUsuario']);
        $nombreCompleto= validar($_POST['nombreCompleto']);
        $contra= validar($_POST['contra']);
        $Rcontra= validar($_POST['Rcontra']); 


        $datosUsuario= 'nombreUsuario=' .$usuario .'&NombreCompleto=' .$nombreCompleto;


        if(empty($usuario)){//validar si los datos estan vacios 
            header("location: ../Registro.php?error=El usuario es requerido &$datosUsuario");
            exit();
        }elseif(empty($nombreCompleto)){
            header("location: ../Registro.php?error=El nombre completo es requerido&$datosUsuario");
            exit();
        }elseif(empty($contra)){
            header("location: ../Registro.php?error=La contraseña es requerido&$datosUsuario");
            exit();
        }elseif(empty($Rcontra)){
            header("location: ../Registro.php?error=Repetir la clave es requerido&$datosUsuario");
            exit();
        }elseif($contra !== $Rcontra){
            header("location: ../Registro.php?error=La clave no coincide&$datosUsuari");
            exit();
        }else{
            $contra = password_hash($contra, PASSWORD_DEFAULT);

            $sql = "SELECT * FROM usuarios WHERE nombreCompleto = '$usuario'";
            $query = $conexion->query($sql);

            if(mysqli_num_rows($query) > 0){
                header("location: ../Registro.php?error=El usuario ya existe");
                exit();
            }else{
                $sql2 = "INSERT INTO usuarios(nombreUsuario,nombreCompleto,contra) VALUES('$usuario','$nombreCompleto','$contra')";
                $query2 = $conexion->query($sql2);

                if($query2){
                    header("location: ../Registro.php?success=Usuario Creado con exito");
                    exit();
                }else{
                    header("location: ../Registro.php?error=Ocurrio un error");
                    exit();
                }
            }
        }
    }else{
        header('location: ../Registro.php');
        exit();
    }
?>