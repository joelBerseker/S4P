<?php
include("../includes/navbar.php");
$categoria=true;
$titulo_html="Categorias";
include("../includes/header.php");
include("../includes/data_base.php");
?>
<nav aria-label="breadcrumb" >
  <ol class="breadcrumb" style="border-radius: 0px; margin-bottom: 0px!important; padding-left: 48px;">
  	<li class="breadcrumb-item"><a href="/S4P">Inicio</a></li>
  	<li class="breadcrumb-item active" aria-current="page">Categorias</li>
  </ol>
</nav>
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
					<div class="imageny" style="background-image:url('mostrar.php?id=<?php echo $row['CatID']?>');"></div>
					<!--<img src="https://images-na.ssl-images-amazon.com/images/I/51bWIMdXiML.jpg	" alt="Card image cap" class="card-img-top">
					-->
					</div>
					<div class="card-body text-center">
						<h5 class="card-title"><?php echo $row['CatNom']?></h5>
						<textarea disabled class="descrip text-center" ><?php echo $row['CatDes']?></textarea>
						<a href="VerProductos?id=<?php echo $row['CatID']?>" class="btn btn-primary">Ver más</a>
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