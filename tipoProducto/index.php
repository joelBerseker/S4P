
<?php
	include("crud_tipo_producto/db.php")
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
				include("crud_tipo_producto/add.php")
				?>		
			</caption>		
		</div>
		<div class="table-responsive">
			<table class='table table-hover'>
				<thead>
					<th>NOMBRE</th>
					<th>ESTADO</th>
					<th>FECHA DE CREACION</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</thead>
				<tbody>
				<?php
				$query = "SELECT * FROM categoria";
				$resultProduct= mysqli_query($conn, $query);
				while($row= mysqli_fetch_array($resultProduct)){
				?>
					<tr>
						<td><?php echo $row['CatNom']?></td>
						<td><?php echo $row['CatEst']?></td>
						<td><?php echo $row['created_at']?></td>
						
						<td>
							<a href="crud_tipo_producto/edit.php?id=<?php echo $row['CatID']?>">
								<button class="btn btn-warning icon-pencil"></button>
							</a>
						</td>
						<td>
							<a href="crud_tipo_producto/delete.php?id=<?php echo $row['CatID']?>">
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
</div>
</div>

<?php
	include("../includes/footer.php")
?>
	