<?php
include("../includes/sesion.php");
include("../includes/navbar.php");
$login = true;
$titulo_html = "Roles";
include("../includes/header.php");
include("../includes/data_base.php");
$recurso = "/Rol";
include("../includes/acl.php");

?>

<div class="section2">
<div class="container pt-4">
		<div class="card p-3">
					<div class="mb-2">
						<caption>
							<?php
							include("crud_rol/add.php")
							?>
						</caption>
					</div>
					<div class="table-responsive">
						<table class='table table-hover'>
							<thead>
								<th>ID</th>
								<th>Nombre</th>
								<th>Estado</th>
								<th>Fecha de Creación</th>
								<th>Editar</th>
								<th>Eliminar</th>
							</thead>
							<tbody>
								<?php
								$query = "SELECT * FROM rol ";
								$resultProduct = mysqli_query($conn, $query);
								while ($row = mysqli_fetch_array($resultProduct)) {
									?>
									<tr>
										<td><?php echo $row['RolID'] ?></td>
										<td><?php echo $row['RolNom'] ?></td>
										<td><?php echo $row['RolEst'] ?></td>
										<td><?php echo $row['created_at'] ?></td>

										<td>
											<a href="crud_rol/edit.php?id=<?php echo $row['RolID'] ?>">
												<button class="btn btn-warning icon-pencil"></button>
											</a>
										</td>
										<td>
											<a href="crud_rol/delete.php?id=<?php echo $row['RolID'] ?>">
												<button class="btn btn-danger icon-cross"></button>
											</a>
										</td>
									</tr>


								<?php } ?>
							</tbody>
						</table>
					</div>
		</div>
	</div><br><br><br>
</div>

<?php
include("../includes/footer.php")
?>