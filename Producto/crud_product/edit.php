<?php
include('../../includes/navbar.php');
$categoria = true;
$titulo_html = "Editar Producto";
include('../../includes/data_base.php');
?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM producto WHERE ProID = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $nombre         = $row['ProNom'];
        $description    = $row['ProDes'];
        $precio         = $row['ProPre'];
        $categoria      = $row['ProCatID'];
        $estado         = $row['ProEst'];
    }
}
if (isset($_POST['update'])) {
    $edit = true;
    $id          = $_GET['id'];
    $archivo_nombre = $_FILES['myFile']['name'];
    if ($archivo_nombre == null)
        $edit = false;
    $archivo_tipo = $_FILES['myFile']['type'];
    $archivo_temp = $_FILES['myFile']['tmp_name'];
    $archivo_binario = (file_get_contents($archivo_temp));
    $nombre      = $_POST['nombre'];
    $description = $_POST['descripcion'];
    $categoria   = $_POST['categoria'];
    $estado      = $_POST['estado'];
    $precio      = $_POST['precio'];
    $mysqli = new mysqli($database_red,$database_nombre,$database_contraseña,$database_name);
    if ($edit) {
        $stmt = $mysqli->prepare("UPDATE producto SET `ProNom`=?, `ProImgNom`=?,`ProImgTip`=?,`ProImgArc`=?,`ProCatID`=? ,`ProPre`=?,`ProDes`=?,`ProEst`=? WHERE ProID=?");
        /* BK: always check whether the prepare() succeeded */
        if ($stmt === false) {
            trigger_error($this->mysqli->error, E_USER_ERROR);
            return;
        }

        /* Bind our params */
        /* BK: variables must be bound in the same order as the params in your SQL.
        * Some people prefer PDO because it supports named parameter. */
        $stmt->bind_param('ssssidsii', $nombre, $archivo_nombre, $archivo_tipo, $archivo_binario, $categoria, $precio, $description, $estado, $id);
    } else {
        $stmt = $mysqli->prepare("UPDATE producto SET `ProNom`=?,`ProCatID`=? ,`ProPre`=?,`ProDes`=?,`ProEst`=? WHERE ProID=?");
        /* BK: always check whether the prepare() succeeded */
        if ($stmt === false) {
            trigger_error($this->mysqli->error, E_USER_ERROR);
            return;
        }

        /* Bind our params */
        /* BK: variables must be bound in the same order as the params in your SQL.
        * Some people prefer PDO because it supports named parameter. */
        $stmt->bind_param('sidsii', $nombre, $categoria, $precio, $description, $estado, $id);
    }
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
    exit();
}
?>
<?php

include('../../includes/header.php');
$recurso = "/Producto/edit";
include('../../includes/data_base.php');
include("../../includes/acl.php");
include('../../includes/data_base.php');
?>
<div class="section2">
    <div class="container p-4"></div>
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id'] ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label><b>AÑADIR PRODUCTO</b></label>
                    </div>
                    <div class="form-row form-group ">
                        <div class="col-4"><label>Nombre:</label></div>
                        <div class="col">
                            <input value="<?php echo $nombre; ?>" class="form-control form-control-sm " vtype="text" name="nombre" required></div>
                    </div>
                    <div class="form-row form-group ">
                        <div class="col-4"><label>Descripcion:</label></div>
                        <div class="col">
                            <input value="<?php echo $description; ?>" class="form-control form-control-sm " vtype="text" name="descripcion" required></div>
                    </div>
                    <div class="form-row form-group ">
                        <div class="col-4"><label>Categoria:</label></div>
                        <div class="col">
                            <?php
                            $querytipo = mysqli_query($conn, "SELECT CatID, CatNom FROM categoria");
                            ?>
                            <select class="form-control col form-control-sm " id="exampleFormControlSelect1" name="categoria">
                                <?php
                                while ($datosa = mysqli_fetch_array($querytipo)) {
                                    if ($datosa['CatID'] == $categoria) {
                                        ?>
                                        <option value="<?php echo $datosa['CatID']; ?>" selected> <?php echo $datosa['CatNom']; ?> </option>
                                    <?php } else ?>
                                    <option value="<?php echo $datosa['CatID'] ?>"> <?php echo $datosa['CatNom'] ?> </option>


                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row form-group ">
                        <div class="col-4">
                            <label>Precios:</label>
                        </div>
                        <div class="col">
                            <input class="form-control form-control-sm " value="<?php echo $precio; ?>" type="text" name="precio" required>
                        </div>
                    </div>


                    <div class="form-row form-group ">
                        <div class="col-4">
                            <label>Estado:</label>
                        </div>
                        <div class="col">
                            <input class="form-control form-control-sm " value="<?php echo $estado; ?>" type="text" name="estado" required>
                        </div>
                    </div>
                    <div class="form-row form-group ">
                        <div class="col-5"><label>Imagen:</label></div>
                        <div class="col">
                            <!--
                    
                    <input type="file" name="myFile" accept="image/* "class="form-control-file">
                -->
                            <input type="file" accept="image/* " class="form-control-file" name="myFile" id="imagen" maxlength="256" placeholder="Imagen">
                            <input type="hidden" class="form-control" name="imagenactual" id="imagenactual">
                            <img src="../mostrar.php?id=<?php echo $id ?>" width="200" id="imagenmuestra" alt="Img blob" />
                            <br>
                            <br>
                        </div>
                    </div>



                    <button class="btn btn-success btn-block" name="update">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include("../../includes/footer.php")
?>