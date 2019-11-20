<?php
include ('../../includes/sesion.php');
include ('../../includes/data_base.php');

?>
<?php/* 
if(!empty($user)){
    $correo=$user['UsuCor'];
    $recurso="/Usuario/delete";
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
  

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM USUARIO WHERE UsuID = $id";
        $result = mysqli_query($conn,$query);
        if(!$result){
            die("Query Fallo");
        }
        $_SESSION['message'] = 'recurso Removed Succesfully';
        $_SESSION['message_type']= 'danger';
        header("Location: ../index.php");
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

