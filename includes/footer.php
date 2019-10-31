<footer class="footer-area" style="background-color:black">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- Footer Curve Line -->
				<img class="footer-curve" src="img/core-img/foo-curve.png" alt="">
				<!-- Footer Social Info -->
				<div class="footer-social-info d-flex align-items-center justify-content-between">
					<a href="#"><i class="fa fa-facebook"></i><span>Facebook</span></a>
					<a href="#"><i class="fa fa-twitter"></i><span>Twitter</span></a>
					<a href="#"><i class="fa fa-instagram"></i><span>Instagram</span></a>
				</div>
				<!-- Footer Curve Line -->
				    <img class="footer-curve" src="img/core-img/foo-curve.png" alt="">
				</div>
			</div>
			<div class="row">
				<div class="col-6 offset-5">
					<div class="copywrite-text">
						<p>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Copyright &copy;
							<script>document.write(new Date().getFullYear());</script> All rights reserved
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
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
</body>
</html>
