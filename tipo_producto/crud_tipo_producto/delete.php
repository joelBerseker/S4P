<?php
    include("db.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM tb_tipo_producto WHERE ID_TIPO_PRODUCTO = $id";
        $result = mysqli_query($conn,$query);
        if(!$result){
            echo  "DELETE FROM tb_tipo_producto WHERE ID_TIPO_PRODUCTO = $id ";
            die("Query Fallo");
        }
        header("Location: ../");
    }
?>
