</head>
<body>

	<!-- Header -->



	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

  		<a class="navbar-brand" href="/gym/index.php"><!-- <img src="/gym/pages/views/images/favicon/favicon.ico" id="website-icon" style="width:50%"> -->GYM</a>

  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
 		</button>

	  	<div class="collapse justify-content-end navbar-collapse" id="navbarSupportedContent">
	     	<ul class="nav navbar-nav navbar-right">

	     		<?php

	     			if(isset($_SESSION['id']) AND $_SESSION['user'] == 'customer'){ //checking if user is logged in

	     				echo'<li class="nav-item"><a href="/lifestyle-store/pages/cart.php" class="nav-link"><i class="fa fa-shopping-cart nav-icon"></i>Cart</a></li>

	            			<li class="nav-item"><a href="/lifestyle-store/pages/settings.php" class="nav-link"><i class="fas fa-cog nav-icon"></i>Setting</a></li> 

	            			<li class="nav-item"><a href="/lifestyle-store/pages/orderhistory.php" class="nav-link"><i class="fa fa-history nav-icon" aria-hidden="true"></i>Order history</a></li>

	            			<li class="nav-item"><a href="/lifestyle-store/actions/logout.php" class="nav-link"><i class="fa fa-arrow-right" aria-hidden="true"></i>Logout</a></li>';

	     			}else{


	     				echo '<li class="nav-item"><a href="/gym/pages/signup.php" class="nav-link"><i class="far fa-user nav-icon"></i>Sign Up</a></li>

	            				<li class="nav-item"><a href="/gym/pages/login.php" class="nav-link"><i class="fas fa-sign-in-alt nav-icon"></i>Login</a></li> 

	            				<li class="nav-item"><a href="/lifestyle-store/pages/about.php" class="nav-link"><i class="fa fa-info nav-icon" aria-hidden="true"></i>About Us</a></li>

	            				<li class="nav-item"><a href="/lifestyle-store/pages/contact.php" class="nav-link"><i class="fa fa-envelope nav-icon" aria-hidden="true"></i>Contact us</a></li>';
	     			}





	     		?> 
	       
	       		
	      
	      	</ul>
	    
	  	</div>
	</nav>



	<!-- Header-end -->


