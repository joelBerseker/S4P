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
	                include("crud_product/add.php")
	            ?>
			</caption>		
		</div>
		

		<div class="table-responsive">
			<table class='table table-hover' >
				<thead>
					<th>Nombre</th>
					<th>Precio</th>
					<th>Imagen</th>
					<th>Categoria</th>
					<th>Estado</th>
					<th>Acciones</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</thead>
				<tbody id="myList">
				<?php
				$query = "SELECT * FROM producto ";
				$resultProduct= mysqli_query($conn, $query);
				while($row= mysqli_fetch_array($resultProduct)){
				?>
					<tr>
						<td><?php echo $row['ProNom']?></td>
						<td><?php echo $row['ProPre']?></td>
						<td> <img src="mostrar.php?id=<?php echo $row['ProID']?>" width="75" alt="Img blob" /> </td>
						<td><?php echo $row['ProCatID']?></td>
						<td><?php echo estadosGenerales($row['ProEst'])?></td>
						<td><?php echo $row['created_at']?></td>						
						<td>
							<a href="crud_product/edit.php?id=<?php echo $row['ProID']?>">
								<button class="btn btn-warning icon-pencil"></button>
							</a>
						</td>
						<td>
							<a href="crud_product/delete.php?id=<?php echo $row['ProID']?>">
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
	