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
                <form action="crud_acceso/save.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="nombre" class="form-control" placeholder="nombre del acceso" autofocus>
                    </div>
                    <p>Seleccione el rol</p>

                    <?php
                    $querya = mysqli_query($conn, "SELECT RolID, RolNom FROM ROL");
                    ?>
                    <select name="rol" class="form-control">
                        <?php
                        while ($datosa = mysqli_fetch_array($querya)) {
                            ?>
                            <option value="<?php echo $datosa['RolID'] ?>"> <?php echo $datosa['RolNom'] ?> </option>
                        <?php
                        }
                        ?>
                    </select>
                    <p><br>Seleccione el recurso</p>
                    <?php
                    $queryb = mysqli_query($conn, "SELECT RecID, RecNom FROM RECURSO");
                    ?>
                    <select name="recurso" class="form-control">
                        <?php
                        while ($datosb = mysqli_fetch_array($queryb)) {
                            ?>
                            <option value="<?php echo $datosb['RecID'] ?>"> <?php echo $datosb['RecNom'] ?> </option>
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