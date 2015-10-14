<?php
session_start();
if (!isset($_SESSION['username']))
{
header('Location: index.html');
}?>
<html>
<head><title>File Insert</title>
<script type="text/javascript" src="webcam.js"></script>
</head>
<body>
<div id="results">Your captured image will appear here...</div>
	
	<h1>WebcamJS Test Page</h1>
	<h3>Demonstrates simple 320x240 capture &amp; display</h3>
	
	<div id="my_camera"></div>
	
	<!-- First, include the Webcam.js JavaScript Library -->
	
	
	<!-- Configure a few settings and attach camera -->
	<script language="JavaScript">
		Webcam.set({
			width: 320,
			height: 240,
			image_format: 'jpeg',
			jpeg_quality: 90
		});
		Webcam.attach( '#my_camera' );
	</script>
	
	<!-- A button for taking snaps -->
	<form>
		<input type=button value="Take Snapshot" onClick="take_snapshot()">
	</form>
	
	<!-- Code to handle taking the snapshot and displaying it locally -->
	<script language="JavaScript">
		function take_snapshot() {
			// take snapshot and get image data
			Webcam.snap( function(data_uri) {
			var raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');

        document.getElementById('mydata').value = raw_image_data;
       
				// display results in page
				document.getElementById('results').innerHTML = 
					'<h2>Here is your image:</h2>' + 
					'<img src="'+data_uri+'"/>';
         document.getElementById('myform').submit();
			} );
		}
	</script>
<h3>Please Choose a File and click Submit</h3>


<form id="myform" enctype="multipart/form-data" method="post" action="webcam_insert.php">
        <input id="mydata" type="hidden" name="mydata" value=""/>
    </form>
    

</body>
</html>