<?php
mysql_connect("","","");
mysql_select_db("");
require("class.php");
$request=$_GET["a"];
$Manager=new Manager;
$Articles=new Articles;
if ($request="admin"){
    $verify_login = $Manager -> verify_login();//
	if ($verify_login == "Not_Login"){
		header("Location: http://www.staveworld.com/?a=adminlogin"); 
	}else{
		
	}
}
if ($request="adminlogin"){
	
}
if ($request="dologin"){
	$username=$_POST["username"];
	$password=md5($_POST["password"]);
	$dologin=$Manager -> dologin($username,$password);
	if ($dologin)/////////////////
}