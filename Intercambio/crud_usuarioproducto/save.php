<?php

include('../../includes/sesion.php');
include('../../includes/global_variable.php');

include('../../includes/data_base.php');
$recurso = "/Intercambio/save";
?>
<?php
if (!empty($user)) {
    if (isset($_POST['save_product'])) {
        $nombre      = $_POST['nombre'];
        $description = $_POST['descripcion'];
        $producto = $_POST['producto'];
        $precio = $_POST['precio'];
        $estado = $_POST['estado'];
        $correa = $user['UsuCor'];
        $queryUser = "SELECT UsuID FROM usuario WHERE UsuCor = '$correa'";
        echo  "SELECT UsuID FROM usuario WHERE UsuCor = '$correa'";
        $resultUser = mysqli_query($conn, $queryUser);
        if (mysqli_num_rows($resultUser) == 1) {
            $rowUser                = mysqli_fetch_array($resultUser);
            $idUser                 = $rowUser['UsuID'];
            $user = $idUser;
            $query = "INSERT INTO usuario_producto (`UsuProUsuID`,`UsuProProID`, `UsuProPre`, `UsuProEst`, `UsuProDes`,`UsuProNom`) VALUES (?,?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $query);
            $stmt->bind_param('iidiss', $user, $producto, $precio, $estado, $description, $nombre);

            if (!mysqli_stmt_execute($stmt)) {
                echo "Chanfle, hubo un problema y no se guardo el archivo. " . mysqli_stmt_error($stmt) . "<br/>";
            }

            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            header("Location: ../");
        } else {
            header("Location: $dirEjec/Errores/?m=jodete1");
        }
    } else {
        echo "No envio";
    }
} else { }
?>