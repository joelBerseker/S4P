<?php
include('../../includes/sesion.php');
include('../../includes/data_base.php');
$recurso = "/Rol/delete";
include("../../includes/acl.php");
?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 2) {
        $query = "DELETE FROM ROL WHERE RolID = $id";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            echo  "DELETE FROM ROL WHERE RolID = $id";
            die("Query Fallo");
        }
    }
    header("Location: ../");
}
?>
