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
$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$rno = $_POST['rollno'];
	$branch = $_POST['branch'];
	$email = $_POST['email'];
	$passout = $_POST['passout'];
	$pwd = $_POST['pwd'];
	$hr = $_POST['hruser'];
	$cf = $_POST['cfuser'];
	$cc = $_POST['ccuser'];
	$ib = $_POST['ibuser'];
$res = mysqli_query($con ,"SELECT * From studb");
$c=0;
while($row = mysqli_fetch_array($res))
{
	if($c!=0)
	break;
	elseif($row['email']==$email)
	$c=2;
}
if($c==0)
{
$qry = "INSERT INTO studb(fname,lname,rno,branch,email,passyear,pwd,huname,cfuname,ccuname,iuname) VALUES('$fname' , '$lname' , '$rno' , '$branch' , '$email' , '$passout' , '$pwd','$hr' ,'$cf','$cc','$ib')";
$ins = mysqli_query($con , $qry);
if($ins)
{
header("Location: http://localhost:8080/patproject/studentlog.php");
}
}
else
{
if($c==2)
{
echo '<script>alert("email already registered")</script>';
sleep(10);
}
header('Content-Disposition: filename="studentreg.php"');
readfile("C:/xampp/htdocs/patproject/studentreg.php");
mysqli_close($con);
}
?>
</body>
</html>