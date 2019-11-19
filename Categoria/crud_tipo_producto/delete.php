<?php
session_start();
include ('../../includes/db.php');
include ('../../includes/sesion.php');
include('db.php');
?>
<?php 
    $recurso="/Categoria/delete";
	include("../../includes/acl.php");
?>
<?php
    

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
