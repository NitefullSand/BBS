<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录</title>
<link rel="stylesheet" type="text/css" href="topic4.css"/>
</head>

<body>
<?php
$db=mysqli_connect('localhost','root','wzj196310') or die ('Unable to connect.Check your connection parameters.');
mysqli_select_db($db,'bbs');
$sql="select password FROM user WHERE username='". $_POST['username']."'";
$result=mysqli_query($db,$sql);
$row = $result->fetch_assoc();
if(empty($_POST["username"])&&empty($_POST["password"])){
	echo "<script>alert('Error:请输入用户名和密码');  top.location='login.php'; </script>";
	//	echo "Error:请输入用户名和密码";
}
elseif(empty($_POST["username"])){
	echo "<script>alert('Error:请输入用户名');  top.location='login.php'; </script>";
		//echo "Error:请输入用户名";
		
}
elseif(empty($_POST["password"])) {
	echo "<script>alert('Error:请输入密码');  top.location='login.php'; </script>";
		//echo "Error:请输入密码";
}

elseif($row['password']==$_POST['password'])
{
	$_SESSION['username']=$_POST['username'] ;
	header("Location:DreamWorld.php");
}

else
{	echo "<script>alert('Error:密码或用户名错误');  top.location='login.php'; </script>";
	//echo "密码或用户名错误";
}

?>
</body>
</html>
