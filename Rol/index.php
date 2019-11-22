<?php
include("../includes/navbar.php");
$login = true;
$titulo_html = "Roles";
include("../includes/header.php");
include("../includes/data_base.php");
$recurso = "/Rol";
include("../includes/acl.php");

?>

<<<<<<< HEAD
<div class="section2">
	<div class="container pt-4">
		<div class="card p-3">

			<div class="row">

				<div class="col-sm-12">
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
								<th>NOMBRE</th>
								<th>ESTADO</th>
								<th>FECHA DE CREACION</th>
								<th>Editar</th>
								<th>Eliminar</th>
							</thead>
							<tbody>
								<?php
								$query = "SELECT * FROM ROL ";
								$resultProduct = mysqli_query($conn, $query);
								while ($row = mysqli_fetch_array($resultProduct)) {
									?>
									<tr>
										<td><?php echo $row['RolID'] ?></td>
										<td><?php echo $row['RolNom'] ?></td>
										<td><?php echo $row['RolEst'] ?></td>
										<td><?php echo $row['created_at'] ?></td>
=======
<div class="section2"><br><br>
	<div class="container p-3">
	<div class="card mb-4 p-3">
		<div class="mb-1">
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
					<th>NOMBRE</th>
					<th>ESTADO</th>
					<th>FECHA DE CREACION</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</thead>
				<tbody>
				<?php
				$query = "SELECT * FROM ROL   WHERE RolID >2";
				$resultProduct= mysqli_query($conn, $query);
				while($row= mysqli_fetch_array($resultProduct)){
				?>
					<tr>
						<td><?php echo $row['RolID']?></td>
						<td><?php echo $row['RolNom']?></td>
						<td><?php echo $row['RolEst']?></td>
						<td><?php echo $row['created_at']?></td>
						
						<td>
							<a href="crud_rol/edit.php?id=<?php echo $row['RolID']?>">
								<button class="btn btn-warning icon-pencil"></button>
							</a>
						</td>
						<td>
							<a href="crud_rol/delete.php?id=<?php echo $row['RolID']?>">
								<button class="btn btn-danger icon-cross"></button>
							</a>
						</td>
					</tr>
>>>>>>> 415fa629b79bd717745af1a06b5e1f2fcfdddaf9

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
			</div>
		</div>
	</div><br><br><br>
</div>

<?php
include("../includes/footer.php")
?>