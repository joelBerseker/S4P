<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Agregar nuevo <span class="icon-plus"></span></button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir Juego para Intercambio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="ray">
      <form action="<?php echo $dirEjec?>/Intercambio/crud_usuarioproducto/save.php" method="POST" >
        <div class="form-row form-group ">
            <div class="col-4"><label>Nombre:</label></div>
            <div class="col"><input class="form-control form-control-sm " type="text" name="nombre" required></div>
        </div>
    <div class="form-row form-group ">
        <div class="col-4"><label>Descripción:</label></div>
        <div class="col"><input class="form-control form-control-sm " value=""type="text" name="descripcion" required></div>
    </div>
    <div class="form-row form-group ">
        <div class="col-4"><label>Juego:</label></div>
        <div class="col">
        <?php
			$querytipo=mysqli_query($conn,"SELECT ProID, ProNom FROM producto where ProEst = 1");
        ?>
        <select class="form-control col form-control-sm " id="exampleFormControlSelect1"  name="producto">
						<?php
						while($datosa = mysqli_fetch_array($querytipo)){ 
						?>
						<option value="<?php echo $datosa['ProID'] ?>"> <?php echo $datosa['ProNom'] ?> </option>
						<?php
						}
						?>
					</select>
        </div>  
    </div>
    <div class="form-row form-group ">
        <div class="col-4"><label>Precio:</label></div>
        <div class="col"><input class="form-control form-control-sm " type="text" name="precio" required ></div>
    </div>
    <div class="form-row form-group ">
        <div class="col-4"><label>Estado:</label></div>
        <div class="col">
        <select name="estado" class="form-control form-control-sm">
						<option value="1"> Activo </option>
						<option value="0"> Inactivo </option>
					</select>
        </div></div>
    

    
       <button class="btn btn-success btn-block" type="submit" name="save_product">Enviar</button>

</form>
        </div>
      </div>
     <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      --> 
    </div>
  </div>
</div>

	
	