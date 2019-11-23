<?php
include("../includes/navbar.php");
$titulo_html = "Accesos";
include("../includes/header.php");

include("../includes/data_base.php");
$recurso = "/Acceso";
include("../includes/acl.php");
?>
<div class="section2">
<div class="container pt-4">
		<div class="card p-3">
					<div class="mb-2">
						<caption>
							<?php
							include("crud_acceso/add.php")
							?>
						</caption>
					</div>
					<div class="table-responsive">
						<table class='table table-hover'>
							<thead>
								<th>Id</th>
								<th>Nombre</th>
								<th>Id del rol</th>
								<th>Id de recurso</th>
								<th>Estado</th>
								<th>Fecha de creación</th>
								<th>Editar</th>
								<th>Eliminar</th>
							</thead>
							<tbody>
								<?php
								$query = "SELECT * FROM ACCESO";
								$resultAcceso = mysqli_query($conn, $query);
								while ($row = mysqli_fetch_array($resultAcceso)) {
									?>
									<tr>
										<td><?php echo $row['AccID'] ?></td>
										<td><?php echo $row['AccDes'] ?></td>
										<td><?php echo $row['AccRolID'] ?></td>
										<td><?php echo $row['AccRecID'] ?></td>
										<td><?php echo estadosGenerales($row['AccEst']) ?></td>
										<td><?php echo $row['created_at'] ?></td>
										<td>
											<a href="crud_acceso/edit.php?id=<?php echo $row['AccID'] ?>"><button class="btn btn-warning icon-pencil"></button></a>
										</td>
										<td>
											<a href="crud_acceso/delete.php?id=<?php echo $row['AccID'] ?>">
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