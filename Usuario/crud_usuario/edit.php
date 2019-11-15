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
       
        $query = "SELECT * FROM USUARIO WHERE UsuID = $id";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result)== 1 ){
            $row = mysqli_fetch_array($result);
            $nombre = $row['UsuNom'];
            $correo = $row['UsuCor'];
            $imagen = $row['UsuImg'];
            $estado = $row['UsuEst'];
            $rol = $row['UsuRolID'];
            
           
        }
        
    }
    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $nombre = $_POST['nombrex2'];
        $correo = $_POST['correox2'];
        $imagen = $_POST['imagenx2'];
        $estado =$_POST['estadox2'];
        $rol = $_POST['rolx2'];
        $query = "UPDATE USUARIO SET UsuNom = '$nombre', UsuEst = '$estado', UsuRolID = '$rol', UsuCor = '$correo', UsuImg = '$imagen' WHERE UsuID = $id";
        $result = mysqli_query($conn,$query);

        $_SESSION['message'] = 'Acceso Edited Succesfully';
        $_SESSION['message_type']= 'info';
        header("Location: ../index.php");
        
    }
?>
<?php
	include('../../includes/header.php')
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
                        <input type="text" name="correox2" class="form-control" value="<?php echo $correo;?>" placeholder="Correo">
                    </div>
                    <div class="form-group">
                        <input type="text" name="imagenx2" class="form-control" value="<?php echo $imagen;?>" placeholder="Imagen">
                    </div>
                    <div class="form-group">
                        <?php
                        if($estado==1){
                        ?>
                        <p>Activo</p>
                        <input type="radio" name="estadox2" value="1" class="form-control" checked=""> <br>
                        <p>Inactivo</p>
                        <input type="radio" name="estadox2" value="0" class="form-control"> <br>
                        <?php
                        }else{
                        ?>
                        <p>Activo</p>
                        <input type="radio" name="estadox2" value="1" class="form-control" > <br>
                        <p>Inactivo</p>
                        <input type="radio" name="estadox2" value="0" class="form-control" checked=""> <br>
                        <?php
                        }
                        ?>
                        Seleccione el rol <br>
                    
                    <?php
                    $querya=mysqli_query($conn,"SELECT RolID, RolNom FROM ROL");
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
	include("../includes/footer.php")
?>