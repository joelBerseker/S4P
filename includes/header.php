<?php
session_start();
	include ('db.php');
	include ('sesion.php');
	
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo $men;?> - S4P</title>
	<link rel="stylesheet" type="text/css" href="/S4P/frontend/library/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/S4P/frontend/library/css/fonts.css">	
  	<link rel="stylesheet" type="text/css" href="/S4P/frontend/library/css/icons.css">
	  <link rel="stylesheet" type="text/css" href="/S4P/frontend/library/css/style.css">
  	<link rel="icon" href="/S4P/frontend/img/iconpage.png">
	<script src="/S4P/frontend/library/jquery-3.4.1.min.js"></script>	
	<script src="/S4P/frontend/library/bootstrap/js/bootstrap.js"></script>
</head>
<body style="background-color: #000;">
	
	<div class="social">
		<ul>
			<li ><a href="" target="_blank" class="icon-facebook"></a></li>	
			<li><a href="" target="_blank" class="icon-twitter"></a></li>
			<li><a href="" target="_blank" class="icon-linkedin"></a></li>
			<li><a href="" target="_blank" class="icon-instagram"></a></li> 

		</ul>
	</div>
	<!--
	<div class="carrito">
		<ul>
			<li><a href="" target="_blank" class="icon-cart"></a></li>
		</ul>
	</div>
	-->

	<nav id="pri" class="container-fluid navbar navbar-expand-lg navbar-light sticky-top ">
		<a href="/S4P/" class="logo-traveline"><img src="/S4P/image/S4P3.png" height="40" alt="logo de traveline"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul| class="navbar-nav ml-auto">
				<li class="nav-item <?php if($inicio){?>menu_link<?php }?>">
					<a class="nav-link <?php if(!$inicio){?> menu_link<?php }?>" style="color: white;<?php if($inicio){?>border-bottom: 2px solid #FF1F7B;bottom: 15px; <?php }?>" href="/S4P/">INICIO</a>
				</li>
				<li class="nav-item <?php if($producto){?>menu_link<?php }?>" >
					<a class="nav-link <?php if(!$producto){?> menu_link<?php }?>" style="color: white;<?php if($producto){?>border-bottom: 2px solid #FF1F7B;bottom: 15px; <?php }?>" href="/S4P/Intercambio">PRODUCTO</a>
				</li>
				<li class="nav-item <?php if($categoria){?>menu_link<?php }?>">
					<a class="nav-link <?php if(!$categoria){?> menu_link<?php }?>" style="color: white;<?php if($categoria){?>border-bottom: 2px solid #FF1F7B;bottom: 15px; <?php }?>" href="/S4P/Categoria">CATEGORIAS</a>
				</li>
				<li class="nav-item <?php if($nosotros){?>menu_link<?php }?>">
					<a class="nav-link <?php if(!$nosotros){?> menu_link<?php }?>" style="color: white;<?php if($nosotros){?>border-bottom: 2px solid #FF1F7B;bottom: 15px; <?php }?>" href="/S4P/Nosotros">NOSOTROS</a>
				</li>
				<li class="nav-item <?php if($contactanos){?>menu_link<?php }?>">
					<a class="nav-link  <?php if(!$contactanos){?> menu_link<?php }?>" style="color: white;<?php if($contactanos){?>border-bottom: 2px solid #FF1F7B;bottom: 15px; <?php }?>" href="/S4P/Contactanos">CONTACTOS</a>
				</li>
				<?php if(!empty($user)): ?>
					<li class="nav-item <?php if($login){?>menu_link<?php }?>">
						<a class="nav-link<?php if(!$login){?> menu_link<?php }?>" style="color: white; white;<?php if($login){?>border-bottom: 2px solid #FF1F7B;bottom: 15px; <?php }?> text-transform: uppercase;" href="#" ><?= $user['UsuCor']; ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link menu_link" style="color: white;" href="/S4P/Autenticacion/logout.php">SALIR</a>
					</li>
					
				<?php else: ?>
					<li class="nav-item <?php if($login){?>menu_link<?php }?>">
						<a class="nav-link <?php if(!$login){?> menu_link<?php }?>" style="color: white;<?php if($login){?>border-bottom: 2px solid #FF1F7B;bottom: 15px; <?php }?>" href="/S4P/Autenticacion/Login">INGRESAR</a>
					</li>

				<?php endif;?>
				
				
				
				
			
				
			
			</ul>
		</div>
	</nav>