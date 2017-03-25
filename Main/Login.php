<?php 
session_start();
include_once ("../Utils/com.php");//连接数据库
getConnection();
$jsonArray=array();
//
if($_REQUEST['code']==$_SESSION['code_session']){
	@$username=$_REQUEST['username'];
	@$password=$_REQUEST['password'];
	$sql ="SELECT * FROM login where username='$username' and password = '$password'";
	
	$result = mysql_query($sql);
	
	if(! $result){
		die("could not connect to the database</br>".mysql_error());
	}else{
		
		$row=mysql_fetch_row($result);
		
		$jsonArray['phone']=$row[3];
		$jsonArray['email']=$row[4];
		$jsonArray['age']=$row[5];
		$jsonArray['sex']=$row[6];
		$jsonArray['weight']=$row[7];
		$jsonArray['height']=$row[8];

		$jsonArray["status"]=0;
		$jsonArray["mes"]="Login success";
		echo json_encode($jsonArray);
	}
}else{
	$jsonArray["status"]=1;
	$jsonArray["mes"]="wrong identifying code";
	echo json_encode($jsonArray);
}
closeConnection();