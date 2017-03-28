<?php
include_once("../Utils/com.php");
getConnection();
$jsonArray=array();
//

$username =$_REQUEST['username'];
$password=$_REQUEST['password'];
$age =intval($_REQUEST['age']);
$weight =intval($_REQUEST['weight']);
$height =intval($_REQUEST['height']);
$sex=$_REQUEST['sex'];
//
//
$sql = "UPDATE login SET username='$username',age=$age,sex='$sex',weight=$weight,height=$height where username='$username' and password='$password'";

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