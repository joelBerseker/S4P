<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">ADD</button>
<?php
			$querytipo=mysqli_query($conn,"SELECT ID_TIPO_PRODUCTO, DSC_TIPO_PRODUCTO FROM tb_tipo_producto");
?>
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
      <form action="crud_product/save.php" method="POST">
        <div class="form-row form-group ">
            <div class="col-5"><label>Nombre:</label></div>
            <div class="col"><input class="form-control form-control-sm " type="text" name="nombre" required></div>
        </div>
    <div class="form-row form-group ">
        <div class="col-5"><label>Descripcion:</label></div>
        <div class="col"><input class="form-control form-control-sm " value=""type="text" name="description" required></div>
    </div>
    <div class="form-row form-group ">
        <div class="col-5"><label>Tipo de producto:</label></div>
        <div class="col">
        <?php
			$querytipo=mysqli_query($conn,"SELECT ID_TIPO_PRODUCTO, DSC_TIPO_PRODUCTO FROM tb_tipo_producto");
        ?>
        <select class="form-control col form-control-sm " id="exampleFormControlSelect1"  name="tipo_producto">
						<?php
						while($datosa = mysqli_fetch_array($querytipo)){ 
						?>
						<option value="<?php echo $datosa['ID_TIPO_PRODUCTO'] ?>"> <?php echo $datosa['DSC_TIPO_PRODUCTO'] ?> </option>
						<?php
						}
						?>
					</select>
        </div>  
    </div>
    
    <div class="form-row form-group "> 
        <div class="col-5"><label>Proveedor:</label></div>
        <div class="col">
        <?php
			$queryb=mysqli_query($conn,"SELECT id_proveedor, nombre FROM proveedor");
		?>
		<select class="form-control col form-control-sm " id="exampleFormControlSelect1" name="proveedor">
			<?php
		    	while($datosb = mysqli_fetch_array($queryb)){ 
			?>
			<option value="<?php echo $datosb['id_proveedor'] ?>"> <?php echo $datosb['nombre'] ?> </option>
			<?php
				}
			?>
		</select>
            
           
        </div>
    </div>
    
    <div class="form-row form-group ">
        <div class="col-5"><label>Marca:</label></div>
        <div class="col">
        <?php
			$queryc=mysqli_query($conn,"SELECT ID_MARCA, nombre FROM tb_marca");
		?>
		<select class="form-control col form-control-sm " id="exampleFormControlSelect1" name="marca">
			<?php
		    	while($datosc = mysqli_fetch_array($queryc)){ 
			?>
			<option value="<?php echo $datosc['ID_MARCA'] ?>"> <?php echo $datosc['nombre'] ?> </option>
			<?php
				}
			?>
		</select>
        </div>
    </div>
    <div class="form-row form-group ">
        <div class="col-5"><label>Precios:</label></div>
        <div class="col"><input class="form-control form-control-sm " type="text" name="precio" required ></div>
    </div>
    <div class="form-row form-group ">
        <div class="col-5"><label>Stock minimo:</label></div>
        <div class="col"><input class="form-control form-control-sm " type="text" name="minimo" required"></div>
    </div>
    
    <div class="form-row form-group ">
        <div class="col-5"><label>Cantidad inicial:</label></div>
        <div class="col"><input class="form-control form-control-sm " type="text" name="cantidad" required ></div>
    </div>
    
       <button class="btn btn-dark btn-sm col" type="submit" name="save_product">Agregar</button>

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

	
	