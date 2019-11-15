<?php
include('db.php');
if(isset($_POST['save_product'])){
    $description = $_POST['description'];
    $cantidad = $_POST['cantidad'];                                                                                                                                        
    $query = "INSERT INTO RECURSO(`RecNom`, `RecEst`) VALUES ('$description',$cantidad)";
    $result = mysqli_query($conn,$query);
    if(!$result){
        echo "INSERT INTO RECURSO(`RecNom`, `RecEst`) VALUES ('$description',$cantidad)";
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