<?php 
include('global_variable.php');
$mensaje = "";
$accederPag = false;
    if(!empty($user)){
        $correo=$user['UsuCor'];
        $recurso="/Usuario/edit";
        $idUsuario=$user['UsuID'];
        if($correo!=null){
            $query_hacia_tabla_Usuario="SELECT UsuID,UsuCor, UsuEst, UsuRolID FROM usuario WHERE UsuCor='$correo'";
            $respuesta_de_tabla_Usuario = mysqli_query($conn,$query_hacia_tabla_Usuario);
            $datos_de_Usuario = mysqli_fetch_array($respuesta_de_tabla_Usuario);
            $UsuID=$datos_de_Usuario['UsuID'];
            $UsuCor=$datos_de_Usuario['UsuCor'];
            $UsuEst=$datos_de_Usuario['UsuEst'];
            $RolID=$datos_de_Usuario['UsuRolID'];
            if($RolID!=1){
                if($idUsuario==$id){
                    if($UsuEst==1){
                        $query_hacia_tabla_Rol="SELECT RolEst FROM rol WHERE RolID = $RolID";
                        $respuesta_de_tabla_Rol = mysqli_query($conn,$query_hacia_tabla_Rol);
                        if(mysqli_num_rows($respuesta_de_tabla_Rol)== 1){
                            $datos_de_Rol=mysqli_fetch_array($respuesta_de_tabla_Rol);
                            $RolEst=$datos_de_Rol['RolEst'];
                            if($RolEst!=0){
                                $query_de_tabla_Recurso = "SELECT RecID, RecEst FROM recurso WHERE RecNom = '$recurso'";
                                $respuesta_de_tabla_Recurso =  mysqli_query($conn,$query_de_tabla_Recurso);
                                if(mysqli_num_rows($respuesta_de_tabla_Recurso)== 1 ){
                                    $row = mysqli_fetch_array($respuesta_de_tabla_Recurso);
                                    $RecID=$row['RecID'];
                                    $RecEst=$row['RecEst'];
                                    if($RecEst==1){
                                        $query_hacia_tabla_Acceso = "SELECT AccEst FROM acceso WHERE AccRolID = '$RolID' && AccRecID = '$RecID'";
                                        $respuesta_de_tabla_Acceso = mysqli_query($conn,$query_hacia_tabla_Acceso);
                                        if(mysqli_num_rows($respuesta_de_tabla_Acceso)== 1 ){
                                            $datos_de_Acceso = mysqli_fetch_array($respuesta_de_tabla_Acceso);
                                            $AccEst=$datos_de_Acceso['AccEst'];
                                            if($AccEst==1){
                                                $accederPag=true;
                                            }else{
                                                $mensaje ="Location: $dirEjec/Errores/index.php?m=El acceso no esta activo";
                                            }
                                        }else {
                                            $mensaje ="Location: $dirEjec/Errores/index.php?m=El acceso no existe";
                                        }
                                    }else{
                                        $mensaje ="Location: $dirEjec/Errores/index.php?m=El recurso no esta activo";
                                    }
                                }else{
                                    $mensaje ="Location: $dirEjec/Errores/index.php?m=El recurso no existe";
                                }
                            }else{
                                $mensaje ="Location: $dirEjec/Errores/index.php?m=El rol no esta activo";
                            }
                        }else{
                            $mensaje ="Location: $dirEjec/Errores/index.php?m=El rol no existe";
                        }
                    }else{
                        $mensaje ="Location: $dirEjec/Errores/index.php?m=El usuario no esta activo";
                    }
                }else{
                    $mensaje ="Location: $dirEjec/Errores/index.php?m=Este no es tu usuario";
                }
            }else{
                $accederPag=true;
            }
        }else{
            $mensaje ="Location: $dirEjec/Errores/index.php?m=El usuario no existe";
        }
    }else{
        $mensaje ="Location: $dirEjec/Errores/index.php?m=Inicia sesion por favor";
    }
    if(!$accederPag){
        exit(header($mensaje));
    }
?>