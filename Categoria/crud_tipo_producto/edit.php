<?php
	$inicio 		=	false;
	$producto		=	false;
	$categoria		=	true;
	$contactanos	=	false;
	$nosotros		=	false;
	$login			=	false;
	$men			= "Categoria";
?>
<?php
	include('../../includes/header.php')
?>
<?php 
    include("db.php");
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
       
        $query = "SELECT * FROM categoria WHERE CatId = $id";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result)== 1 ){
            $row = mysqli_fetch_array($result);
            $nombre         = $row['CatNom'];
            $description    =$row['CatDes'];
            $cantidad       = $row['CatEst']; 
           
        }
        
    }
    if(isset($_POST['update'])){
        $id             = $_GET['id'];
        $nombre         = $_POST['nombre1'];
        $description    = $_POST['description1'];
        $estado         = $_POST['estado1']; 
        $query = "UPDATE `categoria` SET `CatNom`='$nombre',`CatDes`='$description' ,`CatEst`=$estado WHERE `CatID`= $id ";
        $result = mysqli_query($conn,$query);
        header("Location: ../");
    }
?>
<?php
    include('../../includes/header.php');
    include('db.php');
?>

<?php 
    $recurso="/Categoria/edit";
	include("../../includes/acl.php");
?>
<div class="section2"><br><br>
    <div class="container p-3"></div>
    <div class="row">
        <div class="col-sm-2 col-md-3 col-lg-4 col-xl-4"></div>
        <div class="col-sm-2 col-md-3 col-lg-4 col-xl-4">
            <div class="card card-body">
            <form action="edit.php?id=<?php echo $_GET['id']?>" method="POST">
            <div  class="form-group">
            <label><b>EDITAR PRODUCTO</b></label>
            </div>
            <div class="form-row form-group ">
                <div class="col-4"><label>Nombre:</label></div>
                <div class="col">
                    <input value="<?php echo $nombre;?>" class="form-control form-control-sm " vtype="text" name="nombre1" required></div>
            </div>
            <div class="form-row form-group ">
                <div class="col-4"><label>Descripcion:</label></div>
                <div class="col">
                    <input value="<?php echo $description;?>" class="form-control form-control-sm " vtype="text" name="description1" required></div>
            </div>
            
            <div class="form-row form-group ">
                <div class="col-4"><label>Estado: </label></div>
                <div class="col"><input class="form-control form-control-sm " type="text" value="<?php echo $cantidad;?>" name="estado1" required ></div>
            </div>
            
            <button class="btn btn-success btn-block" name="update">
                Update
            </button>
        </form>
            </div>
        </div>
        <div class="col-sm-2 col-md-3 col-lg-4 col-xl-4"></div>
    </div>   <br><br><br>
</div>

<?php
	include("../../includes/footer.php")
?>