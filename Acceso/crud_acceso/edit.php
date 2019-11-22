<?php
include('../../includes/navbar.php');
$titulo_html="Acceso";
include('../../includes/header.php');
include("../../includes/data_base.php");

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
                <div  class="form-group">
            <label><b>EDITAR ACCESO</b></label>
            </div>
                    <div class="form-group">
						<input type="text" name="nombrex2" class="form-control" value="<?php echo $nombre;?>" placeholder="Nombre" autofocus>
					</div>
					<div class="form-group">
                    Estado:
        
        <select name="estadox2" class="form-control">
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
        </select><br>
        
                        Seleccione el rol <br>
                    
                    <?php
                        $consulta_rol="SELECT RolID, RolNom FROM ROL WHERE RolEst = 1";
                        

                        $querya=mysqli_query($conn,$consulta_rol);
                    ?>
                    <select name="rolx2" class="form-control">
                        <?php
                        while($datosa = mysqli_fetch_array($querya)){ 
                            if( $datosa['RolID'] == $rol){
                            ?>
                            <option value="<?php echo $datosa['RolID']; ?>" selected> <?php echo $datosa['RolNom']; ?> </option>
                            <?php
                            }else{?>    
                                <option value="<?php echo $datosa['RolID'] ?>"> <?php echo $datosa['RolNom'] ?> </option>  
                        <?php
                            }    
                         }
                        ?>
                    </select><br>
                    Seleccione el recurso <br>
                    <?php
                        $consulta_recurso = "SELECT RecID, RecNom FROM RECURSO WHERE RecEst = 1 ";
                        
                        $queryb=mysqli_query($conn,$consulta_recurso);
                    ?>
                    <select name="recursox2" class="form-control">
                        <?php
                        while($datosb = mysqli_fetch_array($queryb)){ 
                            if( $datosa['RecID'] == $recurso){
                                ?>
                                <option value="<?php echo $datosb['RecID']; ?>" selected> <?php echo $datosb['RecNom']; ?> </option>
                                <?php
                                }else{?>    
                                    <option value="<?php echo $datosb['RecID'] ?>"> <?php echo $datosb['RecNom'] ?> </option>  
                            <?php
                                }  
                        }
                        ?>
                    </select>
                    </div>
					<button class="btn btn-success btn-block" name="update">
                        Enviar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
	include("../../includes/footer.php")
?>