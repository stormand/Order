<?php 
ob_end_clean();
session_start();
//生成验证码图片
Header("Content-type: image/PNG");
$im = imagecreate(50,20);
//指定宽高的图片
$back=ImageColorAllocate($im,245,245,245);
//定义背景颜色
imagefill($im,0,0,$back);
//把背景颜色填充到刚刚画出来的图片中
$vcodes ="";
srand((double)microtime()*1000000);
//生成4位数字
for($i=0;$i<4;$i++)
{
	//生成随机颜色
	$font = ImageColorAllocate($im, rand(100,255),rand(0,100),rand(100,255));
$authnum=rand(1,9);
$vcodes.=$authnum;
imagestring($im,5,3+$i*12,1,$authnum,$font);
}
$_SESSION['code_session']=$vcodes;
for($i=0;$i<100;$i++)//干扰像素
{
	$randcolor=ImageColorallocate($im,rand(0,255),rand(0,255),rand(0,255));
	imagesetpixel($im,rand()%70,rand()%30,$randcolor);//画像素点函数
}
ImagePNG($im);
ImageDestroy($im);
?>



