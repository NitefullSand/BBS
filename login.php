<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录</title>
<link rel="stylesheet" type="text/css" href="topic4.css"/>
</head>

<body>
<div class="Lform">
<form action="login1.php" method="post">
	<table>
        <tr>
            <td class="Lname">Name</td>
            <td><input type="text" name="username" />
            </td>
       </tr>
        <tr>
            <td class="Lpassword">Password</td>
            <td><input type="text" name="password" />
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center;">
            <input type="submit" name="submit" value="登录" />
            </td>
        </tr>
    </table>

</form>
<a href="signup.php" style="margin-left:200px">去注册吧，皮卡丘</a>
</div>
</body>
</html>