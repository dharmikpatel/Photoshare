<?php
session_start();
if (!isset($_SESSION['username']))
{
header('Location: index.html');
}
$username = $_SESSION['username'];
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Free Focus Photography  Website Template | Gallery :: w3layouts</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all">
<link href="css/slider.css" rel="stylesheet" type="text/css" media="all">
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/slidermodernizr.custom.js"></script>
<script src="js/jquery.lighter.js" type="text/javascript"></script>
<link href="css/jquery.lighter.css" rel="stylesheet" type="text/css" />

<link href="profile/css/main.css" rel="stylesheet">

<script type="text/javascript">

  $(document).ready( function() {
    //$('#prev').click(function() {
        $.ajax({
            type: 'GET',
            url: 'getDetail.php',
            data: '',
            dataType: 'text',
            cache: false,
            success: function(result) {
             //   alert(result);
                $('#para').append(result);
                //$('#content1').html(result[0]);
            //    alert(result[0]);
            },
      //  });
    });
});

  </script>
</head>
<body>
  <!-- Background slider -->
  <div class="nav">
		<a href="#hero" class="scroll">section one</a>
		<a href="#slider" class="scroll">section two</a>
		<a href="#user_galary" class="scroll">section three</a>
	</div>
	<section id="hero">
			<div class="hero-block">
				<img class="img-circle" src="profile/img/logo.png" width="200" height="200" class="mb-7 hero-image">
				<p id="para">Hello, I'm <?php echo $username ?> and this is my galary <br/>
				</p>
			</div>
		<a href="#slider" class="scroll"><span class="down-arrow"></span></a>
	</section>
 	<div class="slider">

 	      <ul id="cbp-bislideshow" class="cbp-bislideshow">
					<li><img src="images/1.jpg" alt="image01"/></li>
					<li><img src="images/2.jpg" alt="image02"/></li>
					<li><img src="images/3.jpg" alt="image03"/></li>
					<li><img src="images/4.jpg" alt="image04"/></li>
					<li><img src="images/5.jpg" alt="image05"/></li>
               </ul>   
            <!--   <div> <h1> Hi <?php echo $username ?> </h1> </div>-->
	    <script src="js/jquery.imagesloaded.min.js"></script>
		<script src="js/cbpBGSlideshow.min.js"></script>
		<script>
			$(function() {
				cbpBGSlideshow.init();
			});
		</script>
		<script type="text/javascript">
		jQuery(document).ready(function() {

                   

      $.ajax({    //create an ajax request to load_page.php
        type: "GET",
        url: "file_display.php",             
        dataType: "html",   //expect html to be returned               
        success: function(response){                    
            $("#user_galary").html(response);
            //alert(response)
            //alert(response);
        }

    
});
});</script>
	 </div>
	 <!-- End Background slider -->
	    <div class="wrap">
	        <div class="header">
	        	<div class="header_top">
	      	       <div class="menu">
				     <ul class = "nice-menu" >
              <br>
              <br>
				       <li><a href="upload_photo_simple11.php">Upload</a></li>
               <br>
				      <!-- <li><a href="about.html">About</a></li>-->
				       <li><a href="random.html">Gallery</a></li>
               <br>

				       <li><a href="logout.php">Logout</a></li>
               <br>
               <br>
				     </ul>
                  </div>   
                 <div >
                 <!-- 	 <h1><a href="index.html"><img src="images/logo.png" alt="" /></a></h1>-->
                  </div>              
                </div>
             </div>
          </div>
          <div class="content">
           <div class="content_top">

           	 <div id="user_galary" class="wrap" style="height:1200 px;">
           	   <h3>My Gallery</h3>
	       
         </div>
       </div>
     </div>
             <div class="footer">
              	 <div class="wrap">
              	 	<div class="copy_right">
				       <h4><span> Galleria </span> | Design by  <a href="http://w3layouts.com"> CMPE 207 Team </a></h4>
		      	    </div>
          		 </div>
            </div> 	  

             <script src="profile/js/jribbble.js"></script> 
     <script src="profile/js/site-ck.js"></script>
     </body>
 </html>

