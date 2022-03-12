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
            echo "<div class='container' id='hideMe'><div class='alert alert-success'><strong>REGISTRATION SUCCESSFUL</strong></div></div>";
        }
        ?>
        <div id="signInForm">
		<section class="sign-in">
            <div class="container">
                <div class=" row signin-content">
                    <div class=" col-md-6 signin-image">
                        <figure><img src="./views/images/login.jpg" alt="sing up image"></figure>
                       <u><text href="" class="signup-link" id="signUpLink" onclick="toggleForm(1)">Create an account</text></u>
                    </div>
                    <div class="col-md-6 signin-form">
                        <h2 class="form-title">Log in</h2>
                        <form method="POST" id="login-form" action="../actions/signin.php" autocomplete="off">
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
						</div>
                                <input type="email" name="email" placeholder="email" class="form-control" autofocus>
                            </div>
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
						      </div>
                                <input type="password" name="password" placeholder="password" class="form-control">
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="check" name="remember_me" value="1">
                                <label class="form-check-label" for="check">Remember me</label>
                            </div>
                            
                           <div class="form-button">
                                <input type="submit" name="submit" id="signup" class="form-submit" value="Log in" />
                            </div>

                            <input type="hidden" name="user" value="customer" />

                            <hr>
                        </form>

                       
<!--                         <u><a href="./trainerLogin.php" class="trainer">Or Login as trainer</a></u>
 -->
                        
                </div>
            </div>
        </section>
    </div>


        <div id="signUpForm">
        <section class="sign-in">
            <div class="container">
                <div class=" row signin-content">
                    <div class="col-md-6 signin-form">
                        <h2 class="form-title">Sign Up</h2>
                        <form method="POST" id="signup-form" action="../actions/signup.php" autocomplete="off">

                            <div class="form-group input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                              </div>
                              <input type="text" name="name" placeholder="Name" class="form-control" autofocus>
                            </div>

                            <div class="form-group input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text" id="basic-addon1"><i class="far fa-envelope-open"></i></span>
                              </div>
                              <input type="email" name="email" placeholder="Email" class="form-control" autofocus>
                            </div>

                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                 <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                                </div>
                                <input type="password" name="password" placeholder="password" class="form-control">
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="check1" name="agree" required>
                                <label class="form-check-label" for="check1">I agree all statements in <a href="#"><u>Terms of service</u></a></label>
                            </div>
                            
                           <div class="form-button">
                                <input type="submit" name="Signup" id="signin" class="form-submit" value="Sign up" />
                            </div>


                        </form>

                        
                </div>

                 <div class=" col-md-6 signin-image">
                        <figure><img src="./views/images/signup.jpg" alt="sing up image"></figure>
                       <u><text href="./login.php" class="signup-link" id="SignInLink" onclick="toggleForm(2)">I am already member</text></u>
                    </div>
            </div>
        </section>
    </div>
    </div>
</body>

<script type="text/javascript">

        function toggleForm(m){

        var x = document.getElementById("signInForm");
        var y = document.getElementById("signUpForm");
            if(m==1){
           x.style.display = "none";
           y.style.display = "block";}
           if(m==2){
            x.style.display = "block";
           y.style.display = "none";
           }
}
</script>


<?php

	include('./views/footer.php');

?>