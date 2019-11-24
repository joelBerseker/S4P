<?php
include("../includes/sesion.php");


include("../includes/navbar.php");
$producto=true;
$titulo_html="Productos";
include("../includes/header.php");
include("../includes/data_base.php");
$recurso="/Producto/tabla";
include("../includes/acl.php");
?>
<div class="section2">
<div class="container pt-4">
		<div class="card p-3">
					<div class="mb-2">
			<caption>   
	            <?php
	                include("crud_usuarioproducto/add.php")
	            ?>
			</caption>		
		</div>
		

		<div class="table-responsive">
			<table class='table table-hover' >
				<thead>
					<th>Precio</th>
					<th>Descripción</th>
					<th>Imagen</th>
					<th>Estado</th>
					<th>Acciones</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</thead>
				<tbody id="myList">
				<?php
				$query = "SELECT * FROM usuario_producto";
				$resultProduct= mysqli_query($conn, $query);
				while($row= mysqli_fetch_array($resultProduct)){
				?>
					<tr>
						<td><?php echo $row['UsuProPre']?></td>
						<td><?php echo $row['UsuProDes']?></td>
						<td> <img src="mostrar.php?id=<?php echo $row['UsuProProID']?>"  width="75" alt="Img blob" /> </td>
						<td><?php echo $row['usuProEst']?></td>
						<td><?php echo $row['created_at']?></td>						
						<td>
							<a href="crud_usuarioproducto/edit.php?id=<?php echo $row['UsuProID']?>">
								<button class="btn btn-warning icon-pencil"></button>
							</a>
						</td>
						<td>
							<a href="crud_usuarioproducto/delete.php?id=<?php echo $row['UsuProID']?>">
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
	