
<?php
    include("../db.php");
    if("achavezsa@unsa.edu.pe"!=null){
        $correo="achavezsa@unsa.edu.pe";
        $qUsu="SELECT UsuID, UsuEst, UsuRolID FROM USUARIO WHERE UsuCor='$correo'";
        $rUsu = mysqli_query($con,$qUsu);
        $datosUsu = mysqli_fetch_array($rUsu);
        $UsuID=$datosUsu['UsuID'];
        $UsuEst=$datosUsu['UsuEst'];
        $RolID=$datosUsu['UsuRolID'];
        if($UsuEst==1){
            $qRolEst="SELECT RolEst FROM ROL WHERE RolID = $RolID";
            $rRol = mysqli_query($con,$qRolEst);
            $datosRol=mysqli_fetch_array($rRol);
            $RolEst=$datosRol['RolEst'];
            if($RolEst!=0){
                $qAcceso = "SELECT AccID,AccEst,AccRecID FROM ACCESO WHERE AccRolID = $RolID";
                $rAcc = mysqli_query($con,$qAcceso);
                if(isset($rAcc)){
                    $datosAcc = mysqli_fetch_array($rAcc);
                    $AccID=$datosAcc[0];
                    $AccEst=$datosAcc[1];
                    $RecID=$datosAcc[2];
                    if($AccEst==1){
                        $qRecurso = "SELECT RecEst FROM RECURSO WHERE RecID = $RecID";
                        $rRec = mysqli_query($con,$qRecurso);
                        if(isset($rRec)){
                            $datosRec=mysqli_fetch_array($rRec);
                            $rRec=$datosRec['RecEst'];
                            if($rRec==1){
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
