<?php 
    include("../crud_usuarioproducto/db.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
       
        $query = "SELECT * FROM usuario_producto WHERE UsuProID = $id";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result)== 1 ){
			$row = mysqli_fetch_array($result);
			$nombre				= $row['UsuProNom'];
            $product         	= $row['UsuProProID'];
            $description    	= $row['UsuProDes'];
            $precio         	= $row['UsuProPre'];
			$estado        		= $row['usuProEst'];
			
			$query2 = "SELECT ProNom FROM producto WHERE ProID = $product";
			$result2 = mysqli_query($conn,$query2);
			if(mysqli_num_rows($result2)== 1 ){
				$row2 = mysqli_fetch_array($result2);
				$nombreProducto = $row2['ProNom'];
			}
        }
        
    }
    if(isset($_POST['update_comentar'])){
        
        $query_hacia_tabla_Usuario="SELECT UsuID,UsuCor
        FROM usuario u
        INNER JOIN usuario_producto d
        ON u.UsuID = d.UsuProUsuID
        WHERE d.UsuProID = $id";
        $respuesta_de_tabla_Usuario = mysqli_query($conn,$query_hacia_tabla_Usuario);
        $datos_de_Usuario = mysqli_fetch_array($respuesta_de_tabla_Usuario);
        $usuario	        =   4;
        $correo 		    =   $datos_de_Usuario['UsuCor'];
        $id          	    =   $_GET['id'];
        $comentario         =   $_POST['comentario'];
        $producto           =   $_POST['producto'];
        $query = "INSERT INTO usuario_mensaje (`UsuMenUsuProID`,`UsuMenUsuID`, `UsuMenDes`) VALUES (?,?, ?)";
    	$stmt = mysqli_prepare($conn,$query);
    	$stmt->bind_param('iis',$id,$usuario,$comentario);
    
    	if(!mysqli_stmt_execute($stmt)){
       		 echo "Chanfle, hubo un problema y no se guardo el archivo. ". mysqli_stmt_error($stmt)."<br/>";
      	}  
        
        mysqli_stmt_close($stmt);
        mysqli_close($conn);      
    	header("Location: ../view?id=$id");
    	}

?>
<?php
$inicio 		=	false;
$producto		=	true;
$categoria		=	false;
$contactanos	=	false;
$nosotros		=	false;
$login			=	false;
$men="Producto";
	include('../../includes/header.php')
?>
<div class="section2">
<div class="container p-4">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card card-body">
            <div  class="form-group">
				<label><b>Ver USUARIO_PRODUCTO</b></label>
				<img  src="../mostrar.php?id=<?php echo $product;?>" alt="Imagen del autor del comentario" class="rounded-circle img-thumbnail"/>
								
            </div>
            <div class="form-row form-group ">
                <div class="col-4"><label>Nombre:</label></div>
                <div class="col">
                    <input value="<?php echo $nombre?>" class="form-control form-control-sm " type="text" name="descripcion" required></div>
            </div>
            <div class="form-row form-group ">
                <div class="col-4"><label>Descripcion:</label></div>
                <div class="col">
                    <input value="<?php echo $description?>" class="form-control form-control-sm " type="text" name="descripcion" required></div>
            </div>
            <div class="form-row form-group ">
                <div class="col-4"><label>Juego:</label></div>
                <div class="col">
                    <input value="<?php echo $nombreProducto?>" class="form-control form-control-sm " type="text" name="producto" required></div>
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
                <div class="col-4">
                    <label>Estado:</label>
                </div>
                <div class="col">
                    <input class="form-control form-control-sm " value="<?php echo $estado;?>" type="text" name="estado" required >
                </div>
            </div>
            
            </div>
            
                    <form action="index.php?id=<?php echo $id?>" method="post">
                    <fieldset>
							<legend><b>Agregar Comentario</b></legend>
							<textarea class="offset-0 col-12 form-control"
								placeholder="Agregar comentario" name="comentario" required></textarea>
                             <button class="btn btn-success btn-block" name="update_comentar">
                                Update
                            </button>
						</fieldset>
					</form>
                    <fieldset>
                    
						<legend><b>Comentarios</b></legend>
						<?php
						include("../crud_usuarioproducto/db.php");
			                $querymensaje = "SELECT * FROM usuario_mensaje WHERE UsuMenUsuProID=$id";
			                $resultmensaje= mysqli_query($conn, $querymensaje);
			                while($row= mysqli_fetch_array($resultmensaje)){
                        ?>
                        
						<!-- Esto desde aqui se va repetir -->
						<?php<
						
                        $usu=$row['UsuMenUsuID'];
                        $queryusuario=mysqli_query($conn,"SELECT UsuID, UsuNom FROM usuario WHERE UsuID = $usu");
                        $datosb = mysqli_fetch_array($queryusuario);
                        ?>
						<div >
							<div >
								<div >
                                <img  src="mostrar.php?id=<?php echo $datosb['UsuID'];?>" alt="Imagen del autor del comentario" class="rounded-circle img-thumbnail"/>
								
									</div>
								<div >
									<label ><b>
									<?php 
									
                                   $usu=$row['UsuMenUsuID'];
                                   $queryusuario=mysqli_query($conn,"SELECT UsuID, UsuNom FROM usuario WHERE UsuID = $usu");
                                   $datosb = mysqli_fetch_array($queryusuario);
                                    echo $datosb['UsuNom'] ?>
                                    
                                    </b></label><br>
									<textarea width='100%'><?php echo $row['UsuMenDes'];?></textarea>
								</div> 
							</div>
						</div>
                    <?php }?>
						<!--  hasta aqui para los comentarios-->
					</fieldset>
                    <br><br><br><br><br><br>
        
            </div>
        </div>
    </div>    
</div>

<?php
	include("../../includes/footer.php")
?>