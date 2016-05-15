<?php 
session_start();
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>回复页面</title>
	<link rel="stylesheet" type="text/css" href="topic4.css"/>
</head>
<body>
<img src="bbs_images/bg2.jpg" width="100%" height="100%"/>
<div class="Aform">
<form action="insert_answer.php" method="post">
		<?php
			echo '<input type="hidden" name="topic_id" value='.$_GET['id'].'/>';
		?>
		<table> 
			<tr>
	            <td><?php echo $_SESSION['username'];?></td>
	        </tr>
	        <tr>
				<td>内容:</td>
				<td><textarea name="answer_content" rows="5" cols="40"></textarea>
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