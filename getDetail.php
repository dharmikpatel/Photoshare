<?php
  session_start();
if (!isset($_SESSION['username']))
{
header('Location: index.html');
}
  $username = $_SESSION['username'];
  include "file_constants.php";
 // just so we know it is broken
 error_reporting(E_ALL);
     
     $conn = mysqli_connect($host, $user, $pass)
     or die("Could not connect: " . mysqli_connect_error());

     // select our database
     mysqli_select_db($conn,$db) or die(mysqli_error($conn));
 
  //if (!empty($imgId)) {
     $sqliCommand = "SELECT `detail` FROM user WHERE `username` = '$username'";
     $result = mysqli_query($conn, $sqliCommand);
     $row = mysqli_fetch_assoc($result);

     //header("Content-Type: image/jpeg"); // or whatever the correct content type is.
     echo $row['detail']; //if your image is encoded you can decode it here, too.
 // }
?>