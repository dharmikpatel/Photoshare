<?php
  $imgId = $_GET['id'];
  include "file_constants.php";
 // just so we know it is broken
 error_reporting(E_ALL);
 // some basic sanity checks
 //if(isset($_GET['id']) && is_numeric($_GET['id'])) {
     //connect to the db
     //
     
     $conn = mysqli_connect($host, $user, $pass)
     or die("Could not connect: " . mysqli_connect_error());

     // select our database
     mysqli_select_db($conn,$db) or die(mysqli_error($conn));
  if (!empty($imgId)) {
     $sqliCommand = "SELECT `image` FROM user_image WHERE `image_id` = '$imgId'";
     $result = mysqli_query($conn, $sqliCommand);
     $row = mysqli_fetch_assoc($result);

     header("Content-Type: image/jpeg"); // or whatever the correct content type is.
     echo $row['image']; //if your image is encoded you can decode it here, too.
  }
?>