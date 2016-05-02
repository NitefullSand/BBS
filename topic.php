<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="topic4.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>话题首页</title>
</head>
<body>
<img src="bg2.jpg" width="100%" height="100%"/>
<div class="welcome">
<?php
if(isset($_SESSION['username']))
{
	echo "欢迎" . $_SESSION['username'];
} else {
	echo "<script>alert('请登录');  top.location='login.php'; </script>";
	//header("Location:login.php");
	exit;
}

?>
</div>
<div class="Tform">
<form action="topic1.php" method="post">
		<table>
			<tr>
	            <td><?php echo $_SESSION['username'];?></td>
	        </tr>
			<tr>
				<td>标题:</td>
				<td><input type="text" name="heading"/></td>
			</tr>
			<tr>
				<td>内容:</td>
				<td><textarea name="content" rows="5" cols="40"></textarea></td>
			</tr>
			<tr>
				<td>时间:</td>
				<td><?php date_default_timezone_set('prc');  $time = time();echo date("y-m-d h:i:s",$time) ?></td>
			</tr>
			<tr>
	            <td colspan="2" style="text-align:center;">
	            <input type="submit" name="submit" value="发表" />
	            </td>
            </tr>
		</table>
</form>
</div>
</body>
</html>
