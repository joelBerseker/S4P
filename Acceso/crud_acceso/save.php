<?php
include('../../includes/sesion.php');
include('../../includes/data_base.php');
$recurso="/Acceso/save";
include("../../includes/acl.php");
?>
<?php
if(isset($_POST['save_acceso'])){
    $nombre = $_POST['nombre'];
    $id_rol = $_POST['rol'];
    $id_recurso = $_POST['recurso'];
    $query = "INSERT INTO acceso(AccRolID, AccRecID, AccDes) VALUES ('$id_rol','$id_recurso','$nombre')";
    $result = mysqli_query($conn,$query);
    if(!$result){
        echo "INSERT INTO acceso(AccRolID, AccRecID, AccDes) VALUES ('$id_rol','$id_recurso','$nombre')";
        die("Query Failed");
    }   

    $_SESSION['message'] = 'Acceso Saved Succesfully';
    $_SESSION['message_type']= 'success';
    header("Location: ../");
}
else{
    echo "No envio";
}
?>
