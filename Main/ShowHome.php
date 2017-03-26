<?php 
	header("Content-Type:text/html;charset=utf-8");
	include_once("../Utils/com.php");
	getConnection();
	$jsonArray=array();

	$sql ="SELECT * FROM tiezi order by id desc limit 30";
	
	$result = mysql_query($sql);
	
	if(!$result){
		die("could not connect to the database</br>".mysql_error());
	}else{
		$row  = mysql_num_rows($result);
		if (!empty($row)){
			$post=array();
			while($row=mysql_fetch_row($result)){
				$array=array();
				$array["title"]=$row[1];
				$array["content"]=$row[2];
				$array["uid"]=$row[3];
				$array["day_time"]=$row[4];
				$post[]=$array;
			}
			$jsonArray["post"]=$post;
			$jsonArray["status"]=0;
			$jsonArray["mes"]="Login success";
			echo json_encode($jsonArray);
		}else{
			$jsonArray["status"]=0;
			$jsonArray["mes"]="no post";
			echo json_encode($jsonArray);
		}	

	}

closeConnection();
?>