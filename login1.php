<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>my name</title>
</head>

<body>
<?php
$db=mysqli_connect('localhost','root','wzj196310') or die ('Unable to connect.Check your connection parameters.');
mysqli_select_db($db,'bbs');
$sql="select password FROM user WHERE username='". $_POST['username']."'";
$result=mysqli_query($db,$sql);
$row = $result->fetch_assoc();
if($row['password']==$_POST['password'])
{
echo '<h1>Hello ' . $_POST['username'] . '!</h1>';
echo "<br>";
}
else
{
	echo "are you zzf?";
}

?>
</body>
</html>
