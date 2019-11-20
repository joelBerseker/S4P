
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Agregar nuevo <span class="icon-plus"></span></button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir Recurso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="crud_recurso/save.php" method="POST">
    <div class="form-row form-group ">
        <div class="col-4"><label>Nombre:</label></div>
        <div class="col"><input class="form-control form-control-sm " value=""type="text" name="description" required></div>
    </div>
    
    <div class="form-row form-group ">
        <div class="col-4"><label>Seleccione el estado:</label></div>
        <div class="col">
        <select name="estado" class="form-control">
						<option value="1"> Activo </option>
						<option value="0"> Inactivo </option>
					</select>
        </div>
    </div>
   
    
       <button class="btn btn-success btn-block" type="submit" name="save_product">Enviar</button>

</form>
      </div>
     <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      --> 
    </div>
  </div>
</div>

	