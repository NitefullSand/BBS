<html>
<head>
	<meta charset="UTF-8">
	<title>文章详细信息</title>
	<link rel="stylesheet" href="about_me.css"/>
	<link rel="stylesheet" href="MSH.css">
	<link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
   <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
   <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</head>
<body>
<?php
$tid=$_GET['id'];
include 'top_class.php';
session_start();
echo <<<ENDHTML
<div class="btn_">
<button class="btn btn-info" onclick="location='Love.php'">网站首页</button>
<button type="button" class="btn btn-success">漫生活</button>
</div>
ENDHTML;
//echo "欢迎" . $_SESSION['username']."<br>";
$db=mysqli_connect('localhost','root','wzj196310') or die ('Unable to connect.Check your connection parameters.');
mysqli_select_db($db,'bbs');
$sql="select * FROM artical where artical_id='".$_GET['id']."'";
$result=mysqli_query($db,$sql);
while($row = $result->fetch_assoc()){
$artical_head=$row['artical_head'];
	$artical_id=$row['artical_id'];
	$artical_edit=$row['artical_edit'];
	$content=$row['artical_content'];
	$time=$row['artical_time'];
	$artical_type=$row['artical_type'];
echo <<<ENDHTML
<div class="all_news">
	<div class="dheading">
	$artical_head
	</div>
	<span class="dnews">
	发布时间:$time
	作者:$artical_edit
	$artical_type
	</span>
	$content
</div>
ENDHTML;
}
?>
</body>
</html>