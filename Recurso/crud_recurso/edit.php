<?php
	include('../../includes/navbar.php');
    $login=true;
    $titulo_html = "Recurso";
    include('../../includes/header.php');
    include('../../includes/data_base.php');
	$recurso="/Recurso/edit";
	include("../../includes/acl.php");
?>
<?php 
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
       
        $query = "SELECT * FROM RECURSO WHERE RecID = $id";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result)== 1 ){
            $row = mysqli_fetch_array($result);
            $desciption = $row['RecNom'];
            $estado = $row['RecEst']; 
           
        }
        
    }
    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $description = $_POST['description1'];
        $estado = $_POST['estado1']; 
        $query = "UPDATE `RECURSO` SET `RecNom`='$description' ,`RecEst`=$estado WHERE `RecID`= $id ";
        $result = mysqli_query($conn,$query);
        header("Location: ../");
    }
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
        <div class="col-4"><label>Estado:</label></div>
        <div class="col">
        <select name="estado1" class="form-control form-control-sm">
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
        <div class="col-sm-2 col-md-3 col-lg-4 col-xl-4"></div>
    </div><br><br><br>
</div>
</div>

<?php
	include("../../includes/footer.php")
?>