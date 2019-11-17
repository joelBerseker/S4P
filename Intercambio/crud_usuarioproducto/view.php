
<?php 
    include("db.php");
    
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
    if(isset($_POST['comentario'])){
        $comentario      = $_POST['precio'];
        $mysqli = new mysqli("localhost", "root", "", "s4p");
        $stmt = $mysqli->prepare("UPDATE usuario_producto SET `UsuProProID`=?, `UsuProPre`=?,`UsuProEst`=?,`UsuProDes`=? WHERE UsuProID=?");
        /* BK: always check whether the prepare() succeeded */
        if ($stmt === false) {
        trigger_error($this->mysqli->error, E_USER_ERROR);
        return;
        }
        
        /* Bind our params */
        /* BK: variables must be bound in the same order as the params in your SQL.
        * Some people prefer PDO because it supports named parameter. */
        $stmt->bind_param('idisi',$producto,$precio,$estado,$description, $id);
        /* Set our params */
        /* BK: No need to use escaping when using parameters, in fact, you must not, 
        * because you'll get literal '\' characters in your content. */
        /* Execute the prepared Statement */
        $status = $stmt->execute();
        /* BK: always check whether the execute() succeeded */
        if ($status === false) {
        trigger_error($stmt->error, E_USER_ERROR);
        }
        header("Location: ../tabla.php");
                



    }
?>
<div>
		<div>
			<div >
				<div >
					<fieldset>
						<legend>
							<b>
                            <?php
                                aca va el nombre del 

                            
                            ?>
                            <?php
                                aca va el precio

                            
                            ?>
                            
                            </b>
						</legend>
						
						<div>
						<?php 
						<img src="/serve?blob-key=AMIfv95cXV2Mca58v0rMEQavAvV1Cua9Gh-PpWkjOnUBlauJvxg1lmZ9qDuBRkVWDAWfcoMDBqVk5Cr_X6G7WyTPEkr6gvqySTWFRKIuFx-hks2mFXSgbxbthudMsGIGNpSobroorbp-ApTg6TYAtPzFmWVqYmgc874dLa1KBJ912gsobJI9YgnjTBWZR6-6RuMAAqE1S-FAVa_ne0Be-Cz3Bzq13Amn38C3tsSm_mKiZpi_YApk3D_DJPmxCOvc1L28C8uMHE2VDcvujKFixZWIDnS-vsFnRkv2Az99EVGH079lezdbILg" style="height: 100%; width: 100%" alt="Imagen del Evento" class="img-fluid">
                        aca va la imagen
                        
                        
                        ?>
						</div>
                    	<?php		
                        <textarea >
                            descripcion
                        </textarea>
                      
                        ?>
					</fieldset>
							
					

				</div>
				<div >
					<form action=view.php?id=<?php echo $_GET['id']?> method="post">
						<fieldset>
							<legend><b>Agregar Comentario</b></legend>
							<textarea class="offset-0 col-12 form-control"
								placeholder="Agregar comentario" name="comentario" required></textarea>
							<input type="hidden" name="comentario" value="<?php aca va el id de usuario_producto ?>" /> <input
								type="submit" class="offset-6 col-6 btn btn-dark pad" /> <br>
						</fieldset>
					</form>
					<fieldset>
						
						<legend><b>Comentarios</b></legend>
						<!-- Esto desde aqui se va repetir -->
						
						
						<div >
							<div >
								<div >
                                <?php 
                                    Aca va la foto de perfil de quien ha hecho un comentario
                                    ?>
									<img  src="/serve?blob-key=AMIfv95BQb6Pci900WikidXOsZWpGS4XKTN3Jawmb69XhoO20tbQ8HTwkZQktJ9HTAUsRD34s6q3RRFDq6Z1XEut-lTm-OlrubhNCAjqWOzvmYd6dye65QKhgC9AYo1FUAvLH8B73HAioz6VXleMuME9JUkRTmHhEO4dZsVAPRUL4BhZ7kSo2LZiwem73U75dqo13IKUwODWyiE0NVHPFd_fK7XBb2QLz5gDdULlveyLlgKcypLrs6xRaxoF1hKjYf_n_gSV7kof0uNL3-56Yu7H1zqEWKcf4A" alt="Imagen del autor del comentario" class="rounded-circle img-thumbnail"/>
								</div>
								<div >
									<label ><b>
                                    <?php 
                                    Aca va el nombre de quen ha hecho un comentario
                                    ?>
                                    
                                    </b></label><br>
									<textarea >

                                    <?php
                                            Agregando un comentario
                                    ?>
                                    
                                    
                                    
                                    </textarea>
								</div> 
							</div>
						</div>
					
						
						<!--  hasta aqui para los comentarios-->
					</fieldset>
				</div>
			</div>
		</div>

	</div>


<?php
	include("../includes/footer.php")
?>