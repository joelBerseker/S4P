<?php 
     include('global_variable.php');
?>
<footer class="footer-area footer" style="background-color:black" id="sticky-footer" >
    <div class="container">
    <div class="row">
        <div class="col-4" style="padding-top:15px ;" align="center">
            <ul style="color:black">
                <li><b><a href="<?php echo $dirEjec?>/Intercambio" style="color:#CACACA">Juegos Disponibles</a></b></li>
                <li><b><a href="<?php echo $dirEjec?>/Categoria" style="color:#CACACA">Categorias</a></b></li>
                <li><b><a href="<?php echo $dirEjec?>/Nosotros" style="color:#CACACA">Sobre Nosotros</a></b></li>
            </ul>
        </div>
        <div class="col-4 "style="padding-top:3px ;padding-bottom:5px">
            <div align="center">
                <img src="<?php echo $dirEjec?>/image/S4P6.png"  alt="logo de S4P" style="height: 50%;width: 50%;" >
            
            </div>
        </div>
        <div class="col-4" style="padding-top:15px ;" align="center">
        <ul style="color:black">
                <li><b><a href="<?php echo $dirEjec?>/Contactanos" style="color:#CACACA">Contactanos</a></b></li>
                <li><b><a href="<?php echo $dirEjec?>/Autenticacion/Login" style="color:#CACACA">Ingresar</a></b></li>
                <li><b><a href="<?php echo $dirEjec?>/Autenticacion/Singup" style="color:#CACACA">Registrarse</a></b></li>       
        </ul>
        </div>
    </div>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myList tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
<script type="text/javascript">
	function loader(){
		$('#principal').hide();
		$('.loader').show();
	}	
	window.addEventListener("beforeunload", loader);
</script>
<script>
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
        $('#imagenmuestra').attr('src', e.target.result);
        }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imagen").change(function() {
        readURL(this);
    });
</script>
</body>
</html>
