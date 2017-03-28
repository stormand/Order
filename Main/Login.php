<?php 
session_start();
include_once ("../Utils/com.php");//连接数据库
getConnection();
$jsonArray=array();


	@$username=$_REQUEST['username'];
	@$password=$_REQUEST['password'];
	@$loginMode=$_REQUEST['login_mode'];
	$sql ="SELECT * FROM login where username='$username' and password = '$password'";
	
	
	if($loginMode=="user_login" && $_REQUEST['code']!=$_SESSION['code_session']){
		$jsonArray["status"]=0;
		$jsonArray["mes"]="wrong identifying code";
		die(json_encode($jsonArray));
	}
	
	$result = mysql_query($sql);
	
	if(! $result){
		die("could not connect to the database</br>".mysql_error());
	}else{
		$row  = mysql_num_rows($result);
		if (!empty($row)){
			while($row=mysql_fetch_row($result)){
				$jsonArray["id"]=$row[0];
				$jsonArray['username']=$row[1];
				$jsonArray['phone']=$row[3];
				$jsonArray['email']=$row[4];
				$jsonArray['age']=$row[5];
				$jsonArray['sex']=$row[6];
				$jsonArray['weight']=$row[7];
				$jsonArray['height']=$row[8];
			}
			$jsonArray["status"]=0;
			$jsonArray["mes"]="Login success";
			echo json_encode($jsonArray);
		}else{
			$jsonArray["status"]=0;
			$jsonArray["mes"]="no such user";
			echo json_encode($jsonArray);
		}	
	}

closeConnection();
?>