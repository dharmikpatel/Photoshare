<html>
<head>


 
</head>
<body>
<?php
 include "file_constants.php";

 session_start();

 $username=$_SESSION['username'];
 // just so we know it is broken
 error_reporting(E_ALL);
 
     $val= 1;
     $link = mysqli_connect($host, $user, $pass)
     or die("Could not connect: " . mysqli_connect_error());

     // select our database
     mysqli_select_db($link,$db) or die(mysqli_error($link));

     
     $column = array();
     $result = mysqli_query($link,"SELECT * FROM user_image where username='$username'");?>

     <div class="section group">
     <?php while ($row = mysqli_fetch_assoc($result)) {
          $id = $row['image_id'];
          
      ?>
  
          
      <?php 
        $val = $val + 1;
       ?>

            
        <div class="grid_1_of_4 images_1_of_4">
          <a class='sample' href="/getImage.php?id=<?php echo $id ?>"> <img src="/getImage.php?id=<?php echo $id ?>" alt="" /> <span class="zoom-icon"></span></a>
        </div>
          
          <?php if($val==5)
          {
            $val = 1;?>
              </div>
              <div class="section group">
          <?php 
        } 
    
      
      }

      ?>
</div>

</body>
</html>
