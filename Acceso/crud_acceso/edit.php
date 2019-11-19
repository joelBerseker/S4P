<?php

$inicio 		=	false;
$producto		=	true;
$categoria		=	false;
$contactanos	=	false;
$nosotros		=	false;
$login			=	false;

$men="Acceso";
    
    
    include('../../includes/header.php');
    include("db.php");
?>
<?php
$recurso="/Acceso/edit";
    include("../../includes/acl.php");
    ?>
<?php 
    
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
       
        $query = "SELECT * FROM ACCESO WHERE AccID = $id";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result)== 1 ){
            $row = mysqli_fetch_array($result);
            $nombre = $row['AccDes'];
            $estado = $row['AccEst'];
            $rol = $row['AccRolID'];
            $recurso = $row['AccRecID'];
           
        }
        
    }
    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $nombre = $_POST['nombrex2'];
        $estado =$_POST['estadox2'];
        $rol = $_POST['rolx2'];
        $recurso =$_POST['recursox2'];
        $query = "UPDATE ACCESO SET AccDes = '$nombre', AccEst = '$estado', AccRolID = '$rol', AccRecID = '$recurso' WHERE AccID = $id";
        $result = mysqli_query($conn,$query);

        $_SESSION['message'] = 'Acceso Edited Succesfully';
        $_SESSION['message_type']= 'info';
        header("Location: ../index.php");
        
    }
?>

<div class="section2">
<div class="container p-4"></div>
    <div class="row">
        <div class="col-md-4 mb-5 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']?>" method="POST">
                    <div class="form-group">
						<input type="text" name="nombrex2" class="form-control" value="<?php echo $nombre;?>" placeholder="Nombre" autofocus>
					</div>
					<div class="form-group">
                        <?php
                        if($estado==1){
                        ?>
                        <p>Activo</p>
                        <input type="radio" name="estadox2" value="1" class="form-control" checked> <br>    
                        <p>Inactivo</p>
                        <input type="radio" name="estadox2" value="0" class="form-control"> <br>    
                        <?php
                        }else{
                        ?>

                        <p>Activo</p>
                        <input type="radio" name="estadox2" value="1" class="form-control" > <br>
                        <p>Inactivo</p>
                        <input type="radio" name="estadox2" value="0" class="form-control" checked
                        > <br>
                        <?php
                        }
                        ?>
                        Seleccione el rol <br>
                    
                    <?php
                        $consulta_rol="SELECT RolID, RolNom FROM ROL WHERE RolID = '$rol'";
                        

                        $querya=mysqli_query($conn,$consulta_rol);
                    ?>
                    <select name="rolx2" class="form-control">
                        <?php
                        while($datosa = mysqli_fetch_array($querya)){ 
                        ?>
                        <option value="<?php echo $datosa['RolID'] ?>"> <?php echo $datosa['RolNom'] ?> </option>
                        <?php
                        }
                        ?>
                    </select><br>
                    Seleccione el recurso <br>
                    <?php
                        $consulta_recurso = "SELECT RecID, RecNom FROM RECURSO WHERE RecID = '$recurso'";
                        
                        $queryb=mysqli_query($conn,$consulta_recurso);
                    ?>
                    <select name="recursox2" class="form-control">
                        <?php
                        while($datosb = mysqli_fetch_array($queryb)){ 
                        ?>
                        <option value="<?php echo $datosb['RecID'] ?>"> <?php echo $datosb['RecNom'] ?> </option>
                        <?php
                        }
                        ?>
                    </select><br>
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