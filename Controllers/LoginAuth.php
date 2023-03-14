<?php
    //Login 
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


            if(empty($usuario)){//check if spaces are empty and same in the others
                header('location: ../Views/login.php?error=El usuario es requerido');
                exit;
            }elseif(empty($clave)){
                header('location: ../Views/login.php?error=La clave es requerido');
                exit;
            }else{
                $sql= "SELECT * FROM usuarios WHERE nombreUsuario = '$usuario'"; //connection to the db usuarios
                $query = mysqli_query($conexion,$sql);//connecction
                

                if($query->num_rows==1){
                    $usuarioQ=$query->fetch_assoc();

                    //data validations
                    $Id= $usuarioQ['id'];
                    $nombreUsuario= $usuarioQ['nombreUsuario'];
                    $contra= $usuarioQ['contra'];
                    $nombreCompleto= $usuarioQ['nombreCompleto'];
                    $id_authorization= $usuarioQ['id_authorization'];//include the variable for later use in a conditional
                    
                    if ($usuario===$nombreUsuario){ //verificate if the usuario is the same in the row nombreUsuario
                        if(password_verify($clave, $contra)){
                            $_SESSION['id']=$Id;
                            $_SESSION['nombreUsuario']=$nombreUsuario;
                            $_SESSION['nombreCompleto']=$nombreCompleto;

                            echo"<script>
                                alert('Bienvenido   $nombreCompleto');
                                location.href = '../Views/Home.php';
                            </script>";
                            
                    if(password_verify($clave,$contra)){
                        $sqlb= "SELECT description FROM authorizations WHERE id = '$id_authorization'";//create a new connection to the other table
                        $queryb= mysqli_query($conexion,$sqlb);//connection

                        if($queryb->num_rows==1){
                            $authorizationQ=$queryb->fetch_assoc();//for the table authorization

                            $rol = $authorizationQ['description'];//declarate rol for use the variable in the row description
                            $_SESSION['rol'] = $rol;
                            if ($id_authorization == 1) {//if the rol if 1 is admin
                                header('Location:../Views/admin.php');
                            } elseif ($id_authorization == 2) {//if the rol is 2 is accounting 
                                header('Location:../Views/accounting.php');
                            } elseif ($id_authorization == 3) {//if the rol is 3 is marketing
                                header('Location:../Views/marketing.php');
                            }


                        }
                    }
                        }else{
                            header('Location:../Views/login.php?error=Usuario o clave incorrecta');
                        }
                    }else{
                        header('Location:../Views/login.php?error=Usuario o clave incorrecta');
                    }
                    
                }else{
                    header('Location:../Views/login.php?error=Usuario o clave incorrecta');
                }
            }
        }
?>