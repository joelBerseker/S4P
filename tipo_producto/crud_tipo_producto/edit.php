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
       
        $query = "SELECT * FROM tb_tipo_producto WHERE ID_TIPO_PRODUCTO = $id";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result)== 1 ){
            $row = mysqli_fetch_array($result);
            $desciption = $row['DSC_TIPO_PRODUCTO'];
            $cantidad = $row['estado']; 
           
        }
        
    }
    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $description = $_POST['description1'];
        $cantidad = $_POST['cantidad1']; 
        $query = "UPDATE `tb_tipo_producto` SET `DSC_TIPO_PRODUCTO`='$description' ,`estado`=$cantidad WHERE `ID_TIPO_PRODUCTO`= $id ";
        $result = mysqli_query($conn,$query);
        header("Location: ../");
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
            <label><b>EDITAR PRODUCTO</b></label>
            </div>
            <div class="form-row form-group ">
                <div class="col-4"><label>Nombre:</label></div>
                <div class="col">
                    <input value="<?php echo $desciption;?>" class="form-control form-control-sm " vtype="text" name="description1" required></div>
            </div>
            
            <div class="form-row form-group ">
                <div class="col-4"><label>Estado: </label></div>
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