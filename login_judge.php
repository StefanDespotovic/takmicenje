<?php session_start(); ?>
<?php 
//getting info about judge from db to check if it exist
include 'config.php';
if (isset($_POST['signin'])) {
  $email = $_POST['mail'];
  $password = $_POST['pass'];

  $query = "SELECT * from judge WHERE email = '$email' AND password = '$password'";
  $user = mysqli_query($db, $query);
  if (!$user) {
    die('query Failed' . mysqli_error($db));
  }


 
  while ($row = mysqli_fetch_array($user)) {
    $user_id = $row['id'];
    $user_email = $row['email'];
    $user_password = $row['password'];
  }

  if ($user_email == $email  &&  $user_password == $password) {
 
    $_SESSION['id'] = $user_id;       // Storing the value in session
    $_SESSION['email'] = $user_email; // Storing the value in session
    header('location: judge_gallery.php?user_id=' . $user_id);
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
    <title>Judge</title>
    <style>
/*disable scrolling*/
html, body {
    margin: 0; 
    height: 100%; 
    overflow: hidden
}
.sign-in-container {
    background-color: #fff;
	border-radius: 10px;
  	box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
			0 10px 10px rgba(0,0,0,0.22);
	position: relative;
	overflow: hidden;
	width: 384px;
	max-width: 100%;
	min-height: 480px;

}
.logo {
    padding: 0em;
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
        <section>

	<div class="form-container sign-in-container">
		<form method="post" action="">
			<h1>Sign in</h1>
			<h5>Welcome judge, please sign in to access your account</h5>
			<input id="mail" name='mail' type="email" placeholder="Email" required/>
		    <input id="pass" name='pass' type="password" placeholder="Password" required/>
			<a>Please ask Administrator for password</a>
			<input type="submit" name="signin" value="Sign In" class="btn btn-primary"></button>
		</form>
	</div>
			

</section>


<script>
    

</script>
</body>
</html>