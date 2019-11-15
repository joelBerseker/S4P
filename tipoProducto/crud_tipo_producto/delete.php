<?php
    include("db.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM categoria WHERE CatID = $id";
        $result = mysqli_query($conn,$query);
        if(!$result){
            echo  "DELETE FROM categoria WHERE CatID = $id ";
            die("Query Fallo");
        }
        header("Location: ../");
    }
?>
