
<?php
$inicio 		=	false;
$producto		=	true;
$categoria		=	false;
$contactanos	=	false;
$nosotros		=	false;
$login			=	false;

$men="Producto";
include("../includes/header.php");
?>
<?php
	include("crud_usuarioproducto/db.php")
?>
<div class="section2">
	<div class="container">
		<div class="row justify-content-center">
		<?php
			$query = "SELECT * FROM usuario_producto";
			$resultProduct= mysqli_query($conn, $query);
			while($row= mysqli_fetch_array($resultProduct)){
		?>
			<!-- Inicio while -->
			<div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 p-3 ">
				<div class="card mb-4 border-0">
					<div class="img-animtion">
						<img src="mostrar.php?id=<?php echo $row['UsuProProID']?>" alt="<?php echo $row['UsuProID'];?>" class="card-img-top">
						
					</div>
					<div class="card-img-overlay">
						<h3>
						<span class="card-title" style="background-color: rgba(0,0,0,0.8);
							display: block;
							position: absolute;
							bottom: 214px;
							right: 0;
							padding: 5px;
							color:#CACACA;">
							<?php echo $row['UsuProPre'];?></span>
						</h3>
  					</div>
					<div class="card-body text-center">
						<h5 class="card-title"><?php echo $row['UsuProNom'];?></h5>
						<p class="card-text"><?php echo $row['UsuProDes'];?></p>
						<a href="/view?id=<?php echo $row['UsuProID']?>" class="btn btn-primary">Ver más</a>
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