<?php 
    include("../crud_usuarioproducto/db.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
       
        $query = "SELECT * FROM usuario_producto WHERE UsuProID = $id";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result)== 1 ){
            $row = mysqli_fetch_array($result);
            $producto         = $row['UsuProProID'];
            $description    = $row['UsuProDes'];
            $precio         = $row['UsuProPre'];
            $estado         = $row['UsuProEst'];
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
        $usuario=$datos_de_Usuario['UsuID'];
        $correo = $datos_de_Usuario['UsuCor'];
        $id          = $_GET['id'];
        $comentario      = $_POST['comentario'];
        $producto      = $_POST['producto'];
        $query = "INSERT INTO usuario_mensaje (`UsuMenUsuProID`,`UsuMenUsuID`, `UsuMenDes`) VALUES (?,?, ?)";
    $stmt = mysqli_prepare($conn,$query);
    $stmt->bind_param('iis',$id,$usuario,$comentario);
       
    if(!mysqli_stmt_execute($stmt)){
        echo "Chanfle, hubo un problema y no se guardo el archivo. ". mysqli_stmt_error($stmt)."<br/>";
      }  
        
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
      
    


    
    header("Location: ../view/index.php");
    }
        else{
    echo "No envio";
    }

?>
<?php
	include('../../includes/header.php')
?>
<div class="section2">
<div class="container p-4"></div>
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
            <div  class="form-group">
                <label><b>Ver USUARIO_PRODUCTO</b></label>
            </div>
            <?php
                $query=mysqli_query($conn,"SELECT UsuProID, UsuProNom, UsuProDes, UsuProPre, UsuProEst FROM usuario_producto");
            ?>
            <?php
             $datos = mysqli_fetch_array($query)
            ?>
            <div class="form-row form-group ">
                <div class="col-4"><label>Nombre:</label></div>
                <div class="col">
                    <input value="<?php echo $datos['UsuProNom'];?>" class="form-control form-control-sm " type="text" name="descripcion" required></div>
            </div>
            <div class="form-row form-group ">
                <div class="col-4"><label>Descripcion:</label></div>
                <div class="col">
                    <input value="<?php echo $datos['UsuProDes'];?>" class="form-control form-control-sm " type="text" name="descripcion" required></div>
            </div>
            <div class="form-row form-group ">
                <div class="col-4"><label>Producto:</label></div>
                <div class="col">
                    <?php
                        $querytipo=mysqli_query($conn,"SELECT ProID, ProNom FROM producto");
                    ?>
                        <?php
                            $datosa = mysqli_fetch_array($querytipo)
                        ?>
                    <input value="<?php echo $datosa['ProNom'];?>" class="form-control form-control-sm " type="text" name="producto" required></div>
            </div>            
            <div class="form-row form-group ">
                <div class="col-4">
                    <label>Precio:</label>
                </div>
                <div class="col">
                    <input class="form-control form-control-sm " value="<?php echo $datos['UsuProPre'];?>" type="text" name="precio" required >
                </div>
            </div>
            

            <div class="form-row form-group ">
                <div class="col-4">
                    <label>Estado:</label>
                </div>
                <div class="col">
                    <input class="form-control form-control-sm " value="<?php echo $datos['UsuProEst'];?>" type="text" name="estado" required >
                </div>
            </div>
            
            </div>
            
                    <form action=../view/index.php?id=<?php echo $datos['UsuProID'];?> method="post">
                    <fieldset>
							<legend><b>Agregar Comentario</b></legend>
							<textarea class="offset-0 col-12 form-control"
								placeholder="Agregar comentario" name="comentario" required></textarea>
                    <input type="hidden" value="<?php echo $user['UsuCor'];?>" type="text" name="usuario" required >
                 <input type="hidden" value="<?php echo $datos['UsuProID'];?>" type="text" name="producto" required >
                
                             <button class="btn btn-success btn-block" name="update_comentar">
                                Update
                            </button>
						</fieldset>
					</form>
                    <fieldset>
                    
						<legend><b>Comentarios</b></legend>
                        <?php
                            $id = $datos['UsuProID'];
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
									<textarea >

                                    <?php
                                       echo $row['UsuMenDes'];     
                                    ?>
                                    
                                    
                                    
                                    </textarea>
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