<?php
  $username = $_POST[username];
  $password = $_POST[password];
  if($username=="")  setcookie("usercheck","username_empty",time()+600);
  else if($password=="")  setcookie("usercheck","password_empty",time()+600);  
  else
  {
	  $link=mysql_pconnect("localhost","root","123") or die("链接出错：".mysql_error());
	  $result = mysql_db_query("Sensor","select * from user where username='".$username."'");
	  $row=mysql_fetch_row($result);
	  if($row[0]!=$username) setcookie("usercheck","nosuchuser",time()+600);
	  else if($row[1]==$password)
	  {
	  	setcookie("usercheck","login_success",time()+600);
	  	setcookie("username",$username,time()+600);
	  }
	  else setcookie("usercheck","password_error",time()+600);	  
      mysql_free_result($result);
      mysql_close($link);
  }	

  setcookie("from_usercheck","true",time()+600);
  Header("Location: home.php");  
?>