<html>
<head>
	<meta charset="UTF-8">
	<title>写文章</title>
	<link rel="stylesheet" href="about_me.css"/>
	<link rel="stylesheet" href="MSH.css">
	<link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
   <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
   <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</head>
<body>
<?php
include 'top_class.php';
session_start();
?>
<div class="btn_">
<button class="btn btn-info" onclick="location='Love.php'">网站首页</button>
<button type="button" class="btn btn-success">漫生活</button>
<!-- <hr> -->
</div>
<div class="artical_form">
<form action="insert_data_artical.php" method="post">
		<table>
			<tr>
				<td>文章题目:<br>
				<select name="artical_type">
				  <option value="程序人生">[程序人生]</option>
				  <option value="经典语录">[经典语录]</option>
				  <option value="欣赏">[欣赏]</option>
				  <option value="日记">[日记]</option>
				</select>
				</td>
				<td style="text-align:center;font-family:'微软雅黑';font-size:20px;"><input type="text" name="artical_heading"/></td>
			</tr>
				<td>文章内容:</td>
				<td>
				<div id="artical_content">
				<!--加载编辑器的容器-->
					<script id="container" name="content" type="text/plain">
					</script>
					<!--配置文件-->
					<script type="text/javascript" src="utf8-php/ueditor.config.js"></script>
					<!--编辑器源码文件-->
					<script type="text/javascript" src="utf8-php/ueditor.all.js"></script>
					<!-- 实例化编辑器 -->
				    <script type="text/javascript">
				        var ue = UE.getEditor('container');
				    </script>
				</div>
				</td>
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