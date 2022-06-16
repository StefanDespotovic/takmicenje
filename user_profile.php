<?php session_start(); 
include 'config.php';
if(!isset($_SESSION['id'])){ // cheking if user is logged in
    header("Location: login.php");
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <title>User profile</title>
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
	z-index: -1;
}
h3{
    margin-left:10%;
    width:80%;
    background: -webkit-gradient(linear, right top, left top, from(#757f9a), to(#d7dde8)); 
    color: black; 
	padding: 15px; 
	border-radius: 4px;
	box-shadow: 0 1px 6px rgba(57,73,76,0.35);
		}
p{
    margin-left:13%;
		}
.image {
    width:auto;
    max-width:100%;
    max-height:200px;
    display: block;
    margin-left: auto;
    margin-right: auto;
    margin-top: 25px;
    border-radius: 4px;
    box-shadow: 1px 1px 10px 1px;
}
@media only screen and (max-width: 1100px) {
.logo {
    right: 76.5%;
}
}
/*Hamburger menu */

.overlay{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    visibility: hidden;
    transition: opacity .35s, visibility .35s, height .35s;
    overflow: hidden;
    background: black;
    z-index: -1;
}

#hamburger-input{
  display: none;
}
#hamburger-menu {
    position: fixed;
    top: 4%;
    left: 90%;
    width: 30px;
    height: 30px;
    display: none;
    border: none;
    padding: 0px;
    margin: 0px;
    background: linear-gradient(
      to bottom, 
      #757f9a, #757f9a 20%, 
      transparent, transparent, 
      #757f9a 40%, #757f9a 60%, 
      transparent, transparent, 
      #757f9a 80%, #757f9a 100%
    );
}

#hamburger-menu #sidebar-menu {
    visibility: hidden;
    position: fixed;
    top: 0;
    margin-left: 90%;
    left: 110%;
    width: 10%;
    height: 100%;
    background-color: #757f9a;
    transition: 0.3s;
    padding: 0px 10px;
    box-sizing: border-box;
}

#hamburger-menu ul {
  padding-left: 0px;
}

#hamburger-menu li {
  list-style-type: none;
  line-height: 3rem;
}

#hamburger-menu a {
  color: white;
  font-size: 1.3rem;
  text-decoration: none;
}

#hamburger-menu a:hover {
  text-decoration: underline;
}

#hamburger-input:checked + #hamburger-menu #sidebar-menu {
    visibility: visible;
    left: 0;
}
#hamburger-input:checked ~ .overlay{
   visibility: visible;
  opacity: 0.4;
}
  #main-menu {
    display: none;
  }
  #hamburger-menu {
    display: inline;
  }


@media only screen and (max-width: 600px) {
    .img-block{
		#hamburger-menu #sidebar-menu {
            margin-left:60%;
            width: 40%;
}
}

/*Responsive*/
@media only screen and (max-width: 767px) {
		#hamburger-menu #sidebar-menu {
            margin-left:60%;
            width: 40%;
}
}


@media only screen and (max-width: 1100px) {
    #hamburger-menu #sidebar-menu {
            margin-left:60%;
            width: 40%;
}
}

    </style>

</head>
    <body>
         

        <header>        
            <a href="index.html" id="logo" class="logo">BEST-DOG</a>
        </header>
        <nav id="main-menu">
 
</nav>

<input type="checkbox" id="hamburger-input" class="burger-shower" />
<label id="hamburger-menu" for="hamburger-input">
  <nav id="sidebar-menu">
    <ul>
      <li><a href="index.html">Main page</a></li>
      <li><a href="news.html">News</a></li>
      <li><a href="login.php">Login</a></li>
      <li><a href="login_judge.php">Login judges</a></li>
      <li><a href="gallery.php">Gallery</a></li>
      <li><a href="results.html">Results</a></li>
    </ul>
  </nav>
</label>

<div class="overlay"></div>
        <section>
	<div class="form-container sign-in-container"
<?php
//getting data from db with user id that is logged
 $sql="SELECT * FROM images where id = '".$_SESSION['id']."'";
 $result = $db->query($sql);
?>
 <?php

//display data from db from user id that is logged
$user = $_SESSION['name'];

echo "<h3>Welcome $user</h3>";

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $imageURL = 'uploads/'.$row["file_name"];

    ?>
   <?php
        }
        }
        ?> 
       <img class="image" src="<?php echo $imageURL; ?>" />
          <?php
$dog_name = $_SESSION['dog_name'];
$breed = $_SESSION['breed'];
$year = $_SESSION['year'];
$likes = $_SESSION['likes'];

       echo "<p><b>Competitors name:</b> $dog_name</p>";
       echo "<p><b>Competitors breed:</b> $breed</p>";
       echo "<p><b>Competitors years:</b> $year</p>";
       echo "<p><b>Competitors likes:</b> $likes</p>";
                 ?> 
	</div>
			

</section>

</body>
</html>