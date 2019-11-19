<?php
	$inicio 		=	false;
	$producto		=	false;
	$categoria		=	false;
	$contactanos	=	false;
	$nosotros		=	false;
	$login			=	true;
	
	$men= "Recurso";
?>

<?php
	include("../includes/header.php")
?>
<?php
	include("crud_recurso/db.php");
	$recurso="/Recurso";
	include("../includes/acl.php");
?>

<div class="section2"><br><br>
<div class="container p-3">
	<div class="card mb-4 p-3">
		<div class="mb-1">
			<caption>
				<!--<br> <br><br><br>-->     
	            <?php
	                include("crud_recurso/add.php")
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
				$query = "SELECT * FROM RECURSO ";
				$resultProduct= mysqli_query($conn, $query);
				while($row= mysqli_fetch_array($resultProduct)){
				?>
					<tr>
						<td><?php echo $row['RecID']?></td>
						<td><?php echo $row['RecNom']?></td>
						<td><?php echo $row['RecEst']?></td>
						<td><?php echo $row['created_at']?></td>
						
						<td>
							<a href="crud_recurso/edit.php?id=<?php echo $row['RecID']?>">
								<button class="btn btn-warning icon-pencil"></button>
							</a>
						</td>
						<td>
							<a href="crud_recurso/delete.php?id=<?php echo $row['RecID']?>">
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
</div>	<br><br><br>
</div>


<?php
	include("../includes/footer.php")
?>
	