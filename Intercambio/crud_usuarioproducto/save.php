<?php
session_start();
include ('../../includes/db.php');
include ('../../includes/sesion.php');

?>

<?php
$recurso="/Intercambio/save";

    include("../../includes/acl.php");
    ?>

<?php
include('db.php');
if(!empty($user)){
    if(isset($_POST['save_product'])){
        $description = $_POST['descripcion'];
        $producto = $_POST['producto'];
        $precio = $_POST['precio'];
        $estado = $_POST['estado'];   
        $correo = $user['UsuCor']; 
        

        $user=4;                                                                                                                                     
        $query = "INSERT INTO usuario_producto (`UsuProUsuID`,`UsuProProID`, `UsuProPre`, `UsuProEst`, `UsuProDes`) VALUES (?,?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn,$query);
        $stmt->bind_param('iidis',$user,$producto,$precio,$estado, $description);
        
        if(!mysqli_stmt_execute($stmt)){
            echo "Chanfle, hubo un problema y no se guardo el archivo. ". mysqli_stmt_error($stmt)."<br/>";
        }      
        
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("Location: ../tabla.php");
    }
    else{
        echo "No envio";
    }
}else{
    
}
?>