<?php
	$index_pri   = true; 
	$index_pro   = true;
	$index_prov  = true;
	$index_rol   = true;
	$index_tra   = true;
	$index_rec   = true;
	$index_acc   = true;
	$index_mar   = true;
	$index_tp    = false;
?>
<?php
	include("crud_rol/db.php")
?>
<?php
	include("../includes/header.php")
?>
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
				$query = "SELECT * FROM ROL ";
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


				<?php } ?>
				</tbody>
			</table
			>
		</div>
	</div>
</div><br><br><br>
</div>

<?php
	include("../includes/footer.php")
?>
	