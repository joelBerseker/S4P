<?php
include("../includes/sesion.php");
$titulo_html="Productos";
include("../includes/header.php");
include("../includes/global_variable.php");
include("../includes/navbar.php");

include("../includes/data_base.php");
?>
<nav aria-label="breadcrumb" >
  <ol class="breadcrumb" style="border-radius: 0px; margin-bottom: 0px!important; padding-left: 48px;">
  <li class="breadcrumb-item"><a href="/<?php echo $dirEjec?>">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Productos</li>
	
  </ol>
  
</nav>
<div class="section2">
	<div class="container">
		<div class="row justify-content-center">
		<div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 p-3 ">
				<div class="card mb-4 border-0">
					<div class="img-animtion">
						<div class="imageny2" style="background-image:url('../image/add.jpg');"></div>
					</div>
					<div class="card-body text-center" style="padding-top: 28px;">
						<h5 class="card-title">AGREGAR PRODUCTO</h5>
						<textarea disabled class="descrip text-center" >Haz click en el boton para agregar una publicación </textarea>
							<?php
							include("crud_usuarioproducto/add.php")
							?>			
					</div>
				</div>
			</div>
			<?php
				$query = "SELECT * FROM usuario_producto";
				$resultProduct= mysqli_query($conn, $query);
				while($row= mysqli_fetch_array($resultProduct)){
			?>
			
			<!-- Inicio while -->
			<div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 p-3 ">
				<div class="card mb-4 border-0">
					<div class="img-animtion">
						<div class="imageny2" style="background-image:url('mostrar.php?id=<?php echo $row['UsuProProID']?>"></div>
					</div>
					<div class="">
						<h4>
							<span class="card-title" style="background-color: rgba(0,0,0,0.3);
								display: block;
								position: absolute;
								top: 200px;
								right: 0;
								padding: 5px;
								color:#CACACA;">S/. 
								<?php echo $row['UsuProPre'];?>
							</span>
						</h4>
  					</div>
					<div class="card-body text-center">
						<h5 class="card-title"><?php echo $row['UsuProNom'];?></h5>
						<textarea disabled class="descrip text-center" ><?php echo $row['UsuProDes'];?></textarea>
						<a href="view?id=<?php echo $row['UsuProID']?>" class="btn btn-primary">Ver más</a>
					</div>
				</div>
			</div>
				
			<!-- fin while -->


		<?php } ?>
		
		</div>
	</div>
</div>

<?php
	include("../includes/footer.php")
?>