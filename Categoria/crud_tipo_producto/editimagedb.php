<?php 
if(isset($_POST['save_edit_imagen'])){
    $id                 =   $_GET['id'];
    $archivo_nombre     =   $_FILES['myFile']['name'];
    $archivo_tipo       =   $_FILES['myFile']['type'];
    $archivo_temp       =   $_FILES['myFile']['tmp_name'];
    $archivo_binario    =   (file_get_contents($archivo_temp));
    

    $mysqli = new mysqli($database_red,$database_nombre,$database_contraseña,$database_name);
    $stmt = $mysqli->prepare("UPDATE `categoria`SET `CatImgNom` =?, `CatImpTip` = ?, `CatImgArc` = ? WHERE `CatID` = ?");
    /* BK: always check whether the prepare() succeeded */
    if ($stmt === false) {
        trigger_error($this->mysqli->error, E_USER_ERROR);
        return;
    }

    /* Bind our params */
    /* BK: variables must be bound in the same order as the params in your SQL.
        * Some people prefer PDO because it supports named parameter. */
    $stmt->bind_param('sssi', $archivo_nombre, $archivo_tipo, $archivo_binario, $id);

    /* Set our params */
    /* BK: No need to use escaping when using parameters, in fact, you must not, 
        * because you'll get literal '\' characters in your content. */
    /* Execute the prepared Statement */
    $status = $stmt->execute();
    /* BK: always check whether the execute() succeeded */
    if ($status === false) {
        trigger_error($stmt->error, E_USER_ERROR);
        
    }
    header("Location: ../tabla.php");
}    
?>