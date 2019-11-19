<?php
session_start();
include ('../../includes/db.php');
include ('../../includes/sesion.php');
include('db.php');
?>
<?php 
    $recurso="/Rol/delete";
	include("../../includes/acl.php");
?>

<?php
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
