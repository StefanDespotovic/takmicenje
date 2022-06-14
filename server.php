<?php session_start(); ?>
<?php
include 'config.php';
if (isset($_POST['signin'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
 
  $query = "SELECT * from images WHERE email = '$mail' AND password = '$pass'";
  $user = mysqli_query($db, $query);
 
  if (!$user) {
    die('query Failed' . mysqli_error($db));
  }
 
  while ($row = mysqli_fetch_array($user)) {
 
    $user_id = $row['ID'];
    $user_name = $row['name'];
    $user_email = $row['email'];
    $user_password = $row['password'];
  }
  if ($user_email == $email  &&  $user_password == $password) {
 
    $_SESSION['id'] = $user_id;       // Storing the value in session
    $_SESSION['name'] = $user_name;   // Storing the value in session
    $_SESSION['email'] = $user_email; // Storing the value in session
    //! Session data can be hijacked. Never store personal data such as password, security pin, credit card numbers other important data in $_SESSION
    header('location: user_login.html?user_id=' . $user_id);
  } else {
    header('location: terms.html');
  }
}
?>