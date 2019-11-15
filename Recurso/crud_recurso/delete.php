<?php
    include("db.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM RECURSO WHERE RecID = $id";
        $result = mysqli_query($conn,$query);
        if(!$result){
            echo  "DELETE FROM RECURSO WHERE RecID = $id ";
            die("Query Fallo");
        }
        header("Location: ../");
    }
?>
