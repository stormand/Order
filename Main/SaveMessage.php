<?php
include_once("../Utils/com.php");
getConnection();
$jsonArray=array();
$arr=array();
$count=0;
$imgPaths="";
$splitSymbol="@";
if(isset($_FILES["picture"])){
	 $dest_folder  = "D:/cloth_shop_image/"; //服务器文件的存放路径
	if(is_array($_FILES["picture"]["error"])){
		foreach ($_FILES["picture"]["error"] as $key => $error){
			 if($error == UPLOAD_ERR_OK){
					$tmp_name = $_FILES["picture"]["tmp_name"][$key];
					$a=explode(".",$_FILES["picture"]["name"][$key]);  //截取文件名跟后缀
					$prename = $a[0];
					$name = date('YmdHis').mt_rand(100,999).".".$a[1];  // 文件的重命名 （日期+随机数+后缀）
					$uploadfile = $dest_folder.$name;     // 文件的路径
					move_uploaded_file($tmp_name, $uploadfile);
					if($count==0){
						$imgPaths=$uploadfile;
					}else{
						$imgPaths=$imgPaths.$splitSymbol.$uploadfile;
					}
					
					$count++;
			 }
		}
	} 
	
}

		


$title =$_REQUEST['title'];
$content =$_REQUEST['content'];
$uid=intval($_REQUEST['uid']);
$uage=intval($_REQUEST['uage']);
$uweight=intval($_REQUEST['uweight']);
$uheight=intval($_REQUEST['uheight']);
$usex=$_REQUEST['usex'];

$sql = "INSERT INTO tiezi (title,content,uid,day_time,uage,uheight,uweight,usex,image) VALUES ('$title','$content',$uid,now(),$uage,$uheight,$uweight,'$usex','$imgPaths');";

$result = mysql_query($sql);
if(! $result){
	$jsonArray["status"]=1;
    $jsonArray["mes"]= "fail";
    echo json_encode($jsonArray);
    die("could not connect to the database</br>".mysql_error());
    
}else{
	$jsonArray["status"]=0;
	$jsonArray["mes"]="save success";
	echo json_encode($jsonArray);
}

closeConnection();
?>