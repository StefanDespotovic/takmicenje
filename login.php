<?php session_start(); ?>
<?php
//cheking if user exist in db    
include 'config.php';
if (isset($_POST['signin'])) {
  $email = $_POST['mail'];
  $password = $_POST['pass'];

  $query = "SELECT * from images WHERE email = '$email' AND password = '$password'";
  $user = mysqli_query($db, $query);
  if (!$user) {
    die('query Failed' . mysqli_error($db));
  }

//getting all info from db so it can appear in page   
 
  while ($row = mysqli_fetch_array($user)) {
    $user_id = $row['id'];
    $user_name = $row['name'];
    $user_email = $row['email'];
    $user_password = $row['password'];
    $dog_name = $row['dog_name'];
    $breed = $row['breed'];
    $year = $row['year'];
    $likes = $row['likes'];
  }

  if ($user_email == $email  &&  $user_password == $password) {
 
    $_SESSION['id'] = $user_id;       // Storing the value in session
    $_SESSION['name'] = $user_name;   // Storing the value in session
    $_SESSION['email'] = $user_email; // Storing the value in session
    $_SESSION['dog_name'] = $dog_name;   // Storing the value in session
    $_SESSION['breed'] = $breed; // Storing the value in session
    $_SESSION['year'] = $year; // Storing the value in session
    $_SESSION['likes'] = $likes; // Storing the value in session
    header('location: user_profile.php?user_id=' . $user_id);
  } 
}
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <title>Competitors login</title>
    <style>
/*disable scrolling*/
html, body {
    margin: 0; 
    height: 100%; 
    overflow: hidden
}
.logo {
    padding: 0em;
}
@media only screen and (max-width: 1100px) {
.logo {
    right: 76.5%;
}
}

        @keyframes slide-menu {
  from {
    transform: translateY(50%);
  }
  to {
    transform: translateY(0);
  }
}

section {  
    animation-duration: 1.3s; /* the duration of the animation */
    animation-timing-function: ease-out; /* how the animation will behave */
    animation-delay: 0s; /* how long to delay the animation from starting */
    animation-iteration-count: 1; /* how many times the animation will play */
    animation-name: slide-menu; /* the name of the animation we defined above */
}


@media only screen and (max-width: 600px) {
  .container {
    position: relative;
    overflow: hidden;
    width: 400px;
    max-width: 100%;
    min-height: 514px;
}
input {
    width: 150%;
}
}
@media only screen and (max-width: 1100px) {
.logo {
    right: 76.5%;
}
}
    </style>

</head>
    <body>

        <header>        
            <a href="index.html" id="logo" class="logo">BEST-DOG</a>
        </header>
<!-- login section-->    
        <section>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="signup_upload.html">
			<h1>Create Account</h1>
			<h5>Welcome, please take your time to fill out your new account</h5><!--
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your email for registration</span>
			<input id="name" type="text" placeholder="Name" />
			<input id="mail" type="email" placeholder="Email" />
			<input id="psw" type="password" placeholder="Password" />
			only for competitors (another for judge, reporter)
			<select name="role" id="role">
				<option value="-">Chose</option>
   			    <option value="judge">Judge</option>
    			<option name="opt" value="competitor">Competitor</option>
  			</select>
			<a href="terms.html">By clicking submit you are accepting all <b>terms and the conditions!</b></a>-->
			<button type="submit">Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
    	 <form method="post" action="">
			<h1>Sign in</h1>
			<h5>Welcome, please sign in to access your account</h5><!--
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your account</span>-->
			<input id="mail" name='mail' type="email" placeholder="Email" required/>
		<input id="pass" name='pass' type="password" placeholder="Password" required/>
			<a href="#">Forgot your password?</a>
			<input type="submit" name="signin" value="Sign In" class="btn btn-primary"></button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>
</section>


<script>
    const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});


</script>
</body>
</html>
