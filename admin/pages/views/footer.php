<!-- Footer -->

		
		<footer class="footer">
            <center>&copy 2021. All Rights Reserved | Contact Us: +91 90000 00000</center>
        
<?php

	if(isset($_SESSION['id'])){ //checking if user is logged in

		echo "<a href='' class='nav-link link'>About us</a><p><a href='' class='nav-link link'> Contact us</a></p>";
	}


?>

	</footer>



	<!-- Footer-end -->



	  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>