<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Agregar nuevo <span class="icon-plus"></span></button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <!--C:\xampp\htdocs\S4P\Categoria\crud_tipo_producto\save.php-->
      <form action="crud_usuario/save.php" method="POST"  enctype="multipart/form-data">
					<div class="form-group">
						<input type="text" name="nombre" class="form-control" placeholder="nombre del usuario" autofocus>
					</div>
					<div class="form-group">
						<input type="text" name="correo" class="form-control" placeholder="correo del usuario" >
					</div>
					<div class="form-group">
						<input type="password" name="contraseña" class="form-control" placeholder="contraseña del usuario" >
					</div>
					<p>Seleccione el estado</p>
					<select name="estado" class="form-control">
						<option value="1"> Activo </option>
						<option value="0"> Inactivo </option>
					</select><br>
					<div class="form-row form-group ">
         				 <div class="col"><input type="file" name="myFile" accept="image/* "class="form-control-file"></div>
     				 </div>
					<p>Seleccione el rol</p>
					
					<?php
					$querya=mysqli_query($conn,"SELECT RolID, RolNom FROM ROL");
					?>
					<select name="rol" class="form-control">
						<?php
						while($datosa = mysqli_fetch_array($querya)){ 
						?>
						<option value="<?php echo $datosa['RolID'] ?>"> <?php echo $datosa['RolNom'] ?> </option>
						<?php
						}
						?>
					</select>
					<hr>
					<input type="submit" class="btn btn-success btn-block" name="save_acceso" value="Enviar">
				</form>


      </div>
     <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      --> 
    </div>
  </div>
</div>

	