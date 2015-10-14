<?php

//session_start();
if (!isset($_SESSION['username']))
{
header('Location: index.html');
}
//sleep(20);
 $username=$_SESSION['username'];
// check if a file was submitted
if(!isset($_FILES['fileToUpload']))
{
    sleep(20);
    echo '<p>Please select a file</p>';
}
else
{
    try {

    $access = $_POST['access'];
    $textarea = $_POST['textarea'];
    $msg= upload($access,$textarea,$username);  //this will upload your image
    echo $msg;  //Message showing success or failure.
    
   // echo $access;
    }
    catch(Exception $e) {
    echo $e->getMessage();
    echo 'Sorry, could not upload file';
    }
}

// the upload function

function upload($access,$textarea,$username) {
    include "file_constants.php";
    $maxsize = 1000000000; //set to approx 10 MB

    //check associated error code
    //if($_FILES['userfile']['error']==UPLOAD_ERR_OK) {

        //check whether file is uploaded with HTTP POST
      //  if(is_uploaded_file($_FILES['userfile']['tmp_name'])) {    

            //checks size of uploaded image on server side
        //   if( $_FILES['userfile']['size'] < $maxsize) {  
  
               //checks whether uploaded file is of image type
              //if(strpos(mime_content_type($_FILES['userfile']['tmp_name']),"image")===0) {
                 $finfo = finfo_open(FILEINFO_MIME_TYPE);
              //  if(strpos(finfo_file($finfo, $_FILES['userfile']['tmp_name']),"image")===0) {    

                    // prepare the image for insertion
                    $imgData =addslashes (file_get_contents($_FILES['fileToUpload']['tmp_name']));

                    // put the image in the db...
                    // database connection
                   $con = mysqli_connect($host, $user, $pass) OR DIE (mysqli_connect_error());

                    // select the db
                    mysqli_select_db ($con,$db) OR DIE ("Unable to select db".mysqli_error($con));

                    // our sql query
                   /* $result=mysqli_query($con,"SELECT id from test_image");
                    while($row = mysqli_fetch_array($result))
                        {
                        $no = $row['id'];
                        }
                        $noo = $no +1;*/
                    $sql = "INSERT INTO user_image
                    (username,image_desc,image,access)
                    VALUES
                    ('$username','$textarea','{$imgData}','$access');";

                    // insert the image
                    mysqli_query($con,$sql) or die("Error in Query: " . mysqli_error($con));
                    $msg='<p>Image successfully saved in database  </p>';
                //}
          //      else
            //        $msg="<p>Uploaded file is not an image.</p>";
            //}
         /*    else {
                // if the file is not less than the maximum allowed, print an error
                $msg='<div>File exceeds the Maximum File limit</div>
                <div>Maximum File limit is '.$maxsize.' bytes</div>
                <div>File '.$_FILES['userfile']['name'].' is '.$_FILES['userfile']['size'].
                ' bytes</div><hr />';
                }
        }
        else
            $msg="File not uploaded successfully.";

    }
    else {
        $msg= file_upload_error_message($_FILES['userfile']['error']);
    }*/
    return $msg;


// Function to return error message based on error code
}
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