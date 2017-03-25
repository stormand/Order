<?php 
$databaseConnection = null;
function getConnection()
{
	$hostname="localhost";
	//数据库服务器主机名
	$database = "diancai";
	$username = "root";
	$password = "passwd";
	global $databaseConnection;
	$databaseConnection = @mysql_connect($hostname,$username,$password) or die(mysql_error());
	//shezhilianjiefuwuqi
	mysql_query("set names 'utf8'");
	@mysql_select_db($database, $databaseConnection) or die(mysql_error());
	
}
function closeConnection()
{
	global $databaseConnection;
	if($databaseConnection){
		mysql_close($databaseConnection) or die(mysql_error());
	}
}
/*
 * json  zhongwenxianshi
 */
function JSON($array)
{
	arrayRecursive($srray,'urlencode',true);
	$json = jsonEncode($array);
	return urldecode($json);
}

function arrayRecursive(&$array,$function,$apply_to_keys_also=false)
{
	foreach ($array as $key=>$value){
		if(is_array($value))
			arrayRecursive($array[$key],$function,$apply_to_keys_also);
		else $array[$key] = $function($value);
		
		if($apply_to_keys_also && is_string($key)){
			$new_key =$function($key);
			if($new_key !=$key){
				$array[$new_key]=$array[$key];
				unset($array[$key]);
			}
		}
	}
}

function jsonEncode($var)
{
	if(function_exists('json_encode')){
		return json_encode($var);
	}
	else{
		switch(gettype($var)){
			case 'boolean':
				return $var?'true':'false';
			case 'integer':
			case 'double':return $var;
			case 'resource':
			case 'string':
				return "".str_replace(
						array(
						"\r",
						"\n",
						 "<",
						">",
						"&"),
						array(
						'\r',
						'\n',
						'\x3c',
						'\x3e',
						'\x26'
						),addslashes($var))."";
			case 'array':
				if(empty($var)||
				array_keys($var)==range(0,sizeof($var)-1)){
					$output = array();
					foreach ($var as $v){
						$output[] = jsonEncode($v);
					}
					return '['.implode(',',$output).']';
				}
				//fouze zhuanhua wei duixaing
			case 'object':
				$output = array();
				foreach ($var as $k=>$v){
					$output[]=jsonEncode(strval($k)).':'.jsonEncode($v);
				}
				return '{'.implode(',',$output).'}';
			default:
				return 'null';			
		}
	}
}
?>