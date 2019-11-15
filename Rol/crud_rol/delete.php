<?php
    include("db.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM ROL WHERE RolID = $id";
        $result = mysqli_query($conn,$query);
        if(!$result){
            echo  "DELETE FROM ROL WHERE RolID = $id";
            die("Query Fallo");
        }
        header("Location: ../");
    }
?>
