<?php session_start(); ?>
<?php
include 'config.php';
if(!isset($_SESSION['id'])){ //if login in session is not set
    header("Location: login_judge.php");
}


$con = mysqli_connect('localhost', 'id18955784_stefanova', '32Cmfoan(Yfe', 'id18955784_stefan');
	if (isset($_POST['liked'])) {
		$postid = $_POST['postid'];
		$result = mysqli_query($con, "SELECT * FROM images WHERE id=$postid");
		$row = mysqli_fetch_array($result);
		$n = $row['likes'];

		mysqli_query($con, "INSERT INTO likes (userid, postid) VALUES ('".$_SESSION['id']."', $postid)");
		mysqli_query($con, "UPDATE images SET likes=$n+1 WHERE id=$postid");

		echo $n+1;
		exit();
	}
if (isset($_POST['unliked'])) {
		$postid = $_POST['postid'];
		$result = mysqli_query($con, "SELECT * FROM images WHERE id=$postid");
		$row = mysqli_fetch_array($result);
		$n = $row['likes'];

		mysqli_query($con, "DELETE FROM likes WHERE postid=$postid AND userid='".$_SESSION['id']."'");
		mysqli_query($con, "UPDATE images SET likes=$n-1 WHERE id=$postid");
		
		echo $n-1;
		exit();
	}
?>
	<!DOCTYPE html>
	<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, intial-scale=1.0"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	 <link rel="stylesheet" href="css/main.css">
	<title>Gallery vote</title>
	<style>
    .container main
    {
		    height:100%;
		}
	.main{
		    margin-top: 3%;
		    background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 14px 28px rgb(0 0 0 / 25%), 0 10px 10px rgb(0 0 0 / 22%);
            margin-bottom:5%;
		}
		h3{
		    background: -webkit-gradient(linear, right top, left top, from(#757f9a), to(#d7dde8)); 
	   	    color: black; 
	    	padding: 15px; 
	    	border-radius: 4px;
	    	box-shadow: 0 1px 6px rgba(57,73,76,0.35);
		}
		.img-box{
		    margin-top: 20px;
		}
		.img-block{
		    width: 31%;
		    float: left;
		    margin-left: 2%; 
		    text-align: center;
		    margin-top: 10px;
		    border-radius: 4px;
		    margin-bottom:8px;
		}
		.img-responsive {
            width:auto;
            max-width:100%;
            max-height:200px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            border-radius: 4px;
            box-shadow: 1px 1px 10px 1px;
        }
        .logo {
            padding: 0em;
        }


}
		p {
    margin-top: 10px;
}
		
		
/*Hamburger menu */

.overlay{
    position: fixed;
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
		    width: 100%;
		    float: left;
		    margin-right: 5px; 
		    text-align: center;
		}
		#hamburger-menu #sidebar-menu {
            margin-left:60%;
            width: 40%;
}
}

/*Responsive*/
@media only screen and (max-width: 767px) {
    .img-block{
		    width: 100%;
		    float: left;
		    margin-right: 5px; 
		    text-align: center;
		}
		#hamburger-menu #sidebar-menu {
            margin-left:60%;
            width: 40%;
}
}


@media only screen and (max-width: 1100px) {
    .img-block{
		    width: 100%;
		    float: left;
		    margin-right: 5px; 
		    text-align: center;
		}
		
    #hamburger-menu #sidebar-menu {
            margin-left:60%;
            width: 40%;

}}
.stick-footer{
	padding: 0 20px;
	padding-top: 1em;
	padding-bottom: 1em;
    position:relative;
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
      <li><a href="main.html">Main page</a></li>
      <li><a href="news.html">News</a></li>
      <li><a href="gallery.php">Gallery</a></li>
      <li><a href="results.html">Results</a></li>
      <li><a href="login.php">Login</a></li>
      <li><a href="login_judge.php">Judges login</a></li>
    </ul>
  </nav>
</label>


<div class="overlay"></div>
<div class="container main">
    <h3>All competitors and their informations</h3>
    <div class="img-box">
        <!-- for image and text, including db connection file, checking if db exist and 
			    getting requested files from db -->
        <?php

        include "config.php";


        $result = mysqli_connect($dbHost,$dbUsername,$dbPassword) or die("Could not connect to database." .mysqli_error());
        mysqli_select_db($result,$dbName) or die("Could not select the databse." .mysqli_error());
        $image_query = mysqli_query($result,"select id,file_name,dog_name,breed,year from images");
        while($rows = mysqli_fetch_array($image_query))
        {   $dog_name = $rows['dog_name'];
            $breed = $rows['breed'];
            $year = $rows['year'];
            $imageURL = 'uploads/'.$rows["file_name"];
            $imageId = $rows['id'];
            ?>
            <div class="img-block">
                	<img src="<?php echo $imageURL; ?>" alt="" title="<?php echo $dog_name; ?>" class="img-responsive" />
	<p><strong>Dog name:&nbsp</strong><?php echo $dog_name?>
	<strong>&nbspDog years:&nbsp</strong><?php echo $year?>
	<strong>&nbspDog breed:&nbsp</strong><?php echo $breed?></strong></p>
                <!-- for likes -->
                    <?php

                    $results=mysqli_query($result,"SELECT * FROM likes where userid='".$_SESSION['id']."' and postid=".$imageId."");
                    if (mysqli_num_rows($results)==1) { ?>
                        <!-- user already liked the post-->
                        <p><a href="" class="unlike" id="<?php echo $imageId; ?>">unlike</a></p>
                    <?php } else {?>
                        <!-- user has not yet liked post-->
                        <p><a href="" class="like" id="<?php echo $imageId; ?>">like</a></p>
                    <?php } ?>

                

            </div>
            <?php
        }
        ?>
        </div></div>
 <footer class="stick-footer">
       
        <div class="social-footer-icons">
          <ul style="margin:auto;" class="menu simple">
            <a href="https://www.facebook.com/Best-dog-100587562683240/?ref=page_internal"><img src="images/facebook.png" style="width:42px;height:42px;"></a>
            <a href="https://www.instagram.com/best_dog_competition/"><img src="images/instagram.png" style="width:42px;height:42px;"></a>
            <a href="https://www.tumblr.com/blog/best-dog-competition"><img src="images/tumblr.png" style="width:42px;height:42px;"></a>
            <a href="https://twitter.com/Best__dog"><img src="images/twitter.png" style="width:42px;height:42px;"></a>
          </ul>
          <p>Coppyright © 2022 Best-dog, Inc.</p>
          <a href="terms.html">Legal Stuff </a><br>
          <a href="privacy.html">Privacy Policy</a>
          </div>
      </footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('.like').click(function(){
            var postid = $(this).attr('id');
            $.ajax({
                url: 'judge_gallery.php',
                type: 'post',
                async: false,
                data:{
                    'liked': 1,
                    'postid': postid
                },
                success:function(){
                    
                }
            });
        });
        
        $('.unlike').click(function(){
            var postid = $(this).attr('id');
            $.ajax({
                url: 'judge_gallery.php',
                type: 'post',
                async: false,
                data:{
                    'unliked': 1,
                    'postid': postid
                },
                success:function(){
                    
                }
            });
        });
        
        
    });
</script>
	</body>
	</html>