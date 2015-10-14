<?php
  $category = $_GET['id'];
  include "file_constants.php";
 // just so we know it is broken
 error_reporting(E_ALL);
 
     $imageid = array();
     $count=0;
     $conn = mysqli_connect($host, $user, $pass)
     or die("Could not connect: " . mysqli_connect_error());

     // select our database
     mysqli_select_db($conn,$db) or die(mysqli_error($conn));
    if($category == "all")
    {
       $sqliCommand = "SELECT image_id FROM user_image where access='1' LIMIT 12";
    }
    else{
     $sqliCommand = "SELECT image_id FROM user_image where access='1' and category='"+category+"' LIMIT 12";
   }
     $result = mysqli_query($conn, $sqliCommand);
     while($row = mysqli_fetch_assoc($result))
     {
        $imageid[$count] = $row["image_id"];
        $count = $count + 1;
     }

    
     echo json_encode($imageid);
 // }
?>