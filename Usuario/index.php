<?php
	$index_pri   = true; 
	$index_pro   = true;
	$index_prov  = true;
	$index_rol   = true;
	$index_tra   = true;
	$index_rec   = true;
	$index_acc   = false;
?>
<?php
	include("crud_usuario/db.php")
?>
<?php
	include("../includes/header.php")
?>

<div class="section2"><br><br>
	<div class="container p-3">
		<div class="card mb-4 p-3">
			<div class="row">
				<div class="col-sm-12 col-md-5 col-lg-4 col-xl-4">
					<?php
						if(isset($_SESSION['message'])){
					?>
				<div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
					<?=$_SESSION['message'] ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>

			<?php 
				session_unset();
			}
			?>
			<div class="card card-body">
				<form action="crud_usuario/save.php" method="POST">
					<div class="form-group">
						<input type="text" name="nombre" class="form-control" placeholder="nombre del usuario" autofocus>
					</div>
					<div class="form-group">
						<input type="text" name="correo" class="form-control" placeholder="correo del usuario" >
					</div>
					<div class="form-group">
						<input type="text" name="imagen" class="form-control" placeholder="imagen del usuario" >
					</div>

					<p><br>Seleccione el rol</p>
					
					<?php
					$querya=mysqli_query($conn,"SELECT RolID, RolNom FROM ROL");
					?>
					<select name="rol" class="form-control">
						<?php
						while($datosa = mysqli_fetch_array($querya)){ 
						?>
						<option value="<?php echo $datosa['RolID'] ?>"> <?php echo $datosa['RolNom'] ?> </option>
						<?php
						}
						?>
					</select>
					<hr>
					<input type="submit" class="btn btn-success btn-block" name="save_acceso" value="Enviar">
				</form>
			</div>
		</div>
		<div class="col-sm-12 col-md-7 col-lg-8 col-xl-8">
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
						<td><?php echo $row['UsuImg']?></td>
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
</div><br><br><br>
</div>

<?php
	include("../includes/footer.php")
?>
	