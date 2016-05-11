<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>注册</title>
<link rel="stylesheet" type="text/css" href="topic4.css"/>
</head>

<body>
<?php
session_start();
$db=mysqli_connect('localhost','root','wzj196310') or die ('Unable to connect.Check your connection parameters.');
mysqli_select_db($db,'bbs');
$sql = "INSERT INTO user(username,password)
VALUES ('".$_POST['username']."','".$_POST['password']."')";

if(empty($_POST["username"])&&empty($_POST["password"])){
	echo "<script>alert('Error:请输入用户名和密码');  top.location='signup.php'; </script>";
		//echo "Error:请输入用户名和密码";
}
elseif(empty($_POST["username"])){
	echo "<script>alert('Error:请输入用户名');  top.location='signup.php'; </script>";
		echo "Error:请输入用户名";
}
elseif(empty($_POST["password"])) {
	echo "<script>alert('Error:请设置密码');  top.location='signup.php'; </script>";
		//echo "Error:请设置密码";
}
elseif(empty($_POST['verify'])){
	echo "<script>alert('Error:验证码不能为空');
	 top.location='signup.php'; </script>";
}
elseif ($_POST['verify']!=$_SESSION['verify']) {
	echo "<script>alert('Error:验证码输入错误');
	 top.location='signup.php'; </script>";
}
	
elseif (mysqli_query($db, $sql)) {
	header("Location:login.php");
    //echo "New record created successfully";
	//echo '<a href="login.php">去登录吧，超人</a>';
} 
else {
	echo "<script>alert('用户已存在请直接登录');  top.location='login.php'; </script>";
    //echo 'Error:用户已存在请直接<a href="login.php">登录</a>';
}

//define variables and set to empty values
//$nameErr=$passwordErr="";
//$name=$password="";


?>
</body>
</html>
