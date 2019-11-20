<?php
include("../../includes/data_base.php");
?>
<?php
    if(isset($_GET['idPag'])){
        $id     = $_GET['idPag'];
        $idE    = $_GET['idMen'];   
        $query = "DELETE FROM usuario_mensaje WHERE UsuMenID = $idE";
        $result = mysqli_query($conn,$query);
        if(!$result){
            echo  "DELETE FROM usuario_producto WHERE UsuProID = $idE";
            die("Query Fallo");
        }
        $_SESSION['message'] = 'Product Removed Succesfully';
        $_SESSION['message_type']= 'danger';
        header("Location:../view?id=$id");
    }
 
?>