<?php
    include("db.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM usuario_producto WHERE UsuProID = $id";
        $result = mysqli_query($conn,$query);
        if(!$result){
            echo  "DELETE FROM usuario_producto WHERE UsuProID = $id";
            die("Query Fallo");
        }
        $_SESSION['message'] = 'Product Removed Succesfully';
        $_SESSION['message_type']= 'danger';
        header("Location: ../index.php");
    }
?>
