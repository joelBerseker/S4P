<?php
session_start();
include ('../../includes/db.php');
include ('../../includes/sesion.php');
include('db.php');
?>
<?php
$recurso="/Acceso/delete";
    include("../../includes/acl.php");
    ?>
<?php
    
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM ACCESO WHERE AccID = $id";
        $result = mysqli_query($conn,$query);
        if(!$result){
            die("Query Fallo");
        }
        $_SESSION['message'] = 'recurso Removed Succesfully';
        $_SESSION['message_type']= 'danger';
        header("Location: ../index.php");
    }
?>

