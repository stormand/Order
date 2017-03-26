<?php
include_once("../Utils/com.php");
getConnection();
$jsonArray=array();
//

echo "aaa";
if(isset($_REQUEST['username'])&&isset($_REQUEST['password']))
{
$username =$_REQUEST['username'];
$password =$_REQUEST['password'];
//
$s1="SELECT*FROM login WHERE username ='$username';";
//
$result = mysql_query($s1);
if(mysql_num_rows($result)>0){
	$jsonArray["status"]=1;
	$jsonArray["mes"]="Name is used";
	
	echo json_encode($jsonArray);
	closeConnection();
	exit();
}
//
$sql = "INSERT INTO login (username,password) VALUES ('$username','$password');";

$result = mysql_query($sql);
if(! $result){
	$jsonArray["status"]=1;
    $jsonArray["mes"]= "register fail";
    echo json_encode($jsonArray);
    die("could not connect to the database</br>".mysql_error());
    
}else{
	$jsonArray["status"]=0;
	$jsonArray["mes"]="register success";
	echo json_encode($jsonArray);
}
}
closeConnection();
?>