<?php
include_once("../Utils/com.php");
getConnection();
$jsonArray=array();
//

$title =$_REQUEST['title'];
$content =$_REQUEST['content'];
$uid=intval($_REQUEST['uid']);
//
//
$sql = "INSERT INTO tiezi (title,content,uid) VALUES ('$title','$content',$uid);";

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