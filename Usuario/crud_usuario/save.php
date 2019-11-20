<?php
include ('../../includes/sesion.php');
include ('../../includes/data_base.php');
?>

<?php /*
if(!empty($user)){
    $correo=$user['UsuCor'];
    $recurso="/Usuario/save";
        if($correo!=null){
            $query_hacia_tabla_Usuario="SELECT UsuID, UsuEst, UsuRolID FROM USUARIO WHERE UsuCor='$correo'";
            $respuesta_de_tabla_Usuario = mysqli_query($conn,$query_hacia_tabla_Usuario);
            $datos_de_Usuario = mysqli_fetch_array($respuesta_de_tabla_Usuario);
            $UsuID=$datos_de_Usuario['UsuID'];
            $UsuEst=$datos_de_Usuario['UsuEst'];
            $RolID=$datos_de_Usuario['UsuRolID'];
            if($UsuEst==1){
                $query_hacia_tabla_Rol="SELECT RolEst FROM ROL WHERE RolID = $RolID";
                $respuesta_de_tabla_Rol = mysqli_query($conn,$query_hacia_tabla_Rol);
                if(mysqli_num_rows($respuesta_de_tabla_Rol)== 1){
                    $datos_de_Rol=mysqli_fetch_array($respuesta_de_tabla_Rol);
                    $RolEst=$datos_de_Rol['RolEst'];
                    if($RolEst!=0){
                        $query_de_tabla_Recurso = "SELECT RecID, RecEst FROM RECURSO WHERE RecNom = '$recurso'";
                        $respuesta_de_tabla_Recurso =  mysqli_query($conn,$query_de_tabla_Recurso);
                        if(mysqli_num_rows($respuesta_de_tabla_Recurso)== 1 ){
                            $row = mysqli_fetch_array($respuesta_de_tabla_Recurso);
                            $RecID=$row['RecID'];
                            $RecEst=$row['RecEst'];
                            if($RecEst==1){
                                $query_hacia_tabla_Acceso = "SELECT AccEst FROM ACCESO WHERE AccRolID = $RolID && AccRecID = $RecID";
                                $respuesta_de_tabla_Acceso = mysqli_query($conn,$query_hacia_tabla_Acceso);
                                if(mysqli_num_rows($respuesta_de_tabla_Acceso)== 1){
                                    $datos_de_Acceso = mysqli_fetch_array($respuesta_de_tabla_Acceso);
                                    $AccEst=$datos_de_Acceso['AccEst'];
                                    if($AccEst==1){


*/
?>
<?php
if(isset($_POST['save_acceso'])){
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $estado = $_POST['estado'];
    $archivo_nombre=$_FILES['myFile']['name'];
    $archivo_tipo = $_FILES['myFile']['type'];
    $archivo_temp = $_FILES['myFile']['tmp_name'];
    $archivo_binario = (file_get_contents($archivo_temp));
    $password = password_hash($_POST['contraseña'], PASSWORD_BCRYPT);
    $id_rol = $_POST['rol'];

    $query = "INSERT INTO usuario (`UsuNom`, `UsuCor`, `UsuCon`, `UsuImgNom`, `UsuImgTip`, `UsuImgArc`, `UsuRolID`, `UsuEst`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn,$query);
    $stmt->bind_param('ssssssii',$nombre,$correo,$password, $archivo_nombre, $archivo_tipo, $archivo_binario,$id_rol,$estado);
    if(!mysqli_stmt_execute($stmt)){
        echo "Chanfle, hubo un problema y no se guardo el archivo. ". mysqli_stmt_error($stmt)."<br/>";
      }  
        
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    header("Location: ../index.php");
}
else{
    echo "No envio";
}


?>
<?php /*
    }else{
        header("Location: ../../Errores/index.php");
    }
    }else {
        header("Location: ../../Errores/index.php");
    }
    }else{
        header("Location: ../../Errores/index.php");
    }
    }else{
      header("Location: ../../Errores/index.php");
    }
    }else{
      header("Location: ../../Errores/index.php");
    }
    }else{
        header("Location: ../../Errores/index.php");
    }
    }else{
      header("Location: ../../Errores/index.php");
    }
    }else{
        header("Location: ../../Errores/index.php");
    }
    }else{
        header("Location: ../../Errores/index.php");
    }


*/
?>
