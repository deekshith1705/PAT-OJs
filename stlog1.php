<html>
<body>
<?php
$con = mysqli_connect('localhost','root','','patproject');
if(!$con)
{
die('Error in Connection'.mysqli_error());
}
$sel = mysqli_select_db($con , 'patproject');
if(!$sel)
{
echo " <br> Database not selected";
}
$mail = $_POST['email'];  
$password = $_POST['pwd'];
//$un = $_POST['un'];
//$pass = $_POST['pass'];
$res = mysqli_query($con ,"SELECT * From studb");
$c=0;
while($row = mysqli_fetch_array($res))
{
if($c!=0)
{
break;
}
elseif($row['email']==$mail && $row['pwd']==$password)
{
$c=1;
}
}
if($c==0)
{
echo "<script>alert('Invalid Email or password')</script>";
sleep(10);
header('Content-Disposition: filename="studentlog.php"');
readfile("C:/xampp/htdocs/patproject/studentlog.php");
}
else
{
if(isset($_SESSION['mail']) && isset($_SESSION['password']))
{
session_start();
session_destroy();
}
session_start();
$_SESSION["email"]=$mail;
$_SESSION["pwd"]=$password;
header("Location: http://localhost:8080/patproject/user.html");
}
mysqli_close($con);
?>
</body>
</html>
