<?php
session_start();
if (!isset($_SESSION['username']))
{
header('Location: index.html');
}
 //$username=$_SESSION['username'];
 ?>
<html lang="en"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
    <title>Responsive Web Mobile - Langing Page</title>

    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Included Bootstrap CSS Files -->
    <link rel="stylesheet" href="webcam_template/js/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="webcam_template/js/bootstrap/css/bootstrap-responsive.min.css">

    <!-- Google Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Titillium+Web:400,300" rel="stylesheet" type="text/css">
    
    <!-- Css -->    
    <link rel="stylesheet" href="webcam_template/css/style.css">
    <script type="text/javascript">
    function function1()
    {
        //alert("hi");
    document.getElementById('NewsletterForm').submit();
    }
    </script>

</head>
<body>
<header style="height: 910px;">
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="header center-block">
                    <h1 class="heading">Upload Photos</h1>
                    
                    <div id="NewsletterFormContainer">
                        <form id="NewsletterForm" method="post" enctype="multipart/form-data" action="upload_photo_simple1.php" class="form" novalidate="novalidate">
                            <div class="row">
                                <div class="col-sm-8">
                        <input type="file" id="userfile" name="userfile">           
                                </div>

                                
<div class="col-md-12 service center">
                <div id="ContactFormContainer">
                    
                        <div class="form-group">
                            <input id="img_name" name="img_name" type="text" placeholder="Name" class="form-control">
                        </div>
                        <div class="form-group">
                            
                        </div>
                        <div class="form-group">
                            <textarea id="img_desc" name="img_desc" placeholder="Description" class="form-control" rows="10"></textarea>
                        </div>

<div class="form-group">
<label >Photo Category :</label> <select name="category" style="background-color: #d3d349;">
  <option value="Personal">Personal</option>
  <option value="Outdoors">Outdoor</option>
  <option value="Art">Art</option>
  <option value="Others">Others</option>
</select>
  </div>
<div class="form-group">
<label font="" color="blue">Photo Access Level :</label> <select name="access" style="background-color: #d3d349;">
  <option value="1">Public</option>
  <option value="0">Private</option>
  
</select>
  </div>


                        <div class="form-group">
                            <input type="button" id="send" value="Submit" onClick="function1()" class="btn-large btn btn-inverse btn-block"/>
                        </div>

                    
                
            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</header>



<div class="background theme">
    
</div>  
<script src="webcam_template/js/jquery-2.1.1.min.js"></script>
<script src="webcam_template/js/bootstrap/js/bootstrap.min.js"></script>
<script src="webcam_template/js/jquery-validate/assets/js/jquery.validate.min.js"></script>
<script src="webcam_template/js/script.js"></script>



</body></html>

