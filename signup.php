<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>注册</title>
<link rel="stylesheet" type="text/css" href="topic4.css"/>
</head>
<body>
<img src="bg2.jpg" width="100%" height="100%"/>
<div class="Sform">
<form action="signup1.php" method="post">
	<table>
        <tr class="Sname">
            <td><img src="people.png">Name</td>
            <td><input type="text" name="username" />
            </td>
       </tr>
        <tr class="Spassword">
            <td><img src="lock.png">Password</td>
            <td><input type="password" name="password" />
            </td>
        </tr>
        <tr class="Sverify">
            <td>验证码</td>
            <td><input type="text" placeholder="验证码" name="verify"/>
            </td> 
        </tr>
        <tr>
            <td></td>
            <td><img src="verify.php" width="100" height="50"/>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center;">
            <input type="submit" name="submit" value="注册" />
            </td>
        </tr>
    </table>

</form>
</div>
</body>
</html>
