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
       
        $query = "SELECT * FROM tb_producto WHERE ID_PRODUCTO = $id";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result)== 1 ){
            $row = mysqli_fetch_array($result);
            $desciption = $row['DSC_PRODUCTO'];
            $id = $row['ID_PRODUCTO'];
            $tipo_producto = $row['ID_TIPO_PRODUCTO'];
            $proveedor = $row['PROV_PRODUCTO'];
            $precio = $row['PRECIO_PRODUCTO'];
            $nombre = $row['NM_PRODUCTO'];
            $marca = $row['MARCA_PRODUCTO'];
            $minimo = $row['PROV_MIN_PRODUCTO'];
            $cantidad = $row['CTD_COLUMNA']; 
           
        }
        
    }
    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $description = $_POST['description1'];
        $tipo_producto = $_POST['tipo_producto1'];
        $proveedor = $_POST['proveedor1'];
        $precio = $_POST['precio1'];
        $nombre = $_POST['nombre1'];
        $marca = $_POST['marca1'];
        $minimo = $_POST['minimo1'];
        $cantidad = $_POST['cantidad1']; 
        $query = "UPDATE `tb_producto` SET `DSC_PRODUCTO`='$description',`ID_TIPO_PRODUCTO`=$tipo_producto,`PROV_PRODUCTO`=$proveedor,`PRECIO_PRODUCTO`=$precio,`NM_PRODUCTO`='$nombre',`MARCA_PRODUCTO`=$marca,`PROV_MIN_PRODUCTO`=$minimo,`CTD_COLUMNA`=$cantidad WHERE `ID_PRODUCTO`= $id ";
        $result = mysqli_query($conn,$query);
        $_SESSION['message'] = 'Product Edited Succesfully';
        $_SESSION['message_type']= 'info';
        header("Location: ../index.php");
    }
?>
<?php
	include('../../includes/header.php')
?>
<div class="container p-4"></div>
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
            <form action="edit.php?id=<?php echo $_GET['id']?>" method="POST">
            <div  class="form-group">
            <label><b>AÑADIR PRODUCTO</b></label>
            </div>
            <div class="form-row form-group ">
                <div class="col-4"><label>Descripcion:</label></div>
                <div class="col">
                    <input value="<?php echo $desciption;?>" class="form-control form-control-sm " vtype="text" name="description1" required></div>
            </div>
            <div class="form-row form-group ">
                <div class="col-4"><label>Tipo de producto:</label></div>
                <div class="col">
                    <select class="form-control col form-control-sm " id="exampleFormControlSelect1" name="tipo_producto1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>  
                </div>  
            </div>
            
            <div class="form-row form-group ">
                <div class="col-4"><label>Proveedor:</label></div>
                <div class="col">
                    <select class="form-control col form-control-sm " id="exampleFormControlSelect1" name="proveedor1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>  
                </div>
            </div>
            <div class="form-row form-group ">
                <div class="col-4"><label>Nombre:</label></div>
                <div class="col"><input class="form-control form-control-sm " type="text" name="nombre1" value="<?php echo $nombre;?>" required></div>
            </div>
            <div class="form-row form-group ">
                <div class="col-4"><label>Marca:</label></div>
                <div class="col">
                    <select class="form-control col form-control-sm " id="exampleFormControlSelect1" value="<?php echo $marca;?>" name="marca1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>  
                </div>
            </div>
            <div class="form-row form-group ">
                <div class="col-4"><label>Precios:</label></div>
                <div class="col"><input class="form-control form-control-sm " value="<?php echo $precio;?>" type="text" name="precio1" required ></div>
            </div>
            <div class="form-row form-group ">
                <div class="col-4"><label>Stock minimo:</label></div>
                <div class="col"><input class="form-control form-control-sm " type="text" value="<?php echo $minimo;?>" name="minimo1" required"></div>
            </div>
            
            <div class="form-row form-group ">
                <div class="col-4"><label>Cantidad:</label></div>
                <div class="col"><input class="form-control form-control-sm " type="text" value="<?php echo $cantidad;?>" name="cantidad1" required ></div>
            </div>
            
            <button class="btn btn-success btn-block" name="update">
                Update
            </button>
        </form>
            </div>
        </div>
    </div>


<?php
	include("../../includes/footer.php")
?>