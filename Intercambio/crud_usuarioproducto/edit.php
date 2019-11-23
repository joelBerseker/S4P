<?php
include('../../includes/sesion.php');
include("../../includes/data_base.php");
$recurso="/Intercambio/edit";
include("../../includes/acl.php");

?>
<?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
       
        $query = "SELECT * FROM usuario_producto WHERE UsuProID = $id";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result)== 1 ){
            $row = mysqli_fetch_array($result);
            $producto         = $row['UsuProProID'];
            $description    = $row['UsuProDes'];
            $precio         = $row['UsuProPre'];
            $estado         = $row['usuProEst'];
        }
        
    }
    if(isset($_POST['update'])){
        $id          = $_GET['id'];
        $producto      = $_POST['producto'];
        $description = $_POST['descripcion'];
        $estado      = $_POST['estado'];
        $precio      = $_POST['precio'];
        $mysqli = new mysqli("localhost", "root", "", "s4p");
        $stmt = $mysqli->prepare("UPDATE usuario_producto SET `UsuProProID`=?, `UsuProPre`=?,`UsuProEst`=?,`UsuProDes`=? WHERE UsuProID=?");
        /* BK: always check whether the prepare() succeeded */
        if ($stmt === false) {
        trigger_error($this->mysqli->error, E_USER_ERROR);
        return;
        }
        
        /* Bind our params */
        /* BK: variables must be bound in the same order as the params in your SQL.
        * Some people prefer PDO because it supports named parameter. */
        $stmt->bind_param('idisi',$producto,$precio,$estado,$description, $id);
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



<?php
include('../../includes/navbar.php');
$titulo_html="Producto";
include('../../includes/header.php');
?>
<div class="section2">
<div class="container p-4"></div>
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
            <form action="edit.php?id=<?php echo $_GET['id']?>" method="POST"  enctype="multipart/form-data" >
            <div  class="form-group">
                <label><b>EDITAR INTERCAMBIO</b></label>
            </div>
            <div class="form-row form-group ">
                <div class="col-4"><label>Descripción:</label></div>
                <div class="col">
                    <input value="<?php echo $description;?>" class="form-control form-control-sm " type="text" name="descripcion" required></div>
            </div>
            <div class="form-row form-group ">
                <div class="col-4"><label>Producto:</label></div>
                <div class="col">
                    <?php
                        $querytipo=mysqli_query($conn,"SELECT ProID, ProNom FROM producto");
                    ?>
                    <select class="form-control col form-control-sm " id="exampleFormControlSelect1"  name="producto">
                        <?php
                            while($datosa = mysqli_fetch_array($querytipo)){ 
                            if($datosa['ProID']==$categoria){
                        ?>
                            <option value="<?php echo $datosa['ProID']; ?>"selected > <?php echo $datosa['ProNom']; ?> </option>
                            <?php }else ?>
                            <option value="<?php echo $datosa['ProID'] ?>"> <?php echo $datosa['ProNom'] ?> </option>
                        

                        <?php
                            }
                        ?>
					</select>  
                </div>  
            </div>            
            <div class="form-row form-group ">
                <div class="col-4">
                    <label>Precio:</label>
                </div>
                <div class="col">
                    <input class="form-control form-control-sm " value="<?php echo $precio;?>" type="text" name="precio" required >
                </div>
            </div>
            

            <div class="form-row form-group ">
        <div class="col-4"><label>Estado:</label></div>
        <div class="col">
        <select name="estado" class="form-control form-control-sm">
        <?php
            if($estado==1){
        ?>
            <option value="1" selected> Activo </option>   
            <option value="0" > Inactivo </option>   
        <?php
            }else{
        ?>
            <option value="1" > Activo </option> 
            <option value="0" selected> Inactivo </option>
        <?php
            }
        ?>

		</select>
        </div>
    </div>
            
           


            
            <button class="btn btn-success btn-block" name="update">
                Actualizar
            </button>
        </form>
            </div>
        </div>
    </div>    
</div>

<?php
	include("../../includes/footer.php")
?>