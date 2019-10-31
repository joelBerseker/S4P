<?php
include('db.php');
if(isset($_POST['save_product'])){
    $description = $_POST['description'];
    $tipo_producto = $_POST['tipo_producto'];
    $proveedor = $_POST['proveedor'];
    $precio = $_POST['precio'];
    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $minimo = $_POST['minimo'];
    $cantidad = $_POST['cantidad'];                                                                                                                                        
    $query = "INSERT INTO tb_producto(`DSC_PRODUCTO`, `ID_TIPO_PRODUCTO`, `PROV_PRODUCTO`, `PRECIO_PRODUCTO`, `NM_PRODUCTO`, `MARCA_PRODUCTO`, `PROV_MIN_PRODUCTO`, `CTD_COLUMNA`) VALUES ('$description',$tipo_producto,$proveedor,$precio,'$nombre',$marca,$minimo,$cantidad)";
    $result = mysqli_query($conn,$query);
    if(!$result){
        echo "INSERT INTO tb_producto(`DSC_PRODUCTO`, `ID_TIPO_PRODUCTO`, `PROV_PRODUCTO`, `PRECIO_PRODUCTO`, `NM_PRODUCTO`, `MARCA_PRODUCTO`, `PROV_MIN_PRODUCTO`, `CTD_COLUMNA`) VALUES ('$description',$tipo_producto,$proveedor,$precio,'$nombre',&marca,$minimo,$cantidad)";
        die("Query Failed");
    }   

    $_SESSION['message'] = 'Product Saved Succesfully';
    $_SESSION['message_type']= 'success';
    header("Location: ../index.php");
}
else{
    echo "No envio";
}

?>