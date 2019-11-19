
<?php
session_start();
include ('../../includes/db.php');
include ('../../includes/sesion.php');
include('db.php');
?>
<?php
	
	$recurso="/Recurso/delete";
	include("../../includes/acl.php");

?>

<?php
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

