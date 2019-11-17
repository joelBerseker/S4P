<?php
	$index_pri   = true; 
	$index_pro   = true;
	$index_prov  = true;
	$index_rol   = true;
	$index_tra   = true;
	$index_rec   = true;
	$index_acc   = true;
?>
<?php 
    include("db.php");
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
       
        $query = "SELECT * FROM usuario WHERE UsuID = $id";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result)== 1 ){
            $row = mysqli_fetch_array($result);
            $nombre         = $row['UsuNom'];
            $correo         = $row['UsuCor'];
            $contraseña     = $row['UsuCon'];
            $estado         = $row['UsuEst'];
            $id_rol         = $row['UsuRolID'];
        }
        
    }
    if(isset($_POST['update'])){
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $estado = $_POST['estado'];
        $id_rol = $_POST['rol'];
        $archivo_nombre=$_FILES['myFile']['name'];
        $archivo_tipo = $_FILES['myFile']['type'];
        $archivo_temp = $_FILES['myFile']['tmp_name'];
        $archivo_binario = (file_get_contents($archivo_temp));
        $password = password_hash($_POST['contraseña'], PASSWORD_BCRYPT);
        $mysqli = new mysqli("localhost", "root", "", "s4p");
        $stmt = $mysqli->prepare("UPDATE usuario SET `UsuNom`=?, `UsuCor`=?,`UsuCon`=?,`UsuImgNom`=?,`UsuImgTip`=? ,`UsuImgArc`=?,`UsuRolID`=?,`UsuEst`=? WHERE UsuID=?");
        /* BK: always check whether the prepare() succeeded */
        if ($stmt === false) {
            trigger_error($this->mysqli->error, E_USER_ERROR);
            return;
            }
        
        /* Bind our params */
        /* BK: variables must be bound in the same order as the params in your SQL.
        * Some people prefer PDO because it supports named parameter. */
        $stmt->bind_param('ssssssiii',$nombre,$correo,$contraseña,$archivo_nombre,$archivo_tipo,$archivo_binario,$id_rol,$estado, $id);

        /* Set our params */
        /* BK: No need to use escaping when using parameters, in fact, you must not, 
        * because you'll get literal '\' characters in your content. */
        /* Execute the prepared Statement */
        $status = $stmt->execute();
        /* BK: always check whether the execute() succeeded */
        if ($status === false) {
        trigger_error($stmt->error, E_USER_ERROR);
        }
        header("Location: ../");
    }
?>
<?php
    include('../../includes/header.php');
    include("db.php");
?>
<div class="section2">
<div class="container p-4"></div>
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
            <form action="edit.php?id=<?php echo $_GET['id']?>" method="POST"  enctype="multipart/form-data" >
            <div  class="form-group">
                <label><b>Editar Usuario</b></label>
            </div>
            <div class="form-row form-group ">
                <div class="col-4"><label>Nombre:</label></div>
                <div class="col">
                    <input value="<?php echo $nombre;?>" class="form-control form-control-sm " vtype="text" name="nombre" required></div>
            </div>
            <div class="form-row form-group ">
                <div class="col-4"><label>Correo:</label></div>
                <div class="col">
                    <input value="<?php echo $correo;?>" class="form-control form-control-sm " type="text" name="correo" required></div>
            </div>
            <div class="form-row form-group ">
                <div class="col-4"><label>Rol:</label></div>
                <div class="col">
                    <?php
                        $querytipo=mysqli_query($conn,"SELECT RolID, RolNom FROM rol");
                    ?>
                    <select class="form-control col form-control-sm " id="exampleFormControlSelect1"  name="rol">
                        <?php
                            while($datosa = mysqli_fetch_array($querytipo)){ 
                            if($datosa['RolID']==$id_rol){
                        ?>
                            <option value="<?php echo $datosa['RolID']; ?>"selected > <?php echo $datosa['RolNom']; ?> </option>
                            <?php }else ?>
                            <option value="<?php echo $datosa['RolID'] ?>"> <?php echo $datosa['RolNom'] ?> </option>
                        

                        <?php
                            }
                        ?>
					</select>  
                </div>  
            </div>            
            <div class="form-row form-group ">
                <div class="col-4">
                    <label>Contraseña:</label>
                </div>
                <div class="col">
                    <input class="form-control form-control-sm " value="<?php echo $contraseña;?>" type="password" name="contraseña" required >
                </div>
            </div>
            

            <div class="form-row form-group ">
                <div class="col-4">
                    <label>Estado:</label>
                </div>
                <div class="col">
                    <input class="form-control form-control-sm " value="<?php echo $estado;?>" type="text" name="estado" required >
                </div>
            </div>
            <div class="form-row form-group ">
                <div class="col-5"><label>Imagen:</label></div>
                <div class="col">
                <!--
                    
                    <input type="file" name="myFile" accept="image/* "class="form-control-file">
                -->
                <input type="file" accept="image/* "class="form-control-file" name="myFile" id="imagen" maxlength="256" placeholder="Imagen">
                <input type="hidden" class="form-control" name="imagenactual" id="imagenactual">
                <img src="../mostrar.php?id=<?php echo $row['UsuID']?>" width="200" id="imagenmuestra" alt="Img blob" />
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