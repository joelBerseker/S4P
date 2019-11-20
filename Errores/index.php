<?php
include("../includes/navbar.php");
$login = true;
$titulo_html = "Error";
include("../includes/header.php");
$men_error = "No puedes ingresar a esta parte de la aplicacion";
$men_error = $_GET['m'];
?>


<div style="background-color:white;">
  <div class="col-md-5 mx-auto" style="padding-top:60px;padding-bottom:148px">
    <div class="card">
      <article class="card-body">
        <h4 class="card-title text-center mb-4 mt-1">ERROR</h4>
        <hr>
        <p class="text-center mb-4 mt-1"><?= $men_error ?></p>
        <div class="form-group" align="center">
          <a href="../"class="btn btn-danger " style="color:white"> Ir al inicio </a>
        </div>
        </form>
      </article>
    </div>
  </div>
</div>


<?php
include("../includes/footer.php")
?>