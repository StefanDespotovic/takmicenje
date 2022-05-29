<?php
// Include the database configuration file
include 'config.php';

// Get images from the database
$query = $db->query("SELECT * FROM images ORDER BY uploaded_on DESC");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'uploads/'.$row["file_name"];
      /*to write text from db*/  $text = $row["file_name"];
?> 
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/gallery.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="icon" href="images/logo.png">
    <title>Takmicenje</title>
    <style>
        #slika{
            display: inline;
            repeat:no-repeat;
        }
    </style>
</head>
<body>
  

    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>


<header>     
    <a href="#" id="logo" class="logo">ArtBook</a>
    <h1>Balkan Style <br> <span>[ Portfolio Gallery ]</span></h1>
</header>

<div id="top"></div>
<section class="gallery">
	<div class="row">
		<ul>
			<a href="#" class="close"></a>
			<li>
				<a href="#item02">
					<img src="https://cdn.dribbble.com/users/545884/screenshots/3981307/lorena2.png" alt="">
				</a>
			</li>

			<li>
				<a href="#item02">
					<img src="https://cdn.dribbble.com/users/545884/screenshots/3892302/contact.png" alt="">
				</a>
			</li>

			<li>
				<a href="#item02">
					<img src="https://cdn.dribbble.com/users/545884/screenshots/4154721/dive--001.png" alt="">
				</a>
			</li>
			<li>
				<a class="image" href="#item01">
					<img src="https://cdn.dribbble.com/users/545884/screenshots/4356121/darko--dr.jpg" alt="">
				</a>
			</li>
			<li>
				<a class="image" href="#item02">
					<img src="https://cdn.dribbble.com/users/545884/screenshots/3695553/news.png" alt="">
				</a>
			</li>
			
           <li>
               <a class="image" href="#item01">
            <img id="slika" src="<?php echo $imageURL; ?>" alt="" />
        </a>
           </li>

               
		</ul>
	</div> <!-- / row -->

	<!-- Item 01 -->
	<div id="item01" class="port">
	
		<div class="row">
			<div class="description">
				<h1>Item 01</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis libero erat. Integer ac purus est. Proin erat mi, pulvinar ut magna eget, consectetur auctor turpis.</p>
			</div>

				<img src="https://cdn.dribbble.com/users/545884/screenshots/3981307/lorena2.png" alt="">
			</div>
		</div> <!-- / row -->

	</div> <!-- / Item 02 -->

	<!-- Item 02 -->
	<div id="item02" class="port">
	
		<div class="row">
			<div class="description">
				<h1>Item 02</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis libero erat. Integer ac purus est. Proin erat mi, pulvinar ut magna eget, consectetur auctor turpis.</p>
			</div>
			<img src="https://cdn.dribbble.com/users/545884/screenshots/2883479/cover.jpg" alt="">
		</div> <!-- / row -->

	</div> <!-- / Item 02 -->

</section> <!-- / projects -->


<script>
 // portfolio
 $('.gallery ul li a').click(function() {
     var itemID = $(this).attr('href');
     $('.gallery ul').addClass('item_open');
     $(itemID).addClass('item_open');
     return false;
 });
 $('.close').click(function() {
     $('.port, .gallery ul').removeClass('item_open');
     return false;
 });

 $(".gallery ul li a").click(function() {
     $('html, body').animate({
         scrollTop: parseInt($("#top").offset().top)
     }, 400);
 });

</script>

</body>
</html>
<?php }
}else{ ?>
    <p>No image(s) found...</p>
<?php } ?>