<?php
include("../includes/data_base.php");
// Para obtener el id de la imagen pondremos en la barra del navegador 
// http://localhost:8888/GuardarVerImagePdfPhpMysql/ver.php?id=1
    $id = filter_input(INPUT_GET, 'id');
    if($id==''){
    die ("No tenemos el id");
    }
 
// Conectamos a mysql
 
$sql="select ProImgArc, ProImgTip from producto where ProID = $id"; 
 
// Ejecutar la sentencia sql
$resultado = mysqli_query($conn, $sql) or die("Error: no se pudo hacer la consulta.");
 
while($row = mysqli_fetch_array($resultado)){
  $archivo= $row['ProImgArc']; // Obtener el archivo
  $tipo=$row['ProImgTip'];     // Obtener el tipo de archivo
}
 
mysqli_close($conn);
 
// Header para tranformar la salida en el tipo de archivo que hemos guardado
header("Content-type: $tipo"); 
 
// Imprimir el archivo
echo $archivo;
?>