<?php
include('db.php');
if(isset($_POST['save_product'])){
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $archivo_nombre=$_FILES['myFile']['name'];
    $archivo_tipo = $_FILES['myFile']['type'];
    $archivo_temp = $_FILES['myFile']['tmp_name'];
    $archivo_binario = (file_get_contents($archivo_temp));
    $estado = $_POST['estado'];
    $query = "INSERT INTO categoria (`CatNom`, `CatDes`, `CatImgNom`, `CatImpTip`, `CatImgArc`, `CatEst`) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn,$query);
    $stmt->bind_param('sssssi',$nombre,$descripcion,$archivo_nombre, $archivo_tipo, $archivo_binario,$estado);
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

?>