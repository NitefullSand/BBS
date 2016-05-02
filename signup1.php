<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>注册</title>
<link rel="stylesheet" type="text/css" href="topic4.css"/>
</head>

<body>
<?php
$db=mysqli_connect('localhost','root','wzj196310') or die ('Unable to connect.Check your connection parameters.');
mysqli_select_db($db,'bbs');
$sql = "INSERT INTO user(username,password)
VALUES ('".$_POST['username']."','".$_POST['password']."')";

if(empty($_POST["username"])&&empty($_POST["password"])){
		echo "Error:请输入用户名和密码";
}
elseif(empty($_POST["username"])){
		echo "Error:请输入用户名";
}
elseif(empty($_POST["password"])) {
		echo "Error:请设置密码";
}
elseif (mysqli_query($db, $sql)) {
    echo "New record created successfully";
	echo '<a href="login.php">去登录吧，超人</a>';
} 
else {
    echo 'Error:用户已存在请直接<a href="login.php">登录</a>';
}
//define variables and set to empty values
//$nameErr=$passwordErr="";
//$name=$password="";


?>
</body>
</html>
