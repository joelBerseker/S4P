<?php
include('db.php');
if(isset($_POST['save_acceso'])){
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $imagen = $_POST['imagen'];
    $id_rol = $_POST['rol'];
    $query = "INSERT INTO USUARIO(UsuNom, UsuCor, UsuImg, UsuRolID) VALUES ('$nombre','$correo','$imagen','$id_rol')";
    $result = mysqli_query($conn,$query);
    if(!$result){
        echo "INSERT INTO USUARIO(UsuNom, UsuCor, UsuImg, UsuRolID) VALUES ('$nombre','$correo','$imagen','$id_rol')";
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
