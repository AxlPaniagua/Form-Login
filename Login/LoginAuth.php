<?php
    //Login para el inicio de session 
    session_start();

    include_once('../Config/conexion.php');
        if(isset($_POST['nombreUsuario']) && isset($_POST['contra'])){
            function Validar($data){
                $data= trim($data);
                $data= stripslashes($data);
                $data= htmlspecialchars($data);

                return $data;
            }


            $usuario= Validar($_POST['nombreUsuario']);
            $clave= Validar($_POST['contra']);


            if(empty($usuario)){//validar si los datos estan vacios
                header('location: ..login.php?error=El usuario es requerido');
                exit;
            }elseif(empty($clave)){
                header('location: ..login.php?error=La clave es requerido');
                exit;
            }else{
                $sql= "SELECT * FROM usuarios WHERE nombreUsuario = '$usuario'";
                $query = mysqli_query($conexion,$sql);

                if($query->num_rows==1){
                    $usuarioQ=$query->fetch_assoc();

                    //validaciones en la base de datos
                    $Id= $usuarioQ['id'];
                    $nombreUsuario= $usuarioQ['nombreUsuario'];
                    $contra= $usuarioQ['contra'];
                    $nombreCompleto= $usuarioQ['nombreCompleto'];


                    if ($usuario===$nombreUsuario){
                        if(password_verify($clave, $contra)){
                            $_SESSION['id']=$Id;
                            $_SESSION['nombreUsuario']=$nombreUsuario;
                            $_SESSION['nombreCompleto']=$nombreCompleto;

                            echo"<script>
                                alert('Bienvenido   $nombreCompleto');
                                location.href = '../Home.php';
                            </script>";
                        }else{
                            header('Location:../login.php?error=Usuario o clave incorrecta');
                        }
                    }else{
                        header('Location:../login.php?error=Usuario o clave incorrecta');
                    }
                    
                }else{
                    header('Location:../login.php?error=Usuario o clave incorrecta');
                }
            }
        }
?>