<?php
include("includes/navbar.php");
$inicio = true;
$titulo_html = "Inicio";
include("includes/header.php");
include("includes/data_base.php")
?>

<div id="section1" class="wrapper">
	<div id="demo" class="carousel slide" data-ride="carousel">
		<ul class="carousel-indicators">
			<li data-target="#demo" data-slide-to="0" class="active"></li>
			<li data-target="#demo" data-slide-to="1"></li>
			<li data-target="#demo" data-slide-to="2"></li>
		</ul>
		<div class="carousel-inner" role="listbox">

			<div class="carousel-item active">
				<img src="https://as.com/meristation/imagenes/2019/06/12/avances/1560319812_891153_1560322849_noticia_normal.jpg" alt="personas" class="d-block img-fluid w-100">
			</div>

			<div class="carousel-item">
				<img src="frontend/img/call.of.duty.carousel.jpg" alt="personas" class="d-block img-fluid w-100">
			</div>

			<div class="carousel-item">
				<img src="https://as.com/meristation/imagenes/2018/07/28/reportajes/1532731055_823812_1533125888_noticia_normal.jpg" alt="torres" class="d-block img-fluid w-100">
			</div>

		</div>
	</div>
</div>

<div class="section2 pt-3">
	<div class="container">
		<div class="row justify-content-center">

			<?php
			$query = "SELECT * FROM categoria";
			$resultProduct = mysqli_query($conn, $query);
			$i = 0;
			while ($row = mysqli_fetch_array($resultProduct)) {
				?>
				<div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 p-3">
					<div class="card mb-4 border-0">
						<div class="img-animtion">
							<div class="imageny" style="background-image:url('Categoria/mostrar.php?id=<?php echo $row['CatID'] ?>');"></div>
							<!--<img src="https://images-na.ssl-images-amazon.com/images/I/51bWIMdXiML.jpg	" alt="Card image cap" class="card-img-top">
					-->
						</div>
						<div class="card-body text-center">
							<h5 class="card-title"><?php echo $row['CatNom'] ?></h5>
							<textarea disabled class="descrip text-center"><?php echo $row['CatDes'] ?></textarea>
							<a href="VerProductos?id=<?php echo $row['CatID'] ?>" class="btn btn-primary">Ver más</a>
						</div>
					</div>
				</div>
			<?php
				$i++;
				if ($i > 2) {
					break;
				}
			}
			?>

		</div>
	</div>
</div>

<?php
include("includes/footer.php")
?>