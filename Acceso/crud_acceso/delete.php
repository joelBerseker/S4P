<?php
include('../../includes/sesion.php');
include('../../includes/data_base.php');
$recurso="/Acceso/delete";
include("../../includes/acl.php");
?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM acceso WHERE AccID = $id";
    $result = mysqli_query($conn,$query);
    if(!$result){
        die("Query Fallo");
    }
    $_SESSION['message'] = 'recurso Removed Succesfully';
    $_SESSION['message_type']= 'danger';
    header("Location: ../index.php");
}
?>

