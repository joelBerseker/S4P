<?php
include ('../../includes/sesion.php');
include ('../../includes/data_base.php');
$recurso="/Producto/save";
include("../../includes/acl.php");
?>


<?php

if(isset($_POST['save_product'])){
    $description = $_POST['description'];
    $tipo_producto = $_POST['tipo_producto'];

    $archivo_nombre=$_FILES['myFile']['name'];
    $archivo_tipo = $_FILES['myFile']['type'];
    $archivo_temp = $_FILES['myFile']['tmp_name'];
    if($archivo_temp==null){
        $archivo_binario = (file_get_contents('../../image/objeto-sin-imagen.png'));
    }else{
        $archivo_binario = (file_get_contents($archivo_temp));
    }
    $precio = $_POST['precio'];
    $nombre = $_POST['nombre'];
    $estado = $_POST['estado'];                                                                                                                                        
    $query = "INSERT INTO producto (`ProNom`, `ProDes`, `ProPre`, `ProImgNom`, `ProImgTip`, `ProImgArc`, `ProCatID`, `ProEst`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn,$query);
    $stmt->bind_param('ssdsssii',$nombre,$description,$precio, $archivo_nombre, $archivo_tipo, $archivo_binario,$tipo_producto,$estado);
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

?>