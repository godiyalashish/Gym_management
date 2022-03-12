<!-- Header -->

<?php

	include('./views/websiteicon.php');
    
?>

<title>Login</title>
<link rel="stylesheet" type="text/css" href="../css/login_signup.css">
<?php

	include('./views/header.php');

?>


<!-- Header-end -->

<body>
	
	<div class="main">
        <?php if(isset($_GET['error'])){
            $error = $_GET['error'];

            echo "<div class='container' id='hideMe'><div class='alert alert-danger'><strong>$error</strong></div></div>";
        }elseif (isset($_GET['signup_success'])) {
            echo "<div class='container' id='hideMe'><div class='alert alert-success'><strong>REGISTRATION SUCCESSFULL</strong></div></div>";
        }
        ?>
        <div id="signInForm">
		<section class="sign-in">
            <div class="container">
                <div class=" row signin-content">
                    <div class=" col-md-6 signin-image">
                        <figure><img src="./views/images/login.jpg" alt="sing up image"></figure>
                       
                    </div>
                    <div class="col-md-6 signin-form">
                        <h2 class="form-title">Log in</h2>
                        <form method="POST" id="login-form" action="../actions/signin.php" autocomplete="off">
                            <div class="form-group input-group">
                                
							<span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                                <input type="email" name="email" placeholder="email" class="form-control" autofocus>
                            </div>
                            <div class="form-group input-group">
							<span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                                <input type="password" name="password" placeholder="password" class="form-control">
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="check" name="remember_me" value="1">
                                <label class="form-check-label" for="check">Remember me</label>
                            </div>
                            
                           <div class="form-button">
                                <input type="submit" name="submit" id="signup" class="form-submit" value="Log in" />
                            </div>

                            <input type="hidden" name="user" value="admin" />

                            <hr>
                        </form>

                       
<!--                         <u><a href="./trainerLogin.php" class="trainer">Or Login as trainer</a></u>
 -->
                        
                </div>
            </div>
        </section>
    </div>
    </div>
</body>

<?php

	include('./views/footer.php');

?>