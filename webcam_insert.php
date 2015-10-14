<?php
session_start();
if (!isset($_SESSION['username']))
{
header('Location: index.html');
}
$username=$_SESSION['username'];
$encoded_data = $_POST['mydata'];
$category = $_POST['category'];
$image_name = $_POST['img_name'];
$image_desc = $_POST['img_desc'];
$access = $_POST['access'];
$binary_data = base64_decode( $encoded_data );
//$result1 = atomic_put_contents( 'webcam.jpg', $binary_data );
 $fp = fopen("webcam2.jpg", "w+");
    if (flock($fp, LOCK_EX)) {
        fwrite($fp, $binary_data);
        flock($fp, LOCK_UN);
    }
    fclose($fp);

if (file_exists("webcam2.jpg"))
{
$imageData =addslashes(file_get_contents("webcam2.jpg"));
}
   
    if (!$imageData) die("Could not save image!  Check file permissions.");
    try{
    $msg= upload($imageData,$username);  //this will upload your image
    //echo $msg;
     header('Location: http://localhost/galary.php');
	}
    catch(Exception $e) {
    echo $e->getMessage();
    echo 'Sorry, could not upload file';
    }

// the upload function

function upload($imageData,$username) {
    include "file_constants.php";
    $maxsize = 10000000; //set to approx 10 MB

    //check associated error code
    
                   $con = mysqli_connect($host, $user, $pass) OR DIE (mysqli_connect_error());

                    // select the db
                    mysqli_select_db ($con,$db) OR DIE ("Unable to select db".mysqli_error($con));

                    $sql = "INSERT INTO user_image
                    (username,image_desc,image,access,category)
                    VALUES
                    ('$username','$image_desc','{$imageData}','$access','$category')";

                    // insert the image
                    mysqli_query($con,$sql) or die("Error in Query: " . mysqli_error($con));
                    $msg='<p>Image successfully saved in database  </p>';
                }
                
    return $msg;


// Function to return error message based on error code

function file_upload_error_message($error_code) {
    switch ($error_code) {
        case UPLOAD_ERR_INI_SIZE:
            return 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
        case UPLOAD_ERR_FORM_SIZE:
            return 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
        case UPLOAD_ERR_PARTIAL:
            return 'The uploaded file was only partially uploaded';
        case UPLOAD_ERR_NO_FILE:
            return 'No file was uploaded';
        case UPLOAD_ERR_NO_TMP_DIR:
            return 'Missing a temporary folder';
        case UPLOAD_ERR_CANT_WRITE:
            return 'Failed to write file to disk';
        case UPLOAD_ERR_EXTENSION:
            return 'File upload stopped by extension';
        default:
            return 'Unknown upload error';
    }
}
?>