<?php
    include("../db.php");
    if("achavezsa@unsa.edu.pe"!=null){
        $correo="achavezsa@unsa.edu.pe";
        $query_hacia_tabla_Usuario="SELECT UsuID, UsuEst, UsuRolID FROM USUARIO WHERE UsuCor='$correo'";
        $respuesta_de_tabla_Usuario = mysqli_query($con,$query_hacia_tabla_Usuario);
        $datos_de_Usuario = mysqli_fetch_array($respuesta_de_tabla_Usuario);
        $UsuID=$datos_de_Usuario['UsuID'];
        $UsuEst=$datos_de_Usuario['UsuEst'];
        $RolID=$datos_de_Usuario['UsuRolID'];
        if($UsuEst==1){
            $query_hacia_tabla_Rol="SELECT RolEst FROM ROL WHERE RolID = $RolID";
            $respuesta_de_tabla_Rol = mysqli_query($con,$query_hacia_tabla_Rol);
            $datos_de_Rol=mysqli_fetch_array($respuesta_de_tabla_Rol);
            $RolEst=$datos_de_Rol['RolEst'];
            if($RolEst!=0){
                $query_hacia_tabla_Acceso = "SELECT AccID,AccEst,AccRecID FROM ACCESO WHERE AccRolID = $RolID";
                $respuesta_de_tabla_Acceso = mysqli_query($con,$query_hacia_tabla_Acceso);
                if(isset($respuesta_de_tabla_Acceso)){
                    $datos_de_Acceso = mysqli_fetch_array($respuesta_de_tabla_Acceso);
                    $AccID=$datos_de_Acceso[0];
                    $AccEst=$datos_de_Acceso[1];
                    $RecID=$datos_de_Acceso[2];
                    if($AccEst==1){
                        $query_de_tabla_Recurso = "SELECT RecEst FROM RECURSO WHERE RecID = $RecID";
                        $respuesta_de_tabla_Recurso = mysqli_query($con,$query_de_tabla_Recurso);
                        if(isset($respuesta_de_tabla_Recurso)){
                            $datos_de_Recurso=mysqli_fetch_array($respuesta_de_tabla_Recurso);
                            $respuesta_de_tabla_Recurso=$datos_de_Recurso['RecEst'];
                            if($respuesta_de_tabla_Recurso==1){
                                echo "funciona asdasdasd";
                            }else{
                                echo "recurso inactivo";
                            }
                        }else{
                            echo "recurso no existe";
                        }
                    }else{
                        echo "acceso inactivo";
                    }
                    
                }else{
                    echo "el acceso no existe consulte al administrador";
                }
            }else{
                echo "tu rol no esta activo consulte al administrador";
            }
        }else{
            echo "tu usuario no esta activo consulte al administrador";
        }
    }else{
        echo "tu usuario no existe";
    }
?>
