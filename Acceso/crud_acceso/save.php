<?php
include('db.php');
if(isset($_POST['save_acceso'])){
    $nombre = $_POST['nombre'];
    $id_rol = $_POST['rol'];
    $id_recurso = $_POST['recurso'];
    $query = "INSERT INTO ACCESO(AccRolID, AccRecID, AccDes) VALUES ('$id_rol','$id_recurso','$nombre')";
    $result = mysqli_query($conn,$query);
    if(!$result){
        echo "INSERT INTO ACCESO(AccRolID, AccRecID, AccDes) VALUES ('$id_rol','$id_recurso','$nombre')";
        die("Query Failed");
    }   

    $_SESSION['message'] = 'Acceso Saved Succesfully';
    $_SESSION['message_type']= 'success';
    header("Location: ../index.php");
}
else{
    echo "No envio";
}

?>
