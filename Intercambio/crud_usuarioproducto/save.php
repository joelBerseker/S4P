<?php
include('../../includes/sesion.php');
include('../../includes/data_base.php');
$recurso="/Intercambio/save";
//include("../../includes/acl.php");
?>

<?php
if(!empty($user)){
    if(isset($_POST['save_product'])){
        $nombre      =$_POST['nombre'];
        $description = $_POST['descripcion'];
        $producto = $_POST['producto'];
            $precio = $_POST['precio'];
            $estado = $_POST['estado'];   
        $correo = $user['UsuCor']; 
        

        $user=4;                                                                                                                                     
        $query = "INSERT INTO usuario_producto (`UsuProUsuID`,`UsuProProID`, `UsuProPre`, `UsuProEst`, `UsuProDes`,`UsuProNom`) VALUES (?,?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn,$query);
        $stmt->bind_param('iidiss',$user,$producto,$precio,$estado, $description,$nombre);
        
        if(!mysqli_stmt_execute($stmt)){
            echo "Chanfle, hubo un problema y no se guardo el archivo. ". mysqli_stmt_error($stmt)."<br/>";
        }      
        
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("Location: ../");
    }
    else{
        echo "No envio";
    }
}else{
    
}
?>