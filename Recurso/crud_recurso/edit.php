<?php
	$inicio 		=	false;
	$producto		=	false;
	$categoria		=	false;
	$contactanos	=	false;
	$nosotros		=	false;
    $login			=	true;
    $men = "Recurso";
?>
<?php 
    include("db.php");
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
       
        $query = "SELECT * FROM RECURSO WHERE RecID = $id";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result)== 1 ){
            $row = mysqli_fetch_array($result);
            $desciption = $row['RecNom'];
            $cantidad = $row['RecEst']; 
           
        }
        
    }
    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $description = $_POST['description1'];
        $cantidad = $_POST['cantidad1']; 
        $query = "UPDATE `RECURSO` SET `RecNom`='$description' ,`RecEst`=$cantidad WHERE `RecID`= $id ";
        $result = mysqli_query($conn,$query);
        header("Location: ../");
    }
?>
<?php
    include('../../includes/header.php');
    include('db.php');
?>
<?php
	
	$recurso="/Recurso/edit";
	include("../../includes/acl.php");

?>

<div class="section2"><br><br>
    <div class="container p-3">
    <div class="row">
        <div class="col-sm-2 col-md-3 col-lg-4 col-xl-4"></div>
        <div class="col-sm-8 col-md-6 col-lg-4 col-xl-4">
            <div class="card card-body">
            <form action="edit.php?id=<?php echo $_GET['id']?>" method="POST">
            <div  class="form-group">
            <label><b>EDITAR RECURSO</b></label>
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
</div>

<?php
	include("../../includes/footer.php")
?>