
<?php

include ('../../includes/sesion.php');
include ('../../includes/data_base.php');
$recurso="/Recurso/save";
include("../../includes/acl.php");
?>

<?php
if(isset($_POST['save_product'])){
    $description = $_POST['description'];
    $estado = $_POST['estado'];                                                                                                                                        
    $query = "INSERT INTO recurso(`RecNom`, `RecEst`) VALUES ('$description',$estado)";
    $result = mysqli_query($conn,$query);
    if(!$result){
        echo "INSERT INTO recurso(`RecNom`, `RecEst`) VALUES ('$description',$estado)";
        die("Query Failed");
    }   

    $_SESSION['message'] = 'Product Saved Succesfully';
    $_SESSION['message_type']= 'success';
    header("Location: ../");
}
else{
    echo "No envio";
}

?>
