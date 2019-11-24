<?php 
  include("../includes/global_variable.php");
?>
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Agregar nuevo <span class="icon-plus"></span></button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="ray">
          <form action="crud_product/save.php" method="POST" enctype="multipart/form-data">
            <div class="form-row form-group ">
              <div class="col" align="center" >
                <img src="<?php echo $dirEjec?>/image/objeto-sin-imagen.png"  class="img-fluid"id="imagenmuestra" alt="Img blob" />
              </div>
            </div>
            <div class="form-row form-group ">
              <div class="col-4"><label>Nombre:</label></div>
              <div class="col"><input class="form-control form-control-sm " type="text" name="nombre" required></div>
            </div>
            <div class="form-row form-group ">
              <div class="col-4"><label>Descripción:</label></div>
              <div class="col"><input class="form-control form-control-sm " value="" type="text" name="description" required></div>
            </div>
            <div class="form-row form-group ">
              <div class="col-4"><label>Categoría:</label></div>
              <div class="col">
                <?php
                $querytipo = mysqli_query($conn, "SELECT CatID, CatNom FROM categoria where CatEst = 1");
                ?>
                <select class="form-control col form-control-sm " id="exampleFormControlSelect1" name="tipo_producto">
                  <?php
                  while ($datosa = mysqli_fetch_array($querytipo)) {
                    ?>
                    <option value="<?php echo $datosa['CatID'] ?>"> <?php echo $datosa['CatNom'] ?> </option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-row form-group ">
              <div class="col-4"><label>Precios:</label></div>
              <div class="col"><input class="form-control form-control-sm " type="text" name="precio" required></div>
            </div>
            <div class="form-row form-group ">
              <div class="col-4"><label>Imagen:</label></div>
              <div class="col">
                <input type="file" name="myFile" accept="image/* " class="form-control-file" id="imagen">
              </div>
              <div class="offset-5 col-7">
                <input type="hidden" class="form-control" name="imagenactual" id="imagenactual">

              </div>
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