<?php
	$inicio 		=	true;
	$producto		=	false;
	$categoria		=	false;
	$contactanos	=	false;
	$nosotros		=	false;
	$login			=	false;
	
	$men= "INICIO";
	include("includes/header.php");
?>

	<div id="section1" class="wrapper" >
		<div id="demo" class="carousel slide" data-ride="carousel">
			<ul class="carousel-indicators">
				<li data-target="#demo" data-slide-to="0" class="active"></li>
				<li data-target="#demo" data-slide-to="1"></li>    
				<li data-target="#demo" data-slide-to="2"></li>    
			</ul>
			<div class="carousel-inner role="listbox"">

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

<div class="section2">
	<div class="container">
		<div class="row justify-content-center">

			<div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 p-3">
				<div class="card mb-4 border-0">
					<div class="img-animtion">
						<img src="https://images-na.ssl-images-amazon.com/images/I/51bWIMdXiML.jpg" alt="Card image cap" class="card-img-top">
					</div>
					<div class="card-body text-center">
						<h5 class="card-title">...</h5>
						<p class="card-text text-justify">oamsmdmwmamdmasmmamamsd</p>
						<a href="#" class="btn btn-primary">Learn More...</a>
					</div>
				</div>
			</div>

			<div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 p-3 ">
				<div class="card border-0">
					<div class="img-animtion">
						<img src="https://m.media-amazon.com/images/M/MV5BNzg4YjZkNDUtNWIxZC00YzNiLWJkY2UtNjBjZjdjN2JlYzY1XkEyXkFqcGdeQXVyMzY0MTE3NzU@._V1_SY1000_SX1000_AL_.jpg" alt="Card image cap" class="card-img-top img-fluid">
					</div>
					<div class="card-body text-center">
						<h5 class="card-title">...</h5>
						<p class="card-text">amsmsqoamsmdmwmamdmasmmamamsd</p>
						<a href="#" class="btn btn-primary">Learn More...</a>
					</div>
				</div>
			</div>

			<div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 p-3">
				<div class="card border-0 mb-4">
					<div class="img-animtion">
						<img src="https://i1.sndcdn.com/artworks-000571274915-1vt9p6-t500x500.jpg" alt="Card image cap" class="card-img-top img-fluid">
					</div>
					<div class="card-body text-center">
						<h5 class="card-title">...</h5>
						<p class="card-text">amsmsqoamsmdmwmamdmasmmamamsd</p>
						<a href="#" class="btn btn-primary">Learn More...</a>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<?php
	include("includes/footer.php")
?>