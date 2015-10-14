<html>
<body>
  <?php
//$table_name=$_POST["mydropdown"];
$username=$_POST["username"];
$password=$_POST["password"];

$con=mysqli_connect("localhost","root","root","test");
$flag=0;
// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$result = mysqli_query($con,"SELECT * FROM user");

while($row = mysqli_fetch_array($result))
  {
  if($row['password']==$password && $row['username']==$username)
   {
    // echo 'You are loggedin';
      header('Location: http://localhost/galary.php');
      $flag=1;
      break;
   }
//  else
  // {
	//
  //flag=0	
 //  }
  }

if($flag==0)
{
  header('Location: http://localhost/index.html');
}
  
session_start();
$_SESSION['username']=$username; 
mysqli_close($con);
?>

</body>
</html>