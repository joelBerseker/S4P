<?php
include ('../../includes/sesion.php');
include ('../../includes/data_base.php');
$recurso="/Intercambio/delete";
include("../../includes/acl.php");
?>

<?php   
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
    header("Location: ../tabla.php");
}
?>
