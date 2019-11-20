<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal2" data-whatever="@mdo">Editar Imagen</button>
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Imagen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--
                    C:\xampp\htdocs\S4P\Categoria\crud_tipo_producto\save.php
                    Categoria\crud_tipo_producto\editimagedb.php
                --> 
                <form action="crud_tipo_producto\editimagedb.php?id=<?php echo $row['CatID'] ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-row form-group ">
                        <div class="col-5"><label>Nombre:</label></div>
                        <div class="col"><input type="text" name="" value="<?php echo $row['CatNom'] ?>" class="form-control-file"></div>
                    </div>
                    <div class="form-row form-group ">
                        <div class="col-5"><label>Imagen:</label></div>
                        <div class="col"><input type="file" name="myFile" accept="image/* " class="form-control-file"></div>
                    </div>
                    <button class="btn btn-success btn-block" type="submit" name="save_edit_imagen">Editar</button>
                </form>
            </div>
            <!-- 
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 </div>
            -->
        </div>
    </div>
</div>