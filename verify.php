<?php
session_start();
$im=imagecreate(200,100);//生成画布
imagecolorallocate($im, 0, 0, 0);//背景颜色
$white=imagecolorallocate($im, rand(0,255), rand(0,255),rand(0,255));//生成随机颜色
for($i=0;$i<9;$i++)
{
	imageline($im, rand(0,200), rand(0,100), rand(0,200), rand(0,100), $white);//生成干扰线条元素
}
for($i=0;$i<150;$i++)
{
	imagesetpixel($im, rand(0,200), rand(0,100), $white);//生成干扰点元素
}
$str='';
for($i=0,$str='';$i<4;$i++)//通过循环获得四个字符
{
	switch (rand(1,3)) {
		case '1':
			$ch=rand(0,9);
			break;
		case '2':
			$ch=sprintf('%c',rand(97,122));
			break;
		case '3':
			$ch=sprintf('%c',rand(65,90));
			break;
	}
			$str.=$ch;
}

imagettftext($im,32,rand(0,15),55,70,$white,'c.ttf',$str);//在画布上输出字符串
header("Content-type:image/jpeg");
imagejpeg($im);
imagedestroy($im);
$_SESSION['verify']=$str;
?>
