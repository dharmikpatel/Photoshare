<html>
<body>
  <?php


$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];
$detail = $_POST['detail'];
session_start();
$_SESSION['username']=$username; 
//$name=$fname.$lname;                               

$con=mysqli_connect("localhost","root","root","test");
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }            
/*$result=mysqli_query($con,"SELECT id from user");
while($row = mysqli_fetch_array($result))
{
$no = $row['id'];
}*/
//mysqli_close($con);
//$con=mysqli_connect("localhost","root","","final");
//if (mysqli_connect_errno($con))
  //{
  //echo "Failed to connect to MySQL: " . mysqli_connect_error();
  //}
//$noo=$no+1;
mysqli_query($con,"INSERT INTO user(username,password,email,detail)
VALUES ('$username','$password','$email','$detail')");
echo "RECORDS ADDED SUCCESSFULLY";
mysqli_close($con);
header( 'Location: http://localhost/index.html');

 ?>
</html>
</body>