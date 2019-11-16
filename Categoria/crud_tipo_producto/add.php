<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Agregar</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir Tipo Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <!--C:\xampp\htdocs\S4P\Categoria\crud_tipo_producto\save.php-->
      <form action="crud_tipo_producto/save.php" method="POST"  enctype="multipart/form-data">
    <div class="form-row form-group ">
        <div class="col-4"><label>Nombre:</label></div>
        <div class="col"><input class="form-control form-control-sm " value=""type="text" name="nombre" required></div>
    </div>
    <div class="form-row form-group ">
        <div class="col-4"><label>Descripcion:</label></div>
        <div class="col"><input class="form-control form-control-sm " value=""type="text" name="descripcion" required></div>
    </div>
    <div class="form-row form-group ">
          <div class="col-5"><label>Imagen:</label></div>
          <div class="col"><input type="file" name="myFile" accept="image/* "class="form-control-file"></div>
    </div>
    <div class="form-row form-group ">
        <div class="col-4"><label>Estado:</label></div>
        <div class="col"><input class="form-control form-control-sm " type="text" name="estado" required ></div>
    </div>
    
       <button class="btn btn-success btn-block" type="submit" name="save_product">Agregar</button>

</form>
      </div>
     <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      --> 
    </div>
  </div>
</div>

	