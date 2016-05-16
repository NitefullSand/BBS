<?php 
session_start();
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>回复页面</title>
	<link rel="stylesheet" type="text/css" href="topic4.css"/>
	<link rel="stylesheet" href="about_me.css"/>
	<link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
   <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
   <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</head>
<body>
<!-- <img src="bbs_images/bg2.jpg" width="100%" height="100%"/> -->
<?php include 'top_class.php';
?>
<div class="btn_">
<button class="btn btn-info" onclick="location='Love.php'">网站首页</button>
<button type="button" class="btn btn-success">留言板</button>
</div>
<div class="Aform">
<form action="insert_answer.php" method="post">
		<?php
			echo '<input type="hidden" name="topic_id" value='.$_GET['id'].'>';
		?>
		<table> 
			<tr>
	            <td><?php echo $_SESSION['username'];?></td>
	        </tr>
	        <tr>
				<td>内容:</td>
				<td>
				<!-- <textarea name="answer_content" rows="5" cols="40"></textarea> -->
				<div id="content">
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