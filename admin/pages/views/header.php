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

	     			if(isset($_SESSION['id']) AND $_SESSION['user'] == 'admin'){ //checking if user is logged in

	     				echo'

	            			<li class="nav-item"><a href="/lifestyle-store/pages/settings.php" class="nav-link"><i class="fas fa-cog nav-icon"></i>Setting</a></li>

	            			<li class="nav-item"><a href="/lifestyle-store/actions/logout.php" class="nav-link"><i class="fa fa-arrow-right" aria-hidden="true"></i>Logout</a></li>';

	     			}





	     		?> 
	       
	       		
	      
	      	</ul>
	    
	  	</div>
	</nav>



	<!-- Header-end -->


