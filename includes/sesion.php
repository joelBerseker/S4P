<?php 
session_start();
include('data_base_autenticacion.php');
if (isset($_SESSION['user_id'])) {
  $records = $conn->prepare('SELECT UsuID, UsuCor, UsuCon FROM usuario WHERE UsuID = :id');
  $records->bindParam(':id', $_SESSION['user_id']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);
  $user = null;
  if (count($results) > 0) {
    $user = $results;
  }
}
?>