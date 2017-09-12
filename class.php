<?php
class Manager{
	public function Post_Articles($title,$content,$place){
		$query=mysql_query("SELECT * FROM `articles` WHERE `title`='$title'");
		if (mysql_num_rows($query)){
			return "Article_Exist";//
		}else{
			$date=date("Y-m-d h:i:s");
			$query=mysql_query("INSERT INTO articles(`date`,`title`,`content`,`place`) VALUES('$date','$title','$content','$place')");
			if ($query){
				return "Article_Post_Succeed";//
			}else{
				return "Article_Post_Failed";//
			}
		}
	}
	public function Do_Change_Articles($title,$new_title,$new_content,$new_place){
		$query=mysql_query("SELECT * FROM `articles` WHERE `title`='$title'");
		if (!mysql_num_rows($query)){
			return "Article_Not_Exist";//
		}else{
			$query=mysql_query("UPDATE `articles` SET `title`='$new_title',`content`='$new_content',`place`='$new_place' WHERE `title`='$title'");
			if ($query){
				return "Article_Change_Succeed";//
			}else{
				return "Article_Change_Failed";//
	 		}
		}
	}
	public function Change_Articles($title){
		  $query=mysql_query("SELECT * FROM `articles` WHERE `title`='$title'");
		  if (!mysql_num_rows($query)){
		  	  return "Article_Not_Exist";
		  }else{
			  $row=mysql_fetch_array($query);
			  return $row;//
		  } 
	}
	public function dologin($username,$password_md5){
		$query=mysql_query("SELECT * FROM `user` WHERE `username`='$username'");
		$row=mysql_fetch_array($query);
		if (mysql_num_rows($query)){
			return "Username_Not_Exist";//
		}
		$password_v=$row["password"];
		if ($password_v!=$password_md5){
			return "Password_Error";//
		}else{
			$random_verify=rand(100000,999999).rand(100000,999999).rand(100000,999999);
			$update=mysql_query("UPDATE `user` SET `random_verify`='$random_verify' WHERE `username`='$username'");
			if (!$update){
				return "Unknown_Error";//
			}else{
				$_SESSION["random_verify"]=$random_verify;
				$_SESSION["username"]=$username;
				return "Login_Success";//
			}
		}
	}
}
class Articles{
	public function Get_Articles_List(){
		$query=mysql_query("SELECT * FROM `articles`");
		if (!$query){
			return "Error";//
		}
		$rows=mysql_fetch_array($result);
		return $rows;//
	}
	public function See_Article($title){
		$query=mysql_query("SELECT * FROM `articles` WHERE `title`='$title'");
		$row=mysql_fetch_array($query);
		if (!mysql_num_rows($query)){
			return "Article_Not_Exist";//
		}
		$article[1]=$row["date"];
		$article[2]=$row["title"];
		$article[3]=$row["content"];
		$article[4]=$row["place"];
		return $article;
	}
	public function 
}
