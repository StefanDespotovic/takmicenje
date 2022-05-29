<style>
 img{
  max-width:20%;
  width:100%;
  max-height:25%;
  border: 0.1vw solid #555;
  border-radius: 20px;
  cursor: pointer;
  display: inline;
}



 
 
</style>
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

<a href="<?php echo $imageURL; ?>">
            <img src="<?php echo $imageURL; ?>" alt="" />
        </a>
  <!--print text from db--> <p> <?php echo $text;?> </p>

<?php }
}else{ ?>
    <p>No image(s) found...</p>
<?php } ?>