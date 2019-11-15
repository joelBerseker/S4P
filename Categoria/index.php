<?php
	include("crud_tipo_producto/db.php")
?>
<?php
	include("../includes/header.php")
?>
<div class="section2">
	<div class="container">
		<div class="row justify-content-center">
		<?php
			$query = "SELECT * FROM categoria";
			$resultProduct= mysqli_query($conn, $query);
			while($row= mysqli_fetch_array($resultProduct)){
		?>
			<div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 p-3">
				<div class="card mb-4 border-0">
					<div class="img-animtion">
					<img src="mostrar.php?id=<?php echo $row['CatID']?>" alt="<?php echo $row['CatNom']?>" class="card-img-top">
				
					<!--<img src="https://images-na.ssl-images-amazon.com/images/I/51bWIMdXiML.jpg	" alt="Card image cap" class="card-img-top">
					-->
					</div>
					<div class="card-body text-center">
						<h5 class="card-title"><?php echo $row['CatNom']?></h5>
						<p class="card-text"><?php echo $row['CatDes']?></p>
						<a href="#" class="btn btn-primary">Ver más</a>
					</div>
				</div>
			</div>
		<?php } ?>
		
		</div>
	</div>
</div>

<?php
	include("../includes/footer.php")
?>