<?php
/*
	Powered By Stave
	Manager class must be used after using verify_login function.
	Articles Class can be used at any places.
	Database Construction
		-articles-
			date,title,content,place
		-users-
			username,password,random_verify

	Update at Sep 11,2017
*/
mysql_connect("","","");
mysql_select_db("");
require("class.php");
$request=$_GET["a"];
$Manager=new Manager;
$Articles=new Articles;
session_start();
//Initial.
include 'header.htm';
if ($request="admin"){
    $verify_login = $Manager -> verify_login();//
	if ($verify_login == "Not_Login"){
		header("Location: http://www.staveworld.com/?a=adminlogin"); 
	}else{
		include 'admin.htm';
	}
}
if ($request="adminlogin"){
	include 'adminlogin.htm';
}
if ($request="dologin"){
	$username=$_POST["username"];
	$password=md5($_POST["password"]);
	$dologin=$Manager -> dologin($username,$password);
	if ($dologin)/////////////////
}
include 'footer.htm';
?> 