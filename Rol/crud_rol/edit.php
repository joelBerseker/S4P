<?php
	$inicio 		=	false;
	$producto		=	false;
	$categoria		=	false;
	$contactanos	=	false;
	$nosotros		=	false;
    $login			=	true;
    $men = "Rol";
    include('../../includes/header.php');
    include('db.php');
?>
<?php 
    include("db.php");
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
       
        $query = "SELECT * FROM ROL WHERE RolID = $id";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result)== 1 ){
            $row = mysqli_fetch_array($result);
            $desciption = $row['RolNom'];
            $cantidad = $row['RolEst']; 
           
        }
        
    }
    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $description = $_POST['description1'];
        $cantidad = $_POST['cantidad1']; 
        $query = "UPDATE `ROL` SET `RolNom`='$description' ,`RolEst`=$cantidad WHERE `RolID`= $id ";
        $result = mysqli_query($conn,$query);
        header("Location: ../");
    }
?>
<?php
    
    
?>

<?php 
    $recurso="/Rol/edit";
	include("../../includes/acl.php");
?>

<div class="section2"><br><br>
    <div class="container p-3"></div>
    <div class="row">
        <div class="col-sm-2 col-md-3 col-lg-4 col-xl-4"></div>
        <div class="col-sm-8 col-md-6 col-lg-4 col-xl-4">
            <div class="card card-body">
            <form action="edit.php?id=<?php echo $_GET['id']?>" method="POST">
            <div  class="form-group">
            <label><b>EDITAR ROL</b></label>
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
                Actualizar
            </button>
        </form>
            </div>
        </div>
        <div class="col-sm-2 col-md-3 col-lg-4 col-xl-4"></div>
    </div><br><br><br>
</div>




<?php
	include("../../includes/footer.php")
?>