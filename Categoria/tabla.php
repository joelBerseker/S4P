<?php
include("../includes/sesion.php");
include("../includes/navbar.php");
$categoria = true;
$titulo_html = "Categorias";
include("../includes/header.php");
include("../includes/data_base.php");
$recurso = "/Categoria/tabla";
include("../includes/acl.php");
?>
<div class="section2">
<div class="container pt-4">
		<div class="card p-3">
					<div class="mb-2">
				<caption>
					<?php
					include("crud_tipo_producto/add.php")
					?>
				</caption>
			</div>
			<div class="table-responsive">
				<table class='table table-hover'>
					<thead>
						<th>Nombre</th>
						<th>Descripción</th>
						<th>Estado</th>
						<th>Fecha de Creación</th>
						<th>Imagen</th>
						<th>Editar Imagen</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</thead>
					<tbody>
						<?php
						$query = "SELECT * FROM categoria";
						$resultProduct = mysqli_query($conn, $query);
						while ($row = mysqli_fetch_array($resultProduct)) {
							?>
							<tr>
								<td><?php echo $row['CatNom'] ?></td>
								<td><?php echo $row['CatDes'] ?></td>
								<td><?php echo estadosGenerales($row['CatEst']) ?></td>
								<td><?php echo $row['created_at'] ?></td>
								<td><img src="mostrar.php?id=<?php echo $row['CatID'] ?>"  width="75" alt="Img blob"></td>
								<td>
									<?php
										include("crud_tipo_producto/editImagen.php")
									?>
								</td>
								<td>
									<a href="crud_tipo_producto/edit.php?id=<?php echo $row['CatID'] ?>">
										<button class="btn btn-warning icon-pencil"></button>
									</a>
								</td>
								<td>
									<a href="crud_tipo_producto/delete.php?id=<?php echo $row['CatID'] ?>">
										<button class="btn btn-danger icon-cross"></button>
									</a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<?php
include("../includes/footer.php")
?>