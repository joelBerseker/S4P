<?php
	$inicio 		=	false;
	$producto		=	false;
	$categoria		=	false;
	$contactanos	=	false;
	$nosotros		=	false;
	$login			=	true;
	
?>

<?php
	$men="Usuario";
	include("../includes/header.php");
?>
<?php
	include("crud_usuario/db.php")
?>
<div class="section2"><br><br>
	<div class="container">
		<div class="row">
		<div class="mb-1">
			<caption>
				<?php
				//Usuario\crud_usuario\add.php
				include("crud_usuario/add.php")
				?>		
			</caption>		
		</div>
			<div class="col-sm-12 ">
			<div class="table-responsive">
				<table class='table table-bordered'>
					<thead>
						<th>Id</th>
						<th>Nombre</th>
						<th>Correo</th>
						<th>Imagen</th>
						<th>Id del rol</th>
						<th>Estado</th>
						<th>Fecha de creacion</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</thead>
					<tbody>
					<?php
					$query = "SELECT * FROM USUARIO";
					$resultAcceso= mysqli_query($conn, $query);
					while($row= mysqli_fetch_array($resultAcceso)){
					?>
						<tr>
							<td><?php echo $row['UsuID']?></td>
							<td><?php echo $row['UsuNom']?></td>
							<td><?php echo $row['UsuCor']?></td>
							<td><img src="mostrar.php?id=<?php echo $row['UsuID']?>" width="100" alt="Img blob" /></td>
							<td><?php echo $row['UsuRolID']?></td>
							<td><?php echo $row['UsuEst']?></td>
							<td><?php echo $row['created_at']?></td>
							<td>
								<a href="crud_usuario/edit.php?id=<?php echo $row['UsuID']?>">
									<button class="btn btn-warning icon-pencil"></button>
								</a>
							</td>
							<td>
								<a href="crud_usuario/delete.php?id=<?php echo $row['UsuID']?>">
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
</div>
</div><br><br><br>
</div>

<?php
	include("../includes/footer.php")
?>
	